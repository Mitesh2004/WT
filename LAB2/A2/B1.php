<?php
$xml = simplexml_load_file("book.xml") or die("Error: Cannot load XML file");
foreach ($xml->book as $book) 
{
    echo "<b>Book Details:</b><br>";
    echo "Book No: " . $book->bookno . "<br>";
    echo "Title: " . $book->bookname . "<br>";
    echo "Author: " . $book->authorname . "<br>";
    echo "Price: $" . $book->price . "<br>";
    echo "Year: " . $book->year . "<br><br>";
}
?>
