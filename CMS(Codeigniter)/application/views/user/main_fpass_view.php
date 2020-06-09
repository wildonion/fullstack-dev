<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Create Password</title>

	<link rel="stylesheet" href="<?=base_url();?>assets/css/demo.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/form-fpass.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/errorbox.css">

</head>
<body style="padding: 20px;">

	<header>
		<h1>Create a new password</h1>
    </header>

    <ul>
        <li><?php echo anchor('u_dashboard/login', 'Login'); ?></li>
        <li><?php echo anchor('u_dashboard/register', 'Register'); ?></li>
    </ul>


    <div class="main-content">
		<?php $this->load->view($main_view_forgotpass); ?>
	</div>

 </body>
</html>
