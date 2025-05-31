<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "hotel_management";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set
$conn->set_charset("utf8mb4");

// Session configuration
session_start();

/**
 * Function to sanitize input data
 *
 * @param string $data
 * @return string
 */
function sanitize_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    return $data;
}

/**
 * Function to check if user is logged in
 *
 * @return bool
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Function to check if staff is logged in
 *
 * @return bool
 */
function is_staff_logged_in() {
    return isset($_SESSION['staff_id']);
}

/**
 * Function to check staff role
 *
 * @param string $role
 * @return bool
 */
function has_role($role) {
    return isset($_SESSION['staff_role']) && $_SESSION['staff_role'] === $role;
}

/**
 * Function to redirect to another page
 *
 * @param string $url
 * @return void
 */
function redirect($url) {
    header("Location: $url");
    exit();
}

/**
 * Function to generate a random booking ID
 *
 * @return string
 */
function generate_booking_id() {
    return 'BK' . rand(1000, 9999);
}

/**
 * Function to calculate the total price of a booking
 *
 * @param string $room_type
 * @param string $check_in
 * @param string $check_out
 * @return float
 */
function calculate_total_price($room_type, $check_in, $check_out) {
    $room_prices = [
        'standard' => 99,
        'deluxe' => 149,
        'suite' => 249
    ];
    
    $price_per_night = $room_prices[$room_type];
    $check_in_date = new DateTime($check_in);
    $check_out_date = new DateTime($check_out);
    $nights = $check_out_date->diff($check_in_date)->days;
    
    return $price_per_night * $nights;
}

/**
 * Function to send an email
 *
 * @param string $to
 * @param string $subject
 * @param string $message
 * @return bool
 */
function send_email($to, $subject, $message) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Luxury Hotel <info@luxuryhotel.com>' . "\r\n";
    
    return mail($to, $subject, $message, $headers);
}
?>
