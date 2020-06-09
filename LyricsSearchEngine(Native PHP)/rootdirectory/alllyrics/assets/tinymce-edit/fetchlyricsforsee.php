<?php
include 'dbpdologin.php';
$stmt11 = $db->prepare("SELECT * FROM tempidforadminseelyrics");
$stmt11->execute();
$row11 = $stmt11->fetch(PDO::FETCH_ASSOC);
$id = $row11['tempid'];

$stmt20 = $db->prepare("SELECT lyrics FROM lyrics WHERE l_id=:id");
$stmt20->execute(array(':id'=>$id));
$row20 = $stmt20->fetch(PDO::FETCH_ASSOC);
$lyrics = $row20['lyrics'];
if($lyrics != ''){
  echo $lyrics;
}

?>