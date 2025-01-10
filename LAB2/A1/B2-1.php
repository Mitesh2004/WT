<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['eno'] = $_POST['eno'];
    $_SESSION['ename'] = $_POST['ename'];
    $_SESSION['address'] = $_POST['address'];

    header("Location: B2-2.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
</head>
<body>
    <h2>Enter Employee Details</h2>
    <form method="post" action="">
        <label>Employee Number:</label>
        <input type="text" name="eno" required><br><br>

        <label>Employee Name:</label>
        <input type="text" name="ename" required><br><br>

        <label>Address:</label>
        <input type="text" name="address" required><br><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>
