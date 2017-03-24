<?php

class admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model(array('emp_model', 'admin_model'));
        $this->load->library('pagination');
    }

    function index() {
        $this->dashboard();
    }

    /*
     *  EMPLOYEE
     */

    public function add_employee() {

        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[2]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Repeat Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/employees/add-employees');
        } else {
            $data = array(
                'location' => $this->input->post('location'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'role' => $this->input->post('role'),
                'email' => $this->input->post('email') . '@leidos.com',
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'sector' => $this->input->post('sector'),
                'designation' => $this->input->post('designation'),
                'picture' => 'default.jpg',
                'category' => $this->input->post('category'),
                'availability' => 'Available',
            );
            if ($this->admin_model->insert('users', $data)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! New Employee has been added.</div>');
                redirect('admin/add_employee');
            }
            $this->load->view('admin/employees/add-employees', $data);
        }
    }

    public function view_employees() {

        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $id = $this->uri->segment(3);
        $available = $this->admin_model->dashboard_employees_sort('Available');
        $unavailable = $this->admin_model->dashboard_employees_sort('Unavailable');
        $busy = $this->admin_model->dashboard_employees_sort('Busy');

        if ($id == '') {
            $data['results'] = $this->admin_model->fetch_users();
            $this->load->view('admin/employees/view-employees', $data);
        } else if ($id == 'Available' && $id != 'Unavailable' && $id != 'Busy') {
            $data['results'] = $available;
            $this->load->view('admin/employees/view-employees', $data);
        } else if ($id == 'Unavailable' && $id != 'Available' && $id != 'Busy') {
            $data1['results'] = $unavailable;
            $this->load->view('admin/employees/view-employees', $data1);
        } else if ($id == 'Busy' && $id != 'Available' && $id != 'Unavailable') {
            $data2['results'] = $busy;
            $this->load->view('admin/employees/view-employees', $data2);
        }
    }

    public function delete() {
        $data['results'] = $this->model->fetch_users();
        $this->load->view('admin/employees/view-employees', $data);
    }

    function delete_row($id) {
        $this->admin_model->delete_row('username', 'users', $id);
        redirect('admin/view_employees');
    }

    function delete_project($id) {
        $this->admin_model->delete_row('projectID', 'projects', $id);
        redirect('admin/view_projects');
    }

    public function edit_employee() {
        $this->load->view('admin/employees/edit-employees');
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

    /*
     *  PROJECTS
     */

    public function add_project() {

        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $username = $this->session->userdata('username');
        $data['username'] = $username;

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]');

        $this->form_validation->set_rules('skillsRequired', 'Skills Required', 'min_length[1]|max_length[55]');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


        $data = array();
        $query = $this->admin_model->fetch_skills();

        if ($query) {
            $data['skills'] = $query;
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/projects/add-projects', $data);
        } else {
            if ($_POST) {
                $data1 = array(
                    'title' => $this->input->post('title'),
                    'endDate' => $this->input->post('endDate'),
                    'startDate' => $this->input->post('startDate'),
                    'description' => $this->input->post('description'),
                    'projectType' => $this->input->post('projectType'),
                    'projLocation' => $this->input->post('projLocation'),
                    'budget' => $this->input->post('budget'),
                );

                $id = $this->admin_model->insert('projects', $data1);

                $skills = $this->input->post('skill');

                foreach ($skills as $skill) {
                    $data2 = array(
                        'projectID' => $id,
                        'skillsID' => $skill
                    );

                    $this->admin_model->insert('projects_skills', $data2);
                }

                redirect('admin/recommend_managers');
            }
        }
    }

    public function recommend_users() {

        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $lid = $this->admin_model->get_latest_id();

        foreach ($lid as $id) {
            $last_id = $id['projectID'];
        }

        $data['users'] = $this->admin_model->fetch_recommended_user($last_id);

        $this->load->view('admin/projects/rec-employee', $data);

        if ($_POST) {
            $users = $this->input->post('recommended');
            foreach ($users as $user) {
                $data = array(
                    'projectID' => $last_id,
                    'userID' => $user
                );
                $id = $this->admin_model->insert('request_temp', $data);
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! New Project has been added.</div>');
            $this->admin_model->delete_row('userID', 'request_temp', 'NULL');
            redirect('admin/add_project');
        }
    }

    public function recommend_managers() {

        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $lid = $this->admin_model->get_latest_id();

        foreach ($lid as $id) {
            $last_id = $id['projectID'];
        }

        $data['pmanager'] = $this->admin_model->fetch_manager();

        $this->load->view('admin/projects/rec-projectmanager', $data);

        if ($_POST) {
            $users = $this->input->post('recommended');
            foreach ($users as $user) {
                $data = array(
                    'projectID' => $last_id,
                    'userID' => $user
                );
                $id = $this->admin_model->insert('request_temp', $data);
            }
            $this->admin_model->delete_row('userID', 'request_temp', 'NULL');
            redirect('admin/recommend_users');
        }
    }

    public function add_member() {
        $pid = $this->input->post('txt_hidden');
        $users = $this->input->post('recommended');
        foreach ($users as $user) {
            $data = array(
                'projectID' => $pid,
                'userID' => $user
            );
            $this->admin_model->insert('request_temp', $data);
        }
        redirect('admin/edit_project/' . $pid);
    }

    public function view_projects() {

        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $id = $this->uri->segment(3);
        $ongoing = $this->admin_model->dashboard_projects_sort('Ongoing');
        $completed = $this->admin_model->dashboard_projects_sort('Completed');
        if ($id == '') {
            $data['results'] = $this->admin_model->fetch_projects();
            $this->load->view('admin/projects/view-projects', $data);
        } else if ($id = 'Ongoing' && $id != 'Completed') {
            $data['postie'] = $ongoing;
            $this->load->view('admin/assets/dashboard-projects', $data);
        } else if ($id = 'Completed' && $id != 'Ongoing') {
            $data1['postie'] = $completed;
            $this->load->view('admin/assets/dashboard-projects', $data1);
        }
    }

    function notifications() {
        $data = array();
        $data['notif'] = $this->admin_model->get_requests();
        $this->load->view('admin/assets/notifications', $data);
    }

    function view_profile() {

        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $id = $this->uri->segment(3);
        $data['viewUsers'] = $this->emp_model->view_users($id);
        $data['viewSkills'] = $this->emp_model->view_skills($id);
        $data['viewProjects'] = $this->emp_model->my_project($id);

        $this->load->view('admin/employees/edit-employees', $data);
    }

    public function update() {
        $pid = $this->input->post('username');
        $this->emp_model->update();
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Basic info has been updated</div>');
        redirect('admin/view_profile/' . $pid);
    }

    function edit_project() {
        $id = $this->uri->segment(3);
        $user = $this->input->post('user');
        $category = 'Developer' || 'Designer' || 'Quality' || 'Sales' || 'Marketing';

        $data['pmanager'] = $this->admin_model->fetch_manager($user);
        $data['employee'] = $this->admin_model->fetch_employee();
        $data['viewProjects'] = $this->emp_model->view_projects($id);
        $data['viewSkills'] = $this->emp_model->project_skills($id);
        $data['viewManager'] = $this->emp_model->view_manager($id, 'Project Manager');
        $data['developer'] = $this->emp_model->view_staffs($id, 'Employee', 'Developer');
        $data['designer'] = $this->emp_model->view_staffs($id, 'Employee', 'Designer');
        $data['quality'] = $this->emp_model->view_staffs($id, 'Employee', 'Quality');
        $data['sales'] = $this->emp_model->view_staffs($id, 'Employee', 'Sales');
        $data['skills'] = $this->admin_model->fetch_skills();
        $this->load->view('admin/projects/edit-projects', $data);
    }

    function update_project() {

        $pid = $this->input->post('txt_hidden');
        $this->emp_model->update_project();
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Basic info has been updated</div>');
        redirect('admin/edit_project/' . $pid);
    }

    function update_skills() {
        $pid = $this->input->post('txt_hidden');
        $this->admin_model->update_skills();
        redirect('admin/edit_project/' . $pid);
    }

    public function add_skills() {
        $pid = $this->input->post('txt_hidden');
        $this->admin_model->add_skills();

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been added</div>');
        redirect('admin/edit_project/' . $pid);
    }

    function delete_skills($id) {
        $pid = $this->uri->segment(4);
        $this->admin_model->delete_row('skillsID', 'projects_skills', $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been deleted</div>');
        redirect('admin/edit_project/' . $pid);
    }

    function dashboard() {

        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');
        $ongoing = 'Ongoing';
        $completed = 'Completed';

        $available = 'Available';
        $unavailable = 'Unavailable';


        $data['ongoing'] = $this->admin_model->sort_projects($ongoing);
        $data['completed'] = $this->admin_model->sort_projects($completed);

        $data['available'] = $this->admin_model->sort_employee($available);
        $data['unavailable'] = $this->admin_model->sort_employee($unavailable);

        $data['count1'] = $this->admin_model->sort_project($ongoing);
        $data['count2'] = $this->admin_model->sort_project($completed);

        $data['count3'] = $this->admin_model->sort_employees($available);
        $data['count4'] = $this->admin_model->sort_employees($unavailable);
        $data['count5'] = $this->admin_model->sort_employees('Busy');

        $this->load->view('admin/assets/dashboard', $data);
    }

    function settings() {
        $data['fname'] = $this->session->userdata('fname');
        $data['lname'] = $this->session->userdata('lname');

        $data['skills'] = $this->admin_model->fetch_skills();
        $this->load->view('admin/assets/settings', $data);
    }

    function add_skill() {
        $data = array(
            'skillName' => $this->input->post('skill')
        );
        $this->admin_model->insert('skills', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been added</div>');
        redirect('admin/settings');
    }

    public function update_skill() {
        $this->admin_model->update_skill();
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! Skills has been updated</div>');
        redirect('admin/settings');
    }

    function delete_staff() {
        $pid = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $this->admin_model->delete($id, $pid, 'projects_users');

        redirect('admin/edit_project/' . $pid);
    }

}

?>