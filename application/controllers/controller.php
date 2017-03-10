<?php

class controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->database();
        $this->load->model('model');
    }

    public function assignProject() {
        $data['projects'] = $this->model->getAll('projects');
        $data['users'] = $this->model->getAll('users');

        if ($_POST) {
            $this->model->assignUser($_POST);
            $data['success'] = 'User Assigned';
            $this->load->view('assignProjects', $data);
        } else {
            $this->load->view('assignProjects', $data);
        }
    }

}

?>