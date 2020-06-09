<?php

include '../../../../dbconfig/dbpdologin.php';

$t=$_POST['text'];

$stmt = $db->prepare("SELECT * FROM tempnameofmusic");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$name_of_song = $row['name_of_music'];


$stmt1 = $db->prepare("UPDATE lyrics SET lyrics=:ltext WHERE name_of_music=:musicname");
$stmt1->execute(array(':ltext'=>$t,
					  ':musicname'=>$name_of_song));
$stmt1->execute();

//--------------------------------------
	
?>