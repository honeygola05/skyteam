<?php
declare(strict_types=1);

require_once __DIR__ . '/env.php';

// Load your .env file
loadEnv(__DIR__ . '/.env');

require __DIR__ . '/vendor/autoload.php';

use Square\SquareClient;
use Square\Payments\Requests\CreatePaymentRequest;
use Square\Types\Money;

header('Content-Type: application/json');

// Get token from env (recommended)
$accessToken = getenv('SQUARE_ACCESS_TOKEN') ?: '';
if (!$accessToken) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Missing SQUARE_ACCESS_TOKEN']);
    exit;
}

// Read JSON body
$input = json_decode(file_get_contents('php://input'), true) ?? [];

$sourceId          = $input['sourceId']          ?? null;
$locationId        = $input['locationId']        ?? null; // optional but recommended
$amount            = isset($input['amount'])     ? (int)$input['amount'] : null; // cents
$currency          = isset($input['currency'])   ? strtoupper((string)$input['currency']) : null;
$verificationToken = $input['verificationToken'] ?? null; // only for card/verifyBuyer

if (!$sourceId) { echo json_encode(['success'=>false,'message'=>'Missing sourceId']); exit; }
if (!$amount)   { echo json_encode(['success'=>false,'message'=>'Missing amount']);   exit; }
if (!$currency) { echo json_encode(['success'=>false,'message'=>'Missing currency']); exit; }

try {
    // Your SDK ctor: (token, version, options)
    $client = new SquareClient(
        $accessToken,
        null,
        [
            'baseUrl' => 'https://connect.squareupsandbox.com',
            'timeout' => 30,
        ]
    );

    // Money expects an array payload
    $money = new Money([
        'amount'   => $amount,
        'currency' => $currency,
    ]);

    // CreatePaymentRequest expects an array payload
    $payload = [
        'sourceId'       => $sourceId,
        'idempotencyKey' => bin2hex(random_bytes(16)),
        'amountMoney'    => $money,
    ];
    if (!empty($locationId)) {
        $payload['locationId'] = $locationId;
    }
    if (!empty($verificationToken)) {
        // If your build supports verification tokens, include it.
        $payload['verificationToken'] = $verificationToken;
    }

    $request  = new CreatePaymentRequest($payload);

    // Your SDK returns CreatePaymentResponse directly (not ApiResponse)
    $response = $client->payments->create($request);

    // Success if there are no errors
    $errors = method_exists($response, 'getErrors') ? $response->getErrors() : null;

    if (empty($errors)) {
        $payment = method_exists($response, 'getPayment') ? $response->getPayment() : null;

        echo json_encode([
            'success'    => true,
            'message'    => 'Payment successful',
            'payment_id' => $payment && method_exists($payment, 'getId') ? $payment->getId() : null,
            'status'     => $payment && method_exists($payment, 'getStatus') ? $payment->getStatus() : null,
            'amount'     => $payment && method_exists($payment, 'getAmountMoney') && $payment->getAmountMoney()
                                ? $payment->getAmountMoney()->getAmount()
                                : $amount,
            'currency'   => $payment && method_exists($payment, 'getAmountMoney') && $payment->getAmountMoney()
                                ? $payment->getAmountMoney()->getCurrency()
                                : $currency,
        ]);
    } else {
        $msgs = array_map(function ($e) {
            $code = method_exists($e, 'getCode') ? $e->getCode() : '';
            $detail = method_exists($e, 'getDetail') ? $e->getDetail() : '';
            $category = method_exists($e, 'getCategory') ? $e->getCategory() : '';
            return trim($code . ' ' . ($detail ?: $category));
        }, $errors);

        http_response_code(400);
        echo json_encode(['success' => false, 'message' => implode('; ', $msgs)]);
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}