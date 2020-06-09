<?php

function resetid(){
	global $db;
	$db->exec("DELETE FROM tempusermsg");
	}
	function isid(){
		global $db;
		$stmt2 = $db->prepare("SELECT * FROM tempusermsg");
		$stmt2->execute();
		if($stmt2->rowCount() > 0){
			resetid();
		   }
		}
	isid();
	$stmt3 = $db->prepare("INSERT INTO tempusermsg(tempmsg) VALUES(:msg)");
	$stmt3->bindparam(":msg",$row1['message']);
	$stmt3->execute();

?>