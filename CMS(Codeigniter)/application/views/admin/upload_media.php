<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/errorbox.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fadecss.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/prof_modal.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/simple-sidebar.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/new_msg.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body 
onload="set_interval()"
onmousemove="reset_interval()"
onclick="reset_interval()"
onkeypress="reset_interval()"
onscroll="reset_interval()"
style="background: #3AAFAB;" 
>


<?php $this->load->view('admin/navbar');?>
<?php $this->load->view('admin/sidebar');?>
<?php $this->load->view($upload);?>
<?php $this->load->view('admin/footer');?>	
<?php $this->load->view('admin/scripts');?>


</body>
</html>