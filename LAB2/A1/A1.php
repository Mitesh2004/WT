<?php

session_start();

if (!isset($_SESSION['vc'])) {
    $_SESSION['vc'] = 1;
} else {
    $_SESSION['vc']++;
}


if (!isset($_COOKIE['vc'])) {
    $cookie_count = 1;
    setcookie('vc', $cookie_count, time() + (86400 * 30), "/");
} else {
    $cookie_count = $_COOKIE['vc'] + 1;
    setcookie('vc', $cookie_count, time() + (86400 * 30), "/");
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Access Counter</title>
</head>
<body>
    <h1>Web Page Access Counter</h1>
    <p><strong>Session-based Count:</strong> You have visited this page <?= $_SESSION['vc']; ?> times during this session.</p>
    <p><strong>Cookie-based Count:</strong> You have visited this page <?= isset($_COOKIE['vc']) ? $_COOKIE['vc'] : 1; ?> times overall.</p>
</body>
</html>

