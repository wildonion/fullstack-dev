<div class="container">
   
   <div class="col-xs-3">
	  <h1>To Do List</h1>
	         <hr>
	      <div class="box fade-in one">
		    <div class="content_wrapper">
			  <ul id="responds"></ul>
			   <div class="form-group">
				    <input type="text" class="form-control" id="todo" placeholder="to do ...">
			   </div>
				  <button type="submit" id="add_todo" class="btn btn-primary btn-sm">Add To List</button>
				  <img src="<?=base_url();?>assets/images/loading.gif" id="Loadingimage" style="display:none" />
		    </div>
	      </div>
	</div>
	 <div class="col-xs-9">
	   <h1>Save your lyrics</h1>
	    <hr>
		<?php $this->load->view($home_view_admin); ?>
		<?php $this->load->view('admin/send_data_form'); ?>
		  <div id="container-for-tinymce">
			<div class="box fade-in one">
				  <form id="tinymce_form" onsubmit='umce();ut(); return false;'>
				  	<h3 id="h3">feel free and use below editor :)</h3>
				                    <p id="info"></p>
				    <textarea id="lyrics" name="lyrics"></textarea>
				    <input type="submit" id='submit_lyrics' value="Save" name='save' />
				  </form>  
			</div>
		  </div>
		  <div id="load_gif" align="justify" style="margin-top: -340px; margin-left: 100px;"></div>				
     </div>
     
</div>