<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fields.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/errorbox.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fadecss.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/prof_modal.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/simple-sidebar.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/todo.css">
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
<?php $this->load->view('admin/main_body');?>
<?php $this->load->view('admin/footer');?>				
<?php $this->load->view('admin/scripts');?>


<script>
	var timer = 0;
function set_interval() {
  // the interval 'timer' is set as soon as the page loads
  timer = setInterval("auto_logout()", 300000);
  // the figure '10000' above indicates how many milliseconds the timer be set to.
  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
  // So set it to 300000
}

function reset_interval() {
  //resets the timer. The timer is reset on each of the below events:
  // 1. mousemove   2. mouseclick   3. key press 4. scroliing
  //first step: clear the existing timer

  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    // second step: implement the timer again
    timer = setInterval("auto_logout()", 300000);
    // completed the reset of the timer
  }
}

function auto_logout() {
  // this function will redirect the user to the logout script
  window.location = "admin_dashboard/auto_logout";
}
</script>




</body>
</html>