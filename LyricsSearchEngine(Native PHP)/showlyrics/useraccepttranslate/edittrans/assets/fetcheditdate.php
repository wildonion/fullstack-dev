<?php
$edittime = $db->prepare("SELECT edit_date, edited_by FROM edditedby WHERE name_of_music_that_edited_by_user=:mname");
$edittime->execute(array(':mname'=>$transly['name_of_music_that_translated_by_user']));
$edittimerow = $edittime->fetch(PDO::FETCH_ASSOC);
?>