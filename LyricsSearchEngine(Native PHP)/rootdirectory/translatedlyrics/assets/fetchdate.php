<?php

$stmt_select_date = $db->prepare('SELECT translate_date FROM translateby 
                              WHERE name_of_music_that_translated_by_user =:mnametrans');
$stmt_select_date->bindParam(':mnametrans',$ly['name_of_music']);
$stmt_select_date->execute();
$daterow = $stmt_select_date->fetch(PDO::FETCH_ASSOC);

?>