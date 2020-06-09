<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	// main controller
class Admin_controller extends CI_Controller
{

	public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('bcrypt');
        $this->load->helper('generatePassword');

	 }

	public function register(){		

	   $this->form_validation->set_rules(array(
				array(
					'field' => 'username', 
					'label' => 'Username',
					'rules' => 'trim|required|min_length[3]|is_unique[admin.username]',

			  ),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|callback_regex_check',
			  ),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|valid_email|required|max_length[50]|is_unique[admin.email]',


			  ),
				array(
					'field' => 'confirm_password',
					'label' => 'Confirm Password',
					'rules' => 'trim|required|matches[password]',


			  ),


			));

        $config = array(
                'upload_path' => 'uploads/images/',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => '204800',
                'max_width' => '1920',
                'max_height' => '1080',
                'encrypt_name' => true,
                'file_name' => $_FILES['admin_prof']['name']
            );
	        	
			
			if($this->form_validation->run() == FALSE){
				$data = array(
						'errorsreg'=>validation_errors()
					);
				$this->session->set_flashdata($data);
				redirect('dashboard/register');
			} 

			if($this->form_validation->run() == TRUE)
			{
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('admin_prof')){
	               
	                $error = array(
	                	'error' => $this->upload->display_errors());
					$this->session->set_flashdata($error);
					redirect('dashboard/register');
	          }

				$uploadData = $this->upload->data();
	            $picture = $uploadData['file_name'];
	            $userData = array(
	                'username' => $this->input->post('username', TRUE),
	                'password' => $this->input->post('password', TRUE),
	                'email' => $this->input->post('email', TRUE),
	                'admin_pic' => $picture
	            );
			
				$user_id = $this->user_model->create_admin($userData);

				if($user_id){
					// $user_data = array(
					// 			'user_id'=>$user_id,
					// 			'username'=>$userData['username'],
					// 			'admin_pic'=>$userData['admin_pic'],
					// 			'email'=>$userData['email']
					// 	);
					// $this->session->set_userdata('registered', $user_data);
					$this->session->set_flashdata('register_success', 'Successfully registered a new admin!');
					redirect('admin_dashboard');
				} else{
					$this->session->set_flashdata('register_failed', 'Sorry, there was a problem! try again.');
					redirect('dashboard/register');
				}
			}
		}


	public function login(){

		$this->form_validation->set_rules(array(
				array(
					'field' => 'password', 
					'label' => 'Password',
					'rules' => 'trim|required',

			  ),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|valid_email|required|max_length[50]',
			  ),
			));
		
		if($this->form_validation->run() == FALSE){
				$data = array(
						'errorslog'=>validation_errors()
					);
				$this->session->set_flashdata($data);
				redirect('dashboard/login');
			} else{
				$userData = array(
	                'password' => strip_tags($this->input->post('password', TRUE)),
	                'email' => strip_tags($this->input->post('email', TRUE))
	            );

				$fetch_data = $this->user_model->check_admin($userData);
				
				if($fetch_data){
					$user_data = array();
				     foreach($fetch_data as $row)
				     {
				       $user_data = array(
				         'id' => $row->a_id,
				         'username' => $row->username,
				         'email' => $row->email
				       );
				       $this->session->set_userdata('logged_in', $user_data);
				     }
					$this->session->set_flashdata('loggedin_success', 'Successfully logged in!');
					redirect('admin_dashboard');
				} else{
					$this->session->set_flashdata('loggedin_failed', 'Sorry, invalid password!');
					redirect('dashboard/login');
				}
			}

		}

	public function fpass(){

	$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|max_length[50]');

	if($this->form_validation->run() == FALSE){
				$data = array(
						'errorsfpass'=>validation_errors()
					);
				$this->session->set_flashdata($data);
				redirect('dashboard/forgotten_pass');
		} else{

			$email = strip_tags($this->input->post('email', TRUE));

			$config = array(
		     'protocol' => 'smtp',
		     'smtp_host' => 'ssl://smtp.gmail.com.',
		     'smtp_port' => 465,
		     'smtp_user' => 'abarmardeatashyne@gmail.com', 
		     'smtp_pass' => 'Qwerty*123', 
		     'mailtype' => 'html',
		     'charset' => 'iso-8859-1',
		     'wordwrap' => TRUE
			  ); 

			  $new_pass = generateStrongPassword($length = 16, $add_dashes = true, $available_sets = 'luds');
			 
			  $this->load->library('email', $config);
			  $this->email->set_newline("\r\n");
			  $this->email->from('abarmardeatashyne@gmail.com', "Generate a new password");
			  $this->email->to($email);
			  $this->email->subject("Generate Password");
			  $this->email->reply_to('abarmardeatashyne@gmail.com', 'Reply Generate a new password');
			  $this->email->message("<h2>Here is your new password, use this:</h2></br><span>". $new_pass ."</span>");
		
			  if ($this->email->send()) {

				  $data = array(
				  	'email'=>$email,
				  	'password'=>$new_pass
					);
				  
				  $this->user_model->update_pass($data);
                
                $this->session->set_flashdata('send_succ', 'we\'ve sent an eamil to <strong>' . $email .'</strong> 
                	that contains your new password.');
				redirect('dashboard/forgotten_pass');
            } else {
                $this->session->set_flashdata('send_failed', 'Sorry, there was a problem try again!');
				redirect('dashboard/forgotten_pass');
            } 
       }

  }

	public function regex_check($pass){
		    if (preg_match_all("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pass)){
		        return TRUE;
		    } else{
		        $this->form_validation->set_message('regex_check', '%s must be 8-20 characters. Must have no spaces, at least one digit, at least one uppercase letter and at least one lowercase letter. Allows specifying special characters');
		        return FALSE;
		    }
	  }


}


?>