<?php
session_start();

if (!isset($_SESSION['cust_name'])) {
    header("Location: customer_info.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['prod_name'] = $_POST['prod_name'];
    $_SESSION['qty'] = $_POST['qty'];
    $_SESSION['rate'] = $_POST['rate'];

    header("Location: C2-3.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Information</title>
</head>
<body>
    <h2>Enter Product Information</h2>
    <form method="post" action="">
        <label>Product Name:</label>
        <input type="text" name="prod_name" required><br><br>

        <label>Quantity:</label>
        <input type="number" name="qty" min="1" required><br><br>

        <label>Rate:</label>
        <input type="number" name="rate" step="0.01" min="0" required><br><br>

        <input type="submit" value="Generate Bill">
    </form>
</body>
</html>
