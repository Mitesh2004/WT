<?php
session_start();
session_unset();
session_destroy();

header("Location: C2-1.php");
exit();
?>
