<?php
   require_once('conn.php');
    require_once('counter.php');
  
    updateCounter("search.php"); // Updates page hits
    updateInfo(); // Updates hit info

?>
<?php
session_start();
 include("dbconfig.php");
 $sql = "SELECT p_title FROM psetting";
        $result = mysqli_query($conn, $sql);
        if($result){
          while($row = mysqli_fetch_assoc($result)){
            
              $titletext = $row['p_title'];
              $_SESSION["title"] = $titletext;
           }
        }
        $title = $_SESSION["title"];
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title?></title>
  <link rel="shortcut icon" href="im/cinema.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta name="keywords" content="moviedatabase, movies, moviesearchengine, moviedb"> -->
  <meta name="description" content="Movie Database Search Engine">
  <meta name="author" content="Erfan Arefi">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="ajaxreq.js"></script>
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

  <style>
      body{
        margin-top: -100px;
        background-color: #ccccff;
        background-image: url("im/moviecollection.jpg");
      
      }
     form{
      margin: 25%;
     }

     .modal-header, h4, .close {
      background-color: #4040bf;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
    .modal-footer {
      background-color: #4040bf;
  }

    footer {
      position:absolute;
      bottom:10;
      width:100%;
      height:45px;   
    }

    #dsite{
      margin: 25%;
      padding-left: 10%;
      font: 160% sans-serif
    }
    #dsite img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}
  #logo {

    float: right;
    margin-right: 10px;



  }




  </style>
</head>
<body>
   <div id="dsite"></div>
   
      <form action="result.php" method="GET">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <span class="navbar-brand active">Movie Database</span>
    </div>
    <button  class="btn btn-primary pull-right" class="btn btn-default btn-lg" type="button" id="myBtn">
    Admin Panel
    </button>
     
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" class="label-label warning">Warning!</h4>
      </div>
      <div class="modal-body">
        Accessing this page requiers a root user!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="javascript:window.location.href='login.php';">Login</button>
      </div>
    </div>
  </div>
</div>
</div>
      
</nav>

   <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
    <li data-target="#carousel-example-generic" data-slide-to="7"></li>
    <li data-target="#carousel-example-generic" data-slide-to="8"></li>
    <li data-target="#carousel-example-generic" data-slide-to="9"></li>
 


  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="im/fi.jpg" alt="fighter" class="img-rounded">
    </div>
    
    <div class="item">
      <img src="im/aven.jpg" alt="avengers" class="img-rounded">
    </div>

    <div class="item">
      <img src="im/spiderman.jpg" alt="spiderman" class="img-rounded">
    </div>
   
    <div class="item">
      <img src="im/captain_america_the_winter_soldier-wide.jpg" alt="capam" class="img-rounded">
    </div>

    <div class="item">
      <img src="im/matrix.jpg" alt="matrix" class="img-rounded">
    </div>

    <div class="item">
      <img src="im/robocop.jpg" alt="robocop" class="img-rounded">
    </div>

    <div class="item">
      <img src="im/fastandfurious.jpg" alt="fastandfurious" class="img-rounded">
    </div>

    <div class="item">
      <img src="im/ironman.jpg" alt="ironman" class="img-rounded">
    </div>

    <div class="item">
      <img src="im/pacificrim.jpg" alt="pacificrim" class="img-rounded">
    </div>

    <div class="item">
      <img src="im/war.jpg" alt="war" class="img-rounded">
    </div>



  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br/><br/><br/>
    <div class="input-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="name or genre ... ">
      <span class="input-group-btn">
        <input type="submit" name="submit" value="Search Movie!"class="btn btn-info"/>
      </span>
    </div>
    <div id="suggesstions"></div>

 </form>
<?php include("dbconfig.php");
          $sql = "SELECT p_footercol FROM psetting";
          $result = mysqli_query($conn, $sql);
          if($result){
            while($row = mysqli_fetch_assoc($result)){

                 $footercol = $row['p_footercol'];
                 $_SESSION["fcol"] = $footercol;
               }
            }
?>
<footer style="background-color: <?php echo $_SESSION["fcol"] ?>">
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
              <span id="logo"><img src="<?php echo 'im/'.$footerlogo ?>" width="80" height="40" /></span>            
              <p style="font-size: <?php echo $footersize .'%' ?>"><?php echo $footertext?></p>
              
    
                  
         <?php }
            }
         ?>

      
    </footer>  
   

   
        
           





<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>


</body>
</html>