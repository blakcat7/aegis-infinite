<?php

class employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'file'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model(array('emp_model', 'admin_model'));
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
        $admin = 'admin';
        $employee = 'employee';
        
        if ($username && $password && $employee && $this->emp_model->validate_user($username, $password, $employee)) {
            redirect('employee/profile');
        } else if ($username && $password && $employee && $this->emp_model->validate_user($username, $password, $admin)){
            redirect('admin/add_project');
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
        $data['designation'] = $this->session->userdata('designation');
        $data['plocation'] = $this->session->userdata('plocation');

        $data['results'] = $this->emp_model->view_skills($username);

        $data['proj'] = $this->emp_model->my_project($username);

        $data['pics'] = $this->emp_model->get_image($username);

        $this->load->view('profile', $data);
    }

    /*
     * PROJECT
     */

    function projects() {
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');
        $data['designation'] = $this->session->userdata('designation');
        $data['pSkills'] = $this->emp_model->view_projskills($username);


        $data['pics'] = $this->emp_model->get_image($username);
        $this->load->view('projects', $data);
    }

    function my_projects() {
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');        
        $data['designation'] = $this->session->userdata('designation');

        $data['results'] = $this->emp_model->my_project($username);
        $data['project'] = $this->emp_model->all_project($username);
        $data['skills'] = $this->emp_model->project_skills();



        $data['pics'] = $this->emp_model->get_image($username);
        $this->load->view('my_projects', $data);
    }

    function show_projects() {
        $data['projects'] = $this->emp_model->show_projects();
        $this->load->view('projects', $data);
    }

    /*
     * CALENDAR
     */

    function settings() {
        $this->load->view('settings');
    }

    function show_user_id() {
        $id = $this->uri->segment(3);
        $data['users'] = $this->emp_model->show_users($id);
        $this->load->view('settings', $data);
    }

    function update_user_id() {
        $id = $this->input->post('did');
        $data = array(
            'Student_Name' => $this->input->post('dname'),
            'Student_Email' => $this->input->post('demail'),
            'Student_Mobile' => $this->input->post('dmobile'),
            'Student_Address' => $this->input->post('daddress')
        );
        $this->emp_model->update_user($id, $data);
        $this->show_user_id();
    }

}
