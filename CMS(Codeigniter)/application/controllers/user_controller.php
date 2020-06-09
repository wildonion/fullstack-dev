<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	// main controller
class User_controller extends CI_Controller
{

	public function __construct(){
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('generatePassword');

	 }

	public function register(){		

	   $this->form_validation->set_rules(array(
				array(
					'field' => 'username', 
					'label' => 'Username',
					'rules' => 'trim|required|min_length[3]|is_unique[persons.username]',

			  ),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|callback_regex_check',
			  ),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|valid_email|required|max_length[50]|is_unique[persons.email]',


			  ),
				array(
					'field' => 'confirm_password',
					'label' => 'Confirm Password',
					'rules' => 'trim|required|matches[password]',


			  ),


			));

        $config = array(
                'upload_path' => 'uploads/images/users',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => '204800',
                'max_width' => '1920',
                'max_height' => '1080',
                'encrypt_name' => true,
                'file_name' => $_FILES['user_prof']['name']
            );
	        	
			
			if($this->form_validation->run() == FALSE){
				$data = array(
						'usererrorsreg'=>validation_errors()
					);
				$this->session->set_flashdata($data);
				redirect('u_dashboard/register');
			} 

			if($this->form_validation->run() == TRUE)
			{
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('user_prof')){
	               
	                $error = array(
	                	'useruperror' => $this->upload->display_errors());
					$this->session->set_flashdata($error);
					redirect('u_dashboard/register');
	          }
	          	//------------------------------------
				$uploadData = $this->upload->data();
	            $picture = $uploadData['file_name'];
	            $userData = array(
	                'username' => $this->input->post('username', TRUE),
	                'password' => $this->input->post('password', TRUE),
	                'email' => $this->input->post('email', TRUE),
	                'user_pic' => $picture,
                    'tokenCode'=> $code = md5(uniqid(rand()))
	            );
			
				$user_id = $this->users_model->create_user($userData);
				$key = base64_encode($user_id);
			    $user_id = $key;
			    $subject = "Confirm Registration";
				$email = $this->input->post('email', TRUE);
				$username = $this->input->post('username', TRUE);
				$code = $userData['tokenCode'];
				$data = array("id"=>$user_id, "code"=>$code, "email"=>$email);
				$this->users_model->save_id_code($data);
				//------------------------------------
			    $message = "					
						Hello $username,
						<br /><br />
						Welcome to Lyrics Fruit!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://[::1]/cms/user_controller/verify'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
			    $config = array(
				     'protocol' => 'smtp',
				     'smtp_host' => 'ssl://smtp.googlemail.com',
				     'smtp_port' => 465,
				     'smtp_user' => 'abarmardeatashyne@gmail.com', 
				     'smtp_pass' => 'Qwerty*123', 
				     'mailtype' => 'html',
				     'charset' => 'iso-8859-1',
				     'wordwrap' => TRUE
					  ); 
				  //------------------------------------
				  $this->load->library('email', $config);
				  $this->email->set_newline("\r\n");
				  $this->email->from('abarmardeatashyne@gmail.com', "Confirm Registration");
				  $this->email->to($email);
				  $this->email->subject($subject);
				  $this->email->reply_to('abarmardeatashyne@gmail.com', 'Confirm Registration');
				  $this->email->message($message);
		
			  if ($this->email->send()) {
                
                $this->session->set_flashdata('u_send_succ', 'We\'ve sent an email to '. $email. '
                    Please click on the confirmation link in the email to create your account.');
				redirect('u_dashboard/register');
			    
			} else {
				$this->session->set_flashdata('u_send_failed', 'There was a problem ! Please turn off your <strong>Anti Virus or check your internet connection</strong>');
				$this->users_model->delete_user_for_sending_err($email, $userData['user_pic']);
				$this->users_model->del_id_code();
				redirect('u_dashboard/register');
			}
		}
	}

    public function verify(){

    	$result = $this->users_model->get_the_id_code();
    	if($result){
    		$data = array();
    	foreach ($result as $row){
                $data = array(
                        "id"=>$row->id,
                        "code"=>$row->code,
                        "email"=>$row->email
                       );
            }
        }

        $final_result = $this->users_model->verify($data);

    	if($final_result == "30 Days Trial Activated"){
				$this->session->set_flashdata('ac_register_success', 'WoW ! 30 Days Trial is Now Activated. You can Login now');
				$this->load->view('user/verify');
				} 
		else if($final_result == "Already Activated"){
		    $this->session->set_flashdata('ac_register_failed', 'Sorry! Your Account is allready Activated. ');
		    $this->load->view('user/verify');
		  } else{
		  	$this->session->set_flashdata('ac_register_failed', 'Sorry! No Account Found. ');
		  	$this->load->view('user/verify');
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
						'userlogerrors'=>validation_errors()
					);
				$this->session->set_flashdata($data);
				redirect('u_dashboard/login');
			} else{
				$userData = array(
	                'password' => strip_tags($this->input->post('password', TRUE)),
	                'email' => strip_tags($this->input->post('email', TRUE))
	            );

				$fetch_data = $this->users_model->check_user($userData);
				
				if($fetch_data == "Wrong Password !"){
					$this->session->set_flashdata('log_loggedin_failed', 'Sorry, invalid password!');
					redirect('u_dashboard/login');
				} else if($fetch_data == "Sorry ! You can't access to your home page."){
					$this->session->set_flashdata('log_loggedin_failed', 'Sorry ! You can\'t access to your home page.');
					redirect('u_dashboard/login');
				} else if($fetch_data == "You're not registered yet ! Go to your email and click on activate link."){
					$this->session->set_flashdata('log_loggedin_failed', 'You\'re not registered yet ! Go to your email and click on activate link.');
					redirect('u_dashboard/login');
				} else if($fetch_data == "You have to create an account first !"){
					$this->session->set_flashdata('log_loggedin_failed', 'You have to create an account first !');
					redirect('u_dashboard/login');
				} else if($fetch_data == "Your 30 days trial has expired ! "){
				$this->session->set_flashdata('log_loggedin_failed', 'Your 30 days trial has expired ! You can buy a VPN');
					redirect('u_dashboard/login');

				} else {
					$this->session->set_userdata('user_log_logged_in', $fetch_data);
					$this->session->set_flashdata('user_loggedin_success', 'Successfully logged in!');
					redirect('user_dashboard');
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
				redirect('u_dashboard/forgotten_pass');
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
				redirect('u_dashboard/forgotten_pass');
            } else {
                $this->session->set_flashdata('send_failed', 'There was a problem in sending! Please turn off your <strong>Anti Virus</strong>');
				redirect('u_dashboard/forgotten_pass');
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