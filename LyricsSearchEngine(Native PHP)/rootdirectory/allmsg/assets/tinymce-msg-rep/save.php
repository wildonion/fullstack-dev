<?php

	
include 'dbpdologin.php';

$t=$_POST['text'];
$new_item = "new";

$stmt4 = $db->prepare("SELECT * FROM tempidformsg");
$stmt4->execute();
$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
$tempid = $row4['tempidmsg'];
//--------------------------------------
$stmt3 = $db->prepare("SELECT * FROM tempusermsg");
$stmt3->execute();
$row2 = $stmt3->fetch(PDO::FETCH_ASSOC);
$tempmsg = $row2['tempmsg'];
//--------------------------------------
$stmt2 = $db->prepare("INSERT INTO msgfromadmin(user_id, message, havenewitem, replymsgfromadmin) VALUES (:tmpid, :msg, :new, :repmsg)");
$stmt2->bindParam(':tmpid', $tempid);
$stmt2->bindParam(':msg', $t);
$stmt2->bindParam(':repmsg', $tempmsg);
$stmt2->bindParam(':new', $new_item);
$stmt2->execute();

//--------------------------------------
	








?>