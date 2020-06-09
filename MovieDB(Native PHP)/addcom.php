<?php 
session_start();
 include("dbconfig.php");

 $cmd = "SELECT * FROM tempid";
 $result = mysqli_query($conn,$cmd);
 while($row = mysqli_fetch_assoc($result)){

 	$movie_id = $row['ID'];
 	
 }
    
    
              
if(isset($_POST['sbtn'])){
				function cleanup($data){
					global $conn;
					return mysqli_real_escape_string($conn, trim(htmlspecialchars(htmlentities(strip_tags($data)))));
				}
    		$name = cleanup($_POST['name']);
    		$email = cleanup($_POST['email']);
    		$comment = cleanup($_POST['comment']);
          //---------------------------------------------------------
    		/*if(strpos($comment, '<script>') !== false){

	    		$filtered_words = array(
	    				'<script>',

	    			);
	    		$zap = '';
	    		$comment = str_replace($filtered_words, $zap, $comment);
	    		$comment = '<kbd>'. $comment . '</kbd>';
	    	}
	    	*/
	      //---------------------------------------------------------
		             if($comment == '' || $name == '' || $email == ''){
		             	echo "<script>alert(\"please fill all the fields!\")</script>";
		             	echo "<script>setTimeout(\"window.location.href='showcomments.php?movie_id=$movie_id';\",1000)</script>";
		             	exit();
		            
		             } else{ 
			             	$sql = "INSERT INTO comments(c_name, c_email, c_message, c_id) VALUES('$name', '$email', '$comment', '$movie_id')";
			    			$result = $conn->query($sql);

			    		if($result){
			    			echo "<script>alert(\"your comment requires admin permission!\")</script>";
			    			echo "<script>setTimeout(\"window.location.href='showcomments.php?movie_id=$movie_id';\",1000)</script>";
			    		} else {
			    			echo "<script>alert(\"error in sending post! try again\")</script>";
			    			echo "<script>setTimeout(\"window.location.href='showcomments.php?movie_id=$movie_id';\",1000)</script>";
			    		}
			    	}
    				
    		}


?>