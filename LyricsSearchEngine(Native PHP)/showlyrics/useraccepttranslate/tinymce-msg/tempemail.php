<?php

include 'dbpdologin.php';
function resetid(){
	global $db;
	$db->exec("DELETE FROM tempuseremail");
}
function isid(){
	global $db;
	$stmt = $db->prepare("SELECT * FROM tempuseremail");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		resetid();
	   }
	}
isid();
$stmt = $db->prepare("INSERT INTO tempuseremail(email) VALUES(:email)");
$stmt->bindparam(":email",$row['email']);
$stmt->execute();


?>