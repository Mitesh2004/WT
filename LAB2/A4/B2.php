<?php
if (isset($_GET['n'])) {
    $name = $_GET['n'];

    $con = pg_connect("host=localhost dbname=mitesh user=postgres password=Mitesh") or die("Could not connect to server");

    $q = "SELECT * FROM order1 WHERE cno IN (SELECT cno FROM customer WHERE cname='$name')";
    $rs = pg_query($con, $q) or die("Could not execute query");

    if (pg_num_rows($rs) > 0) {
        echo "<table border=1>";
        echo "<tr><th>Order Number</th><th>Order Date</th><th>Shipping Address</th><th>Customer Number</th></tr>";

        while ($row = pg_fetch_row($rs)) {
            echo "<tr>";
            foreach ($row as $r) {
                echo "<td>$r</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No such customer found";
    }

    pg_close($con);
    exit(); }
?>

<html>
<head>
    <title>Customer Orders</title>
    <script>
        function display() {
            var x = new XMLHttpRequest();
            var n = document.getElementById("n").value;
            x.open("GET", "B2.php?n=" + n, true);
            x.onreadystatechange = function () {
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
        <h3>Search Customer Orders</h3>
        <label for="n">Customer Name:</label>
        <input type="text" name="n" id="n">
        <br><br>
        <button onclick="display()">Display</button>
        <br><br>
        <div id="i"></div>
    </center>
</body>
</html>

