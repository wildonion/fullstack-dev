<?php
if(isset($_GET['rep_id'])){
	$ms_id = $_GET['rep_id'];
	include 'dbpdologin.php';
	$stmt1 = $db->prepare("SELECT message FROM msgforadmin WHERE u_id=:mid");
	$stmt1->execute(array(':mid'=>$ms_id));
	$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

	$stmt5 = $db->prepare("SELECT email FROM msgforadmin WHERE message=:msg");
	$stmt5->execute(array(':msg'=>$row1['message']));
	$row5 = $stmt5->fetch(PDO::FETCH_ASSOC);

	$stmt6 = $db->prepare("SELECT u_id FROM useraccepttranslate WHERE email=:user_mail");
	$stmt6->execute(array(':user_mail'=>$row5['email']));
	$row6 = $stmt6->fetch(PDO::FETCH_ASSOC);

	function resettmpid(){
		global $db;
		$db->exec("DELETE FROM tempidformsg");
	}
	function istmpid(){
		global $db;
		$stmt2 = $db->prepare("SELECT * FROM tempidformsg");
		$stmt2->execute();
		if($stmt2->rowCount() > 0){
			resettmpid();
		   }
		}
	istmpid();
	$stmt3 = $db->prepare("INSERT INTO tempidformsg(tempidmsg) VALUES(:tmpid)");
	$stmt3->bindparam(":tmpid",$row6['u_id']);
	$stmt3->execute();
	
}

?>