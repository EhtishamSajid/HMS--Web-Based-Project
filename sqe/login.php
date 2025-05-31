

<?php
session_start();
$error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Luxury Hotel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Luxury Hotel</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="rooms.html">Rooms</a></li>
                    <li><a href="booking.html">Book Now</a></li>
                    <li><a href="feedback.html">Feedback</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="login.php" class="active btn-login">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="page-banner">
        <div class="container">
            <h2>Login</h2>
        </div>
    </section>

    <section class="login-section">
        <div class="container">
            <?php if ($error): ?>
                <div class="error-message">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <div class="login-container">
                <div class="login-tabs">
                    <button class="tab-btn active" data-tab="guest">Guest Login</button>
                    <button class="tab-btn" data-tab="staff">Staff Login</button>
                </div>

                <div class="tab-content active" id="guest-login">
                    <h2>Guest Login</h2>
                    <form action="guest_login.php" method="POST">
                        <div class="form-group">
                            <label for="guestEmail">Email</label>
                            <input type="email" id="guestEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="guestPassword">Password</label>
                            <input type="password" id="guestPassword" name="password" required>
                        </div>
                        <div class="form-group remember-me">
                            <input type="checkbox" id="rememberMe" name="rememberMe">
                            <label for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn-primary">Login</button>
                        <div class="form-links">
                            <a href="forgot-password.html">Forgot Password?</a>
                            <a href="register.html">Register Now</a>
                        </div>
                    </form>
                </div>

                <div class="tab-content" id="staff-login">
                    <h2>Staff Login</h2>
                    <form action="staff_login.php" method="POST">
                        <div class="form-group">
                            <label for="staffUsername">Username</label>
                            <input type="text" id="staffUsername" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="staffPassword">Password</label>
                            <input type="password" id="staffPassword" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="staffRole">Role</label>
                            <select id="staffRole" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="manager">Manager</option>
                                <option value="receptionist">Reception</option>
                                <option value="housekeeper">Housekeeper</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-primary">Login</button>
                        <div class="form-links">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2025 Luxury Hotel. All rights reserved.</p>
        </div>
    </footer>

    <script src="login.js"></script>
</body>
</html>
