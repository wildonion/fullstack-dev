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
    <style>
        .demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
        .demo-table th {background: #81CBFD;padding: 5px;text-align: left;color:#FFF;}
        .demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
        .demo-table td div.feed_title{text-decoration: none;color:#40CD22;font-weight:bold;}
        .demo-table ul{margin:0;padding:0;}
        .demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
        .demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
        .btn-likes {float:left; padding: 0px 5px;cursor:pointer;}
        .btn-likes input[type="button"]{width:20px;height:20px;border:0;cursor:pointer;}
        .like {background:url('http://[::1]/cms/assets/images/like.png')}
        .unlike {background:url('http://[::1]/cms/assets/images/unlike.png')}
        .label-likes {font-size:12px;color:#2F529B;height:20px;}
        .desc {clear:both;color:#999;}
    
    </style>
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
<?php $this->load->view($load_lyrics);?>
<?php $this->load->view('admin/footer');?>	
<?php $this->load->view('admin/scripts');?>



</body>
</html>