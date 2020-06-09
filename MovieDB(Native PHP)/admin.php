<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Admin Panel</title>
        <link rel="shortcut icon" href="im/admin.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="refresh" content="30; admin.php"> -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>

     .modal-header, h4, .close {
      background-color: #4040bf;
      background-image: url("im/moviecollection.jpg");
      color:white!important;
      text-align: center;
      font-size: 30px;
  }
    .modal-footer {
      background-color: #4040bf;
  }

    #infopic {
         
         background-image: url("im/visitor.JPG");
         background-size: 630px 60px;
         background-repeat: no-repeat;

    }
    a :link, a:visited {
					    background-color: white;
					    color: black;
					    border: 2px solid green;
					    padding: 10px 20px;
					    text-align: center;
					    text-decoration: none;
					    display: inline-block;
					}

	a :hover,a:active {
	    background-color: green;
	    color: white;
	}

	table {
    border-collapse: collapse;
    width: 100%;
	}

	th, td {
	    text-align: left;
	    padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
	    background-color: #4CAF50;
	    color: white;
	}

	.btn-primary,
.btn-primary:hover,
.btn-primary:active,
.btn-primary:visited,
.btn-primary:focus {
    background-color: #ffcc00;
    border-color: #ffcc00;
}
   p.footer{
   	  font-family: Arial, Helvetica, sans-serif;
   	  margin-left: 100px;
   	  margin-right: 106px;
   	  background-color: yellow;
   	  color: red;

   }

   p.title{
   	  font-family: Arial, Helvetica, sans-serif;
   	  margin-left: 100px;
   	  margin-right: 106px;
   	  background-color: yellow;
   	  color: red;

   }
   p.titles{
      font-family: Arial, Helvetica, sans-serif;
      margin-left: 20px;
      margin-right: 55px;
      background-color: yellow;
      color: red;

   }
   p:hover{
   	  color: blue;
   }
	

  </style>
</head>
<body>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <span class="navbar-brand">Admin Panel</span>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="view.php">Visitor Information <span class="glyphicon glyphicon-eye-open"></span></a></li>
        <li><a href="registernew.php">Register New Admin <span class="glyphicon glyphicon-saved"></span></a></li>
        <li class="dropdown"><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron">
<?php
session_start();
if($_SESSION['user']==''){
 header("Location: login.php");
}else{
 $dbh=new PDO('mysql:dbname=movie;host=127.0.0.1', 'root', 'Qwe%$[rty]*@;123');
 $sql=$dbh->prepare("SELECT * FROM admin WHERE id=?");
 $sql->execute(array($_SESSION['user']));
 while($r=$sql->fetch()){
  ?>
  <?php echo "<center><h2>Hello, ".$r['username']."</h2></center>"; ?>
  <h1 align="center">Welcome To Your Admin Panel</h1><br/>
  <?php
   }
 }
?>
<button  class="btn btn-success btn-lg center-block"  type="button" data-toggle="modal" data-target="#myModal5">
    Comments Management <span class="glyphicon glyphicon-edit"></span>
    </button><br/><br/>
     <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="submit" name="upbtn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!--<h4 class="modal-title" id="myModalLabel" >Add Section</h4>-->
      </div>
      <div class="modal-body">


      		<?php
    	include("dbconfig.php");
    	$sql = "SELECT * FROM comments ORDER BY c_date DESC";
    	$result = mysqli_query($conn, $sql);
    	if($result){
            echo "<table><tr><th>Actions</th><th>Message</th><th>From</th><th>For</th><th>Email</th><th>Publish Date</th><th>Status</th></tr>";
    	while($row = mysqli_fetch_assoc($result)){

 				$c_name = $row['c_name'];
 				$c_email = $row['c_email'];
 				$c_message = $row['c_message'];
 				$c_date = $row['c_date'];
 				$c_id = $row['c_id'];
 				$c_status = $row['c_status'];
 				$new = $row['havenewitem'];
 				$uid = $row['uid'];
             
 				$sqlt = "SELECT movie_name FROM movies WHERE movie_id = $c_id";
 				$result2 = mysqli_query($conn, $sqlt);
 					while($row2 = mysqli_fetch_assoc($result2)){
 						$movie_name = $row2['movie_name'];
 						
 						
	 				    
 								echo "<tr><td>
 								<a class=\"btn btn-primary\" href=\"admin.php?conbymid=$c_id\">Confirm MSG</a><br>
 								<a class=\"btn btn-primary\" href=\"admin.php?delbymid=$c_id\">Delete MSG</a><br>
 								<a class=\"btn btn-primary\" href=\"upcom.php?upbyuid=$uid\">Edit MSG</a>
 								</td>"."<td>". $c_message.' '. '<span class="label label-danger">'.$new."</span></td><td>" . $c_name. "</td><td>". $movie_name. 
 								"</td><td>".$c_email."</td><td>".$c_date."</td><td>".$c_status."</td></tr>";
 								}
 							}
	 				   echo "</table>";
				}
			     
			   
   					
 		 
 	
                      
                      if(isset($_GET['conbymid'])){

                            $get_id = $_GET['conbymid'];

                            $sql = "UPDATE comments SET c_status = 1 WHERE c_id = $get_id";
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                $sql = "UPDATE comments SET havenewitem = NULL WHERE c_id = $get_id";
                                $result = mysqli_query($conn, $sql);
								echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
								echo "<script>alert('message confirmed');</script>";
                            }
                        }
                        if(isset($_GET['delbymid'])){

                            $get_id = $_GET['delbymid'];

                            $sql = "DELETE FROM comments WHERE c_id = $get_id";
                            $result = mysqli_query($conn, $sql);
                            if($result){
								echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
								echo "<script>alert('message deleted');</script>";
                            }
                        }

    				?>
        
        
      
       </div>
       </div>
       </div>
      </div>

      <button  class="btn btn-primary btn-lg center-block"  type="button" data-toggle="modal" data-target="#myModal6">
    Page Settings <span class="glyphicon glyphicon-cog"></span>
    </button><br/><br/>
     <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="width: 300px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="submit" name="upbtn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!--<h4 class="modal-title" id="myModalLabel" >Add Section</h4>-->
      </div>
      <div class="modal-body">

          <p class="footer">Footer</p>
          <form action="admin.php" method="post" enctype="multipart/form-data">
         <?php include("dbconfig.php");
          $sql = "SELECT p_footer, p_footercol, p_footersize, p_footerlogo FROM psetting";
          $result = mysqli_query($conn, $sql);
          if($result){
            while($row = mysqli_fetch_assoc($result)){
              
                $footertext = $row['p_footer'];
                $footercol = $row['p_footercol'];
                $footersize = $row['p_footersize'];
                $footerlogo = $row['p_footerlogo'];
         ?>
                          
              <center><textarea name="footertext" rows="6"><?php echo $footertext?></textarea><center><br>
              <center>Footer Color</center>
              <center><input type="color" name="footercol" value="<?php echo $footercol?>"></center> 
              <center>Footer Text Size</center>
              <input type="text" size="5" name="footersize" value="<?php echo $footersize?>" /><br>
              <center>Footer Logo</center><img src="im/wp_upload_bits.png" title="upload logo" id="upfile1" style="cursor:pointer" alt="uploadlogo btn" width="40" height="30" />
                      <input type="file" id="imgs" style="display:none" name="footerlogo"></br>
                      <script>
                        $("#upfile1").click(function () {
					    $("#imgs").trigger('click');
							});
                      </script>
              <br><center><div><img src="im/<?php echo $footerlogo?>" title="your logo" width="50" height="40" alt="logo" 
              style="border:solid 1px #dedede; padding:2px;"/></div></center><br>
              <button class="btn btn-info btn-lg center-block"  type="submit" name="fbtn">Set Footer</button>
    
                  
         <?php }
          }
             ?>
         </form>
         <?php 
           if(isset($_POST['fbtn'])){
            $newfootertext = $_POST['footertext'];
            $newfootercol = $_POST['footercol'];
            $newfootersize = $_POST['footersize'];
            $newfooterlogo = $_FILES['footerlogo']['name'];
            if($newfooterlogo != ''){
	            $newfooterlogo_tmp = $_FILES['footerlogo']['tmp_name'];
	            $sql = "UPDATE psetting SET p_footer = '$newfootertext', p_footercol = '$newfootercol', p_footersize = '$newfootersize', p_footerlogo = '$newfooterlogo'";
	            move_uploaded_file($newfooterlogo_tmp, "im/{$newfooterlogo}");
	            $result = mysqli_query($conn, $sql);
	            if($result){
	              echo "<script>alert('footer set!');</script>";
	              echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
	            }
	        }
	        if($newfooterlogo == ''){
	            $sql = "UPDATE psetting SET p_footer = '$newfootertext', p_footercol = '$newfootercol', p_footersize = '$newfootersize'";
	            $result = mysqli_query($conn, $sql);
	            if($result){
	              echo "<script>alert('footer set!');</script>";
	              echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
	            }
	        }
        }
            
         ?>
         <hr>


         <p class="title">Title</p>
        <form action="admin.php" method="post">
         <?php include("dbconfig.php");
          $sql = "SELECT p_title FROM psetting";
          $result = mysqli_query($conn, $sql);
          if($result){
            while($row = mysqli_fetch_assoc($result)){
              
                $titletext = $row['p_title'];
         ?>
                          
              <center><input type="text" name="titletext" value="<?php echo $titletext?>"><center><br>
              <button class="btn btn-info btn-lg center-block"  type="submit" name="tbtn">Set Title Of The Main Page</button>
    
                  
         <?php }
          }
             ?>
         </form>

         <?php if(isset($_POST['tbtn'])){
            $newtitletext = $_POST['titletext'];
            $sql = "UPDATE psetting SET p_title = '$newtitletext'";
            $result = mysqli_query($conn, $sql);
            if($result){
              echo "<script>alert('title changed!');</script>";
              echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
            }

          }
            
         ?>
         <hr>
             <p class="titles">Active/Deactive site</p>
             <form action="admin.php" method="post" enctype="multipart/form-data">
                    <div id="aodsite">
                      <center>
                      <input type="file" id="imgs" name="imgs"></center></br>
                  
                      <center><textarea name="stext" placeholder="your deactivate message"></textarea></center></br>
                   </div>
                    <button class="btn btn-info btn-lg center-block"  type="submit" id="sbtn" name="sbtn">
                      <?php
                      include("dbconfig.php"); 

                      	$sql = "SELECT * FROM aodsite";
                      	$result = mysqli_query($conn, $sql);
                      	if($row = mysqli_fetch_assoc($result) > 0){
                      		echo "<script>$('#aodsite').hide()</script>";
                      		$btntext = "Active";
                      		$_SESSION["btntxt"] = $btntext;
                      		echo $_SESSION["btntxt"];
                      	}
                      	else{
                      		$btntext = "Deactive";
                      		$_SESSION["btntxt"] = $btntext;
                      		echo $_SESSION["btntxt"];
                      	}


                      ?>
                      </button>
              
			 </form>

             <?php 
             
             // if button clicked
             include("dbconfig.php");
             if(isset($_POST['sbtn'])){
             	if($_SESSION["btntxt"] == "Deactive"){
              $stext = $_POST['stext'];
              $simg = $_FILES['imgs']['name'];
              $simg_tmp = $_FILES['imgs']['tmp_name'];
              if($stext == '' || $simg == ''){
                echo "<script>alert(\"please fill all the fields!\")</script>";
                echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
                exit();
              }
                function delold(){
                	global $conn;
                	$sql = "SELECT simg FROM aodsite";
                	$result = mysqli_query($conn, $sql);
                	if($result){
                		while($row = mysqli_fetch_assoc($result)){
                			$simg = $row['simg'];
                		}
                	}
                	$sql1 = "DELETE FROM aodsite";
                	$result1 = mysqli_query($conn, $sql1);
                	if($result1){
                	unlink("im/$simg");
                    }
                }
               function isold(){
               	 global $conn;
               	 $sql = "SELECT * FROM aodsite";
               	 $result = mysqli_query($conn, $sql);
               	 if($result){
               	 	delold();
               	 } 
               }
                   isold();
              $sql = "INSERT INTO aodsite(simg, stext) VALUES('$simg', '$stext')";
              move_uploaded_file($simg_tmp, "im/{$simg}");
              if(mysqli_query($conn, $sql)){
                echo"<script>alert(\"Deactivated.\")</script>";
                echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
                 }

             }
             elseif($_SESSION["btntxt"] == "Active"){

             	function delold(){
                	global $conn;
                	$sql = "SELECT simg FROM aodsite";
                	$result = mysqli_query($conn, $sql);
                	if($result){
                		while($row = mysqli_fetch_assoc($result)){
                			$simg = $row['simg'];
                		}
                	}
                	$sql1 = "DELETE FROM aodsite";
                	$result1 = mysqli_query($conn, $sql1);
                	if($result1){
                		echo "<script>alert('Activated')</script>";
                		echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
                		unlink("im/$simg");

                	}
                }
               function isold(){
               	 global $conn;
               	 $sql = "SELECT * FROM aodsite";
               	 $result = mysqli_query($conn, $sql);
               	 if($result){
               	 	delold();
               	 } 
               }
                   isold();
             	
             }
            }

          ?>
             <hr>
             

        
          
      
       </div>
       </div>
       </div>
      </div>
    
      
  
    <button   class="btn btn-info btn-lg center-block" type="button" id="myBtn">
    Add Movie <span class="glyphicon glyphicon-save"></span>
    </button><br/><br/>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!--<h4 class="modal-title" id="myModalLabel" >Add Section</h4>-->
      </div>
      <div class="modal-body">
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="table-responsive">
              <table class="table" align="center" cellpadding="2" border="3">
                <tr>
                   <th colspan="4" style="text-align: center;">Insert New Movie:</th>
                </tr>

                <tr>
                   <td align="right"><b>Name:</b></td>
                   <td><input type="text" name="movie_name"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Keyword:</b></td>
                   <td><input type="text" name="movie_keyword"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Description:</b></td>
                   <td><textarea name="movie_desc" rows="5" placeholder="give a description about this movie here"/></textarea></td>
                </tr>

                <tr>
                   <td align="right"><b>Image:</b></td>
                   <td><input type="file" name="movie_img"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Directors:</b></td>
                   <td><input type="text" name="movie_dir"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Cast:</b></td>
                   <td><textarea name="movie_actor" rows="5"></textarea></td>
                </tr>

                <tr>
                   <td align="right"><b>Genres:</b></td>
                   <td><input type="text" name="movie_genre"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Year:</b></td>
                   <td><input type="text" name="movie_year"/></td>
                </tr>

                <tr>
                   <td align="right"><b>IMDB Rating:</b></td>
                   <td><input type="text" name="movie_rate"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Language:</b></td>
                   <td><input type="text" name="movie_lang"/></td>
                </tr>

                

                <tr>
                   <td colspan="4" align="center">
                   <input type="submit" name="submitbtn" value="Add movie" 
                   class="btn btn-primary btn-lg btn-block" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"/>
                   </td>
                </tr>

              </table>
           </div>
         </form>
      </div>
    </div>
  </div> 
 </div>
    
    <button  class="btn btn-danger btn-lg center-block"  type="button" data-toggle="modal" data-target="#myModal2">
    Update Movie <span class="glyphicon glyphicon-refresh"></span>
    </button><br/><br/>
     <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="submit" name="upbtn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!--<h4 class="modal-title" id="myModalLabel" >Add Section</h4>-->
      </div>
      <div class="modal-body">
        
        <form action="admin.php" method="get" enctype="multipart/form-data" id="upform">
          
         <!-- <button class="label label-danger center-block" type="submit" name="upbtn">Show All Movies</button><br/> -->
        </form>
        
        <?php  
        include("dbconfig.php");
         if(!isset($_POST['upbtn'])){

              $sql = "SELECT * FROM movies";
              $result = $conn->query($sql);
          
          if($result->num_rows < 1){
            echo "<span align=\"center\" class=\"alert alert-warning\"><b>Oops! sorry nothing was found!</b></span>";
            exit();
          }


          while($row_result = $result->fetch_assoc()){


            $movie_id = $row_result['movie_id'];
            $movie_name = $row_result['movie_name'];
            $movie_desc = $row_result['movie_description'];
            $movie_img = $row_result['movie_img'];
            $movie_dir = $row_result['movie_director'];
            $movie_actors = $row_result['movie_actors'];
            $movie_genre = $row_result['movie_genre'];
            $movie_year = $row_result['movie_year'];
            $movie_rate = $row_result['movie_rating'];
            $movie_lang = $row_result['movie_lang'];
            ?>

      <div class="row">
        <div class="col-md-12">
      
      <?php echo "
                 <div class=\"thumbnail\">
                     <span class=\"label label-danger\"><b>$movie_name</b></span><br/>
                     <img src=\"images/$movie_img\" width=\"500\" height=\"400\" />
                        <div class=\"caption\">
                                <p align=\"justify\" style=\"font-size: 13px;\"><span class=\"glyphicon glyphicon-film\"></span> $movie_desc</p><br/>
                                   <span align=\"justify\"><img src=\"im/IMDBLOGO.png\" alt=\"imdb_logo\" width=\"60\" height=\"30\"/><span class=\"badge\">$movie_rate</span></span><br/>
                                   <span align=\"justify\"><b>Genre:</b> $movie_genre</span><br/>
                                   <span align=\"justify\"><b>Director:</b> $movie_dir</span><br/>
                       <span align=\"justify\"><b>Actors:</b> $movie_actors</span><br/>
                       <span align=\"justify\"><b>Year:</b> $movie_year</span></br>
                       <span align=\"justify\"><b>Language:</b> $movie_lang</span></b><br/>
                       <a class=\"btn btn-primary\" href=\"update.php?edit_movie=$movie_id\">Update</a>
                      </div>
                    </div>  
                  ";
        ?>
      
       </div>
       </div>
       
       <?php }
      }
     ?>
       </div>
      </div>
    </div>
   </div>
    
    <button  class="btn btn-warning btn-lg center-block"  type="button" data-toggle="modal" data-target="#myModal3">
    Delete Movie <span class="glyphicon glyphicon-trash"></span>
    </button><br/><br/>
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="submit" name="delbtn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <!--<h4 class="modal-title" id="myModalLabel" >Add Section</h4>-->
      </div>
      <div class="modal-body">
        
        <form action="admin.php" method="get" enctype="multipart/form-data" id="upform">
          
          <!-- <button class="label label-danger center-block" type="submit" name="delbtn">Show All Movies</button><br/> -->
        </form>
        
        <?php  
        include("dbconfig.php");
         if(!isset($_POST['delbtn'])){

              $sql = "SELECT * FROM movies";
              $result = $conn->query($sql);
          
          if($result->num_rows < 1){
            echo "<span align=\"center\" class=\"alert alert-warning\"><b>Oops! sorry nothing was found!</b></span>";
            exit();
          }


          while($row_result = $result->fetch_assoc()){


            $movie_id = $row_result['movie_id'];
            $movie_name = $row_result['movie_name'];
            $movie_desc = $row_result['movie_description'];
            $movie_img = $row_result['movie_img'];
            $movie_dir = $row_result['movie_director'];
            $movie_actors = $row_result['movie_actors'];
            $movie_genre = $row_result['movie_genre'];
            $movie_year = $row_result['movie_year'];
            $movie_rate = $row_result['movie_rating'];
            $movie_lang = $row_result['movie_lang'];
            ?>

      <div class="row">
        <div class="col-md-12">
      
      <?php echo "
                 <div class=\"thumbnail\">
                     <span class=\"label label-danger\"><b>$movie_name</b></span><br/>
                     <img src=\"images/$movie_img\" width=\"500\" height=\"400\" />
                        <div class=\"caption\">
                                <p align=\"justify\" style=\"font-size: 13px;\"><span class=\"glyphicon glyphicon-film\"></span> $movie_desc</p><br/>
                                   <span align=\"justify\"><img src=\"im/IMDBLOGO.png\" alt=\"imdb_logo\" width=\"60\" height=\"30\"/><span class=\"badge\">$movie_rate</span></span><br/>
                                   <span align=\"justify\"><b>Genre:</b> $movie_genre</span><br/>
                                   <span align=\"justify\"><b>Director:</b> $movie_dir</span><br/>
                       <span align=\"justify\"><b>Actors:</b> $movie_actors</span><br/>
                       <span align=\"justify\"><b>Year:</b> $movie_year</span></br>
                       <span align=\"justify\"><b>Language:</b> $movie_lang</span></b><br/>
                       <a class=\"btn btn-primary\" href=\"admin.php?delete_movie=$movie_id\">Delete</a>
                      </div>
                    </div>  
                  ";
        ?>
      
       </div>
       </div>
       
       <?php }
      }


      if(isset($_GET['delete_movie'])){
                

            $get_id = $_GET['delete_movie'];

            $sql = "SELECT movie_img FROM movies WHERE  movie_id = '$get_id'";
             $result = $conn->query($sql);
          
          if($result->num_rows < 1){
          	echo "<span align=\"center\" class=\"alert alert-warning\"><b>Oops! sorry nothing was found!</b></span>";
          	exit();
          }


          while($row_result = $result->fetch_assoc()){

        		$movie_img = $row_result['movie_img'];
        		unlink("images/$movie_img");
        	}

        		
            $sql = "DELETE FROM movies WHERE movie_id = '$get_id'";
            $result = $conn->query($sql);
            if($result == TRUE){
          echo"<script>alert(\"Movie deleted\");</script>";
          echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";
          exit();
        }

      }
     ?>


      </div>
      </div>
    </div>
   </div>
   </div>
 </div> <!-- endjunbotron -->
  
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });


});
</script>



</body>
</html>
<?php include("dbconfig.php"); ?>

<?php 

if(isset($_POST['submitbtn'])){

  $movie_name = $_POST['movie_name'];
  $movie_keyword = $_POST['movie_keyword'];
  $movie_desc = $_POST['movie_desc'];
  $movie_img = $_FILES['movie_img']['name'];
  $movie_img_tmp = $_FILES['movie_img']['tmp_name'];
  $movie_dir = $_POST['movie_dir'];
  $movie_actors = $_POST['movie_actor'];
  $movie_genre = $_POST['movie_genre'];
  $movie_year = $_POST['movie_year'];
  $movie_rate = $_POST['movie_rate'];
  $movie_lang = $_POST['movie_lang'];


  if($movie_name == '' || $movie_keyword == '' || $movie_desc == '' || $movie_img == '' || $movie_dir == '' || $movie_actors == '' || $movie_genre == '' || $movie_rate == '' || $movie_lang == ''){

               // how to use modal here?

               echo "<script>alert(\"please fill all the fields!\")</script>";

               exit();

  }
   
    else{

 
         $sql = "INSERT INTO movies 
                  (movie_name, movie_keyword, movie_description, movie_img, movie_director, movie_actors, movie_genre, movie_year, movie_rating, movie_lang)
                    VALUES ('$movie_name','$movie_keyword','$movie_desc','$movie_img','$movie_dir','$movie_actors','$movie_genre','$movie_year','$movie_rate','$movie_lang')";


              move_uploaded_file($movie_img_tmp, "images/{$movie_img}");

              if(mysqli_query($conn, $sql)){


                echo"<script>alert(\"Movie added.\")</script>";
                echo "<script>setTimeout(\"window.location.href='admin.php';\",1000)</script>";

         }

         

     }
 }

?>