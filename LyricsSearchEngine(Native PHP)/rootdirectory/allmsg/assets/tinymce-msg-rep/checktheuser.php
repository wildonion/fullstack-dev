<?php
 require("../../../../dbconfig/dbpdologin.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: ../../../loginadmin/login.php");
        die("Redirecting to ../../../loginadmin/login.php"); 
    }
?>