<?php
session_start();

// Redirect if employee details are not set
if (!isset($_SESSION['eno'])) {
    header("Location: B2-1.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['basic'] = $_POST['basic'];
    $_SESSION['da'] = $_POST['da'];
    $_SESSION['hra'] = $_POST['hra'];

    header("Location: B2-3.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Earnings</title>
</head>
<body>
    <h2>Enter Employee Earnings</h2>
    <form method="post" action="">
        <label>Basic Salary:</label>
        <input type="number" name="basic" step="0.01" required><br><br>

        <label>Dearness Allowance (DA):</label>
        <input type="number" name="da" step="0.01" required><br><br>

        <label>House Rent Allowance (HRA):</label>
        <input type="number" name="hra" step="0.01" required><br><br>

        <input type="submit" value="Show Summary">
    </form>
</body>
</html>
