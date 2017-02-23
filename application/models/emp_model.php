<?php

class emp_model extends CI_Model {

    var $details;

    function validate_user($username, $password) {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->where('u.username', $username);
        $this->db->where('u.password', $password);
        $login = $this->db->get()->result();

        if (is_array($login) && count($login) == 1) {
// Set the users details into the $details property of this class
            $this->details = $login[0];
// Call set_session to set the user's session vars via CodeIgniter
            $this->set_session();
            return true;
        }

        return false;
    }

    function view_skills($username) {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('empwithskills e', 'e.empID = u.username', 'left');
        $this->db->join('empskillslist s', 's.skillsID = e.skillsID', 'left');
        $this->db->where('e.empID', $username);
        $query = $this->db->get();

        $result = $query->result_array();


        if ($query->num_rows() != 0) {
            return $result;
        } else {
            return $result;
        }
    }

    function my_project($username) {
        $this->db->select('*');
        $this->db->from('projects p');
        $this->db->join('projectemp e', 'e.projectID = p.projectID', 'left');
        $this->db->join('users u', 'u.username = e.username', 'left');
        $this->db->where('e.username', $username);
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
        $this->db->from('projectskillslist ps');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');        
        $this->db->join('empskillslist s', 's.skillsID = ps.skillsID', 'left');
        $this->db->where('`ps.skillsID` IN (SELECT `skillsID` FROM `empwithskills` WHERE empID="' . $username . '")');
        $this->db->order_by('ps.projectID', 'asc');        
        //$this->db->group_by('ps.skillsID');
        $this->db->group_by('ps.projectID');
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() > 1) {
            return $result;
        } else {
            return false;
        }
    }

    function project_skills(/*$username*/) {
        //$this->db->distinct();
        $this->db->select('*');
        $this->db->from('projectskillslist ps');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('empskillslist s', 's.skillsID = ps.skillsID');
        //$this->db->where('ps.projectID', 'e.projectID');
        //$this->db->where('`ps.skillsID` IN (SELECT `skillsID` FROM `empwithskills` WHERE empID="' . $username . '")');
        //$this->db->where('`ps.skillsID` IN (SELECT `skillsID` FROM `empwithskills` WHERE empID="' . $username . '")');
        $this->db->group_by('ps.projectID');
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
            'logged_in' => true
                )
        );
    }
    
    function show_projects() {
        $this->db->get('projects');
    }

}

?>