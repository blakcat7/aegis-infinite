<?php

class model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertUser($data) {
        return $this->db->insert("users", $data);
    }

    public function insertProjects($data) {
        return $this->db->insert("projects", $data);
    }

    public function viewEmployees() {
        $this->db->select('username, fname, lname, email');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

}

?>