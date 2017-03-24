<?php

class controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'file'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model(array('emp_model', 'admin_model'));
    }

    function index() {
        $this->login(false);
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
        $admin = 'admin';
        $employee = 'employee';
        $manager = 'project manager';

        if ($username && $password && $employee && $this->emp_model->validate_user($username, $password, $employee)) {
            redirect('employee/profile');
        } else if ($username && $password && $admin && $this->emp_model->validate_user($username, $password, $admin)) {
            redirect('admin/dashboard');
        } else if ($username && $password && $manager && $this->emp_model->validate_user($username, $password, $manager)) {
            redirect('manager/profile');
        } else {
            $this->login(true);
        }
    }

    function logout() {
        $sess_array = array('username' => '');
        $this->session->unset_userdata('logged_in', $sess_array);
        redirect('');
    }

}

?>