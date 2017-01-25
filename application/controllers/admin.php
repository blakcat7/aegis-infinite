<?php

class admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model('model');
        $this->load->library('pagination');
    }

    public function add_employee() {

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Repeat Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('add-employees');
            $this->load->view('footer');
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
            );
            if ($this->model->insertUser($data)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Success! New Employee has been added.</div>');
                redirect('admin/add_employee');
            }
            $this->load->view('add-employees', $data);
        }
    }

    public function add_project() {
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[25]');
        //$this->form_validation->set_rules('endDate', 'End Date', 'callback_checkDateFormat');
        $this->form_validation->set_rules('skillsRequired', 'Skills Required', 'min_length[1]|max_length[55]');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $data['skills'] = $this->model->getSkills();
     
            $this->load->view('header');
            $this->load->view('add-projects', $data);
            $this->load->view('footer');
        } else { 
            $data = array(
                'title' => $this->input->post('title'),
                'endDate' => $this->input->post('endDate'),
                'startDate' => $this->input->post('startDate'),
                'skillsRequired' => $this->input->post('skillsRequired'),
                'description' => $this->input->post('description'),
                'projectType' => $this->input->post('projectType'),
                'projLocation' => $this->input->post('projLocation'),
            );

            if ($this->model->insertProjects($data)) {
                $this->session->set_flashdata('msg-p', '<div class="alert alert-success" role="alert">Success! New Project has been added.</div>');
                redirect('admin/add_project');
            }
            $this->load->view('add-projects', $data);
        }
    }
    

}

?>