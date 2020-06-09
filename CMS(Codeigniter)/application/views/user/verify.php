<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Verify</title>
	<link rel="stylesheet" href="<?=base_url();?>assets/css/errorbox.css">
</head>

<body style="font: 16px/1.5 'Helvetica Neue', Helvetica, Arial, sans-serif;">

	<?php if($this->session->flashdata('ac_register_success')):?>
	<div class="isa_success">
	   <i class="fa fa-check"></i>
	<?php echo $this->session->flashdata('ac_register_success'); ?>
	</div>
	<a href="<?php echo site_url('u_dashboard/login'); ?>">login here</a>
	<?php endif;?>

	<?php if($this->session->flashdata('ac_register_failed')):?>
	<div class="isa_error">
	   <i class="fa fa-times-circle"></i>
	   <?php echo $this->session->flashdata('ac_register_failed'); ?>
	</div>
	<?php endif;?>

</body>

</html>
