<?php
include 'dbpdologin.php';
if(isset($_GET['edit_id'])){
	$edit_id = $_GET['edit_id'];
function resetid(){
	global $db;
	$db->exec("DELETE FROM templyricsidforedit");
	}
function isid(){
		global $db;
		$stmt9 = $db->prepare("SELECT * FROM templyricsidforedit");
		$stmt9->execute();
		if($stmt9->rowCount() > 0){
			resetid();
		   }
		}
	isid();
	$stmt10 = $db->prepare("INSERT INTO templyricsidforedit(tempidedit) VALUES(:id)");
	$stmt10->bindparam(":id",$edit_id);
	$stmt10->execute();
}
?>