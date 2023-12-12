<?php
// Start the session (if not already started)
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you want
header("Location: ../pages/login.php");
exit;
?>