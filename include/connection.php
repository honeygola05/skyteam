<?php
session_start();
$host = ($_SERVER['SERVER_NAME'] == 'localhost') ? "localhost" : "localhost";
$username = ($_SERVER['SERVER_NAME'] == 'localhost') ? "root" : "u334437283_skyteam";
$password = ($_SERVER['SERVER_NAME'] == 'localhost') ? "" : "0bJ0vgC>q^";
$database = "skyteam";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

