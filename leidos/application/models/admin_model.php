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

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function getLatestID() {
        return $this->db->insert_id();
    }

    public function insertSkills($data) {
        return $this->db->insert('projects_skills', $data);
    }

    public function insertRecEmp($data) {
        $this->db->insert('projects_users', $data);
    }

    public function showProjects() {
        $sql = $this->db->query("SELECT MAX(projectID) as projectID FROM projects");
        return $sql->row_array();
    }

    public function record_count() {
        return $this->db->count_all('users');
    }

    public function getSkills() {
        $this->db->select('*');
        $this->db->from('skills');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return false;
    }

    public function getPM() {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->where('u.role', 'Project Manager');
        $this->db->where('u.availability', 'Available');
        $query = $this->db->get();

        $result = array();
        if ($query->num_rows() >= 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
    }

    public function get_manager($id) {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('projects_users p', 'u.userID = p.userID');
        $this->db->where('u.role', 'Project Manager');
        $this->db->where('u.availability', 'Available');
        $this->db->where('p.userID !=', $id);
        $query = $this->db->get();

        $result = array();
        if ($query->num_rows() >= 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
    }

    public function get_employee($id) {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('projects_users p', 'u.userID = p.userID');
        $this->db->where('u.role', 'Employee');
        $this->db->where('u.availability', 'Available');
        $this->db->where('p.userID !=', $id);
        $query = $this->db->get();

        $result = array();
        if ($query->num_rows() >= 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
    }

    public function getUsers($id) {
        $this->db->select('*');
        $this->db->from('users_skills e');
        $this->db->join('projects_skills p', 'e.skillsID = p.skillsID');
        $this->db->join('users u', 'u.userID = e.userID');
        $this->db->join('skills s', 's.skillsID = e.skillsID');
        $this->db->where('p.projectID', $id);
        $this->db->where('u.availability !=', 'Unavailable');
        $this->db->group_by('e.userID');
        $this->db->order_by('e.percentage', 'desc');
        $query = $this->db->get();
        $result = array();
        if ($query->num_rows() >= 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return $result;
    }

    public function getID() {
        $this->db->select_max('projectID');
        $this->db->from('projects');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
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

    public function get_alert($id) {
        $this->db->select('*');
        $this->db->from('request_temp r');
        $this->db->join('projects p', 'p.projectID = r.projectID');
        $this->db->group_by('p.projectID');
        $this->db->where('r.userID', $id);
        $query = $this->db->get();
        $result = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return $result;
    }

    public function get_requests() {
        $this->db->select('*');
        $this->db->from('request_temp r');
        $this->db->join('projects p', 'p.projectID = r.projectID');
        $query = $this->db->get();

        $result = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return $result;
    }

    public function delete($id, $pid) {
        $this->db->where('userID', $id);
        $this->db->where('projectID', $pid);
        $this->db->delete('request_temp');
    }

    public function get_user_skills($id) {
        $this->db->select('*');
        $this->db->from('skills s');
        $this->db->join('users_skills us', 'us.skillsID = s.skillsID');
        $this->db->join('users u', 'u.userID = us.userID');
        $this->db->where('u.userID', $id);
        $query = $this->db->get();

        $result = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return $result;
    }

    function delete_row($field, $table, $username) {
        $this->db->where($field, $username);
        $this->db->delete($table);
    }

    function delete_skill() {
        $pid = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        
        $this->db->where('projectID', $pid);
        $this->db->where('skillsID', $id);
        $this->db->delete('projects_skills');
    }
    
    public function update_skills() {
        $id = $this->input->post('txt_hidden');
        $field = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'projLocation' => $this->input->post('projLocation'),
            'projectType' => $this->input->post('projectType'),
            'startDate' => $this->input->post('startDate'),
            'endDate' => $this->input->post('endDate'),
            'budget' => $this->input->post('budget')
        );

        $this->db->where('projectID', $id);
        $this->db->update('projects', $field);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_skills() {
        $skill = $this->input->post('skills');
        $id = $this->input->post('txt_hidden');

        foreach ($skill as $skills) {
            $field = array(
                'projectID' => $id,
                'skillsID' => $skills
            );
            $this->db->where('projectID', $id);
            $this->db->insert('projects_skills', $field);
        }
    }

}

?>