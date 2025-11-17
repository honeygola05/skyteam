<?php

include('include/connection.php');
header('Content-Type: application/json');

if (isset($_POST['action']) && $_POST['action'] == 'saveTravellerData') {
    try{

        $orderID    = uniqid('ORD_');
        $departure  = $_POST['departure'];
        $arrival    = $_POST['arrival'];
        $shoppingID = $_POST['shoppingid'];        
        $offerID    = $_POST['offerid'];
        $adults     = $_POST['adults'];
        $children   = $_POST['children'];
        $cabinClass = $_POST['cabinclass'];
        $tripType   = $_POST['tripType'];
        $contacts   = $_POST['traveller-country-code'].' '. $_POST['traveller-mobile-number'] ?? '';
        $email      = $_POST['traveller-email'] ?? '';
        $address    = $_POST['billing-address'];
        $city       = $_POST['billing-city'];
        $zipcode    = $_POST['traveller-zipcode'];
        $country    = $_POST['traveller-country'];

        $checkTransactionExists = "SELECT `order_id` FROM `booking_details` WHERE `shoppingid`='$shoppingID' AND `offerid`='$offerID' AND `mobile_number`='$contacts' AND `email`='$email' AND `billing_address`='$address' AND `city`='$city' AND `country`='$country' AND `zipcode`='$zipcode'";
        $checkResult = $con->query($checkTransactionExists);

        if ($checkResult->num_rows > 0) {
            echo json_encode(['status_code'=> 200, 'status' => 'success', 'message' => 'Transaction already exists.', 'orderID' => $checkResult->fetch_assoc()['order_id']]);
            exit;
        }
        $saveBillingDetails = "INSERT INTO `booking_details`(`order_id`, `departure`, `arrival`, `shoppingid`, `offerid`, `adults`, `children`, `cabinclass`, `tripType`, `mobile_number`, `email`, `billing_address`, `city`, `country`, `zipcode`, `payment_status`, `create_at`) 
        VALUES ('$orderID', '$departure', '$arrival', '$shoppingID', '$offerID', '$adults', '$children', '$cabinClass', '$tripType', '$contacts', '$email', '$address', '$city', '$country', '$zipcode', 'pending', NOW())";

        if ($con->query($saveBillingDetails) === true) {
            $lastID = $con->insert_id;

            // Ensure all expected arrays exist
            $titles        = $_POST['title'] ?? [];
            $firstNames    = $_POST['first-name'] ?? [];
            $middlenames   = $_POST['middle-name'] ?? [];
            $lastNames     = $_POST['last-name'] ?? [];
            $dobs          = $_POST['dob'] ?? [];

            $travellers = [];

            // Combine all traveller data into one array
            foreach ($titles as $key => $title) {
                if (empty($title) || empty($firstNames[$key] ?? '') || empty($lastNames[$key] ?? '') || empty($dobs[$key] ?? '')) {
                    echo json_encode(['status_code'=> 422, 'status' => 'error', 'message' => 'Please enter all traveller details.']);
                    exit;
                }

                $travellers[] = [
                    'title'        => htmlspecialchars(trim($title)),
                    'first_name'   => htmlspecialchars(trim($firstNames[$key])),
                    'middle_name'  => htmlspecialchars(trim($middlenames[$key])),
                    'last_name'    => htmlspecialchars(trim($lastNames[$key])),
                    'dob'          => htmlspecialchars(trim($dobs[$key])),
                ];
            }

            foreach ($travellers as $traveller) {
                $saveTravellers = "INSERT INTO `travellers_details`(`order_id`, `title`, `fname`, `mname`, `lname`, `date_of_birth`, `created_at`) 
                VALUES ('$lastID', '$traveller[title]', '$traveller[first_name]', '$traveller[middle_name]', '$traveller[last_name]', '$traveller[dob]', NOW())";

                if ($con->query($saveTravellers) === true) {
                    echo json_encode(['status_code'=> 200, 'status' => 'success', 'message' => 'Travellers details saved successfully.', 'orderID' => $orderID]);
                }
                else{
                    echo json_encode(['status_code'=> 500, 'status' => 'error', 'message' => 'Failed to save travellers details.']);
                }
            }
        }
        else{
            echo json_encode(['status_code'=> 500, 'status' => 'error', 'message' => 'Failed to save billing details.']);
        }

    }
    catch(Exception $e){
        echo json_encode(['status_code'=> 500, "status" => "error", "message" => $e->getMessage()]);
    }
}
else{
    echo json_encode(['status_code'=> 500, "status" => "error", "message" => "Invalid action"]);
}
?>
