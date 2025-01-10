<?php
session_start();

if (!isset($_SESSION['prod_name'])) {
    header("Location: C2-1.php");
    exit();
}

$total = $_SESSION['qty'] * $_SESSION['rate'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bill</title>
</head>
<body>
    <h2>Customer Bill</h2>

    <h3>Customer Information</h3>
    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <td><?php echo $_SESSION['cust_name']; ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $_SESSION['cust_addr']; ?></td>
        </tr>
        <tr>
            <th>Mobile Number</th>
            <td><?php echo $_SESSION['cust_mob']; ?></td>
        </tr>
    </table>

    <h3>Product Information</h3>
    <table border="1" cellpadding="10">
        <tr>
            <th>Product Name</th>
            <td><?php echo $_SESSION['prod_name']; ?></td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td><?php echo $_SESSION['qty']; ?></td>
        </tr>
        <tr>
            <th>Rate</th>
            <td><?php echo number_format($_SESSION['rate'], 2); ?></td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <td><?php echo number_format($total, 2); ?></td>
        </tr>
    </table>

    <br>
    <form method="post" action="C2-4.php">
        <input type="submit" value="New Bill">
    </form>
</body>
</html>
