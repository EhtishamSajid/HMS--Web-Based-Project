<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database configuration
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input data
    $full_name = sanitize_input($_POST['fullName'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $phone = sanitize_input($_POST['phone'] ?? '');
    $check_in = sanitize_input($_POST['checkIn'] ?? '');
    $check_out = sanitize_input($_POST['checkOut'] ?? '');
    $adults = sanitize_input($_POST['adults'] ?? '0');
    $children = sanitize_input($_POST['children'] ?? '0');
    $room_type = sanitize_input($_POST['roomType'] ?? '');
    $special_requests = sanitize_input($_POST['specialRequests'] ?? '');
    $payment_method = sanitize_input($_POST['paymentMethod'] ?? '');

    // Debugging: Output sanitized input data (remove in production)
    // var_dump($full_name, $email, $phone, $check_in, $check_out, $adults, $children, $room_type, $special_requests, $payment_method);

    // Validate input data
    if (empty($full_name) || empty($email) || empty($phone) || empty($check_in) || empty($check_out) || empty($room_type)) {
        header("Location: ../booking.html?error=invalid_input");
        exit();
    }

    // Generate booking ID
    $booking_id = uniqid('BKG-');

    // Calculate total price using the function from config.php
    try {
        $total_price = calculate_total_price($room_type, $check_in, $check_out);
    } catch (Exception $e) {
        // Handle errors in price calculation
        error_log("Error calculating total price: " . $e->getMessage());
        header("Location: ../booking.html?error=price_error");
        exit();
    }

    // Get the current date and time
    $booking_date = date('Y-m-d H:i:s');

    // Set the initial booking status
    $status = 'pending';

    // Prepare SQL query to insert booking data
    $sql = "INSERT INTO bookings (booking_id, full_name, email, phone, check_in, check_out, adults, children, room_type, special_requests, payment_method, total_price, booking_date, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters to the prepared statement
        $stmt->bind_param(
            "sssssssssssdss",
            $booking_id,
            $full_name,
            $email,
            $phone,
            $check_in,
            $check_out,
            $adults,
            $children,
            $room_type,
            $special_requests,
            $payment_method,
            $total_price,
            $booking_date,
            $status
        );

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to booking confirmation page
            header("Location: ../booking-confirmation.html?success=true");
            exit();
        } else {
            // Log and redirect on database error
            error_log("Database error: " . $stmt->error);
            header("Location: ../booking.html?error=database");
            exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        // Log SQL preparation error
        error_log("SQL preparation error: " . $conn->error);
        header("Location: ../booking.html?error=sql_error");
        exit();
    }
} else {
    // Handle invalid request method
    header("Location: ../booking.html?error=invalid_request");
    exit();
}

// Close the database connection
$conn->close();
?>
