<?php

include 'dbpdologin.php';

$t=$_POST['text'];

$stmt = $db->prepare("SELECT * FROM tempidforadminseelyrics");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $row['tempid'];
//--------------------------------------
$stmt2 = $db->prepare("UPDATE lyrics SET lyrics=:et WHERE l_id=:id");
$stmt2->bindParam(':et', $t);
$stmt2->bindParam(':id', $id);
$stmt2->execute();	
?>