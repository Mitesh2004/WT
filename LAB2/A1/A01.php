<?php

session_start();

$_SESSION['vc'] = ($_SESSION['vc'] ?? 0) + 1;

$cookie_count = ($_COOKIE['vc'] ?? 0) + 1;
setcookie('vc', $cookie_count, time() + 86400 * 30, "/"); // 30 days
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Access Counter</title>
</head>
<body>
    <h1>Page Access Counter</h1>
    <p>Session Visits: <?= $_SESSION['vc'] ?></p>
    <p>Cookie Visits: <?= $cookie_count ?></p>
</body>
</html>
