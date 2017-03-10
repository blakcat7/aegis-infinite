<?php

class emp_model extends CI_Model {

    var $details;

    function validate_user($username, $password, $role) {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->where('u.username', $username);
        $this->db->where('u.password', $password);
        $this->db->where('u.role', $role);
        $login = $this->db->get()->result();

        if (is_array($login) && count($login) == 1) {
            $this->details = $login[0];
            $this->set_session();
            return true;
        }

        return false;
    }

    function get_image($username) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $query = $this->db->get()->result();
        return $query;
    }

    function view_skills($username) {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('users_skills e', 'e.userID = u.userID', 'left');
        $this->db->join('skills s', 's.skillsID = e.skillsID', 'left');
        $this->db->where('u.username', $username);
        $this->db->order_by('e.percentage', 'desc');
        $this->db->limit('5');
        $query = $this->db->get();

        $result = $query->result_array();

        if ($query->num_rows() != 0) {
            return $result;
        } else {
            return false;
        }
    }

    function view_projskills($username) {
        //$this->db->distinct();
        $this->db->select('*');
        $this->db->from('projects_skills ps');
        $this->db->join('skills s', 's.skillsID = ps.skillsID', 'left');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('users_skills e', 'e.skillsID = s.skillsID');
        $this->db->join('users u', 'u.userID = e.userID');
        $this->db->order_by('ps.projectID', 'desc');
        $this->db->where('u.username', $username);

        $query = $this->db->get();
        $result = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
            return $result;
        }
        return $result;
    }

    function my_project($username) {
        $this->db->select('*');
        $this->db->from('projects p');
        $this->db->join('projects_users e', 'e.projectID = p.projectID', 'left');
        $this->db->join('users u', 'u.userID = e.userID', 'left');
        $this->db->where('u.username', $username);
        $this->db->order_by('p.projectID', 'desc');
        $query = $this->db->get();

        $result = $query->result_array();
        if ($query->num_rows() != 0) {
            return $result;
        } else {
            return $result;
        }
    }

    function all_project($username) {
        //$this->db->distinct();
        $this->db->select('*');
        $this->db->from('projects_skills ps');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('skills s', 's.skillsID = ps.skillsID', 'left');
        $this->db->where('`ps.skillsID` IN (SELECT `skillsID` FROM `users_skills` WHERE userID="' . $username . '")');
        $this->db->order_by('ps.projectID', 'asc');
        //$this->db->group_by('ps.skillsID');
        $this->db->group_by('ps.projectID');
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() > 1) {
            return $result;
        } else {
            return $result;
        }
    }

    function project_skills() {
        $this->db->select('*');
        $this->db->from('projects_skills ps');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('skills s', 's.skillsID = ps.skillsID');
        //$this->db->where('ps.projectID', 'e.projectID');
        $this->db->group_by('ps.skillsID');
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() > 1) {
            return $result;
        } else {
            return false;
        }
    }

    function set_session() {
        $this->session->set_userdata(array(
            'username' => $this->details->username,
            'fname' => $this->details->fname,
            'lname' => $this->details->lname,
            'email' => $this->details->email,
            'location' => $this->details->location,
            'sector' => $this->details->sector,
            'role' => $this->details->role,
            'skillName' => $this->details->skillName,
            'percentage' => $this->details->percentage,
            'designation' => $this->details->designation,
            'plocation' => $this->details->plocation,
            'logged_in' => true
                )
        );
    }

    function show_projects() {
        $this->db->get('projects');
    }

    function show_users($data) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function update_user($id, $data) {
        $this->db->where('username', $id);
        $this->db->update('users', $data);
    }

}

?>