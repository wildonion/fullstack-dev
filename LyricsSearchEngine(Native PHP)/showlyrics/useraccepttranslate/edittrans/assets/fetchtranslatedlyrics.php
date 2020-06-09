<?php
$transtxt = $db->prepare("SELECT l_id, translated_lyrics FROM lyrics WHERE name_of_music=:name_of_music");
$transtxt->execute(array(':name_of_music'=>$transly['name_of_music_that_translated_by_user']));
$transtxt = $transtxt->fetch(PDO::FETCH_ASSOC);
?>