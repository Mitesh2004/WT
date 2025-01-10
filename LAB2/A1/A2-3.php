<!DOCTYPE html>
<html>
<head>
    <title>Customized Page</title>
    <style>
        body {
            font-family: <?php echo isset($_COOKIE["font_style"]) ? $_COOKIE["font_style"] : 'Arial'; ?>;
            font-size: <?php echo isset($_COOKIE["font_size"]) ? $_COOKIE["font_size"] : '14px'; ?>;
            color: <?php echo isset($_COOKIE["font_color"]) ? $_COOKIE["font_color"] : '#000000'; ?>;
            background-color: <?php echo isset($_COOKIE["background_color"]) ? $_COOKIE["background_color"] : '#FFFFFF'; ?>;
        }
    </style>
</head>
<body>
    <h2>Welcome to Your Customized Page!</h2>
    <p>Your preferences have been applied successfully.</p>
    <a href="A2-1.php">Change Preferences</a>
</body>
</html>
