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
        return $this->db->insert('project', $data);
    }

// Read data using username and password
    public function login($data) {

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->row() == 1) {
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

        if ($query->num_rows() == 1) {
            return $query->result();
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
        $this->db->from('empskillslist');
        $query = $this->db->get();
        return $query;
    }

}

?>