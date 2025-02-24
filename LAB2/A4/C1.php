<?php
if (isset($_GET['q'])) {
    $suggestions = ["Rohit", "Virat", "Dhoni", "Ashwin", "Harbhajan", "Sachin", "Rahul", "Jadeja", "Pant", "Bumrah"];
    
    $query = strtolower($_GET['q']);
    $response = "";

    if ($query !== "") {
        foreach ($suggestions as $name) {
            if (stripos($name, $query) !== false) {
                $response .= "<div class='suggestion-item' onclick='selectSuggestion(\"$name\")'>$name</div>";
            }
        }
    }

    echo $response === "" ? "<div>No suggestions</div>" : $response;
    exit();}
?>

<html>
<head>
    <title>Live Search Suggestions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        #suggestions {
            border: 1px solid #ccc;
            width: 200px;
            margin: 0 auto;
            text-align: left;
            display: none; /* Hide by default */
            background-color: white;
            position: absolute;
            z-index: 1000;
        }
        .suggestion-item {
            padding: 5px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
    </style>
    <script>
        function showSuggestions(str) {
            if (str.length === 0) {
                document.getElementById("suggestions").innerHTML = "";
                document.getElementById("suggestions").style.display = "none";
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("suggestions").innerHTML = xhr.responseText;
                    document.getElementById("suggestions").style.display = "block";
                }
            };
            xhr.open("GET", "C1.php?q=" + str, true);
            xhr.send();
        }

        function selectSuggestion(value) {
            document.getElementById("searchBox").value = value;
            document.getElementById("suggestions").style.display = "none";
        }
    </script>
</head>
<body>

    <h2>Live Search Suggestions</h2>
    <input type="text" id="searchBox" onkeyup="showSuggestions(this.value)" placeholder="Type a name..." autocomplete="off" />
    <div id="suggestions"></div>

</body>
</html>

