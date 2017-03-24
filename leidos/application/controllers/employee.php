<?php

class employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'file'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model(array('emp_model', 'admin_model'));
    }
    
    function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('employee/profile');
        } else {
            $this->login(false);
        }
    }

    function login($showError = false) {
        $data['error'] = $showError;
        $this->load->view('employee/profile/login', $data);
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
        } else if ($username && $password && $employee && $this->emp_model->validate_user($username, $password, $admin)) {
            redirect('admin/add_project');
        } else if ($username && $password && $employee && $this->emp_model->validate_user($username, $password, $manager)) {
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

    function viewSkills() {
        $data['skills'] = $this->emp_model->view_skills();
        $this->load->view('test', $data);
    }

    /*
     * PROFILE
     */

    function profile() {
        $id = $this->session->userdata('userID');
        $data['userID'] = $id;
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

        $data['notif'] = $this->admin_model->get_alert($id);

        $this->load->view('employee/profile/profile', $data);
    }

    /*
     * PROJECT
     */

    function projects() {
        $id = $this->session->userdata('userID');
        $data['userID'] = $id;
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

        $data['projects'] = $this->emp_model->view_project_skills($username);

        $data['notif'] = $this->admin_model->get_alert($id);
        $data['pics'] = $this->emp_model->get_image($username);
        $this->load->view('employee/projects/projects', $data);
    }

    function my_projects() {
        $id = $this->session->userdata('userID');
        $data['userID'] = $id;
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
        $data['notif'] = $this->admin_model->get_alert($id);
        $data['pics'] = $this->emp_model->get_image($username);
        $this->load->view('employee/projects/my_projects', $data);
    }

    function show_projects() {
        $data['projects'] = $this->emp_model->show_projects();
        $this->load->view('employee/projects/projects', $data);
    }

    /*
     * CALENDAR
     */

    function edit_info() {

        $id = $this->session->userdata('username');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['userID'] = $this->session->userdata('userID');
        $data['blog'] = $this->emp_model->get_id('username', 'users', $id);
        $this->load->view('employee/profile/edit-info', $data);
    }

    function edit_skills() {
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');

        $data['skills'] = $this->admin_model->getSkills();
        $data['get_skills'] = $this->admin_model->get_user_skills($id);
        $data['blog'] = $this->emp_model->get_id('username', 'users', $username);
        $this->load->view('employee/profile/edit-skills', $data);
    }

    function insert_skills() {
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');

        $data['skills'] = $this->admin_model->getSkills();
        $data['get_skills'] = $this->admin_model->get_user_skills($id);
        $data['blog'] = $this->emp_model->get_id('username', 'users', $username);
        $this->load->view('employee/profile/add-skills', $data);
    }

    public function update() {
        $this->emp_model->update();

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been updated</div>');
        redirect('employee/edit_info');
    }

    public function update_skills() {
        $this->emp_model->update_skills();

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been updated</div>');
        redirect('employee/edit_skills');
    }

    public function add_skills() {
        $this->emp_model->add_skills();

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been updated</div>');
        redirect('employee/insert_skills');
    }

    function image_resize($path, $file) {
        $config_resize = array();
        $config_resize['image_library'] = 'gd2';
        $config_resize['source_image'] = $path;
        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['new_image'] = './images/profilepics/thumbnails/' . $file;
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
        $this->load->view('employee/projects/view', $data);   
    }

    function search() {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->mymodel->search($keyword);
        $this->load->view('result_view', $data);
    }

    public function request() {
        $data = array(
            'projectID' => $this->uri->segment(3),
            'userID' => $this->uri->segment(4)
        );
        $this->admin_model->insert('request_temp', $data);
        redirect('employee/projects/my_projects');
    }

    function insert_row() {
        $p = $this->uri->segment(3);
        $u = $this->uri->segment(4);
        $data = array(
            'projectID' => $p,
            'userID' => $u
        );

        $this->admin_model->insert('projects_users', $data);
        $this->admin_model->delete($u, $p);
        redirect('employee/projects/my_projects');
    }

    function delete_skills($id) {
        $this->admin_model->delete_row('skillsID', 'users_skills', $id);
        redirect('employee/edit_skills');
    }

    function view_projects($id) {
        $data['userID'] = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');
        $data['designation'] = $this->session->userdata('designation');
        $data['pics'] = $this->emp_model->get_image($username);
        $data['availability'] = $this->session->userdata('availability');

        $data['viewProjects'] = $this->emp_model->view_projects($id);
        $data['viewSkills'] = $this->emp_model->project_skills($id);
        $data['viewManager'] = $this->emp_model->view_staffs($id, 'Project Manager');
        $data['viewEmployees'] = $this->emp_model->view_staffs($id, 'Employee');

        $this->load->view('employee/projects/view_projects', $data);
    }

}
