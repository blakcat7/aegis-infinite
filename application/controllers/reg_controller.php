<?php
class reg_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	public function index() {
		$query = $this->db->get("users");
		$data['records'] = $query->result();
		$this->load->helper('form');
		
		
		
		$this->load->helper('url');
		$this->load->view('reg_add',$data);
	}


	public function add_employee() {
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Repeat Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('reg_add');
		}
		else
		{
			$this->load->view('reg_add');
		}
		
		$this->load->model('reg_model');
			
		$data = array(
				'location' => $this->input->post('location'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'role' => $this->input->post('role'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'sector' => $this->input->post('sector'),
		);
			
		$this->reg_model->insert($data);
		 
		//$query = $this->db->get("users");
		$data['records'] = $query->result();
	
	}

	public function add_project() {
		
	}
}
?>