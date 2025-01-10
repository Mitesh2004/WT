<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: C1-1.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome!</h2>
    <p>You have successfully logged in.</p>
    
    <form method="post" action="C1-3.php">
        <input type="submit" value="Logout">
    </form>
</body>
</html
