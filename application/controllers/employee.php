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
        } else if ($username && $password && $employee && $this->emp_model->validate_user($username, $password, $admin)) {
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
        $data['userID'] = $this->session->userdata('userID');
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
        $data['availability'] = $this->session->userdata('availability');

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

        $data['availability'] = $this->session->userdata('availability');
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

        $data['availability'] = $this->session->userdata('availability');

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
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $id = $this->session->userdata('username');
        $data['blog'] = $this->emp_model->get_id('username', 'users', $id);
        $this->load->view('settings', $data);
    }

    public function update() {
        $config = array();
        $config['upload_path'] = "/images/profilepics/";
        $config['allowed_types'] = "jpg|jpeg|png||gif";
        $config['max_size'] = '1024';

        $this->load->library('upload', $config);

        $this->upload->do_upload();
        $data = array('upload_data' => $this->upload->data());
        $this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
        $data1 = array(
            'picture' => $data['upload_data']['file_name'],
        );

        $this->emp_model->update();
        $this->emp_model->update_image($data1);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Basic Info has been updated</div>');
        redirect('employee/settings');
    }

    function image_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['new_image'] = './images/thumbnails' . $file;
        $this->load->library('image_lib', $config_resize);
        $this->image_lib->resize();
    }

    function view_users() {
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $id = $this->uri->segment(3);
        $data['viewUsers'] = $this->emp_model->view_users($id);
        $data['viewSkills'] = $this->emp_model->view_skills($id);
        $data['viewProjects'] = $this->emp_model->my_project($id);
        $this->load->view('view', $data);
    }

    function search() {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->mymodel->search($keyword);
        $this->load->view('result_view', $data);
    }

}
