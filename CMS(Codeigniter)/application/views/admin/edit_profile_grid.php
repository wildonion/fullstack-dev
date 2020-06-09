<div class="row">

  <div class="col-md-4">
	   <h1>Profile Photo</h1>
	   <hr>
	    <div class="box fade-in one">
	     <div class="container-field">
		        <ul class="flex-outer">
		          <li>
		         	 <a id="up_prof_link" href="javascript:;">
			     	  <div id="image-holder"></div>
			     	 </a>
		          </li>
                    
				  <li>
                      <div id="ajax_msg"></div>
				   <div class="row">
                       <div class="col-xs-6">
                          <button id="up_prof" onclick = "return sendData()">Set</button>
                        </div>
		            <div class="col-xs-6">
		              <button class="fileUpload" onclick="show_img()">
                       <?php $attr = array('name'=>'update_img','id'=> 'update_img');?>
                       <?php echo form_open('', $attr);?>
                       <?php if($this->session->userdata("logged_in")):?>
	                   <?php $session_data = $this->session->userdata('logged_in');?>
		              	<input type="file" name="admin_avatar" id="fileUpload">
                        <input type="hidden" id="admin_email" value="<?php echo $session_data['email']; ?>"/>
                       <?php endif; ?>
                       <?php echo form_close(); ?>
		                <span>Choose</span>
		              </button>
		            </div>
		           </div>
		          </li>
		         </ul>
		    </div>
		 </div>
  </div>


  <div class="col-md-4">
	   <h1>Security</h1>
	   <hr>
	    <div class="box fade-in one">
			<div class="container-field">
                    <div id="err_msg"></div>
	      		<ul class="flex-outer">
                      <li>
                          <label for="curr-pass">Current Password</label>
                          <input type="password" name="curr_pass" id="curr_pass" placeholder="Current Password...">
                            <a id="eye1" style="cursor: pointer;       
                                                margin-left: -25px;
                                                height: 25px;
                                                width: 50px;
                                                border: 0;
                                                -webkit-appearance: none;"
                                    onclick="if(curr_pass.type=='text')curr_pass.type='password'; else curr_pass.type='text';">
                                <i class="fa fa-eye"></i>
    <!--                            <i class="fa fa-eye-slash"></i>-->
                            </a>
                        </li>
                        <li>
                          <label for="new-pass">New Password</label>
                          <input type="password" name="new_pass" id="new_pass" placeholder="New Password...">
                            <a id="eye2" style="cursor: pointer;       
                                                margin-left: -25px;
                                                height: 25px;
                                                width: 50px;
                                                border: 0;
                                                -webkit-appearance: none;"
                                    onclick="if(new_pass.type=='text')new_pass.type='password'; else new_pass.type='text';">
                                <i class="fa fa-eye"></i>
                            </a>
                        </li>
                        <li>
                          <label for="confirm-pass">Confirm Password</label>
                          <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirm Password...">
                            <a id="eye2" style="cursor: pointer;       
                                                margin-left: -25px;
                                                height: 25px;
                                                width: 50px;
                                                border: 0;
                                                -webkit-appearance: none;" 
                                    onclick="if(confirm_pass.type=='text')confirm_pass.type='password'; else confirm_pass.type='text';">
                                <i class="fa fa-eye"></i>
                            </a>
                        </li>
                        <li>
                          <button id="up_pass">Update Password</button>
                        </li>
	      		</ul>
	  		</div>
		</div>
  </div>
  
  <div class="col-md-4">
	   <h1>Bio</h1>
	   <hr>
	   <div class="box fade-in one">

	    <div class="container-field">
	     <ul class="flex-outer">
             <div id="err_msg_for_bio"></div>
	      <li>
	        <label for="skills">Skills</label>
	        <input type="text" id="tags"/>
	      </li>
	      <li>
	        <label for="birthday_date">Birth Date</label>
	      	<input type="date" id="b_date" name="b_date" />
	      </li>
	      <li>
	      	<label for="bio">Your Bio</label>
	      	<textarea id="bio" name="bio" rows="3" placeholder="bio"></textarea>
	      </li>
	     </ul>
	    </div>
	    


	   </div>
  </div>
</div>