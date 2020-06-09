<?php include("checktheuser.php"); ?>
<?php include("tempemailforlyrics.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Available Lyrics</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="../assets/fadecss.css" rel="stylesheet" media="screen">
<link href="../assets/btncss.css" rel="stylesheet" media="screen">
<link href='http://fonts.googleapis.com/css?family=PT+Sans:700' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<style type="text/css">
.wrapper {width: 400px;margin: 10px auto;font-family: Georgia, "Times New Roman", Times, serif;}
.wrapper > ul#results li{ margin: 1px 0; background: #f9f9f9; padding: 20px; list-style: none;}
button {padding: 8px 20px;background: #fbfbfb;border: 1px solid #ddd;border-radius: 4px;height: 37px;min-width: 130px;}
button:hover, button:active, button:focus{background: #f3f3f3;outline: none;}

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
</style>
</head>
    
  <body>
    <div class="box fade-in one">
     <div style="height: 50px;"></div>
       
       <div class="container" style="margin-left: 620px;">
          <div class="col three">      
           <a href="../../home" class="btn btn-orange">Back To Home Page</a>   
          </div>
        </div>

        <div class="wrapper">

            <ul id="results"><!-- results appear here --></ul>
            
            <div align="center">
                <button id="load_more_button"><img src="ajax-loader.gif" class="animation_image" style="float:left;"> Load More</button> <!-- load button -->
            </div>
        </div>
    </div>

        
        <!--/.fluid-container-->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <!-- <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> -->
          <script type="text/javascript">
          var track_page = 1; //track user click as page number, righ now page number 1
          load_contents(track_page); //load content

          $("#load_more_button").click(function (e) { //user clicks on button
            track_page++; //page number increment everytime user clicks load button
            load_contents(track_page); //load content
          });

          //Ajax load function
          function load_contents(track_page){
            $('.animation_image').show(); //show loading image
            
            $.post( 'fetch_pages.php', {'page': track_page}, function(data){
              
              if(data.trim().length == 0){
                //display text and disable load button if nothing to load
                $("#load_more_button").text("No Available Lyrics Yet!").prop("disabled", true);
              }
              
              $("#results").append(data); //append data into #results element
              
              //scroll page to button element
              $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 800);
            
              //hide loading image
              $('.animation_image').hide(); //hide loading image once data is received
            });
          }
          </script>

        
    </body>

</html>