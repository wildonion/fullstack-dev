<?php


if(isset($_GET['trans_id'])){
	include 'dbpdo.php';
	$l_id = $_GET['trans_id'];
	
	function resetid(){
	global $db;
	$db->exec("DELETE FROM tempidlyrics");
	}
	function isid(){
		global $db;
		$stmt2 = $db->prepare("SELECT * FROM tempidlyrics");
		$stmt2->execute();
		if($stmt2->rowCount() > 0){
			resetid();
		   }
		}
	isid();
	$stmt3 = $db->prepare("INSERT INTO tempidlyrics(tempid) VALUES(:id)");
	$stmt3->bindparam(":id",$l_id);
	$stmt3->execute();

	$stmt4 = $db->prepare("SELECT lyrics FROM lyrics WHERE l_id=:id");
	$stmt4->execute(array(':id'=>$l_id));
	$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
}

?>