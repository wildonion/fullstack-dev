<?php
include '../assets/dbpdo.php';
	
	function resetid(){
	global $db;
	$db->exec("DELETE FROM tempemailforlyrics");
	}
	function isid(){
		global $db;
		$stmt2 = $db->prepare("SELECT * FROM tempemailforlyrics");
		$stmt2->execute();
		if($stmt2->rowCount() > 0){
			resetid();
		   }
		}
	isid();
	$stmt3 = $db->prepare("INSERT INTO tempemailforlyrics(tempemail) VALUES(:email)");
	$stmt3->bindparam(":email",$row['email']);
	$stmt3->execute();


?>