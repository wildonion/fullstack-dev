<?php 
 require("../dbconfig/dbpdologin.php");
    unset($_SESSION['user']);
    //setcookie('remember_me', $_SESSION['user'], time() - 3600);
    header("Location: ../loginadmin/login"); 
    die("Redirecting to: ../loginadmin/login");
?>