<?php
function current_time(){
 
	$hostname="127.0.0.1";   
	$username="root";  
	$password="Qwe%$[rty]*@;123";   
	$db = "lyricssearch";   
	$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);  
	foreach($dbh->query('SELECT CURRENT_TIMESTAMP()') as $row) {  
		
		  return $row['CURRENT_TIMESTAMP()'];  
	
	}  

}

?>