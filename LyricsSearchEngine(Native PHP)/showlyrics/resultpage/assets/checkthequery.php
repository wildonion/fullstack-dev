<?php

include'../../dbconfig/dbpdologin.php';
// sanitize the user query
$search = filter_var($_POST['search'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
// detect the encoding query
$val = mb_convert_encoding($search, 'UTF-8', 'auto');
if(!$val){
	// warning 
	echo "please write english";
}else{
if(strlen($search)>=5){
$query = $db->prepare("SELECT * FROM lyrics WHERE name_of_music LIKE '%$search%' 
						OR name_of_singer LIKE '%$search%'");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
 } 
}
?>