<!DOCTYPE html>
<html>
<head>
    <title>Set Preferences</title>
</head>
<body>
    <h2>Set Your Page Preferences</h2>
    <form action="A2-2.php" method="post">
        <label>Font Style:</label>
        <select name="font_style">
            <option value="Arial">Arial</option>
            <option value="Verdana">Verdana</option>
            <option value="Times New Roman">Times New Roman</option>
            <option value="Courier New">Courier New</option>
        </select><br><br>

        <label>Font Size:</label>
        <select name="font_size">
            <option value="14px">14px</option>
            <option value="16px">16px</option>
            <option value="18px">18px</option>
            <option value="20px">20px</option>
        </select><br><br>

        <label>Font Color:</label>
        <input type="color" name="font_color" value="#000000"><br><br>

        <label>Background Color:</label>
        <input type="color" name="background_color" value="#FFFFFF"><br><br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
