<?php
$dom=new DOMDocument();
$dom->load("movie.xml");
echo "<h2>Title Of Movie</h2>";
$movietitle=$dom->getElementsByTagName("MovieTitle");
$actorname=$dom->getElementsByTagName("ActorName");
foreach($movietitle as $mt)
{
	echo "<b>$mt->textContent<b><br><br>";
}
echo "<h2>Movie Actor Name's</h2>";
foreach($actorname as $an)
{
	echo "<b>$an->textContent<b><br><br>";
}
?>
