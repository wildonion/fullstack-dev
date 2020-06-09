<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Form</title>

	<link rel="stylesheet" href="<?=base_url();?>assets/css/demo.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/form-login.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/errorbox.css">

</head>
<body style="padding: 20px;">

	<header>
		<h1>Login Here</h1>
    </header>

    <ul>
        <li><a href="javascript:void(0)" class="active">Login</a></li>
        <li><a href="register">Register</a></li>
    </ul>


    <div class="main-content">
		<?php $this->load->view($main_view_login); ?>
	</div>

 </body>
</html>
