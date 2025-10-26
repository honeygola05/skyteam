<?php
include '../include/connection.php';

$search = mysqli_real_escape_string($con, $_POST['airport']);
$query = "SELECT * FROM airport_codes WHERE airport_name LIKE '%$search%' OR airport_code LIKE '%$search%' LIMIT 10";
$result = mysqli_query($con, $query);
$airports = array();
while ($row = mysqli_fetch_assoc($result)) {
    $airports[] = $row;
}
echo json_encode($airports);
?>