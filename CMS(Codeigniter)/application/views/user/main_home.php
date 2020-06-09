<?php if($this->session->userdata("user_log_logged_in")):?>
<?php $session_data = $this->session->userdata('user_log_logged_in');?>
<?php endif;?>

<?php if($this->session->flashdata('user_loggedin_success')):?>
	<div class="isa_success">
	   <i class="fa fa-check"></i>
	<?php echo $this->session->flashdata('user_loggedin_success'); ?>
	</div>
<?php endif;?>	

<div id="logoutbtn">
	<button id="log_out_btn" class="log_out_button" onclick="log_out();">Logout</button>
</div>

<h1>hello <?php echo $session_data['username']; ?> This is the secret page!</h1>
<input type="hidden" id="exp_date" value="<?php echo $session_data['exp_date']; ?>">
<input type="hidden" id="ct_format_date" value="">


<h1 style="margin-top:150px" align="center">Remaining Time</h1>
<ul id="example">
  <li><span class="days">00</span><p class="days_text">Days</p></li>
	<li class="seperator">:</li>
	<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
	<li class="seperator">:</li>
	<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
	<li class="seperator">:</li>
	<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
</ul>

<script>
  exp = $("#exp_date").val();
  var t = exp.split(/[- :]/);
  var countDownFormat = t[1] + '/' + t[2] + '/' + t[0] + ' ' + t[3] + ':' + t[4] + ':' + t[5];
  var date_val = document.getElementById("ct_format_date").value = countDownFormat;
    $('#example').countdown({
      date: date_val,
      offset: -8,
      day: 'Day',
      days: 'Days'
    }, function () {
      alert('Done!');
    });
</script>