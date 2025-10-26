<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Optional: Clear any remember-me cookies here if used

// Redirect to login or homepage
header("Location: login.php");
exit;
?>