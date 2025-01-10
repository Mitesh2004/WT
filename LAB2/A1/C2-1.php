<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['cust_name'] = $_POST['cust_name'];
    $_SESSION['cust_addr'] = $_POST['cust_addr'];
    $_SESSION['cust_mob'] = $_POST['cust_mob'];

    header("Location: C2-2.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Information</title>
</head>
<body>
    <h2>Enter Customer Information</h2>
    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="cust_name" required><br><br>

        <label>Address:</label>
        <input type="text" name="cust_addr" required><br><br>

        <label>Mobile Number:</label>
        <input type="text" name="cust_mob" pattern="\d{10}" required><br><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>
