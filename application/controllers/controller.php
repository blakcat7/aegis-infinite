<?php
class controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	public function index() {
		//$query = $this->db->get("users");
		//$data['records'] = $query->result();
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$this->load->helper('url');
		$this->load->view('login');
	}

    public function login(){
    	
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('username', 'Username', 'trim|required');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required');
    	
    	if ($this->form_validation->run() == FALSE) {
    		if(isset($this->session->userdata['logged_in'])){
    			$this->load->view('profile');
    		}else{
    			$this->load->view('login');
    		}
    	} else {
    		$data = array(
    				'username' => $this->input->post('username'),
    				'password' => $this->input->post('password')
    		);
    		$this->load->model('model');
    		$result = $this->model->login($data);
    		if ($result == TRUE) {
    	
    			$username = $this->input->post('username');
    			$result = $this->model->read_user_information($username);
    			if ($result != false) {
    				$session_data = array(
    						'username' => $result[0]->username,
    						'email' => $result[0]->email,
    				);
    				// Add user data in session
    				$this->session->set_userdata('logged_in', $session_data);
    				$this->load->view('profile');
    			}
    		} else {
    			$data = array(
    					'error_message' => 'Invalid Username or Password'
    			);
    			$this->load->view('login', $data);
    		}
    	}
    }
    
    // Logout from admin page
    public function logout() {
    
    	// Removing session data
    	$sess_array = array(
    			'username' => ''
    	);
    	$this->session->unset_userdata('logged_in', $sess_array);
    	$data['message_display'] = 'Successfully Logout';
    	$this->load->view('login', $data);
    }
    
	public function add_employee() {
	
		//$this->load->view('add-employees');

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
			$this->load->view('add-employees');
		}
		else
		{
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
			
			$this->load->model('model');
			$this->model->insert($data);
			$this->load->view('add-employees', $data);
		} 
		
		
			
		/*$data = array(
				'location' => $this->input->post('location'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'role' => $this->input->post('role'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'sector' => $this->input->post('sector'),
		); */
			
		
		 
		//$query = $this->db->get("users");
		//$data['records'] = $query->result();
	
	}

	public function add_project() {
		//Including validation library
		$this->load->library('form_validation');
		
		$this->load->helper('url');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//Validating Name Field
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[25]');
		//$this->form_validation->set_rules('description', 'Description', 'required|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('endDate', 'End Date', 'callback_checkDateFormat');
		//$this->form_validation->set_rules('startDate', 'Start Date', 'callback_checkDateFormat');
		$this->form_validation->set_rules('skillsRequired', 'Skills Required', 'required|min_length[1]|max_length[55]');
		
		if ($this->form_validation->run() == FALSE) {
			/*echo "<script type='text/javascript'>
			 alert('Please Enter correct values in yyyy/mm/dd Format');
			 </script>";*/
			$this->load->view('add-projects');
		} else {
			//Setting values for tabel columns
			$data = array(
					'title' => $this->input->post('title'),
					'endDate' => $this->input->post('endDate'),
					'startDate' => $this->input->post('startDate'),
					'skillsRequired' => $this->input->post('skillsRequired'),
					'description' => $this->input->post('description'),
					'projectType' => $this->input->post('projectType'),
					'projLocation' => $this->input->post('projLocation'),
			);
			//Transfering data to Model
			$this->load->model('model');
			$this->model->insertProjects($data);
			//$data['message'] = 'Data Inserted Successfully';
			//Loading View
			$this->load->view('add-projects', $data);

		}
	}
	
	// Check date format, if input date is valid return TRUE else returned FALSE.
	function checkDateFormat($date) {
		if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$date))
		{
			return true;
		}else{
			return false;
		}
	}
}
?>