<?php
session_start();

// Set timeout duration in seconds (e.g., 60 seconds)
$timeout_duration = 60;

// Initialize attempts if not set
if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}

// Check if timeout has passed
if (isset($_SESSION['lock_time'])) {
    $time_elapsed = time() - $_SESSION['lock_time'];
    if ($time_elapsed >= $timeout_duration) {
        // Reset attempts after timeout
        $_SESSION['attempts'] = 0;
        unset($_SESSION['lock_time']);
    }
}

// Hardcoded valid credentials
$valid_username = "admin";
$valid_password = "12345";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SESSION['attempts'] < 3) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === $valid_username && $password === $valid_password) {
            // Successful login
            $_SESSION['attempts'] = 0;
            $_SESSION['loggedin'] = true;
            header("Location: C1-2.php");
            exit();
        } else {
            // Invalid credentials
            $_SESSION['attempts']++;

            if ($_SESSION['attempts'] >= 3) {
                $_SESSION['lock_time'] = time();  // Start lock timer
                $error = "Too many failed attempts. Please try again after $timeout_duration seconds.";
            } else {
                $remaining_attempts = 3 - $_SESSION['attempts'];
                $error = "Invalid credentials. $remaining_attempts attempt(s) left.";
            }
        }
    } else {
        $remaining_time = $timeout_duration - (time() - $_SESSION['lock_time']);
        $error = "Account locked. Try again in $remaining_time second(s).";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form with Timeout</title>
</head>
<body>
    <h2>Login</h2>

    <?php
    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }

    // Show form only if not locked
    if ($_SESSION['attempts'] < 3) {
    ?>
        <form method="post" action="">
            <label>Username:</label>
            <input type="text" name="username" required><br><br>

            <label>Password:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    <?php
    } else {
        echo "<p>Please wait and try again later.</p>";
    }
    ?>
</body>
</html>
