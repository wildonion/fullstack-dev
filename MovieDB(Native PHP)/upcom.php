<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edit MSG</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
   table {
    border-collapse: collapse;
    width: 40%;
	}

	th, td {
	    text-align: left;
	    padding: 8px;
	}

	tr:nth-child(even){background-color: #ff0066}

	th {
	    background-color: #0099ff;
	    color: white;
	}

  </style>
</head>
<body>
<div>
    <form action="upcom.php" method="post">
        
<?php 
      
                include("dbconfig.php");
                  
                  if(isset($_GET['upbyuid'])){
             
                		 $get_id = $_GET['upbyuid'];
                 		 $_SESSION["uid"] = $get_id;
                 
                	  $sql = "SELECT c_message FROM comments WHERE uid = '$get_id'";
                      $result = $conn->query($sql);
                  
                  if($result->num_rows > 1){
                    header("location: admin.php?err=" . urlencode("no comments in your db-("));
                    exit();
                  }


                  while($row_result = $result->fetch_assoc()){
							$msg = $row_result['c_message'];
                    ?>

					 <table>
					   <tr><th><center>EDIT MSG</center></th></tr>
					   <tr><td><center><textarea name="edmsg" rows="3" cols="20"><?php echo $msg?></textarea></center><br>
					   <center><button class="btn btn-success center-block" type="submit" name="edbtn">Edit</button></center></td></tr>
					 </table>
					  
					 
                          <?php
                            }
                          }
                        ?>
   
        </form>


<?php 
$uid = $_SESSION["uid"]; 
include("dbconfig.php");
if(isset($_POST['edbtn'])){
     
    $newmsg = $_POST['edmsg'];
    $sql = "UPDATE comments SET c_message = '$newmsg' WHERE uid = '$uid'"; 
             
             if(mysqli_query($conn, $sql)){

                  echo"<script>alert(\"message edited.\")</script>";
                  echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
                  

           }
        }
?>
  
</div>
</body>
</html>