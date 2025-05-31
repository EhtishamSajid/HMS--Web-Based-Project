<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php'; // Use 'require_once' to avoid multiple inclusions
session_start();

// Check if sanitize_input is already defined before declaring it
if (!function_exists('sanitize_input')) {
    function sanitize_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = sanitize_input($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = sanitize_input($_POST['role'] ?? '');

    if (empty($username) || empty($password) || empty($role)) {
        $_SESSION['login_error'] = "All fields are required.";
        header("Location: login.php");
        exit;
    }

    // Check credentials in the database
    $sql = "SELECT id, username, password, role, full_name FROM staff WHERE username = ? AND role = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Database error: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $staff = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $staff['password'])) {
            // Set session variables
            $_SESSION['staff_id'] = $staff['id'];
            $_SESSION['staff_name'] = $staff['full_name'];
            $_SESSION['staff_username'] = $staff['username'];
            $_SESSION['staff_role'] = $staff['role'];
            $_SESSION['staff_logged_in'] = true;

            // Redirect based on role
            switch ($role) {
                case 'admin':
                    header("Location: dashboard.php");
                    break;
                case 'manager':
                    header("Location: manager/dashboard.html");
                    break;
                case 'receptionist':
                    header("Location: receptionist/dashboard.html");
                    break;
                case 'housekeeper':
                    header("Location: housekeeper/dashboard.html");
                    break;
                default:
                    $_SESSION['login_error'] = "Invalid role.";
                    header("Location: login.php");
            }
            exit;
        } else {
            $_SESSION['login_error'] = "Invalid username or password.";
        }
    } else {
        $_SESSION['login_error'] = "Invalid username or password.";
    }

    $stmt->close();
    header("Location: login.php");
    exit;
} else {
    // Redirect if not a POST request
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Only POST requests are allowed.";
    exit;
}
