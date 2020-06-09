<?php

include 'dbpdologin.php';

$t=$_POST['text'];

$stmt = $db->prepare("SELECT * FROM templyricsidforedit");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $row['tempidedit'];
//--------------------------------------
$stmt3 = $db->prepare("SELECT * FROM tempemailforeditlyrics");
$stmt3->execute();
$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
$email = $row3['tempemailedit'];
//--------------------------------------
$stmt9 = $db->prepare("SELECT name_of_music FROM lyrics WHERE l_id=:id");
$stmt9->execute(array(':id'=>$id));
$row9 = $stmt9->fetch(PDO::FETCH_ASSOC);
$music_name = $row9['name_of_music'];
//--------------------------------------
$stmt8 = $db->prepare("SELECT * FROM edditedby WHERE name_of_music_that_edited_by_user=:mname AND edited_by=:em");
$stmt8->execute(array(':mname'=>$music_name,
					  ':em'=>$email));
if($stmt8->rowCount()>0){

	$stmt10 = $db->prepare("UPDATE edditedby SET number_of_edited= number_of_edited + 1 
		                   WHERE name_of_music_that_edited_by_user=:mname AND edited_by=:em");
	$stmt10->bindParam(':em', $email);
	$stmt10->bindParam(':mname', $music_name);
	$stmt10->execute();
} else {
	$stmt7 = $db->prepare("INSERT INTO edditedby(l_id, name_of_music_that_edited_by_user, edited_by) 
							VALUES(:id, :mname, :em)");
	$stmt7->bindParam(':id', $id);
	$stmt7->bindParam(':mname', $music_name);
	$stmt7->bindParam(':em', $email);
	$stmt7->execute();

	$stmt6 = $db->prepare("UPDATE edditedby SET number_of_edited=number_of_edited + 1
	                        WHERE name_of_music_that_edited_by_user=:mname AND edited_by=:em");
	$stmt6->bindParam(':id', $id);
	$stmt6->bindParam(':em', $email);
	$stmt6->execute();

}
//--------------------------------------
$stmt2 = $db->prepare("UPDATE lyrics SET translated_lyrics=:et WHERE l_id=:id");
$stmt2->bindParam(':et', $t);
$stmt2->bindParam(':id', $id);
$stmt2->execute();	
?>