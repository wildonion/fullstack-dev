<?php

// fetch lyrics 
include_once("../../../../dbconfig/dbpdologin.php");
$stmt1 = $db->prepare("SELECT * FROM tempnameofmusic");
$stmt1->execute();
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

$stmt2 = $db->prepare("SELECT lyrics FROM lyrics WHERE name_of_music=:mname");
$stmt2->execute(array(':mname'=>$row1['tempname']));
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

if($row2['lyrics'] != 'empty'){
	echo $row2['lyrics'];
}

?>