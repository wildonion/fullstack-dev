<?php include("process/checktheuser.php");  ?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $row['user_name'] .'\'s'. ' Panel'; ?></title>
        <!-- Bootstrap -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <link href="assets/fadecss.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="home">Translate panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            
                            <li><?php include'assets/checknewitem.php';?></a></li>

                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> 
								<?php echo $row['email']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>

                            
                        </ul>
                        <ul class="nav">
                        	<li><a href="availablelyrics/av_ly/availablelyrics">Available Lyrics</a></li>
                             
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Toolbar Menu <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li><a href="editprof">Edit Profile</a></li>
                                    <li><a href="allmsg/allmsg">Messages</a></li>
                                    <li><a href="alltranslatedlyrics/alltranslatedlyrics">Show All Translated Lyrics</a></li>
                                    <li><a href="edittrans/edittrans">Edit Translated Lyrics</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="tinymce-msg/index">Contact With Admin</a></li>
                            
                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>


    <div class="box fade-in one">


        

    </div>

        
        <!--/.fluid-container-->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script>
        $(document).ready(function(){
         setTimeout(function() {
         location.reload()
          },10000);
        });
        </script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        
    </body>

</html>