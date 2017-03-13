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

    /*
     *  EMPLOYEE
     */

    public function add_employee() {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Repeat Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
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
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'sector' => $this->input->post('sector'),
                'designation' => $this->input->post('designation'),
                'picture' => 'default.jpg'
            );
            if ($this->admin_model->insert('users', $data)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! New Employee has been added.</div>');
                redirect('admin/add_employee');
            }
            $this->load->view('admin/employees/add-employees', $data);
        }
    }

    public function view_employees() {
        $this->page();
    }

    function page() {
        $config = array();
        $config['base_url'] = base_url() . 'admin/page';
        $total_row = $this->admin_model->record_count();
        $config['total_rows'] = $total_row;
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        /* $config['use_page_numbers'] = TRUE; */
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data['results'] = $this->admin_model->fetch_users($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;', $str_links);

// View data according to array.
        $this->load->view('admin/employees/view-employees', $data);
    }

    public function delete() {
        $data['results'] = $this->model->show_users();
        $this->load->view('admin/employees/view-employees', $data);
    }

    function delete_row($username) {
        $this->db->where('username', $username);
        $this->db->delete('users');
        redirect('admin/view_employees');
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
        
        $username = $this->session->userdata('username');
        $data['username'] = $username;

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[25]');

        $this->form_validation->set_rules('skillsRequired', 'Skills Required', 'min_length[1]|max_length[55]');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


        $data = array();
        $query = $this->admin_model->getSkills();

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

                foreach ($skills as $skill){
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
        $lid = $this->admin_model->getID();

        foreach ($lid as $id) {
            $last_id = $id['projectID'];
        }

        $data['users'] = $this->admin_model->getUsers($last_id);
        $data['pmanager'] = $this->admin_model->getPM();
        
        $this->load->view('admin/projects/rec-employee', $data);

        if ($_POST) {
            $users = $this->input->post('recommended');
            foreach ($users as $user){
                $data = array(
                    'projectID' => $last_id,
                    'userID' => $user
                );
                $id = $this->admin_model->insertRecEmp($data);
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! New Project has been added.</div>');
            redirect('admin/add_project');
        }
    }
    
        public function recommend_managers() {
        $lid = $this->admin_model->getID();

        foreach ($lid as $id) {
            $last_id = $id['projectID'];
        }
        
        $data['pmanager'] = $this->admin_model->getPM();
        
        $this->load->view('admin/projects/rec-projectmanager', $data);

        if ($_POST) {
            $users = $this->input->post('recommended');
            foreach ($users as $user){
                $data = array(
                    'projectID' => $last_id,
                    'userID' => $user
                );
                $id = $this->admin_model->insertRecEmp($data);
            }

            redirect('admin/recommend_users');
        }
    }

    public function view_projects() {
        $this->ppage();
    }

    function ppage() {
        $config = array();
        $config['base_url'] = base_url() . 'admin/ppage';
        $total_row = $this->admin_model->count_project();
        $config['total_rows'] = $total_row;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        /* $config['use_page_numbers'] = TRUE; */
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data['results'] = $this->admin_model->fetch_projects($config['per_page'], $page);
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;', $str_links);

// View data according to array.
        $this->load->view('admin/projects/view-projects', $data);
    }

}

?>