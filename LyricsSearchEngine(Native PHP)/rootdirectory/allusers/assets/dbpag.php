<?php
    $username = "root"; 
    $password = "Qwe%$[rty]*@;123"; 
    $host = "127.0.0.1"; 
    $dbname = "lyricssearch"; 
     
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
    $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
?>