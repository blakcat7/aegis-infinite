<?php

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->library('database');
        $this->load->helper(array('url'));
        //   $this->load->model('test_model');
    }

    public function index() {
        //echo "hello";die;
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        $data['result'] = $query->result();
        $this->load->view('testView', $data);
    }

    public function deleteDomain($username) {
        //echo $username;die;
        $this->db->where('username', $username);
        $this->db->delete('users');
        die;
    }

    public function updateDomain($username) {
        $data = array('subdomain_name' => $this->input->post('domain_name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),            
            'location' => $this->input->post('location'),
        );
        //echo "<pre>";
        //print_r($data);die;
        $this->db->where('username', $username);
        $this->db->update('users', $data);
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->from('users');
        $query = $this->db->get();
        $result = $query->result();
        //print_r($result );
        //echo $result[0]->id;die;
        echo $html = "<tr id='domain" . $username . "'>                  
                    <td style='width:360px'>" . $result[0]->fname . "</td>
                    <td style='width:360px'>" . $result[0]->lname . "</td>
                    <td style='width:360px'>" . $result[0]->email . "</td>
                    <td style='width:360px'>" . $result[0]->location . "</td>
                    <td style='width:360px'>                   
                    <a href='javascript:void(0)' title='Edit' onclick='editDomain(" . $username . ")' class='icon-1 info-tooltip'>Edit</a>
                    <a href='javascript:void(0)' onclick='deleteDomain(" . $username . ")'  title='Delete' class='icon-2 info-tooltip'>Delete</a>
                <a href='javascript:void(0) class='hide' id='" . $username . "'></a>                    
                </td>              
                </tr>";
    }

    public function editDomain($username) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->result();
        //print_r($result );die;
        echo $html = '
            <td colspan="10" class="updatedData' . $username . '">
            <form method="POST" role="form" id="myForm' . $result[0]->username . '">     
            <input type="text" name="user_name" class="inp-form" value="' . $result[0]->fname . '">
            <input type="text" name="contact_no" class="inp-form" value="' . $result[0]->lname . '">
            <input type="text" name="email" class="inp-form" value="' . $result[0]->email . '">
            <input type="text" name="price" class="inp-form" value="' . $result[0]->location . '">                
            <input type="button" value="Update" onclick="updateDomain(' . $result[0]->username . ')" class="form-submit" />                  
            <a href=""   title="Cancel" >Cancel</a>
            <a href="javascript:void(0)" class="hide" id="hide' . $result[0]->username . '">Please wait...</a>           
</form>
    </td>
                ';
        die;
    }

}
