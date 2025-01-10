<?php
session_start();

// Redirect if details are incomplete
if (!isset($_SESSION['eno']) || !isset($_SESSION['basic'])) {
    header("Location: B2-1.php");
    exit();
}

// Calculate Total Salary
$total = $_SESSION['basic'] + $_SESSION['da'] + $_SESSION['hra'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Summary</title>
</head>
<body>
    <h2>Employee Information</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Employee Number</th>
            <td><?php echo $_SESSION['eno']; ?></td>
        </tr>
        <tr>
            <th>Employee Name</th>
            <td><?php echo $_SESSION['ename']; ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $_SESSION['address']; ?></td>
        </tr>
        <tr>
            <th>Basic Salary</th>
            <td><?php echo number_format($_SESSION['basic'], 2); ?></td>
        </tr>
        <tr>
            <th>DA</th>
            <td><?php echo number_format($_SESSION['da'], 2); ?></td>
        </tr>
        <tr>
            <th>HRA</th>
            <td><?php echo number_format($_SESSION['hra'], 2); ?></td>
        </tr>
        <tr>
            <th>Total Salary</th>
            <td><?php echo number_format($total, 2); ?></td>
        </tr>
    </table>

    <br>
    <form method="post" action="B2-4.php">
        <input type="submit" value="Restart">
    </form>
</body>
</html>
