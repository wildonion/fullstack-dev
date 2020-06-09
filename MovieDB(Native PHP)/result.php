<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">  
<head>
  <meta charset="utf-8">
  <title>Result Page</title>
<link rel="shortcut icon" href="im/result.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
  //when any character press on the input field keyup function call
  $("#search").keyup(function(){
    $.ajax({
    type: "POST",// here used post method
    url: "readname.php",//php file where retrive the post value and fetch all the matched item from database
    data:'searchterm='+$(this).val(),//send data or search term to readname file to process
    beforeSend: function(){
      //show loader icon
      $("#search").css("background","#FFF url(im/LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      //get the output from database on success
      $("#suggesstions").show();//show the suggestions
      $("#suggesstions").css("background","white");
      $("#suggesstions").html(data);//append data in the box for selection
      $("#search").css("background","white");
    }
    });
  });
});
//call this function after select one of these suggestion for hide the suggestion box and select the value
function selectname(selected_value) {
$("#search").val(selected_value);
$("#suggesstions").hide();
}
</script>
</head>
<style>
	body {
		background-color: #f0f0f5;
	}

	#lstmsg {
		margin-left: -310px;
		margin-top: -40px;
		margin-bottom: 20px;
		font-size: 15px;
		border: 1px solid #b3b3cc;
		width: 220px;
	}

</style>
<body>
 <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted"><em>What are you looking for?</em></h3>
        <form action="result.php" method="GET">
        <div class="input-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <input type="submit" name="submit" value="Search Movie!"class="btn btn-info"/>
      </span>
    </div>
    <div id="suggesstions"></div>
     </form>    
      </div>
        <hr>
      <div class="jumbotron"> 
      <div id="lstmsg">
 <div class="label label-danger">Recently Comments</div><br><br>
 	<?php 
 		include("dbconfig.php");
 		$sql = "SELECT c_message, c_id FROM comments ORDER BY uid DESC LIMIT 3";
 		$result = mysqli_query($conn, $sql);
 		if($result){
 			while($row = mysqli_fetch_assoc($result)){
 				$msg = $row['c_message'];
 				$c_id = $row['c_id'];
 				echo "<span><a href=\"showcomments.php?movie_id=$c_id\">".$msg."</a></span></br>";
 			}
 		}

 	?>
 </div>
     <?php 
			
       include("dbconfig.php");
      
        $button = $_GET ['submit'];
        $search = $_GET ['search']; 
  
          if(strlen($search)<=1)
          echo "<center><span class=\"alert alert-warning\"><b>Please write something in the search box!</b></span></center>";

          else{
            echo "<center><span class=\"alert alert-warning\">You searched for <b>$search</b></span></center>";
            $search_exploded = explode (" ", $search);
 
            $x = "";
            $construct = "";  
                
            foreach($search_exploded as $search_each){
            $x++;
            if($x==1)
            $construct .="movie_keyword LIKE '%$search_each%'";
            else
            $construct .="AND movie_keyword LIKE '%$search_each%'";
                
            }

            $constructs ="SELECT * FROM movies WHERE $construct";
            $run = mysqli_query($conn, $constructs);
                
            $foundnum = mysqli_num_rows($run);
                
            if ($foundnum==0)
              echo "<br><br><p style='font-family: Arial, Helvetica, sans-serif; font-size: 15px;'>Sorry, there are no matching result for <b>$search</b>.</br></br>
            1.Try more general words. for example: If you want to search 'Final Fantasy VII Advent Children DIRECTORS CUT'
            then use general keyword like 'action'</br>2. Try different words with similar
             meaning</br>3. Please check your spelling</p>";

             else
                { 
                  if($foundnum == 1)
                echo "<p class=\"label label-success\" style='font-family:Courier New;'>$foundnum movie found !</p>";
                  if($foundnum > 1)
                echo "<p class=\"label label-success\" style='font-family:Courier New;'>$foundnum movies found !</p>";
                  
                $per_page = 2;
                $start = isset($_GET['start']) ? $_GET['start']: '';
                $max_pages = ceil($foundnum / $per_page);
                if(!$start)
                $start=0; 
                $getquery = mysqli_query($conn, "SELECT * FROM movies WHERE $construct LIMIT $start, $per_page");
                  
                while($runrows = mysqli_fetch_assoc($getquery))
                {
                  $movie_name = $runrows['movie_name'];
                  $_SESSION["moname"] = $movie_name;
                  $movie_desc = $runrows['movie_description'];
                  $movie_img = $runrows['movie_img'];
                  $movie_dir = $runrows['movie_director'];
                  $movie_actors = $runrows['movie_actors'];
                  $movie_genre = $runrows['movie_genre'];
                  $movie_year = $runrows['movie_year'];
                  $movie_rate = $runrows['movie_rating'];
                  $movie_lang = $runrows['movie_lang'];
                  $movie_id = $runrows['movie_id'];
                  ?>

              <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-6">
      
            <?php echo "
                       <div class=\"thumbnail\" align=\"center\">
                           <span class=\"label label-danger\"><b>$movie_name</b></span><br/>
                           <img src=\"images/$movie_img\" width=\"300\" height=\"400\" />
                              <div class=\"caption\">
                                      <p align=\"justify\" style=\"font-size: 13px;\"><span class=\"glyphicon glyphicon-film\"></span> $movie_desc</p><br/>
                                         <span align=\"justify\"><img src=\"im/IMDBLOGO.png\" alt=\"imdb_logo\" width=\"60\" height=\"30\"/><span class=\"badge\">$movie_rate</span></span><br/>
                                         <span align=\"justify\"><b>Genres:</b> $movie_genre</span><br/>
                                         <span align=\"justify\"><b>Directors:</b> $movie_dir</span><br/>
                             <span align=\"justify\"><b>Cast:</b> $movie_actors</span><br/>
                             <span align=\"justify\"><b>Year:</b> $movie_year</span></br>
                             <span align=\"justify\"><b>Language:</b> $movie_lang</span></b><br/>
                             <span class=\"label label-info\"><a href=\"showcomments.php?movie_id=$movie_id\">See Comments</a></span>
                            </div>
                          </div>  
                        ";
                  ?>
               </div>
               </div>
       
            <?php }
                  
                //Pagination Starts
                echo "<center>";
                  
                $prev = $start - $per_page;
                $next = $start + $per_page;
                                       
                $adjacents = 3;
                $last = $max_pages - 1;
                  
                if($max_pages > 1){   
                //previous button
                if (!($start<=0)) 
                echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$prev'>Prev</a> ";    
                          
                //pages 
                //not enough pages to bother breaking it up
                if ($max_pages < 7 + ($adjacents * 2)){
                $i = 0;   
                for ($counter = 1; $counter <= $max_pages; $counter++){
                if ($i == $start){
                echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$i'><b>$counter</b></a> ";
                }
                else {
                echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$i'>$counter</a> ";
                }  
                $i = $i + $per_page;                 
                  }
                }
                //enough pages to hide some
                elseif($max_pages > 5 + ($adjacents * 2)){
                //close to beginning; only hide later pages
                if(($start/$per_page) < 1 + ($adjacents * 2))        
                 {
                   $i = 0;
                   for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($i == $start){
                      echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$i'><b>$counter</b></a> ";
                   }
                else {
                   echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$i'>$counter</a> ";
                 } 
                   $i = $i + $per_page;                                       
                  }
                                          
                }
                //in middle; hide some front and some back
                elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2)){
                echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=0'>1</a> ";
                echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$per_page'>2</a> .... ";
                 
                $i = $start;                 
                for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++){
                if ($i == $start){
                echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$i'><b>$counter</b></a> ";
                  }
                   else {
                     echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$i'>$counter</a> ";
                  }    
                    $i = $i + $per_page;                
                   }
                                                  
                }
                //close to end; only hide early pages
                else{
                echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=0'>1</a> ";
                echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$per_page'>2</a> .... ";
                 
                $i = $start;                
                for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++){
                if ($i == $start){
                    echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$i'><b>$counter</b></a> ";
                  }
                     else {
                      echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$i'>$counter</a> ";   
                   } 
                    $i = $i + $per_page;              
                   }
                  }
                }
                          
                //next button
                if (!($start >=$foundnum-$per_page))
                  echo " <a href='result.php?search=$search&submit=Search+Movie+!&start=$next'>Next</a> ";    
                  }   
                    echo "</center>";
              } // end first else
          } //end second else
          ?>
     </div>


      <p><a class="btn btn-primary btn-lg" href="search.php" role="button">Back to search page</a></p>

    </div>


</body>
</html>