<?php

class model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    public function insertUser($data) {
        return $this->db->insert('users', $data);
    }

    public function insertProjects($data) {
        return $this->db->insert('projects', $data);
    }

// Read data using username and password
    public function login($data) {

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('users u', 'empskillslist esl', 'empwithskills ews');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function read_user_information($username) {

        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        $this->db->select('*');
        $this->db->from('empskillslist esl', 'empwithskills ews');
        $query2 = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }

        if ($query2->num_rows() == 1) {
            return $query2->result();
        } else {
            return false;
        }
    }

    public function record_count() {
        return $this->db->count_all('users');
    }

    public function fetch_data($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('users');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function show_users() {
        $query = $this->db->get('users');
        $query_result = $query->result();
        return $query_result;
    }

    public function show_user_data($data) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $data);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function update_user_data($username, $data) {
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }

    public function getSkills() {
        $this->db->select("skillName");
        $this->db->from('emps9killslist');
        $query = $this->db->get();
        return $query;
    }

    public function projAlloc($username) {

        $this->db->select('users.username, empskillslist.skillName');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->join('empwithskills', 'users.username=empwithskills.empID', 'left');
        $this->db->join('empskillslist', 'empwithskills.skillsID=empskillslist.skillsID', 'left');
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;




        /* SELECT users.username, empskillslist.skillName
          FROM users
          LEFT JOIN empwithskills
          ON users.username=empwithskills.empID
          LEFT JOIN empskillslist
          ON empwithskills.skillsID=empskillslist.skillsID; */
    }

    var $details;

    function validate_user($username, $password) {
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $login = $this->db->get()->result();

        if (is_array($login) && count($login) == 1) {
            $this->details = $login[0];
            $this->set_session();
            return true;
        }

        return false;
    }

    function view_skills() {
        $this->db->select('skillName');
        $this->db->from('skillList l');
        $this->db->join('users u', 'l.userID = u.id');;
        $query = $this->db->get();
        $result = $query->result();  
        return $result;
    }

    function set_session() {
        $this->session->set_userdata(array(
            'username' => $this->details->username,
            'name' => $this->details->fname . ' ' . $this->details->lname,
            'email' => $this->details->email,
            'location' => $this->details->location,
            'department' => $this->details->department,
            'logged_in' => true,
            
                )
        );
    }

}

?>