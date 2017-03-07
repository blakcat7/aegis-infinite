<?php

class admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertUser($data) {

        return $this->db->insert('users', $data);
    }

    public function insertProjects($data) {
        $this->db->insert('projects', $data);
        return $this->db->insert_id();
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function insertSkills($data) {
        $this->db->insert('projectskillslist', $data);
    }

    public function showProjects() {
        $sql = $this->db->query("SELECT MAX(projectID) as projectID FROM projects");
        return $sql->row_array();
    }

    public function showSkills() {
        $this->db->select('skillName');
        $this->db->from('empskillslist');
        $this->db->get()->result_array();
    }

    public function record_count() {
        return $this->db->count_all('users');
    }

    public function getID() {
        $this->db->select_max('projectID');
        $this->db->from('projects');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return false;
    }

    public function getSkills() {
        $this->db->select('*');
        $this->db->from('empskillslist');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return false;
    }

    public function getUsers($data) {
        $query = $this->db->query('SELECT * FROM empwithskills  WHERE (skillsID) IN (SELECT skillsID FROM  projectskillslist WHERE projectID=' . $data . ')');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return false;
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