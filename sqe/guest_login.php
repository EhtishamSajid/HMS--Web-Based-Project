<?php
require_once 'config.php';
session_start();

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT id, full_name, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['logged_in'] = true;

            if (isset($_POST['rememberMe']) && $_POST['rememberMe'] === 'on') {
                $token = bin2hex(random_bytes(32));
                $expires = time() + (86400 * 30);

                $sql = "INSERT INTO remember_tokens (user_id, token, expires) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iss", $user['id'], $token, date('Y-m-d H:i:s', $expires));
                $stmt->execute();

                setcookie('remember_token', $token, $expires, '/');
            }

            header("Location: dashboard.html");
            exit;
        }
    }

    $_SESSION['login_error'] = "Invalid email or password.";
    header("Location: login.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
