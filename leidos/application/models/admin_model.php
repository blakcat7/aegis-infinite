<?php

class admin_model extends CI_Model {

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
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

    public function update_skill() {
        $skill = $this->input->post('skill');
        $array = array(
            'skillsID' => $this->input->post('skillsID')
        );

        $field = array(
            'skillName' => $skill
        );
        $this->db->where($array);
        $this->db->update('skills', $field);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
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

    public function delete($id, $pid, $table) {
        $this->db->where('userID', $id);
        $this->db->where('projectID', $pid);
        $this->db->delete($table);
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

    public function fetch_skills() {
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

    public function fetch_manager() {
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

    public function fetch_employee() {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->where('u.role', 'Employee');
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

    public function fetch_users() {
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $query->result_array();
    }

    public function fetch_recommended_user($id) {
        $this->db->select('u.*, s.*');
        $this->db->from('users_skills e');
        $this->db->join('projects_skills p', 'e.skillsID = p.skillsID');
        $this->db->join('users u', 'u.userID = e.userID');
        $this->db->join('skills s', 's.skillsID = e.skillsID');
        $this->db->join('request_temp r', 'r.pmID != u.userID');
        $this->db->where('r.userID !=', 'u.userID');
        $this->db->where('p.projectID', $id);
        $this->db->where('u.availability !=', 'Unavailable');
        $this->db->group_by('u.userID');
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

    public function get_latest_id() {
        $this->db->select_max('projectID');
        $this->db->from('projects');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function fetch_projects() {
        $query = $this->db->get('projects');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_alert($id) {
        $this->db->select('*');
        $this->db->from('request_temp r');
        $this->db->join('projects p', 'p.projectID = r.projectID');
        $this->db->where('r.userID', $id);
        $this->db->limit(5);
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

    function sort_projects($completion) {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('completion', $completion);
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

    function sort_employee($availability) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('availability', $availability);
        $this->db->where('role !=', 'Admin');
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

    function sort_project($completion) {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('completion', $completion);
        $query = $this->db->count_all_results();
        return $query;
    }

    function sort_employees($availability) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('availability', $availability);
        $this->db->where('role !=', 'Admin');
        $query = $this->db->count_all_results();
        return $query;
    }

    function dashboard_projects_sort($completion) {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('completion', $completion);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    function dashboard_employees_sort($availability) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('availability', $availability);
        $this->db->where('role !=', 'Admin');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $query->result_array();
    }

    function get_pm_id($pid) {
        $this->db->select('*');
        $this->db->from('request_temp');
        $this->db->where('projectID', $pid);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    function view_notifications($id, $table, $user) {
        $this->db->select('*');
        $this->db->from($table . ' r');
        $this->db->join('projects p', 'p.projectID = r.projectID');        
        $this->db->join('users u', 'u.userID = r.userID');
        $this->db->where('r.' . $user, $id);
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

}

?>