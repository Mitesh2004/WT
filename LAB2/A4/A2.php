<?php
if (isset($_GET['n'])) {
    $nm = $_GET['n'];
    $nm_arr = array("Amresh", "Shubham", "Mitesh");

    if ($nm == "") {
        echo "Stranger, please tell me your name";
    } else {
        foreach ($nm_arr as $n) {
            if ($n == $nm) {
                echo "Welcome " . $n;
                exit();
            }
        }
        echo "$nm, I don't know you";
    }
    exit(); 
}
?>

<html>
<head>
    <title>Name Check</title>
    <script>
        function Display() {
            var x = new XMLHttpRequest();
            var n = document.getElementById("n").value;
            x.open("GET", "A2.php?n=" + n, true);
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
        <h3>Enter Your Name</h3>
        <input type="text" id="n" name="n" onfocus="Display()" onkeyup="Display()">
        <br>
        <h1 id="i"></h1>
    </center>
</body>
</html>

