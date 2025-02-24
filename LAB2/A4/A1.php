<?php
// If the request is made via AJAX, return the table
if (isset($_GET['ajax'])) {
    if (file_exists("Contact.dat")) {
        $fp = fopen("Contact.dat", "r");
        echo "<table border=1>";
        echo "<tr><th>Sr.No.</th><th>Name</th><th>Residence No.</th><th>Mob. No.</th><th>Address</th></tr>";
        while ($row = fscanf($fp, "%s %s %s %s %s")) {
            echo "<tr>";
            foreach ($row as $r) {
                echo "<td>".$r."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        fclose($fp);
    } else {
        echo "File not found!";
    }
    exit; // Stop further execution for AJAX requests
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Contact.dat</title>
    <script>
        function loadData() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "A1.php?ajax=1", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("output").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <center>
        <h3>Display The Contents of Contact.dat File</h3>
        <br>
        <input type="button" value="Display" onclick="loadData()">
        <br>
        <span id="output"></span>
    </center>
</body>
</html>

