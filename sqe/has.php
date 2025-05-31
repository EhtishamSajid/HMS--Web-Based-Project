<?php
// Replace 'your_password' with the actual password
$password = 'abc123';

// Generate the hashed password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Output the hashed password
echo $hashedPassword;
?>