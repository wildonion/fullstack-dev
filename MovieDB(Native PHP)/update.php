<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>update page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
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



  </style>
</head>
</head>
<body>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <div class="table-responsive">
        
        <!-- FETCHING DATA -->
         <?php 
      
                include("dbconfig.php");
                  
                  if(isset($_GET['edit_movie'])){
             
                 $get_id = $_GET['edit_movie'];
                 
                 $sql = "SELECT * FROM movies WHERE movie_id = '$get_id'";
                      $result = $conn->query($sql);
                  
                  if($result->num_rows < 1){
                    echo "<span align=\"center\" class=\"alert alert-warning\"><b>Oops! sorry nothing was found!</b></span>";
                    exit();
                  }


                  while($row_result = $result->fetch_assoc()){

                    
                    $movie_id = $row_result['movie_id'];
                    $_SESSION["mid"] = $movie_id;
                    $movie_name = $row_result['movie_name'];
                    $movie_keyword = $row_result['movie_keyword'];
                    $movie_desc = $row_result['movie_description'];
                    $movie_img = $row_result['movie_img'];
                    $movie_dir = $row_result['movie_director'];
                    $movie_actors = $row_result['movie_actors'];
                    $movie_genre = $row_result['movie_genre'];
                    $movie_year = $row_result['movie_year'];
                    $movie_rate = $row_result['movie_rating'];
                    $movie_lang = $row_result['movie_lang'];
                    ?>
       
              <table class="table" align="center" cellpadding="2" border="3">
                <tr>
                   <th colspan="4" style="text-align: center;">Update <span class="label label-danger"><?php echo $movie_name; ?></span></th>
                </tr>

                <tr>
                   <td align="right"><b>Name:</b></td>
                   <td><input type="text" name="movie_name" value="<?php echo $movie_name; ?>"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Keyword:</b></td>
                   <td><input type="text" name="movie_keyword" value="<?php echo $movie_keyword; ?>"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Description:</b></td>
                   <td><textarea name="movie_desc" rows="5" placeholder="give a description about this movie here"/><?php echo $movie_desc;?></textarea></td>
                </tr>

                <tr>
                   <td align="right"><b>Image:</b></td>
                   <td><input type="file" name="movie_img"/><img src="images/<?php echo $movie_img; ?>" width="40" height="60"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Directors:</b></td>
                   <td><input type="text" name="movie_dir" value="<?php echo $movie_dir; ?>"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Actors:</b></td>
                   <td><textarea name="movie_actor" rows="5"><?php echo $movie_actors; ?></textarea></td>
                </tr>

                <tr>
                   <td align="right"><b>Genre:</b></td>
                   <td><input type="text" name="movie_genre" value="<?php echo $movie_genre;?>"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Year:</b></td>
                   <td><input type="text" name="movie_year" value="<?php echo $movie_year;?>"/></td>
                </tr>

                <tr>
                   <td align="right"><b>IMDB Rating:</b></td>
                   <td><input type="text" name="movie_rate" value="<?php echo $movie_rate;?>"/></td>
                </tr>

                <tr>
                   <td align="right"><b>Language:</b></td>
                   <td><input type="text" name="movie_lang" value="<?php echo $movie_lang;?>"/></td>
                </tr>

                

                <tr>
                   <td colspan="4" align="center">
                   <input type="submit" name="submitbtn" value="Update Movie" 
                   class="btn btn-primary btn-lg btn-block"/>
                   </td>
                </tr>

              </table>
                            <?php
                            }
                          }
                        ?>
           </div>     
         </form>
      </div>
    </div>
  </div>
 </div>
</body>
</html>


<!-- UPDATE SECTION -->
<?php 
$movie_id = $_SESSION["mid"]; 
include("dbconfig.php");
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


         if($movie_img != ''){
           $sql = "UPDATE movies SET movie_name = '$movie_name', movie_keyword = '$movie_keyword', movie_description = '$movie_desc', movie_img = '$movie_img', movie_director = '$movie_dir', movie_actors = '$movie_actors', movie_genre = '$movie_genre', 
                movie_year = '$movie_year', movie_rating = '$movie_rate', movie_lang = '$movie_lang' WHERE movie_id = '$movie_id'"; 
                      


                move_uploaded_file($movie_img_tmp, "images/{$movie_img}");

                if(mysqli_query($conn, $sql)){

                  echo"<script>alert(\"Movie updated.\")</script>";
                  echo "<script>setTimeout(\"window.location.href='admin.php';\",2000)</script>";
                  

           }
          }
          if($movie_img == ''){
           $sql = "UPDATE movies SET movie_name = '$movie_name', movie_keyword = '$movie_keyword', movie_description = '$movie_desc', movie_director = '$movie_dir', movie_actors = '$movie_actors', movie_genre = '$movie_genre', 
                movie_year = '$movie_year', movie_rating = '$movie_rate', movie_lang = '$movie_lang' WHERE movie_id = '$movie_id'"; 
                      


                move_uploaded_file($movie_img_tmp, "images/{$movie_img}");

                if(mysqli_query($conn, $sql)){

                  echo"<script>alert(\"Movie updated.\")</script>";
                  echo "<script>setTimeout(\"window.location.href='admin.php';\",2000)</script>";
                  

           }
          }
        }
?>