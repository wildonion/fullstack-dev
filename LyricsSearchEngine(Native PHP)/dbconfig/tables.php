<?php
//---------------------------------------------------------------------------------------
include("db.class.php");
# sql to create tables
$pdo_obj = new pdoCRUD(); // create object of our class
/*
$createlyricsTable = 
"CREATE TABLE lyrics
(
l_id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(l_id),
name_of_music varCHAR(200) NOT NULL,
UNIQUE KEY name_of_music (name_of_music),
name_of_singer varchar(200) NOT NULL,
genre varchar(100) NOT NULL,
Album varchar(200) NOT NULL,
publish_year varchar(100) NOT NULL,
lyrics VARCHAR(900) DEFAULT 'empty',
translated_lyrics text DEFAULT NULL,
translateby varchar(200) DEFAULT 'no one yet'
)";
echo $pdo_obj->rawQuery($createlyricsTable). " rows affected, table created!\n";
//********************************************************************************
$altertable = 
"ALTER TABLE lyrics CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
echo $pdo_obj->rawQuery($altertable). " rows affected, table altered!\n";
//********************************************************************************
$eddited = 
"CREATE TABLE edditedby
(
    l_id INT DEFAULT NULL, 
    edited_by varCHAR(200) DEFAULT 'not eddited yet',
    eddited_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    e_id int(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (e_id)
)";
echo $pdo_obj->rawQuery($eddited). " rows affected, table created!\n";
//********************************************************************************
$alteredit = 
"ALTER TABLE edditedby ADD edit_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ";
echo $pdo_obj->rawQuery($alteredit). " rows affected, table altered!\n";
//********************************************************************************
$createcommentsTable = 
"CREATE TABLE IF NOT EXISTS comments 
(
  l_id INT DEFAULT NULL,
  c_name varchar(255) NOT NULL,
  c_email varchar(100) NOT NULL,
  c_message text NOT NULL,
  c_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  c_id int(11) NOT NULL AUTO_INCREMENT,
  havenewitem varchar(100) DEFAULT 'new',
  PRIMARY KEY (c_id)
)";
echo $pdo_obj->rawQuery($createcommentsTable). " rows affected, table created!\n";
//********************************************************************************
$useraccepttranslate = 
"CREATE TABLE IF NOT EXISTS useraccepttranslate
(
    u_id int(11) NOT NULL AUTO_INCREMENT,
    user_name varchar(200) NOT NULL,
    email varchar(200) NOT NULL,
    password varchar(255) NOT NULL,
    psalt text NOT NULL,
    accessing_status VARCHAR(100) DEFAULT 'unblocked',
    userStatus enum('Y','N') NOT NULL DEFAULT 'N',
    tokenCode varchar(100) NOT NULL,
    UNIQUE KEY email (email),
    reg_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (u_id)
)";
echo $pdo_obj->rawQuery($useraccepttranslate). " rows affected, table created!\n";
//********************************************************************************
$msgfromadmin = 
"CREATE TABLE IF NOT EXISTS msgfromadmin
(
    m_id int(11) NOT NULL AUTO_INCREMENT,
    user_id int(11) NOT NULL,
    reg_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    message TEXT NOT NULL,
    havenewitem VARCHAR(100) NOT NULL DEFAULT 'no',
    PRIMARY KEY (m_id)
)";
echo $pdo_obj->rawQuery($msgfromadmin). " rows affected, table created!\n";

//********************************************************************************
$msgfromadmin = 
"ALTER TABLE msgfromadmin ADD replymsgfromadmin TEXT NOT NULL";
echo $pdo_obj->rawQuery($msgfromadmin). " rows affected, table altered!\n";

//********************************************************************************
$translateby = 
"CREATE TABLE IF NOT EXISTS translateby
(
    u_id int(11) NOT NULL AUTO_INCREMENT,
    user_name varchar(200) NOT NULL,
    email varchar(200) NOT NULL,
    name_of_music_that_translated_by_user varchar(200) NOT NULL,
    translate_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (u_id)
)";
echo $pdo_obj->rawQuery($translateby). " rows affected, table created!\n";
//********************************************************************************
$admin = 
"CREATE TABLE IF NOT EXISTS admin
 (
  a_id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  password char(64) COLLATE utf8_unicode_ci NOT NULL,
  salt char(16) COLLATE utf8_unicode_ci NOT NULL,
  email varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  admin_pic TEXT NOT NULL,
  enter_added timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (a_id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email)
)";
echo $pdo_obj->rawQuery($admin). " rows affected, table created!\n";
//********************************************************************************
$msgforadmin = 
"CREATE TABLE IF NOT EXISTS msgforadmin
(
    u_id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(200) NOT NULL,
    email varchar(200) NOT NULL,
    message text NOT NULL,
    msg_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (u_id)
)";
echo $pdo_obj->rawQuery($msgforadmin). " rows affected, table created!\n";
//********************************************************************************
$msgforadmin = 
"ALTER TABLE msgforadmin ADD replymsgfromuser TEXT NOT NULL";
echo $pdo_obj->rawQuery($msgforadmin). " rows affected, table altered!\n";
//********************************************************************************
*/








//---------------------------------------------------------------------------------------


?>