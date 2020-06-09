<?php
if(isset($_GET['rep_id'])){
	$ms_id = $_GET['rep_id'];
	include 'dbpdologin.php';
	$stmt1 = $db->prepare("SELECT message FROM msgfromadmin WHERE m_id=:mid");
	$stmt1->execute(array('mid'=>$ms_id));
	$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	
}

?>