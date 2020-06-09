<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_dashboard extends CI_Controller
{
	
	public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('timeago');
        if(!$this->session->userdata('logged_in')){
        	$this->logout();
        }

	 }

	public function index(){
		$data['home_view_admin'] = 'admin/home_view_admin';
		$this->load->view('admin/main', $data);
	}

	public function navbar_show_avatar(){
        $id = $this->input->post("id");
        $fetch_data = $this->user_model->get_avatar($id);
        if($fetch_data){
            $user_avatar = array();
            foreach($fetch_data as $row){
                   $user_avatar = array('admin_pic' => $row->admin_pic, "username"=> $row->username);    
            }
        }
        
      echo '<img src="'.base_url().'uploads/images/'.$user_avatar['admin_pic'].'"
            class="img-circle" alt="'.$user_avatar['username'].'"  id="prof" width="50" height="45" />';
    }
    public function send_ajax(){
	 	
	 	$data = array(
                'name_of_music'=>strip_tags($this->input->post("mname", TRUE)),
                'artist'=>strip_tags($this->input->post("artist", TRUE)),
                'name_of_singer'=>strip_tags($this->input->post("sname", TRUE)),
                'genre'=>strip_tags($this->input->post("genre", TRUE)),
                'album'=>strip_tags($this->input->post("album", TRUE)),
                'publish_year'=>strip_tags($this->input->post("publishyear", TRUE))
            );
	    $this->user_model->save_ajax($data);    
	}

	public function show_todo(){
		$fetch_data = $this->user_model->ajax_show_todo();
		if($fetch_data){
					$todo_data = array();
				     foreach($fetch_data as $row){
				       $todo_data = array(
				         'id' => $row->id,
				         'content' => $row->content
				       );
				  echo '<li id="item_'.$todo_data['id'].'">';
				  echo '<div class="del_wrapper"><a href="javascript:;" class="del_button" id="del-'.$todo_data['id'].'">';
				  echo '<img src="'.base_url().'assets/images/icon_del.gif" border="0" />';
				  echo '</a></div>';
				  echo '<div class="content" id="content-'.$todo_data['id'].'">'.$todo_data['content'].'</div></li>';
	                 }
	              
	          }
	 }

	public function save_lyrics(){
		$data = array(
                'lyrics'=>$this->input->post("text"),
            );
		$this->user_model->ajax_save_lyrics($data);
	}

	public function save_todo(){
		$data = array(
                'content'=>strip_tags($this->input->post("content_txt", TRUE))
            );
		$id = $this->user_model->ajax_save_todo($data);
		
		if($id){
		  echo '<li id="item_'.$id.'">';
		  echo '<div class="del_wrapper"><a href="javascript:;" class="del_button" id="del-'.$id.'">';
		  echo '<img src="'.base_url().'assets/images/icon_del.gif" border="0" />';
		  echo '</a></div>';
		  echo '<div class="content" id="content-'.$id.'">'.$data['content'].'</div></li>';
		  
		}
	}

	public function delete_todo(){
		$data = array(
                'id'=>filter_var($this->input->post("recordToDelete"))
            );
		$this->user_model->ajax_del_todo($data);
	}

	public function show_messages(){
		$fetch_data = $this->user_model->ajax_show_messages();
		

		if($fetch_data){
					$msg_info = [];
				     foreach($fetch_data['data'] as $row){
				       array_push($msg_info, [
				       	 'name' => $row->name,
				         'message' =>  mb_substr($row->message, 0, 10, 'UTF-8'),
				         'msg_date' => time_elapsed_string($row->msg_date),
				         'num_rows' => $fetch_data['num_rows']

				       	]);

	                 }
	                 // return JSON format
	                 $someJSON = json_encode($msg_info);
	                 echo  $someJSON;
	              
	          } else{
	          	$fetch_data = $this->user_model->show_old_messages();

	          	
	          	if($fetch_data){
	          		$msg_info = [];
				     foreach($fetch_data as $row){
				       array_push($msg_info, [
				       	 "name" => $row->name,
				         "message" => mb_substr($row->message, 0, 10, 'UTF-8'),
				         "msg_date" => time_elapsed_string($row->msg_date)
				       	]);

	                 }
	                 // return JSON format
	                 $someJSON = json_encode($msg_info);
	                 echo  $someJSON;
	          }
	       }
	   }

	public function message_update_item(){
		$this->user_model->update_message_to_old();
		
	}

	

	public function edit_profile(){
        $data['grid'] = "admin/edit_profile_grid";
		$this->load->view('admin/edit_profile', $data);
	}
    
    public function update_img(){
        $config = array(
                'upload_path' => 'uploads/images/',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => '204800',
                'max_width' => '1920',
                'max_height' => '1080',
                'encrypt_name' => true,
                'file_name' => $_FILES['admin_avatar']['name']
            );
        $this->load->library('upload', $config);

				if (!$this->upload->do_upload('admin_avatar')){
	               
	                $error = array(
	                	'error' => $this->upload->display_errors());
					$this->session->set_flashdata($error);
                    
                    if($this->session->flashdata('error')):
                    echo "
                        <div class='isa_error'>
                           <i class='fa fa-times-circle'></i>".
                           $this->session->flashdata('error')."
                        </div>";    
                    exit();
                    endif; 
	          }
                $uploadData = $this->upload->data();
	            $picture = $uploadData['file_name'];
                $this->user_model->update_prof($picture);
        
    }
    
    public function get_admin_email_for_up_img(){
        $data = array('email'=>$this->input->post("email"));
        $this->user_model->save_email($data['email']);
    }
    
    public function ajax_update_pass(){
        $data_arr = array("password"=>$this->input->post("current_pass"),
                          "new_password"=>$this->input->post("new_pass"),
                          "confirm_new_pass"=>$this->input->post("con_new_pass"),
                          "id"=>$this->input->post("id")
                     );
        if($this->user_model->ajax_update_old_pass($data_arr)){
            echo "success!";
        } else {
            echo "wrong password!";
        }
    }
    
    public function ajax_update_skill(){
        $skills = $this->input->post("skills");
        $id = $this->input->post("id");
        $data = array("skills"=>$skills, "id"=>$id);
        $this->user_model->update_skills($data);
    }
    
    public function ajax_update_bio(){
        $cleaned_bio = strip_tags($this->input->post("bio", TRUE));
        $id = strip_tags($this->input->post("id", TRUE));
        $data = array("bio"=>$cleaned_bio, "id"=>$id);
        $this->user_model->update_bio($data);
    }
    
    public function ajax_update_bdate(){
        $b_date = $this->input->post("b_date");
        $id = $this->input->post("id");
        $data = array("b_date"=>$b_date, "id"=>$id);
        $this->user_model->update_b_date($data);
    }
    
    public function ajax_show_tags(){
        $id = $this->input->post("id");
        $skills = $this->user_model->get_skills($id);
        if($skills){
           echo $skills;
        }
    }

	public function ajax_load_more(){
		// load ajax_load_more view for loading lyrics with time ago functionality 
        $data['load_lyrics'] = "admin/load_lyrics";
        $this->load->view('admin/ajax_load_lyrics', $data);
        
	}
    
    public function ajax_get_lyrics(){
        $data = $this->user_model->get_the_lyrics();
        if($data){
	          		$lyrics_info = array();
				     foreach($data as $row){
				       $lyrics_info = array(
                        "name_of_music"=>$row->name_of_music,
                        "name_of_singer"=>$row->name_of_singer,
                        "post_time"=>$row->post_date,
                        "lyrics"=>$row->lyrics,
                        "translated_lyrics"=>$row->translated_lyrics,
                        "lyrics_id"=>$row->l_id,
                        "likes"=>$row->likes
                       );
                         
              if($lyrics_info['translated_lyrics'] != 'no'){
                  echo '<table class="demo-table">
                        <tbody>
                        <tr>
                        <th><strong>Lyrics Number '; echo $lyrics_info['lyrics_id']; echo' - '. $lyrics_info['likes'] .' <i class="fa fa-heart"></i>
                        </strong></th>
                        </tr>';
                 echo '<tr><td valign="top"><div class="feed_title">'.$lyrics_info['name_of_music']. ' - '. $lyrics_info['name_of_singer'].', Posted  
                          ' .time_elapsed_string($lyrics_info['post_time']).'</div>';
                 echo "<div id='lyrics-".$lyrics_info['lyrics_id']."'> 
                       <input type='hidden' id='likes-".$lyrics_info['lyrics_id']."' value='".$lyrics_info['likes']."'>";
                 $data_for_like = array("lyrics_id"=>$lyrics_info['lyrics_id'], "ip_address"=>$_SERVER['REMOTE_ADDR']);
                 $result_from_like_table = $this->user_model->get_the_likes($data_for_like);
                 $str_like = "like";
                 if(!empty($result_from_like_table)){
                     $str_like = "unlike";
                 }
                  $escapedid = htmlspecialchars(json_encode($lyrics_info["lyrics_id"]));
                  $escapedstrlike = htmlspecialchars(json_encode($str_like));
                  echo "<div class='btn-likes'><input type='button' title='".ucwords($str_like)."' class='".$str_like."' onClick='addLikes($escapedid,  $escapedstrlike)'/></div>";
                 echo "<div class='label-likes'>"; 
                  if(!empty($lyrics_info['likes'])){ 
                       echo $lyrics_info["likes"] . " Like(s)"; 
                  } 
                 echo "</div></div>";
                 echo "<div class='desc'>"; 
                 echo mb_substr($lyrics_info["lyrics"], 0, 100, 'UTF-8');
                 echo " ...</div>";
                 echo anchor('admin_dashboard/edit/'.$lyrics_info['lyrics_id'], 'Edit,', array('title' => 'edit this one!', 'class'=>"btn btn-outline-warning btn-sm")). ' ';
                 echo anchor('admin_dashboard/comments/'.$lyrics_info['lyrics_id'], ' Comments ', array('title' => 'show all comments!', 'class'=>"btn btn-outline-danger btn-sm")). ' ';
                 echo anchor('admin_dashboard/show/'.$lyrics_info['lyrics_id'], ' Show', array('title' => 'show lyrics!', 'class'=>"btn btn-outline-success btn-sm")). ' ';
                 echo "</td></tr>";
                 echo "</tbody></table>";
                } else {
                 echo '<table class="demo-table">
                        <tbody>
                        <tr>
                        <th><strong>Lyrics Number '; echo $lyrics_info['lyrics_id']; echo' - '. $lyrics_info['likes'] .' <i class="fa fa-heart"></i></strong></th>
                        </tr>';
                 echo '<tr><td valign="top"><div class="feed_title">'.$lyrics_info['name_of_music']. ' - '. $lyrics_info['name_of_singer'].', Posted  
                          ' .time_elapsed_string($lyrics_info['post_time']).'</div>';
                 echo "<div id='lyrics-".$lyrics_info['lyrics_id']."'> 
                       <input type='hidden' id='likes-".$lyrics_info['lyrics_id']."' value='".$lyrics_info['likes']."'>";
                 $data_for_like = array("lyrics_id"=>$lyrics_info['lyrics_id'], "ip_address"=>$_SERVER['REMOTE_ADDR']);
                 $result_from_like_table = $this->user_model->get_the_likes($data_for_like);
                 $str_like = "like";
                 if(!empty($result_from_like_table)){
                     $str_like = "unlike";
                 }
                  $escapedid = htmlspecialchars(json_encode($lyrics_info["lyrics_id"]));
                  $escapedstrlike = htmlspecialchars(json_encode($str_like));
                  echo "<div class='btn-likes'><input type='button' title='".ucwords($str_like)."' class='".$str_like."' onClick='addLikes($escapedid,  $escapedstrlike)'/></div>";
                 echo "<div class='label-likes'>"; 
                  if(!empty($lyrics_info['likes'])){ 
                       echo $lyrics_info["likes"] . " Like(s)"; 
                  } 
                 echo "</div></div>";
                 echo "<div class='desc'>"; 
                 echo mb_substr($lyrics_info["lyrics"], 0, 100, 'UTF-8');
                 echo " ...</div>";
                 echo anchor('admin_dashboard/translate/'.$lyrics_info['lyrics_id'], ' Translate ', array('title' => 'translate this one!', 'class'=>"btn btn-outline-primary btn-sm")). ' ';
                 echo anchor('admin_dashboard/comments/'.$lyrics_info['lyrics_id'], ' Comments ', array('title' => 'show all comments!', 'class'=>"btn btn-outline-danger btn-sm")). ' ';
                 echo anchor('admin_dashboard/show/'.$lyrics_info['lyrics_id'], ' Show', array('title' => 'show lyrics!', 'class'=>"btn btn-outline-success btn-sm")). ' ';
                 echo "</td></tr>";
                 echo "</tbody></table>";
                }

             }
	          
        }
        
    }
    public function add_likes(){
        if(!empty($this->input->post("id"))){
             $id = $this->input->post("id");
            switch($this->input->post("action")){
                case "like":
                    $data = array("ip_address"=>$_SERVER['REMOTE_ADDR'], "lyrics_id"=>$id);
                    if($this->user_model->insert_like($data)){
                        $this->user_model->update_like_plus_one($id);
                    }
                    break;
                case "unlike":
                    $data = array("ip_address"=>$_SERVER['REMOTE_ADDR'], "lyrics_id"=>$id);
                    if($this->user_model->delete_like($data)){
                        $this->user_model->update_like_neg_one($id);
                    }
                    break;
            }
        }
        
    }
    
    public function translate($id){
        // this will load a view for translate panel
    }
    
    public function edit($id){
        // this will load a view for edit section
    }
    
    public function comments($id){
        // this will load a view for comments section
        
    }
    
    public function show($id){
        // this will load a view for show lyrics
        
    }
    
	public function user_managment(){
		// manage user and contact with them, pageination
        $this->load->view("Person_view");
	}

	public function upload_file(){
		// upload video or image using tinymce editor
        $data['upload'] = "admin/upload_view";
        $this->load->view('admin/upload_media', $data);
        
	}
    
    public function ajax_upload_video(){
        
    }

    public function page_settings(){
        $data['p_setting'] = "admin/page_setting";
        $this->load->view('admin/settings', $data);
    }
     
    public function search(){
        $data['home'] = "home_layouts/homePage";
        $this->load->view("home_layouts/home", $data);
        if($this->input->post('search')){
            echo "<script>alert('done!')</script>";
        }
    }
    
	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect('dashboard/login');
	}
	

	public function auto_logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->set_flashdata('auto_logout', 'No activity within 5 minutes; please log in again');
		redirect('dashboard/login');
	}
    


}

?>