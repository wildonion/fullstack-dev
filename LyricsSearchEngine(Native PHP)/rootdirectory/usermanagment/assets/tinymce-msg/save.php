<?php

include '../../../../dbconfig/dbpdologin.php';

$t=$_POST['text'];

$stmt = $db->prepare("SELECT * FROM tempid");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$id = $row['user_id'];
$new_item = "new";

$stmt1 = $db->prepare("INSERT INTO msgfromadmin(user_id, message, havenewitem) VALUES (:id, :msg, :new)");
$stmt1->bindParam(':id', $id);
$stmt1->bindParam(':msg', $t);
$stmt1->bindParam(':new', $new_item);
$stmt1->execute();

//--------------------------------------
	
?>