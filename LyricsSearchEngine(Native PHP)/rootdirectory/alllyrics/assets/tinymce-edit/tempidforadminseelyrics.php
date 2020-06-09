<?php
include 'dbpdologin.php';
if(isset($_GET['see_id'])){
	$see_id = $_GET['see_id'];
function resetid(){
	global $db;
	$db->exec("DELETE FROM tempidforadminseelyrics");
	}
function isid(){
		global $db;
		$stmt9 = $db->prepare("SELECT * FROM tempidforadminseelyrics");
		$stmt9->execute();
		if($stmt9->rowCount() > 0){
			resetid();
		   }
		}
	isid();
	$stmt10 = $db->prepare("INSERT INTO tempidforadminseelyrics(tempid) VALUES(:id)");
	$stmt10->bindparam(":id",$see_id);
	$stmt10->execute();
}
?>