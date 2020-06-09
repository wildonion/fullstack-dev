<?php
include("../assets/config.inc.php"); //include config file 
require('../assets/time-ago/westsworld.datetime.class.php');
require('../assets/time-ago/timeago.inc.php'); 
include_once('../assets/current_time.php');
$c_time = current_time(); 
$timeAgo = new TimeAgo();
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//throw HTTP error if page number is not valid
if(!is_numeric($page_number)){
	header('HTTP/1.1 500 Invalid page number!');
	exit();
}

//get current starting point of records
$position = (($page_number-1) * $item_per_page);
$noitem = "no";
//fetch records using page position and item per page. 
$stmt = $db->prepare("SELECT * FROM lyrics WHERE translated_lyrics=:noitem ORDER BY post_date DESC LIMIT :limited, :offset");
$stmt->bindValue(':noitem', $noitem);
$stmt->bindValue(':limited', $position, PDO::PARAM_INT);
$stmt->bindValue(':offset', $item_per_page, PDO::PARAM_INT);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //fetch values
	$c_time = current_time(); 
	
		echo '<li>'.$row['name_of_music']. ' - '. $row['name_of_singer'].', Posted  
	      ' .$timeAgo->inWords($row['post_date'], $c_time);
		echo "<div style='margin-bottom: 10px; margin-top: 10px;'><a href='../tinymce-lyrics/index?trans_id=".$row['l_id']."'>Translate</a></div>";
	    echo '<strong>'.$row['lyrics'].'</strong></li>';
	   
	}

?>

