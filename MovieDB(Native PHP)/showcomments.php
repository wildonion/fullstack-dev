<?php 
session_start();
$movie_name = $_SESSION["moname"]; 
if(isset($_GET['movie_id'])){
$get_id = $_GET['movie_id'];
// check perviuose id is exists or not
include("dbconfig.php");
 
 function resetid(){
	global $conn;
	$sql = "DELETE FROM tempid";
	$result = mysqli_query($conn,$sql);
  }
function isid(){
	global $conn;
	$sql = "SELECT * FROM tempid";
	$result = mysqli_query($conn,$sql);
	if($row = mysqli_fetch_assoc($result) > 0){
		resetid();
	   }
	}
	// insert $get_id into tempid table
isid();

$sql = "INSERT INTO tempid (ID) VALUES  ('$get_id')";
$result = mysqli_query($conn,$sql);

}


   
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
	<title>Comments About <?php echo $movie_name;?>
</title>
        <link rel="shortcut icon" href="im/commentpage.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style>
	 

	body {

        font-family: "Comic Sans MS", cursive, sans-serif;
 
	}
    
    #output{


    	margin-left: 10px;
    	margin-right: 10px;
    	border: 1px solid gray;
    	border-radius: 25px;
    	background-color: #ffffcc;
    	
    }

    .label{
    	border: 0.5px solid black;
    	color : black;
    	font-size: 30px;
    	background-color: lightblue;
    }
    .label:hover{
    	color: green;
    }


a:link, a:visited {
    background-color: white;
    color: black;
    border: 2px solid green;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

a:hover, a:active {
    background-color: green;
    color: white;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */




</style>
<body>
    
                                        <div class="jumbotron">
                                            <div id="output">
                                               		<?php 

                                               			// fetch data from comments table
                                               		    // check status
                                               		    include("dbconfig.php");
                                               		    $sql = "SELECT ID FROM tempid";
                                               		    $result = $conn->query($sql);
                                               		    if($result->num_rows > 0){
                                               		    	while($row_result = $result->fetch_assoc()){

                                               		    		$movie_id = $row_result['ID'];
                                               		    		$_SESSION["moid"] = $movie_id;
                                                              }
                                                          }
                                                                   $movie_id = $_SESSION["moid"];

                                               		    		 $sql = "SELECT c_name, c_date, c_message, c_status FROM comments WHERE c_id = '$movie_id' ORDER BY c_date DESC";
                                               		             $result = $conn->query($sql);
                                               		   
                                               		    if($result->num_rows > 0){

		                                               		    	  while($row_result = $result->fetch_assoc()){
		                                               		    		$name_of_user = $row_result['c_name'];
		                                               		    		$date = $row_result['c_date'];
		                                               		    		$message = $row_result['c_message'];
		                                               		    		$status = $row_result['c_status'];
		                                               		    		if($status == 1){
		                                               		    		echo  " 
		                                               		    		        <div style=\"padding-top: 20px; padding-left: 20px;\">
		                                               		    		          <img src=\"im/pn.png\" width=\"30\" height=\"30\" alt=\"profile\">
		                                               		    		          <span style=\"background-color: #99ccff; border-radius: 25px;\"<b>$name_of_user</b></span> :  
		                                               		    		          <span style=\"border: 1px solid red; background-color: #e60000; border-radius: 25px;\">$date</span>
		                                               		    		          <div style=\"padding-left: 20px;\">$message</div>
		                                               		    		          ________________________________________________________________
		                                               		    		        </div>";
		                                               		    		    }
                                               		    		        if($status == 0){
                                               		    		            echo "<center><span style=\"hover{color: green;}\">no comment accepted by admin!</span></center>";
                                               		    	  }
                                               		       }
                                               		    }
                                               		    else {
                                               		    	echo "<center><span style=\"hover{color: green;}\">no comment is available yet!</span></center>";
                                               		    }

                                               		?>





                                               </div>
                                               
                                               <hr>
                                          <div style="padding-top: 10px;">
									       <span class="label" align="justify"><b>Leave a comment</b></span>
									      </div>
									       
									       <form method="post" action="addcom.php" id="myForm" style="padding-top: 5px;">
											  <div class="col-xs-3" class="form-group" style="padding-top: 20px;">
											    <label for="name">Name</label>
											    <input  type="text" class="form-control" id="name" name="name" placeholder="yourname">
											  </div>
											  <div class="col-xs-3" class="form-group" style="padding-top: 20px;">
											    <label for="email">Email</label>
											    <input  type="email" class="form-control" id="email" name="email" placeholder="youremail@example.com">
											  </div>

											  <div class="col-xs-12" class="form-group" style="padding-top: 20px;">
											   <div class="col-xs-4">
											    <label for="email">Message</label>
											    <textarea rows="10" cols="35" class="form-control" id="comment" name="comment" placeholder="your comment"></textarea>
											   </div>
											  </div>
                                               <div class="col-xs-12" style="padding-top: 20px;">
                                                <div class="col-xs-4">
											  <button type="submit" class="button button2" name="sbtn">Post</button>
											    </div>
											  </div>
											  <hr>
											  
											</form>
											<p><a href="search.php" role="button">Back to search page</a></p>
											</div>

								


											
									           
									           

</body>
</html>