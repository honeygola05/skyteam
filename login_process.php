<?php
include('include/connection.php');

header('Content-Type: application/json');

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = $_POST['password'];

$query = "SELECT id, password, first_name FROM users WHERE email='$email' LIMIT 1";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['first_name'];
        echo json_encode(["status" => "success"]);
        exit;
    }
}

echo json_encode(["status" => "error", "message" => "Invalid email or password."]);
