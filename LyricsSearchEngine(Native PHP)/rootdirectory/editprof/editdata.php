<?php

	error_reporting( ~E_NOTICE );
	
	require_once '../../dbconfig/dbpdologin.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $db->prepare('SELECT username, email, admin_pic, password, salt FROM admin WHERE a_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		$same_pass = false;
		extract($edit_row);
	}
	else
	{
		header("Location: editprof");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$username = $_POST['user_name'];// user name
		$useremail = $_POST['user_email'];// user email
		$usercpass = $_POST['user_cpass']; // user c_pass
		$usernpass = $_POST['user_npass']; // user n_pass
		$userrnpass = $_POST['user_rnpass']; // user r_n_pass

		if($usercpass != "" && $usernpass != "" && $userrnpass != ""){
			if($usernpass != $userrnpass){
			$errMSG = "The passwords you typed do not match! please retype the new password in both boxes.";
		}
		if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $usernpass))
	        {
	          $errMSG = "Your new password is not safe!";
	        }
			$check_password = hash('sha256', $usercpass . 
				$edit_row['salt']);
		for($round = 0; $round < 65536; $round++){
			$check_password = hash('sha256', $check_password . 
				$edit_row['salt']);
		  }
		  if($check_password === $edit_row['password']){
		  	$same_pass = true;
		  }
		  else{
		  	$errMSG = "The password you typed is incorrect! Please retype your current password.";
		  }
		}
		
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = '../adminprof/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['admin_pic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['admin_pic']; // old image from database
		}	
						
		
		
		if(!isset($errMSG) && $same_pass){
			// unset($edit_row['salt']);
			// unset($edit_row['password']);
			// hashing password
			$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
            $password = hash('sha256', $usernpass . $salt); 
            for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
			
			$stmt = $db->prepare('UPDATE admin 
									     SET username=:uname, 
										     email=:email, 
										     admin_pic=:upic,
										     password=:newpass,
										     salt=:salt 
								       WHERE a_id=:uid');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':email',$useremail);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':newpass',$password);
			$stmt->bindParam(':salt',$salt);
			$stmt->bindParam(':uid',$id);
	
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='editprof';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry, Could Not Updated !";
			}

		}
// if no error occured, continue ....
		if(!isset($errMSG) && $same_pass != true)
		{
			$stmt = $db->prepare('UPDATE admin 
									     SET username=:uname, 
										     email=:email, 
										     admin_pic=:upic 
								       WHERE a_id=:uid');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':email',$useremail);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='editprof.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry, Could Not Updated !";
			}
		
		}
		
						
	}
	
?>