<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<BookInfo>\n";

$books = array(
    array('bookno' => '1', 'bookname' => 'JAVA', 'authorname' => 'Balguru Swami', 'price' => '250', 'year' => '2006'),
    array('bookno' => '2', 'bookname' => 'C', 'authorname' => 'Denis Ritchie', 'price' => '500', 'year' => '1971')
);

foreach ($books as $b) {
    echo "<book>\n";
    foreach ($b as $tag => $data) {
        echo "<$tag>" . htmlspecialchars($data) . "</$tag>\n";
    }
    echo "</book>\n";
}

echo "</BookInfo>\n";
?>
