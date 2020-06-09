<?php if($this->session->flashdata('usererrorsreg')):?>
<div class="isa_error">
   <i class="fa fa-times-circle"></i>
	<?php echo $this->session->flashdata('usererrorsreg'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('u_send_succ')):?>
<div class="isa_success">
   <i class="fa fa-check"></i>
<?php echo $this->session->flashdata('u_send_succ'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('u_send_failed')):?>
<div class="isa_error">
   <i class="fa fa-times-circle"></i>
<?php echo $this->session->flashdata('u_send_failed'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('useruperror')):?>
<div class="isa_error">
   <i class="fa fa-times-circle"></i>
   <?php echo $this->session->flashdata('useruperror'); ?>
</div>
<?php endif;?>

<?php $attr = array('class'=>'form-register');?>
<?php echo form_open_multipart('user_controller/register', $attr);?>

<div class="form-register-with-email">
  <div class="form-white-background">
	<div class="form-title-row">
      <h1>Create an account</h1>
   </div>
<div class="form-row">
	<label>
		<span>Usename</span>
	<?php $data = array(
						'name'=>'username',
						'placeholder'=>'Choose a username');?>
	<?php echo form_input($data);?>
	</label>
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
	<label>
	    <span>Confirm Password</span>
	<?php $data = array(
						'name'=>'confirm_password',
						'placeholder'=>'Confirm password');?>
	<?php echo form_password($data);?>
	</label>
</div>
<div class="form-row">
 <input type="file" name="user_prof" class="custom-file-input">
</div>

<div class="form-row">
<?php
$data = array(
        'name'          => 'regbtn',
        'value'         => 'true',
        'type'          => 'submit',
        'content'       => 'Register'
);

echo form_button($data);?>
</div> 
<?php
$string = '</div></div>'; 
echo form_close($string);
?>
