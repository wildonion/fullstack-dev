<?php

include 'dbpdologin.php';
$stmt9 = $db->prepare("SELECT * FROM templyricsidforedit");
$stmt9->execute();
$rowid = $stmt9->fetch(PDO::FETCH_ASSOC);
$edit_id = $rowid['tempidedit'];

$lyricstxt = $db->prepare("SELECT lyrics FROM lyrics WHERE l_id=:id");
$lyricstxt->execute(array(':id'=>$edit_id));
$lyricstxt = $lyricstxt->fetch(PDO::FETCH_ASSOC);

?>