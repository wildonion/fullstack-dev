<?php
include 'dbpdologin.php';
function resetemail(){
	global $db;
	$db->exec("DELETE FROM tempemailforeditlyrics");
	}
function isemail(){
		global $db;
		$stmt2 = $db->prepare("SELECT * FROM tempemailforeditlyrics");
		$stmt2->execute();
		if($stmt2->rowCount() > 0){
			resetemail();
		   }
		}
	isemail();
	$stmt3 = $db->prepare("INSERT INTO tempemailforeditlyrics(tempemailedit) VALUES(:email)");
	$stmt3->bindparam(":email",$row['email']);
	$stmt3->execute();

?>