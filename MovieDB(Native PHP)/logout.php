<?php
session_start();
session_destroy();
header("Location: search.php");
exit();
?>