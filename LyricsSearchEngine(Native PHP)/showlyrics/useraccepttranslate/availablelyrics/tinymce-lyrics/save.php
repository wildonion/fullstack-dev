<?php

include 'dbpdo.php';

$t=$_POST['text'];

//--------------------------------------
$stmt4 = $db->prepare("SELECT * FROM tempidlyrics");
$stmt4->execute();
$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
$tempid = $row4['tempid'];
//--------------------------------------
$stmt7 = $db->prepare("SELECT name_of_music FROM lyrics WHERE l_id=:id");
$stmt7->execute(array(':id'=>$tempid));
$row7 = $stmt7->fetch(PDO::FETCH_ASSOC);
$name_of_song = $row7['name_of_music'];
//--------------------------------------
$stmt5 = $db->prepare("SELECT * FROM tempemailforlyrics");
$stmt5->execute();
$row5 = $stmt5->fetch(PDO::FETCH_ASSOC);
$tempemail = $row5['tempemail'];
//--------------------------------------
$stmt6 = $db->prepare("SELECT user_name FROM useraccepttranslate WHERE email=:email");
$stmt6->execute(array(':email'=>$tempemail));
$row6 = $stmt6->fetch(PDO::FETCH_ASSOC);
$username = $row6['user_name'];
//--------------------------------------
$stmt8 = $db->prepare("INSERT INTO translateby(user_name, email, name_of_music_that_translated_by_user) VALUES(:uname, :em, :mname)");
$stmt8->execute(array(':uname'=>$username, 
					  ':em'=>$tempemail,
					  ':mname'=>$name_of_song));
//--------------------------------------
$stmt2 = $db->prepare("UPDATE lyrics SET translated_lyrics=:lt, translateby=:em WHERE l_id=:id");
$stmt2->bindParam(':lt', $t);
$stmt2->bindParam(':em', $tempemail);
$stmt2->bindParam(':id', $tempid);
$stmt2->execute();

//--------------------------------------

	
?>