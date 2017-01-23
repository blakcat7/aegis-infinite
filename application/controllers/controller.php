<?php

class controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->database();
        $this->load->model('model');
        $this->load->library('pagination');
    }

    public function index() {
        $this->load->view('login');
    }

    public function admin_login() {
        $this->load->view('admin-login');
    }

    public function login() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('profile');
            } else {
                $this->load->view('login');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $this->load->model('model');
            $result = $this->model->login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
                $result = $this->model->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->username,
                        'email' => $result[0]->email,
                        'fname' => $result[0]->fname,
                        'lname' => $result[0]->lname,
                        'sector' => $result[0]->sector,
                        'location' => $result[0]->location
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('profile');
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login', $data);
            }
        }
    }

// Logout from admin page
    public function logout() {

// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->load->view('login');
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
            $this->load->view('add-employees');
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
                redirect('controller/add_employees');
            }

            $this->load->view('add-employees', $data);
        }
    }

    public function add_project() {
//Including validation library
        $this->load->library('form_validation');

        $this->load->helper('url');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

//Validating Name Field
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[25]');
//$this->form_validation->set_rules('description', 'Description', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('endDate', 'End Date', 'callback_checkDateFormat');
//$this->form_validation->set_rules('startDate', 'Start Date', 'callback_checkDateFormat');
        $this->form_validation->set_rules('skillsRequired', 'Skills Required', 'required|min_length[1]|max_length[55]');

        if ($this->form_validation->run() == FALSE) {
            /* echo "<script type='text/javascript'>
              alert('Please Enter correct values in yyyy/mm/dd Format');
              </script>"; */
            $this->load->view('add-projects');
        } else {
//Setting values for tabel columns
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
                $this->session->set_flashdata('<div class="alert alert-success" role="alert">Success! New Project has been added.</div>');
                redirect('controller/add_project');
            }
//Transfering data to Model
//$data['message'] = 'Data Inserted Successfully';
//Loading View
            $this->load->view('add-projects', $data);
        }
    }

// Check date format, if input date is valid return TRUE else returned FALSE.
    function checkDateFormat($date) {
        if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $date)) {
            return true;
        } else {
            return false;
        }
    }

    public function view_employees() {
        $this->pagination();
    }

    function pagination() {
        $config = array();
        $config['base_url'] = base_url() . "controller/pagination";
        $total_row = $this->model->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 8;
        $config['uri_segment'] = 3;
        /* $config['use_page_numbers'] = TRUE; */
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data["results"] = $this->model->fetch_data($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

// View data according to array.
        $this->load->view("view-employees", $data);
    }

    function show_user_data() {
        $id = $this->uri->segment(3);
        $data['users'] = $this->model->show_users();
        $data['editUsers'] = $this->model->show_user_data($id);
        $this->load->view('edit-employees', $data);
    }

    function update_user_data() {
        $id = $this->input->post('username');
        $data = array (
        'location' => $this->input->post('location'),
        'fname' => $this->input->post('fname'),
        'lname' => $this->input->post('lname'),
        'role' => $this->input->post('role'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'sector' => $this->input->post('sector'),
        );
        
        $this->model->update_user_data($id, $data);
        $this->update_user_data();
    }
    
    public function delete() {
        $data['results'] = $this->model->show_users();
        $this->load->view('view-employees', $data);
    }
    
    function delete_row($username) {
        $this->db->where('username', $username);
        $this->db->delete('users');
        redirect('controller/delete');
    }

}

?>