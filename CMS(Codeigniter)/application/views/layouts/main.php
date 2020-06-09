<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registration Form</title>

	<link rel="stylesheet" href="<?=base_url();?>assets/css/demo.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/form-register.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/uploadbtn.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/errorbox.css">

</head>
<body>
	<header>
		<h1>Register Here</h1>
    </header>

    <ul>
        <li><a href="javascript:void(0)" class="active">Register</a></li>
    </ul>


    <div class="main-content">
      <?php $this->load->view($main_view_home); ?>
    </div>

 </body>
</html>
