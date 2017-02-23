<?php

class admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertUser($data) {

        return $this->db->insert('users', $data);
    }

    public function insertProjects($data) {
        return $this->db->insert('projects', $data);
        
    }

    public function insertSkills($data) {
          $this->db->insert('projectskillslist', $data);
    /*    $this->db->insert('projectskillslist', $data);
        $this->db->where('projectID', $projectID);
        $this->db->where('skillsID', $skillsID); */
    }

    public function showProjects() {
        $sql = $this->db->query("SELECT MAX(projectID) as projectID FROM projects");
        return $sql->row_array();
    }

    public function showSkills() {
        $this->db->select('skillsID');
        $this->db->from('empskillslist');
        $this->db->get()->result();
    }

    public function record_count() {
        return $this->db->count_all('users');
    }

    public function getSkills() {
        $this->db->select('skillName');
        $this->db->from('empskillslist');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('users');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function count_project() {
        return $this->db->count_all('projects');
    }

    public function fetch_projects($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('projects');


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

}

?>