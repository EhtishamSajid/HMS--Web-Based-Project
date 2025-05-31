<?php
require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(stripslashes(trim($_POST['name'] ?? '')));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'] ?? '')));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'] ?? '')));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'] ?? '')));

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = "Please fill out all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email address.";
    } else {
        $sql = "INSERT INTO contact_requests (name, email, subject, message, submitted_at) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Database error: " . $conn->error);
        }
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        if ($stmt->execute()) {
            $success_message = "Thank you for reaching out! We will get back to you soon.";
        } else {
            $error_message = "Unable to submit your request. Please try again.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Luxury Hotel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background: #f5f5f5;
        }
        header {
            background-color: #1f3b56;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 1rem;
            background: #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }
        .form-group textarea {
            resize: none;
        }
        .btn-primary {
            display: block;
            width: 100%;
            padding: 0.8rem;
            background-color: #1f3b56;
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            text-align: center;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #162b41;
        }
        .success-message,
        .error-message {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            text-align: center;
        }
        .success-message {
            background-color: #e7f9f1;
            color: #2c6e49;
        }
        .error-message {
            background-color: #fce8e6;
            color: #d93025;
        }
        footer {
            text-align: center;
            margin-top: 2rem;
            padding: 1rem 0;
            background-color: #1f3b56;
            color: #fff;
        }
        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Luxury Hotel</h1>
    </header>

    <div class="container">
        <h2>Contact Us</h2>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>
        <?php if (!empty($success_message)): ?>
            <div class="success-message"><?= htmlspecialchars($success_message) ?></div>
        <?php endif; ?>
        <form action="contact.php" method="POST">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
            </div>
            <button type="submit" class="btn-primary">Send Message</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Luxury Hotel. All rights reserved.</p>
    </footer>
</body>
</html>
