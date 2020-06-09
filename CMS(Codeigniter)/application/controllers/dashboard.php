<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	// controller for loading views
	public function register(){
		$data['main_view_home'] = "layouts/home_view";
		$this->load->view('layouts/main', $data);
	}

	public function login(){
		$data['main_view_login'] = "layouts/login_form";
		$this->load->view('layouts/login_view', $data);
	}

	public function forgotten_pass(){
		$data['main_view_forgotpass'] = "layouts/fpass_view";
		$this->load->view('layouts/main_fpass_view', $data);
	}
	
}
?>