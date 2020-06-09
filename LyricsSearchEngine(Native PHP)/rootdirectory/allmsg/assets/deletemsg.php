<?php

	require_once '../../dbconfig/dbpdologin.php';
	
	if(isset($_GET['delete_id']))
	{
		
		$delid = $_GET['delete_id'];
		// it will delete an actual record from db
		$stmt_delete = $db->prepare('DELETE FROM msgforadmin WHERE u_id =:uid');
		$stmt_delete->bindParam(':uid',$delid);
		$stmt_delete->execute();
		

	}

?>