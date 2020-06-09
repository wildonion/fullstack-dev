<?php

include 'dbpdologin.php';

$t=$_POST['text'];

$stmt = $db->prepare("SELECT * FROM tempuseremail");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$email = $row['email'];
//--------------------------------------
$stmt3 = $db->prepare("SELECT * FROM tempadminmsg");
$stmt3->execute();
$row2 = $stmt3->fetch(PDO::FETCH_ASSOC);
$tempmsg = $row2['tempmsg'];
//--------------------------------------
$stmt1 = $db->prepare("SELECT user_name FROM useraccepttranslate WHERE email=:user_email");
$stmt1->execute(array(':user_email'=>$email));
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$username = $row1['user_name'];
//--------------------------------------
$stmt2 = $db->prepare("INSERT INTO msgforadmin(name, email, message, replymsgfromuser) VALUES (:name, :email, :msg, :repmsg)");
$stmt2->bindParam(':name', $username);
$stmt2->bindParam(':email', $email);
$stmt2->bindParam(':msg', $t);
$stmt2->bindParam(':repmsg', $tempmsg);
$stmt2->execute();

//--------------------------------------
	
?>