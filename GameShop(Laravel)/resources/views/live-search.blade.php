<html> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <link rel="icon" href="/s.png">

        <title>{{ config('app.name', 'Laravel') }} | LIVE SEARCH</title>
        
        <link href="/css/app.css" rel="stylesheet">

    </head>
<body>
<!-- search box container starts  -->
    <div class="search">
        <h3 class="text-center title-color">BLOG LIVE SEARCH</h3>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="input-group">
                    <span class="input-group-addon" style="color: white; background-color: rgb(124,77,255);">BLOG SEARCH</span>
                    <input type="text" autocomplete="off" id="search" class="form-control input-lg" placeholder="Enter Blog Title Here">
                </div>
            </div>
        </div>   
    </div>  
<!-- search box container ends  -->
<div id="txtHint" class="title-color" style="padding-top:50px; text-align:center;" ><b>Blogs information will be listed here...</b></div>


<script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
   $("#search").keyup(function(){
       var str =  $("#search").val();
       if(str == "") {
               $( "#txtHint" ).html("<b>Blogs information will be listed here...</b>"); 
       }else {

         $.ajax({
            type: "GET",
            url: '/livesearch?id=' + str,
            success: function( msg ) {
                $( "#txtHint" ).html( msg );
            }
         });
       }
   });  
}); 
</script>


 </body>
</html>

