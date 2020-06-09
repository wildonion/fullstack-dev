<?php
include 'dbpdologin.php';
if(isset($_GET['see_id'])){
	$see_id = $_GET['see_id'];
function resetid(){
	global $db;
	$db->exec("DELETE FROM tempidforadminseeeditedlyrics");
	}
function isid(){
		global $db;
		$stmt9 = $db->prepare("SELECT * FROM tempidforadminseeeditedlyrics");
		$stmt9->execute();
		if($stmt9->rowCount() > 0){
			resetid();
		   }
		}
	isid();
	$stmt10 = $db->prepare("INSERT INTO tempidforadminseeeditedlyrics(tempid) VALUES(:id)");
	$stmt10->bindparam(":id",$see_id);
	$stmt10->execute();
}
?>