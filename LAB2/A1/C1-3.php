<?php
session_start();
session_unset();
session_destroy();

header("Location: C1-1.php");
exit();
?>
