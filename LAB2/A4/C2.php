<?php
header("Content-Type: text/html");

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $xml = simplexml_load_file("C2.xml") or die("Error loading XML file!");

    $found = false;
    foreach ($xml->book as $book) {
        if (strcasecmp($book->title, $title) == 0) {
            echo "<strong>Title:</strong> " . $book->title . "<br>";
            echo "<strong>Author:</strong> " . $book->author . "<br>";
            echo "<strong>Year:</strong> " . $book->year . "<br>";
            echo "<strong>Price:</strong> $" . $book->price . "<br>";
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "Book not found!";
    }
    exit;
}
?>

<html>
<head>
    <title>Book Details AJAX</title>
    <script>
        function showBookDetails(bookName) {
            if (bookName === "") {
                document.getElementById("details").innerHTML = "Please select a book!";
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("details").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "C2.php?title=" + bookName, true);
            xhr.send();
        }
    </script>
</head>
<body>

    <h2>Select a Book to Get Details</h2>
    <select onchange="showBookDetails(this.value)">
        <option value="">--Select a Book--</option>
        <option value="Harry Potter">Harry Potter</option>
        <option value="The Hobbit">The Hobbit</option>
        <option value="1984">1984</option>
        <option value="To Kill a Mockingbird">To Kill a Mockingbird</option>
    </select>

    <h3>Book Details:</h3>
    <div id="details">Please select a book.</div>

</body>
</html>

