<?php

class employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model('emp_model');
    }

    /*
     * LOG IN
     */

    function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('employee/profile');
        } else {
            $this->login(false);
        }
    }

    function login($showError = false) {
        $data['error'] = $showError;
        $this->load->view('login', $data);
    }

    function user_login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->form_validation->set_error_delimiters('<div class="container"><p>', '</p></div>');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username && $password && $this->emp_model->validate_user($username, $password)) {
            redirect('employee/profile');
        } else {
            $this->login(true);
        }
    }

    function logout() {
        $sess_array = array('username' => '');
        $this->session->unset_userdata('logged_in', $sess_array);
        redirect('');
    }

    function viewSkills() {
        $data['skills'] = $this->emp_model->view_skills();
        $this->load->view('test', $data);
    }

    /*
     * PROFILE
     */

    function profile() {        
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');
        $data['skillName'] = $this->session->userdata('skillName');
        $data['percentage'] = $this->session->userdata('percentage');
        
        $data['results'] = $this->emp_model->view_skills($username);
        $data['proj'] = $this->emp_model->my_project($username);
        $this->load->view('profile', $data);
    }

    /*
     * PROJECT
     */

    public function projects() {
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['username'] = $this->session->userdata('username');
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');
        $data['title'] = $this->session->userdata('title');
        $data['description'] = $this->session->userdata('description');        
        
        $data['results'] = $this->emp_model->my_project($username);
        $this->load->view('projects', $data);
    }

}
