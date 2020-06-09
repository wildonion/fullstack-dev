<?php

	require_once '../../dbconfig/dbpdologin.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $db->prepare('SELECT admin_pic FROM admin WHERE a_id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("../adminprof/".$imgRow['admin_pic']);
		
		// it will delete an actual record from db
		$stmt_delete = $db->prepare('DELETE FROM admin WHERE a_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: editprof");
	}

?>