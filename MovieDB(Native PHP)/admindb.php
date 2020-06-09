<?php
$servername = "127.0.0.1"; //127.0.0.1 for localhost
$username = "root";
$password = "Qwe%$[rty]*@;123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=movie", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create database
    /*$sql = "CREATE DATABASE name_of_database";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }*/

    // sql to create table
    /*$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username TEXT NOT NULL,
    password TEXT NOT NULL,
    psalt TEXT NOT NULL,
    reg_date TIMESTAMP
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table admin created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }*/

?>