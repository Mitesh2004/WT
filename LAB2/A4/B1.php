<?php
if (isset($_GET['n'])) {
    $tname = $_GET['n'];
    
    // Connect to PostgreSQL
    $con = pg_connect("host=localhost dbname=mitesh user=postgres password=Mitesh") or die("Could not connect to server");

    // Query the Teacher table
    $q = "SELECT * FROM Teacher WHERE tname = '$tname'";
    $rs = pg_query($con, $q) or die("Could not execute query");

    if (pg_num_rows($rs) > 0) {
        echo "<table border=1>";
        echo "<tr><th>Teacher Number</th><th>Teacher Name</th><th>Qualification</th><th>Salary</th></tr>";

        while ($row = pg_fetch_row($rs)) {
            echo "<tr>";
            foreach ($row as $r) {
                echo "<td>$r</td>";
            }
            echo "</tr>"; 
        }
        echo "</table>";
    } else {
        echo "No such teacher found";
    }

    pg_close($con);
    exit();}
?>

<html>
<head>
    <title>Teacher Search</title>
    <script>
        function Display() {
            var x = new XMLHttpRequest();
            var n = document.getElementById("n").value;
            x.open("GET", "B1.php?n=" + n, true);
            x.onreadystatechange = function() {
                if (x.readyState == 4 && x.status == 200) {
                    document.getElementById("i").innerHTML = x.responseText;
                }
            };
            x.send();
        }
    </script>
</head>
<body>
    <center>
        <h3>Search Teacher</h3>
        <label for="n">Teacher Name:</label>
        <input type="text" name="n" id="n">
        <br><br>
        <button onclick="Display()">Display</button>
        <br><br>
        <div id="i"></div>
    </center>
</body>
</html>

