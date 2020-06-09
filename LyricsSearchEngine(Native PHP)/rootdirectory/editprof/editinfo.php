<?php include 'checktheuser.php' ?>
<?php include("editdata.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Info</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/style.css">
<link rel="stylesheet" href="assets/fadecss.css">
</head>
<body style="background: #3AAFAB;">
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>


<div class="container">
 <div class="box fade-in one">

	<div class="page-header">
    	<h1 class="h2">update profile. <a class="btn btn-default" href="editprof"> all members </a></h1>
    </div>

<div class="clearfix"></div>
<div class="col-lg-12">

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Username.</label></td>
        <td><input class="form-control" type="text" name="user_name" value="<?php echo $username; ?>" required /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Emial.</label></td>
        <td><input class="form-control" type="email" name="user_email" value="<?php echo $email; ?>" required /></td>
    </tr>

    <tr>
        <td><label class="control-label">Current Password.</label></td>
        <td><input class="form-control" type="password" name="user_cpass" placeholder="Type your current password" /></td>
    </tr>

    <tr>
        <td><label class="control-label">New Password.</label></td>
        <td><input class="form-control" type="password" name="user_npass" placeholder="Enter your new password" /></td>
    </tr>

    <tr>
        <td><label class="control-label">Retype New Password.</label></td>
        <td><input class="form-control" type="password" name="user_rnpass" placeholder="Confirm your new password"/></td>
    </tr>

    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td>
        	<p><img src="../adminprof/<?php echo $admin_pic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="editprof"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>
  </div>
 </div>
</div>
</body>