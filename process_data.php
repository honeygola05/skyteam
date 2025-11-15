<?php

include('include/connection.php');

if (isset($_POST['action']) && $_POST['action'] == 'saveTravellerData') {
    try{
        $_SESSION['travellerAddressID'] = [];
        $_SESSION['travellerID']        = [];        
        $userID = $_SESSION['user_id'] ?? null;

        // Ensure all expected arrays exist
        $titles        = $_POST['title'] ?? [];
        $firstNames    = $_POST['first-name'] ?? [];
        $lastNames     = $_POST['last-name'] ?? [];
        $dobs          = $_POST['dob'] ?? [];
        $nationalities = $_POST['nationality'] ?? [];

        $travellers = [];

        // Combine all traveller data into one array
        foreach ($titles as $key => $title) {
            if (empty($title) || empty($firstNames[$key] ?? '') || empty($lastNames[$key] ?? '') || empty($dobs[$key] ?? '') || empty($nationalities[$key] ?? '')) {
                echo json_encode(['status_code'=> 422, 'status' => 'error', 'message' => 'Please enter all traveller details.']);
                exit;
            }

            $travellers[] = [
                'title'        => htmlspecialchars(trim($title)),
                'first_name'   => htmlspecialchars(trim($firstNames[$key])),
                'last_name'    => htmlspecialchars(trim($lastNames[$key])),
                'dob'          => htmlspecialchars(trim($dobs[$key])),
                'nationality'  => htmlspecialchars(trim($nationalities[$key])),
            ];
        }
        
        foreach ($travellers as $traveller) {
            $query = "SELECT * FROM `travellers_details` WHERE `user_id` = '$userID' AND `title` = '{$traveller['title']}' AND `first_name` = '{$traveller['first_name']}' AND `last_name` = '{$traveller['last_name']}' AND `dob` = '{$traveller['dob']}' AND `nationality` = '{$traveller['nationality']}'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) == 0) {
                $sql = "INSERT INTO `travellers_details`(`user_id`, `title`, `first_name`, `last_name`, `dob`, `nationality`, `created_at`) VALUES('$userID', '{$traveller['title']}', '{$traveller['first_name']}', '{$traveller['last_name']}', '{$traveller['dob']}', '{$traveller['nationality']}', NOW())";
                if (mysqli_query($con, $sql)) {
                    $_SESSION['travellerID'][] = mysqli_insert_id($con);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            }
            else{
                $row = mysqli_fetch_assoc($result);
                $_SESSION['travellerID'][] = $row['id'];
            }
        }

        $address = $_POST['traveller-address'] ?? '';
        $pincode = $_POST['traveller-pincode'] ?? '';
        $city    = $_POST['traveller-city'] ?? '';
        $state   = $_POST['traveller-state'] ?? '';

        $query = "SELECT * FROM `user_billing_details` WHERE `user_id` = '$userID' AND `address` = '{$address}' AND `pincode` = '{$pincode}' AND `city` = '{$city}' AND `state` = '{$state}'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO `user_billing_details`(`user_id`, `address`, `pincode`, `city`, `state`, `created_at`) VALUES('$userID', '{$address}', '{$pincode}', '{$city}', '{$state}', NOW())";
            if (mysqli_query($con, $sql)) {
                $_SESSION['travellerAddressID'][] = mysqli_insert_id($con);
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $_SESSION['travellerAddressID'][] = $row['id'];
        }

        echo json_encode(['status_code'=> 200, "status" => "success", "message" => "Data saved successfully", "travellerID" => $_SESSION['travellerID'], "travellerAddressID" => $_SESSION['travellerAddressID']]);
    }
    catch(Exception $e){
        echo json_encode(['status_code'=> 500, "status" => "error", "message" => $e->getMessage()]);
    }
}
else{
    echo json_encode(['status_code'=> 500, "status" => "error", "message" => "Invalid action"]);
}
?>
