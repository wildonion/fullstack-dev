<?php
include 'dbpdologin.php';
$stmt11 = $db->prepare("SELECT * FROM templyricsidforedit");
$stmt11->execute();
$row11 = $stmt11->fetch(PDO::FETCH_ASSOC);
$id = $row11['tempidedit'];

$stmt20 = $db->prepare("SELECT translated_lyrics FROM lyrics WHERE l_id=:id");
$stmt20->execute(array(':id'=>$id));
$row20 = $stmt20->fetch(PDO::FETCH_ASSOC);
$translated_lyrics = $row20['translated_lyrics'];
if($translated_lyrics != ''){
  echo $translated_lyrics;
}

?>