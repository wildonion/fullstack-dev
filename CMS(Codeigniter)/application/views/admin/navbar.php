<nav class="navbar navbar-dark bg-inverse">
	<?php if($this->session->userdata("logged_in")):?>
	<?php $session_data = $this->session->userdata('logged_in');?>
	 <a class="navbar-brand" href="javascript:;" id="avatar_link"></a>
	

  <ul class="nav navbar-nav">
    <li class="nav-item">
      <input type="hidden" id="admin_id" value="<?php echo $session_data['id']; ?>" />
      <a class="nav-link" href="javascript:;"><?='hi '. $session_data['username'];?> &#9865; | </a>
      <?php endif;?>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="javascript:;" id="ref_cur"><i class="fa fa-refresh"></i> <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="admin_dashboard/search">Search Page</a>
    </li>
    <li class="nav-item">
      <a href="#menu-toggle" class="nav-link" id="menu-toggle">Toggle Menu</a>
    </li>
    <li class="nav-item">
     <?php $this->load->view('admin/logout_form');?>
    </li>
    
    <li role="presentation" class="dropdown nav-item" id="msg_list">
      
      <span id='msg' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' class='nav-link'>
      <i class='fa fa-envelope'>
      <span id='tag_icon' class='tag tag-pill tag-danger'></span>
      </i> Messages
    </span>
        <ul id='menu1' class='dropdown-menu list-unstyled msg_list' role='menu'>
        <!-- insert before <li> -->
          <li>
            <div class='text-xs-center'>
              <a href='javascript:;'>
                <strong>See All Messages</strong>
                <i class='fa fa-angle-right'></i>
              </a>
            </div>
          </li> 
        </ul>
                
     </li>
  
  </ul>
  
  <?php $this->load->view('admin/search_form');?>
</nav>
<!-- end navbar -->


  <!-- prof modal -->
		<div id="profModal" class="modal">
		  <span class="close">×</span>
		  <img class="modal-content" id="img01">
		  <div id="caption"></div>
		</div>
  <!-- end prof modal -->

   <!-- <span class='image'><img src="" alt='Profile Image' /></span> -->