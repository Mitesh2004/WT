<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie("font_style", $_POST["font_style"], time() + 3600);
    setcookie("font_size", $_POST["font_size"], time() + 3600);
    setcookie("font_color", $_POST["font_color"], time() + 3600);
    setcookie("background_color", $_POST["background_color"], time() + 3600);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Selected Preferences</title>
</head>
<body>
    <h2>Your Selected Preferences</h2>
    <p><strong>Font Style:</strong> <?php echo $_POST["font_style"]; ?></p>
    <p><strong>Font Size:</strong> <?php echo $_POST["font_size"]; ?></p>
    <p><strong>Font Color:</strong> <?php echo $_POST["font_color"]; ?></p>
    <p><strong>Background Color:</strong> <?php echo $_POST["background_color"]; ?></p>

    <a href="A2-3.php">Apply Preferences</a>
</body>
</html>
