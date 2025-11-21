<?php
declare(strict_types=1);

require_once '../env.php';
loadEnv('../.env');
require '../vendor/autoload.php';
require '../include/connection.php';

use Square\SquareClient;
use Square\Environments;
use Square\Payments\Requests\CreatePaymentRequest;
use Square\Types\Money;
use Square\Types\Currency;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;

header('Content-Type: application/json');

// Load configuration from environment
$accessToken = getenv('SQUARE_ACCESS_TOKEN') ?: '';
$environment = getenv('SQUARE_ENVIRONMENT') ?: 'sandbox'; // sandbox | production

if (!$accessToken) {
    echo json_encode(['success' => false, 'message' => 'Missing SQUARE_ACCESS_TOKEN']);
    exit;
}

// Read frontend request JSON
$input = json_decode(file_get_contents('php://input'), true) ?? [];

$sourceId          = $input['sourceId']          ?? null;
$locationId        = $input['locationId']        ?? null;
$amount            = isset($input['amount']) ? (int)$input['amount'] : null;  // in cents
$currency          = isset($input['currency']) ? strtoupper((string)$input['currency']) : 'USD';
$verificationToken = $input['verificationToken'] ?? null;
$orderID           = $input['order_id']           ?? null;

// Validate required fields
if (!$sourceId) { 
    echo json_encode(['success' => false, 'message' => 'Missing sourceId']); 
    exit; 
}
if (!$amount) { 
    echo json_encode(['success' => false, 'message' => 'Missing amount']); 
    exit; 
}
if ($amount <= 0 || $amount > 99999999) {
    echo json_encode(['success' => false, 'message' => 'Invalid amount']);
    exit;
}

// Initialize Square Client (v43.2+ format)
$baseUrl = $environment === 'production' 
    ? Environments::Production->value 
    : Environments::Sandbox->value;

$square = new SquareClient(
    token: $accessToken,
    options: ['baseUrl' => $baseUrl]
);

try {
    // Generate idempotency key
    $idempotencyKey = bin2hex(random_bytes(16));

    // Build payment request data array
    $paymentData = [
        'idempotencyKey' => $idempotencyKey,
        'sourceId' => $sourceId,
        'amountMoney' => new Money([
            'amount' => $amount,
            'currency' => $currency
        ])
    ];

    // Add optional location ID
    if (!empty($locationId)) {
        $paymentData['locationId'] = $locationId;
    }

    // Add optional verification token (for SCA/3DS)
    if (!empty($verificationToken)) {
        $paymentData['verificationToken'] = $verificationToken;
    }

    // Create payment request
    $paymentRequest = new CreatePaymentRequest($paymentData);

    // Execute payment
    $response = $square->payments->create($paymentRequest);

    // Check if payment was successful
    $payment = $response->getPayment();
    
    $paymentID = $payment->getId();
    $paymentStatus = $payment->getStatus();
    $amount = $payment->getAmountMoney()->getAmount();
    $currency = $payment->getAmountMoney()->getCurrency();
    $receiptURL = $payment->getReceiptUrl();
    $createdAt = $payment->getCreatedAt();

    if (!$payment) {
        echo json_encode(['success' => false, 'message' => 'Payment failed']);
        exit;
    }

    $updatePayment = "UPDATE `payment_confirmation` SET `transaction_id` = '$paymentID', `status`='$paymentStatus', `gateway_response` = '$payment', `paid_at`='$createdAt',`updated_at`='NOW()' WHERE `order_id` = '$orderID'";

    $con->query($updatePayment);

    echo json_encode([
        'success'    => true,
        'message'    => 'Payment successful',
        'payment_id' => $payment->getId(),
        'status'     => $payment->getStatus(),
        'amount'     => $payment->getAmountMoney()->getAmount(),
        'currency'   => $payment->getAmountMoney()->getCurrency(),
        'receipt_url' => $payment->getReceiptUrl(),
        'created_at' => $payment->getCreatedAt()
    ]);

} catch (SquareApiException $e) {
    // Square API returned an error
    $errorDetails = [];
    if (method_exists($e, 'getErrors')) {
        foreach ($e->getErrors() as $error) {
            $errorDetails[] = sprintf(
                "%s: %s",
                $error->getCategory() ?? 'ERROR',
                $error->getDetail() ?? 'Unknown error'
            );
        }
    }
    
    $errorMessage = !empty($errorDetails) 
        ? implode('; ', $errorDetails)
        : $e->getMessage();

    error_log("Square API Error: " . $errorMessage);
    
    echo json_encode([
        'success' => false, 
        'message' => $errorMessage,
        'code' => $e->getCode()
    ]);

} catch (SquareException $e) {
    // General Square SDK exception
    error_log("Square SDK Error: " . $e->getMessage());
    
    echo json_encode([
        'success' => false, 
        'message' => 'Payment processing error',
        'code' => $e->getCode()
    ]);

} catch (Throwable $e) {
    // Catch any other errors
    error_log("Unexpected Error: " . $e->getMessage());
    
    echo json_encode([
        'success' => false, 
        'message' => 'An unexpected error occurred'
    ]);
}