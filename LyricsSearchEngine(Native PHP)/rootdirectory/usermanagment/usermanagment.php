<?php include 'checktheuser.php' ?>
<?php include 'assets/deleteuser.php' ?>
<?php include 'assets/blockuser.php' ?>
<?php include 'assets/unblockuser.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Users Managment</title>
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


<div class="col-lg-8">
 <div class="box fade-in one">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Users List</h4>
    </div>
    <div class="panel-body">
    
      <?php include("assets/userslist.php"); ?>
    
    </div>
  </div>
</div>
</div>



</body>
</html>