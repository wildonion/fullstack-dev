<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('person_model','person');
        $this->load->helper('checkEmail');
        if(!$this->session->userdata('logged_in')){
        	$this->logout();
        }
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('person_view');
	}

	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->firstname;
			$row[] = $person->lastname;
			$row[] = $person->gender;
			$row[] = $person->address;
			$row[] = $person->dob;
            $row[] = $person->email;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="delete" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                <a class="btn btn-sm btn-info" href="javascript:void(0)" title="block" onclick="block_user('."'".$person->id."'".')"><i class="glyphicon glyphicon-ban-circle"></i> Block</a>
                <a class="btn btn-sm btn-success" href="javascript:void(0)" title="block" onclick="unblock_user('."'".$person->id."'".')"><i class="glyphicon glyphicon-ban-circle"></i> Unblock</a>
                <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="send msg" onclick="send_email('."'".$person->id."'".')"><i class="glyphicon glyphicon-send"></i> Send Message</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
    
    public function ajax_block($id){
        if($this->person->block_user($id)){
            echo "blocked";
        } else {
            echo "this user has been already blocked";
        }
    }
    
    public function ajax_unblock($id){
        if($this->person->unblock_user($id)){
            echo "unblocked";
        } else {
            echo "this user has been already unblocked";
        }
    }
    
	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
                'email' => $this->input->post('email'),
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
                'email' => $this->input->post('email'),
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}
        
        if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}
//        if(!check_email_address($this->input->post('email')))
//		{
//			$data['inputerror'][] = 'email';
//			$data['error_string'][] = 'Email address is not valid';
//			$data['status'] = FALSE;
//		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
    
    public function logout(){
		$this->session->sess_destroy();
		redirect('dashboard/login');
	}

}
