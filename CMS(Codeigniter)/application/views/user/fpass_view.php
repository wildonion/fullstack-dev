<?php if($this->session->flashdata('errorsfpass')):?>
<div class="isa_error">
   <i class="fa fa-times-circle"></i>
   <?php echo $this->session->flashdata('errorsfpass'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('send_succ')):?>
<div class="isa_success">
   <i class="fa fa-check"></i>
   <?php echo $this->session->flashdata('send_succ'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('send_failed')):?>
<div class="isa_error">
   <i class="fa fa-times-circle"></i>
   <?php echo $this->session->flashdata('send_failed'); ?>
</div>
<?php endif;?>

<?php $attr = array('class'=>'form-fpass');?>
<?php echo form_open('user_controller/fpass', $attr);?>

<div class="form-fpass-with-email">
  <div class="form-white-background">
	<div class="form-title-row">
      <h1>Retrieve</h1>
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
<?php
$data = array(
        'name'          => 'fpassbtn',
        'value'         => 'true',
        'type'          => 'submit',
        'content'       => 'Create'
);

echo form_button($data);?>
</div> 
<?php
$string = '</div></div>'; 
echo form_close($string);
?>