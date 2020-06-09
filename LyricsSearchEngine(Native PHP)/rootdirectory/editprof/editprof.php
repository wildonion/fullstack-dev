<?php include 'checktheuser.php' ?>
<?php include("deleteadmin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profile Settings</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/style.css">
<link rel="stylesheet" href="assets/fadecss.css">
<style>
	body {
  background: #3AAFAB;

}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>


<div class="container">
   <div class="box fade-in one">
	<div class="page-header">
    	<h1 class="h2">all admins </h1> 
    </div>
    
<div class="row">

<?php include("alladmins.php"); ?>

</div>	

</div>
</div>
</body>