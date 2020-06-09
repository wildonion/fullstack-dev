<?php

include '../dbconfig/dbpdologin.php';
include 'assets/check_email.php';
include 'assets/mailfunc.php';
include 'assets/generate_random_pass.php';

if(!empty($_POST) && isset($_POST['sbtn'])){

	$admin_email = $_POST['email'];
	if(empty($admin_email)){
		$msg = 
		"<div class='bs-example'> 
		  <div class='alert alert-danger fade in'>
				<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Please,</strong>  fill the E_mail field
		  </div>
		 </div>";
	} else{
		
		if(!check_email_address($admin_email)){
			$msg = 
		"<div class='bs-example'> 
		  <div class='alert alert-danger fade in'>
				<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Sorry!</strong>  invalid E-mail address
		  </div>
		 </div>";
		}

		// generate a random password 
		$new_pass = generateStrongPassword($length = 16, $add_dashes = true, $available_sets = 'luds');
		// hash and salt it 
		$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $new_pass . $salt); 
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
        // query to update the old password with the new random password 
        $sql = "UPDATE admin SET password=:newpass, salt=:newsalt WHERE email=:adminemail";
        $stmt = $db->prepare($sql);
    	$stmt->bindParam(':newpass', $password, PDO::PARAM_STR);
    	$stmt->bindParam(':newsalt', $salt, PDO::PARAM_STR);		
		$stmt->bindParam(':adminemail', $admin_email, PDO::PARAM_STR);
		$stmt->execute();
		// send it via email for admin
		$subject = "Generate a new password";
		$message = "<h2>Hello Admin Use This Password:</h2></br><span>". $new_pass ."</span>";
		$result = send_mail($admin_email,$message,$subject);	
			$msg = 
		"<div class='bs-example'> 
		  <div class='alert alert-success fade in'>
				<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Success!</strong>  we've sent an eamil to " . $admin_email ." that contains your new password.
		  </div>
		 </div>";
		
		}

	}

?>