<?php
//include db configuration file
// include_once("config.php");
include_once("../../dbconfig/dbpdologin.php");
session_start();

if(isset($_POST["mname"]) && strlen($_POST["mname"])>0 && 
   isset($_POST["sname"]) && strlen($_POST["sname"])>0 &&
   isset($_POST["genre"]) && strlen($_POST["genre"])>0 &&
   isset($_POST["album"]) && strlen($_POST["album"])>0 &&
   isset($_POST["publishyear"]) && strlen($_POST["publishyear"])>0 &&
   isset($_POST["artist"]) && strlen($_POST["artist"])>0) 
{	

	//sanitize post value, PHP filter FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH Strip tags, encode special characters.
	$mname = filter_var($_POST["mname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$sname = filter_var($_POST["sname"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$genre = filter_var($_POST["genre"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$album = filter_var($_POST["album"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$publishyear = filter_var($_POST["publishyear"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
	$artist = filter_var($_POST["artist"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 

	function create_table(){
		global $db;
		$sql = "CREATE TABLE IF NOT EXISTS tempnameofmusic(name_of_music VARCHAR(500))";
		$db->exec($sql);
		
	}
   
   function drop_table(){
   	 	global $db;
   	 	$sql = "DROP TABLE IF EXISTS tempnameofmusic";
   	 	$db->exec($sql);
   	 	create_table();
   }

	function insert_into(){
	    global $db;
	    $stmt1 = $db->prepare("INSERT INTO tempnameofmusic(name_of_music) VALUES(:mname)");
	    $stmt1->execute(array(':mname'=>$_POST['mname']));
	    
	  }
	  
	drop_table();
	insert_into();


	// Insert sanitize string in record
	$stmt = $db->prepare("INSERT INTO lyrics(name_of_music, artist, name_of_singer, genre, Album, publish_year) 
		                           VALUES(:mname, :artist, :sname, :genre, :album, :publishyear )");
	$stmt->execute(array(':mname'=>$mname,
						 ':artist'=>$artist,
						 ':sname'=>$sname,
						 ':genre'=>$genre,
						 ':album'=>$album,
						 ':publishyear'=>$publishyear ));
	
	if($stmt)
	{

		   echo "success";
	}else{
		
		//header('HTTP/1.1 500 '.mysql_error()); //display sql errors.. must not output sql errors in live mode.
		header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
		exit();
	}

 }
?>