<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User_dashboard extends CI_Controller
{
	
	public function __construct(){
        parent::__construct();
        $this->load->helper('timeago');
        $this->load->model('users_model');
        if(!$this->session->userdata('user_log_logged_in')){
        	$this->logout();
        }

	 }

	public function index(){
		$data['home_view_user'] = 'user/main_home';
		$this->load->view('user/home', $data);
	}
    
    public function get_time(){
    	$id = $this->input->post('id');
    	$result = $this->users_model->get_time($id);
    	echo $result;
    }
    
    public function logout(){
		$this->session->unset_userdata('user_log_logged_in');
		redirect('u_dashboard/login');
	}
	

	public function auto_logout(){
		$this->session->unset_userdata('user_log_logged_in');
		$this->session->set_flashdata('user_auto_logout', 'No activity within 5 minutes; please log in again');
		redirect('u_dashboard/login');
	}
    


}

?>