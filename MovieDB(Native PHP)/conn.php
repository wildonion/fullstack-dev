<?php 

### EDIT HERE ###

// DB CONNECT INFO
$db_host = "127.0.0.1";
$db_name = "movie";
$db_user = "root";
$db_pw = "Qwe%$[rty]*@;123";

// DB TABLE INFO
$GLOBALS['hits_table_name'] = "hits";
$GLOBALS['info_table_name'] = "visitor_info";

### STOP EDITING HERE ###

// CONNECT TO DB
try {   
	$GLOBALS['db'] = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_user, $db_pw, array(PDO::ATTR_PERSISTENT => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false));  
}  
catch(PDOException $e) {  
    echo $e->getMessage();
}

?>