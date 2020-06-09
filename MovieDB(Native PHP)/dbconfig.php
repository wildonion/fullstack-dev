<?php
$servername = "127.0.0.1"; //127.0.0.1 for localhost
$username = "root";
$password = "Qwe%$[rty]*@;123";
$dbname = "movie";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# ----------------------------------------------------------
# sql to delete database
/*
$sql = "DROP DATABASE IF EXISTS movie";
if ($conn->query($sql) === TRUE){
    echo "Database deleted successfully<br/>";
} else{
    echo "Error deleting database: " . $conn->error;
}
# sql to create database
$sql = "CREATE DATABASE movie";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br/>";
} else {
    echo "Error creating database: " . $conn->error;
}
*/
# ----------------------------------------------------------
# sql to delete table
/*
$sql = "DROP TABLE IF EXISTS movies";
if ($conn->query($sql) === TRUE){
    echo "Table movies deleted successfully<br/>";
} else {
    echo "Error deleting table: ". $conn->error;
}
# sql to creating table
/*
$sql = "CREATE TABLE movies (
movie_id INT(10) PRIMARY KEY AUTO_INCREMENT,
movie_name VARCHAR(100) NOT NULL,
movie_keyword VARCHAR(100) NOT NULL,
movie_description TEXT NOT NULL,
movie_img  TEXT NOT NULL,
movie_director VARCHAR(100) NOT NULL,
movie_actors TEXT NOT NULL,
movie_genre VARCHAR(100) NOT NULL,
movie_year VARCHAR(100) NOT NULL,
movie_rating VARCHAR(100) NOT NULL,
movie_lang VARCHAR(100) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table movies created successfully<br/>";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
# ----------------------------------------------------------
# sql to delete table
/*
$sql = "DROP TABLE IF EXISTS comments";
if ($conn->query($sql) === TRUE){
    echo "Table comments deleted successfully<br/>";
} else {
    echo "Error deleting table: ". $conn->error;
}
# sql to creating table
$sql = "CREATE TABLE comments (
c_id INT(10),
c_name VARCHAR(255) NOT NULL,
c_email VARCHAR(100) NOT NULL,
c_message TEXT NOT NULL,
c_date timestamp NOT NULL default CURRENT_TIMESTAMP,
c_status INT(11) NOT NULL DEFAULT 0,
uid INT(11) PRIMARY KEY AUTO_INCREMENT,
havenewitem VARCHAR(100) DEFAULT 'new' 
)";

if ($conn->query($sql) === TRUE) {
    echo "Table comments created successfully<br/>";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
# ----------------------------------------------------------
# sql to delete table
/*
$sql = "DROP TABLE IF EXISTS tempid";
if ($conn->query($sql) === TRUE){
    echo "Table tempid deleted successfully<br/>";
} else {
    echo "Error deleting table: ". $conn->error;
}
# sql to creating table
$sql = "CREATE TABLE tempid (
ID INT(11) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table tempid created successfully<br/>";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
# ----------------------------------------------------------
# sql to delete table
/*
$sql = "DROP TABLE IF EXISTS psetting";
if ($conn->query($sql) === TRUE){
    echo "Table psetting deleted successfully<br/>";
} else {
    echo "Error deleting table: ". $conn->error;
}
# sql to creating table
$sql = "CREATE TABLE psetting (
p_footer VARCHAR(100) NOT NULL,
p_title VARCHAR(100) NOT NULL,
p_footercol TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table psetting created successfully<br/>";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
# ----------------------------------------------------------
# sql to delete table
/*
$sql = "DROP TABLE IF EXISTS aodsite";
if ($conn->query($sql) === TRUE){
    echo "Table aodsite deleted successfully<br/>";
} else {
    echo "Error deleting table: ". $conn->error;
}
# sql to creating table
$sql = "CREATE TABLE aodsite (
stext VARCHAR(100) NOT NULL,
simg TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table aodsite created successfully<br/>";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
?>