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
        $this->profile();
    }

    function profile() {
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['userID'] = $id;
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
        $data['count_notif'] = $this->emp_model->count_notif($id, 'request_temp', 'userID');

        $this->load->view('employee/profile/profile', $data);
    }

    function all_projects() {
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['userID'] = $id;
        $data['username'] = $username;
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['location'] = $this->session->userdata('location');
        $data['designation'] = $this->session->userdata('designation');
        $data['availability'] = $this->session->userdata('availability');
        $data['pSkills'] = $this->emp_model->view_projskills($username);
        $data['projects'] = $this->emp_model->view_project_skills($id);
        $data['pics'] = $this->emp_model->get_image($username);
        $data['notif'] = $this->admin_model->get_alert($id);
        $data['count_notif'] = $this->emp_model->count_notif($id, 'request_temp', 'userID');
        $this->load->view('employee/projects/all-projects', $data);
    }

    function interested() {
        $p = $this->uri->segment(3);
        $u = $this->session->userdata('userID');
        $m = $this->uri->segment(4);

        $data = array(
            'projectID' => $p,
            'userID' => $u,
            'pmID' => $m
        );

        $this->admin_model->insert('interested_temp', $data);
        redirect('employee/all_projects');
    }

    function my_projects() {
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['userID'] = $id;
        $data['username'] = $username;
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['location'] = $this->session->userdata('location');
        $data['designation'] = $this->session->userdata('designation');
        $data['availability'] = $this->session->userdata('availability');

        $data['results'] = $this->emp_model->my_project($username);
        $data['project'] = $this->emp_model->all_project($username);
        $data['pics'] = $this->emp_model->get_image($username);
        $data['notif'] = $this->admin_model->get_alert($id);
        $data['count_notif'] = $this->emp_model->count_notif($id, 'request_temp', 'userID');

        $this->load->view('employee/projects/my-projects', $data);
    }

    function show_projects() {
        $data['projects'] = $this->emp_model->show_projects();
        $this->load->view('projects', $data);
    }

    function edit_info() {
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');
        $data['designation'] = $this->session->userdata('designation');
        $data['availability'] = $this->session->userdata('availability');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['userID'] = $this->session->userdata('userID');

        $data['results'] = $this->emp_model->my_project($username);
        $data['project'] = $this->emp_model->all_project($username);
        $data['pics'] = $this->emp_model->get_image($username);
        $data['blog'] = $this->emp_model->get_id('username', 'users', $username);
        $data['notif'] = $this->admin_model->get_alert($id);
        $data['count_notif'] = $this->emp_model->count_notif($id, 'request_temp', 'userID');

        $this->load->view('employee/profile/edit-info', $data);
    }

    function edit_skills() {
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['results'] = $this->emp_model->my_project($username);
        $data['project'] = $this->emp_model->all_project($username);
        $data['pics'] = $this->emp_model->get_image($username);
        $data['skills'] = $this->admin_model->fetch_skills();
        $data['get_skills'] = $this->admin_model->get_user_skills($id);
        $data['blog'] = $this->emp_model->get_id('username', 'users', $username);
        $data['notif'] = $this->admin_model->get_alert($id);
        $data['count_notif'] = $this->emp_model->count_notif($id, 'request_temp', 'userID');

        $this->load->view('employee/profile/edit-skills', $data);
    }

    function insert_skills() {
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');

        $data['results'] = $this->emp_model->my_project($username);
        $data['project'] = $this->emp_model->all_project($username);
        $data['pics'] = $this->emp_model->get_image($username);

        $data['skills'] = $this->admin_model->fetch_skills();
        $data['get_skills'] = $this->admin_model->get_user_skills($id);
        $data['blog'] = $this->emp_model->get_id('username', 'users', $username);
        $data['notif'] = $this->admin_model->get_alert($id);
        $data['count_notif'] = $this->emp_model->count_notif($id, 'request_temp', 'userID');
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

    function view_users() {
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $id = $this->uri->segment(3);
        $data['viewUsers'] = $this->emp_model->view_users($id);
        $data['viewSkills'] = $this->emp_model->view_skills($id);
        $data['viewProjects'] = $this->emp_model->my_project($id);
        $data['notif'] = $this->admin_model->get_alert($id);
        $data['count_notif'] = $this->emp_model->count_notif($id, 'request_temp', 'userID');
        $this->load->view('view', $data);
    }

    public function request() {
        $data = array(
            'projectID' => $this->uri->segment(3),
            'userID' => $this->uri->segment(4)
        );
        $this->admin_model->insert('request_temp', $data);
        redirect('employee/my_projects');
    }

    function insert_row() {
        $p = $this->uri->segment(3);
        $u = $this->session->userdata('userID');
        $m = $this->uri->segment(4);

        $data = array(
            'projectID' => $p,
            'userID' => $u,
            'pmID' => $m
        );

        $this->admin_model->insert('projects_users', $data);
        $this->admin_model->delete($u, $p, 'request_temp');
        redirect('employee/my_projects');
    }

    function delete_skills($id) {
        $this->admin_model->delete_row('skillsID', 'users_skills', $id);
        redirect('employee/edit_skills');
    }

    function view_projects() {
        $id = $this->uri->segment(3);
        $user = $this->input->post('user');
        $username = $this->session->userdata('username');

        $userID = $this->session->userdata('userID');
        $data['userID'] = $userID;
        $data['username'] = $username;
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['role'] = $this->session->userdata('role');
        $data['sector'] = $this->session->userdata('sector');
        $data['location'] = $this->session->userdata('location');
        $data['designation'] = $this->session->userdata('designation');
        $data['availability'] = $this->session->userdata('availability');

        $data['viewProjects'] = $this->emp_model->view_projects($id);
        $data['viewSkills'] = $this->emp_model->project_skills($id);
        $data['viewManager'] = $this->emp_model->view_staffs($id, 'Project Manager', 'Management');
        $data['viewEmployees'] = $this->emp_model->view_staffs($id, 'Employee', 'Developer');
        $data['pmanager'] = $this->admin_model->fetch_manager($user);
        $data['employee'] = $this->admin_model->fetch_employee($user);
        $data['notif'] = $this->admin_model->get_alert($userID);
        $data['count_notif'] = $this->emp_model->count_notif($userID, 'request_temp', 'userID');
        $data['pics'] = $this->emp_model->get_image($username);


        $data['skills'] = $this->admin_model->fetch_skills();
        $this->load->view('employee/projects/view-projects', $data);
    }

    function edit_projects() {
        $id = $this->uri->segment(3);
        $user = $this->input->post('user');
        $category = array('Developer', 'Designer', 'Quality', 'Sales', 'Management');

        $userID = $this->session->userdata('userID');
        $data['userID'] = $userID;
        $data['userID'] = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['username'] = $username;
        $data['email'] = $this->session->userdata('email');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        ;
        $data['location'] = $this->session->userdata('location');
        $data['designation'] = $this->session->userdata('designation');
        $data['pics'] = $this->emp_model->get_image($username);
        $data['availability'] = $this->session->userdata('availability');

        $data['notif'] = $this->admin_model->get_alert($userID);
        $data['count_notif'] = $this->emp_model->count_notif($userID, 'request_temp', 'userID');
        $data['viewProjects'] = $this->emp_model->view_projects($id);
        $data['viewSkills'] = $this->emp_model->project_skills($id);
        $data['viewManager'] = $this->emp_model->view_manager($id, 'Project Manager');
        $data['developer'] = $this->emp_model->view_staffs($id, 'Employee', 'Developer');
        $data['designer'] = $this->emp_model->view_staffs($id, 'Employee', 'Designer');
        $data['quality'] = $this->emp_model->view_staffs($id, 'Employee', 'Quality');
        $data['sales'] = $this->emp_model->view_staffs($id, 'Employee', 'Sales');
        $data['pmanager'] = $this->admin_model->fetch_manager();
        $data['employee'] = $this->admin_model->fetch_recommended_user($id);
        $data['skills'] = $this->admin_model->fetch_skills();

        $this->load->view('employee/projects/edit-projects', $data);
    }

    function update_project() {
        $id = $this->uri->segment(3);
        $this->emp_model->update_project();
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Basic info has been updated</div>');
        redirect('employee/edit_projects/' . $id);
    }

    public function add_project_skills() {
        $id = $this->uri->segment(3);
        $this->admin_model->add_skills();
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been added</div>');
        redirect('employee/edit_projects/' . $id);
    }

    public function add_managers() {
        $id = $this->uri->segment(3);
        $pid = $this->input->post('txt_hidden');
        $users = $this->input->post('recommended');

        foreach ($users as $user) {
            $data = array(
                'projectID' => $this->input->post('txt_hidden'),
                'userID' => $user
            );
            $id = $this->admin_model->insert('request_temp', $data);
        }
        redirect('employee/edit_projects/' . $pid);
    }

    public function add_employee() {
        $id = $this->uri->segment(3);
        $pid = $this->input->post('txt_hidden');
        $users = $this->input->post('recommended_e');

        foreach ($users as $user) {
            $data = array(
                'projectID' => $pid,
                'userID' => $user
            );
            $id = $this->admin_model->insert('request_temp', $data);
        }
        redirect('employee/edit_projects/' . $pid);
    }

    function delete_project_skills($pid, $id) {
        $this->admin_model->delete_skill($pid, $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been deleted</div>');
        redirect('employee/edit_projects/' . $pid);
    }

    function delete_row() {
        $pid = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $this->admin_model->delete($id, $pid, 'request_temp');

        redirect('employee/my_projects');
    }

    function delete_staff() {
        $pid = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $this->admin_model->delete($id, $pid, 'projects_users');

        redirect('employee/edit_projects/' . $pid);
    }
    
        function view_notifications() {
        $id = $this->session->userdata('userID');
        $username = $this->session->userdata('username');
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $data['location'] = $this->session->userdata('location');
        $data['designation'] = $this->session->userdata('designation');
        $data['availability'] = $this->session->userdata('availability');
        $data['pics'] = $this->emp_model->get_image($username);
        $data['userID'] = $id;
        $data['notif'] = $this->admin_model->get_alert($id);
        $data['count_notif'] = $this->emp_model->count_notif($id, 'request_temp', 'userID');        
        $data['view_notif'] = $this->admin_model->view_notifications($id, 'request_temp', 'userID');
        
        $this->load->view('employee/assets/notifications', $data);
    }

}
