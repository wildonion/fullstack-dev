<?php

$stmt_select_txt = $db->prepare('SELECT translated_lyrics FROM lyrics 
                              WHERE name_of_music =:mnametrans');
$stmt_select_txt->bindParam(':mnametrans',$transly['name_of_music_that_translated_by_user']);
$stmt_select_txt->execute();
$txtrow = $stmt_select_txt->fetch(PDO::FETCH_ASSOC);

?>