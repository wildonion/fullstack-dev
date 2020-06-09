<?php

if (isset($_GET['sendem_id'])){
include '../../../../dbconfig/dbpdologin.php';
function resetid(){
	global $db;
	$db->exec("DELETE FROM tempid");
}
function isid(){
	global $db;
	$stmt = $db->prepare("SELECT * FROM tempid");
	$stmt->execute();
	if($stmt->rowCount() > 0){
		resetid();
	   }
	}
isid();
$stmt = $db->prepare("INSERT INTO tempid(user_id) VALUES(:id)");
$stmt->bindparam(":id",$_GET['sendem_id']);
$stmt->execute();
}

?>