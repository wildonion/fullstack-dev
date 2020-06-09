<?php

include 'dbpdologin.php';

$t=$_POST['text'];

$stmt = $db->prepare("SELECT * FROM tempuseremail");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$email = $row['email'];
//--------------------------------------
$stmt1 = $db->prepare("SELECT user_name FROM useraccepttranslate WHERE email=:user_email");
$stmt1->execute(array(':user_email'=>$email));
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$username = $row1['user_name'];
//--------------------------------------
$stmt2 = $db->prepare("INSERT INTO msgforadmin(name, email, message) VALUES (:name, :email, :msg)");
$stmt2->bindParam(':name', $username);
$stmt2->bindParam(':email', $email);
$stmt2->bindParam(':msg', $t);
$stmt2->execute();

//--------------------------------------
	
?>