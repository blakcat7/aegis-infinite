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

    function projects() {
        //session for profile
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');

        $data['results'] = $this->emp_model->my_project($username);
        $data['project'] = $this->emp_model->all_project($username);
        $data['skills'] = $this->emp_model->project_skills();
        $this->load->view('projects', $data);
    }

    function my_projects() {
        //session for profile
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');

        $data['results'] = $this->emp_model->my_project($username);
        $data['project'] = $this->emp_model->all_project($username);
        $data['skills'] = $this->emp_model->project_skills();
        $this->load->view('my_projects', $data);
    }

    function show_projects() {
        $data['projects'] = $this->emp_model->show_projects();
        $this->load->view('projects', $data);
    }

}
