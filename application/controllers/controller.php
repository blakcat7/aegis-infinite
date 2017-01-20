<?php

class controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        $this->load->model('model');
    }

    public function index() {
        $this->load->view('profile');
    }

    public function add_employee() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Repeat Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('add-employees');
        } else {
            $data = array(
                'location' => $this->input->post('location'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'role' => $this->input->post('role'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'sector' => $this->input->post('sector')
            );

            if ($this->model->insertUser($data)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Success! New Employee has been added.</div>');
                redirect('controller/add_employee');
            }
            
            $this->load->view('add-employees', $data);
        }
    }

    public function add_project() {

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('endDate', 'End Date', 'callback_checkDateFormat');
        $this->form_validation->set_rules('skillsRequired', 'Skills Required', 'required|min_length[1]|max_length[55]');
        //$this->form_validation->set_rules('startDate', 'Start Date', 'callback_checkDateFormat');        
        //$this->form_validation->set_rules('description', 'Description', 'required|min_length[5]|max_length[255]');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('add-projects');
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'endDate' => $this->input->post('endDate'),
                'startDate' => $this->input->post('startDate'),
                'skillsRequired' => $this->input->post('skillsRequired'),
                'description' => $this->input->post('description'),
                'projectType' => $this->input->post('projectType'),
                'projLocation' => $this->input->post('projLocation')
            );

            if ($this->model->insertProjects($data)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Success! New Project has been added.</div>');
                redirect('controller/add_project');
            }

            $this->load->view('add-projects', $data);
        }
    }

    // Check date format, if input date is valid return TRUE else returned FALSE.
    function checkDateFormat($date) {
        if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $date)) {
            return true;
        } else {
            return false;
        }
    }

    public function view_employees() {
        $this->data['posts'] = $this->model->viewEmployees();
        $this->load->view('view-employees', $this->data);
    }

}

?>