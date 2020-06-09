<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class U_dashboard extends CI_Controller
{
	// controller for loading views
	public function register(){
		$data['main_view_home'] = "user/home_view";
		$this->load->view('user/main', $data);
	}

	public function login(){
		$data['main_view_login'] = "user/login_form";
		$this->load->view('user/login_view', $data);
	}

	public function forgotten_pass(){
		$data['main_view_forgotpass'] = "user/fpass_view";
		$this->load->view('user/main_fpass_view', $data);
	}
	
}
?>