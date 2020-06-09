<?php if($this->session->flashdata('auto_logout')):?>
<div class="isa_error">
   <i class="fa fa-times-circle"></i>
   <?php echo $this->session->flashdata('auto_logout'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('errorslog')):?>
<div class="isa_error">
   <i class="fa fa-times-circle"></i>
   <?php echo $this->session->flashdata('errorslog'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('loggedin_failed')):?>
<div class="isa_error">
   <i class="fa fa-times-circle"></i>
   <?php echo $this->session->flashdata('loggedin_failed'); ?>
</div>
<?php endif;?>

<?php $attr = array('class'=>'form-login');?>
<?php echo form_open('admin_controller/login', $attr);?>

<div class="form-log-in-with-email">
  <div class="form-white-background">
	<div class="form-title-row">
      <h1>Log in</h1>
   </div>
<div class="form-row">
	<label>
	    <span>Email</span> 
	<?php $data = array(
						'name'=>'email',
						'placeholder'=>'Enter your email');?>
	<?php echo form_input($data);?>
	</label>
</div>
<div class="form-row">
    <label>
	    <span>Password</span>
	<?php $data = array(
						'name'=>'password',
						'placeholder'=>'Enter your password');?>
	<?php echo form_password($data);?>
	</label>
</div>
<div class="form-row">
<?php
$data = array(
        'name'          => 'logbtn',
        'value'         => 'true',
        'type'          => 'submit',
        'content'       => 'Login'
);

echo form_button($data);?>
</div> 
<?php echo form_close();?>
</div>
<?php echo anchor('dashboard/forgotten_pass', 'Forgotten password &middot;', 'class="form-forgotten-password"')?>
</div>