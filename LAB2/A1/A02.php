<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie("font_style", $_POST['font_style'], time() + 86400 * 30, "/");
    setcookie("font_size", $_POST['font_size'], time() + 86400 * 30, "/");
    setcookie("font_color", $_POST['font_color'], time() + 86400 * 30, "/");
    setcookie("bg_color", $_POST['bg_color'], time() + 86400 * 30, "/");
    header("Location: " . $_SERVER['PHP_SELF']); 
}


$font_style = $_COOKIE['font_style'] ?? 'Arial';
$font_size = $_COOKIE['font_size'] ?? '16';
$font_color = $_COOKIE['font_color'] ?? '#000000';
$bg_color = $_COOKIE['bg_color'] ?? '#ffffff';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Page Preferences</title>
    <style>
        body {
            font-family: <?= htmlspecialchars($font_style) ?>;
            font-size: <?= htmlspecialchars($font_size) ?>px;
            color: <?= htmlspecialchars($font_color) ?>;
            background-color: <?= htmlspecialchars($bg_color) ?>;
        }
    </style>
</head>c
<body>
    <h1>Set Your Preferences</h1>
    <form method="post">
        <label for="font_style">Font Style:</label>
        <select name="font_style" id="font_style">
            <option value="Arial" <?= $font_style === 'Arial' ? 'selected' : '' ?>>Arial</option>
            <option value="Verdana" <?= $font_style === 'Verdana' ? 'selected' : '' ?>>Verdana</option>
            <option value="Times New Roman" <?= $font_style === 'Times New Roman' ? 'selected' : '' ?>>Times New Roman</option>
            <option value="Courier New" <?= $font_style === 'Courier New' ? 'selected' : '' ?>>Courier New</option>
        </select>
        <br><br>

        <label for="font_size">Font Size:</label>
        <input type="number" name="font_size" id="font_size" min="10" max="50" value="<?= htmlspecialchars($font_size) ?>"> px
        <br><br>

        <label for="font_color">Font Color:</label>
        <input type="color" name="font_color" id="font_color" value="<?= htmlspecialchars($font_color) ?>">
        <br><br>

        <label for="bg_color">Background Color:</label>
        <input type="color" name="bg_color" id="bg_color" value="<?= htmlspecialchars($bg_color) ?>">
        <br><br>

        <button type="submit">Save Preferences</button>
    </form>
    <hr>
    <h2>Current Preferences</h2>
    <p><strong>Font Style:</strong> <?= htmlspecialchars($font_style) ?></p>
    <p><strong>Font Size:</strong> <?= htmlspecialchars($font_size) ?> px</p>
    <p><strong>Font Color:</strong> <?= htmlspecialchars($font_color) ?></p>
    <p><strong>Background Color:</strong> <?= htmlspecialchars($bg_color) ?></p>
</body>
</html>

