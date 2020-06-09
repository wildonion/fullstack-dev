<?php

	require_once 'config.inc.php';
	
	if(isset($_GET['unset_id']))
	{
		
		$delid = $_GET['unset_id'];
		// it will delete an actual record from db
		
		$stmt_select = $db->prepare('SELECT name_of_music, translateby FROM lyrics WHERE l_id =:uid');
		$stmt_select->bindParam(':uid',$delid);
		$stmt_select->execute();
		$row = $stmt_select->fetch(PDO::FETCH_ASSOC);

		$stmt_delete_from_translateby_table = $db->prepare('DELETE FROM translateby 
															WHERE name_of_music_that_translated_by_user =:mnametrans
															AND email=:em');
		$stmt_delete_from_translateby_table->bindParam(':mnametrans',$row['name_of_music']);
		$stmt_delete_from_translateby_table->bindParam(':em', $row['translateby']);
		$stmt_delete_from_translateby_table->execute();

		$stmt_delete_from_editedby_table = $db->prepare('DELETE FROM edditedby 
															WHERE name_of_music_that_edited_by_user =:mnameedit
															AND edited_by=:em');
		$stmt_delete_from_editedby_table->bindParam(':mnameedit',$row['name_of_music']);
		$stmt_delete_from_translateby_table->bindParam(':em', $row['translateby']);
		$stmt_delete_from_editedby_table->execute();

		$noitem = "no";
		$nooneitem = "no one yet";
		$stmt_delete = $db->prepare('UPDATE lyrics SET translated_lyrics=:noitem, translateby=:nooneitem WHERE l_id =:uid');
		$stmt_delete->bindParam(':noitem',$noitem);
		$stmt_delete->bindParam(':nooneitem',$nooneitem);
		$stmt_delete->bindParam(':uid',$delid);
		$stmt_delete->execute();
	}

?>