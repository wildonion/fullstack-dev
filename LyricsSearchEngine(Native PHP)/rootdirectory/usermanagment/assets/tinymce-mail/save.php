<?php

include("mailfunc.php");
include '../../../../dbconfig/dbpdologin.php';

$subject = "Lyrics Fruit";
$t=$_POST['text'];

$stmt = $db->prepare("SELECT * FROM tempid");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $row['user_id'];

$stmt1 = $db->prepare("SELECT email FROM useraccepttranslate WHERE u_id=:id");
$stmt1->execute(array(':id'=>$id));
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$user_email = $row1['email'];

// sending e_mail function
send_mail($user_email,$t,$subject);
//--------------------------------------
	
?>