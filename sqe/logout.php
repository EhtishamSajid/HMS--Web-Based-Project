<?php
// Include database configuration
require_once 'config.php';

// Start the session
session_start();

// Clear remember token if exists
if (isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];
    
    // Delete token from database
    $sql = "DELETE FROM remember_tokens WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    
    // Delete cookie
    setcookie('remember_token', '', time() - 3600, '/');
}

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to home page
header("Location: ../index.html");
exit();
?>