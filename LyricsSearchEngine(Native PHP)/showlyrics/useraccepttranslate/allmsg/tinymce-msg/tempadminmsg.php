<?php

function resetid(){
	global $db;
	$db->exec("DELETE FROM tempadminmsg");
	}
	function isid(){
		global $db;
		$stmt2 = $db->prepare("SELECT * FROM tempadminmsg");
		$stmt2->execute();
		if($stmt2->rowCount() > 0){
			resetid();
		   }
		}
	isid();
	$stmt3 = $db->prepare("INSERT INTO tempadminmsg(tempmsg) VALUES(:msg)");
	$stmt3->bindparam(":msg",$row1['message']);
	$stmt3->execute();

?>