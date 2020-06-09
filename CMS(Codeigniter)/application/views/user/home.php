<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>home</title>
	<link rel="stylesheet" href="<?=base_url();?>assets/css/errorbox.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/user_css/main_home_style.css">
	<link type="text/css" href="<?=base_url();?>assets/countDown/demo.css?v=1.0.0.0" rel="stylesheet">
	<link type="text/css" href="<?=base_url();?>assets/countDown/jquery.countdown.css?v=1.0.0.0" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/countDown/jquery.countdown.min.js?v=1.0.0.0"></script>
	<script src="<?=base_url();?>assets/js/user_scripts/open_scr.js"></script>

</head>
<body
onload="set_interval()"
onmousemove="reset_interval()"
onclick="reset_interval()"
onkeypress="reset_interval()"
onscroll="reset_interval()" 
>

<?php $this->load->view($home_view_user); ?> 



</body>
</html>
