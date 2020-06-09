
<?php if($this->session->flashdata('loggedin_success')):?>
<div class="isa_success">
   <i class="fa fa-check"></i>
<?php echo $this->session->flashdata('loggedin_success'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('register_success')):?>
<div class="isa_success">
   <i class="fa fa-check"></i>
<?php echo $this->session->flashdata('register_success'); ?>
</div>
<?php endif;?>



