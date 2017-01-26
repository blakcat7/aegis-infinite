<?php

class emp_model extends CI_Model {

    var $details;

    function validate_user($username, $password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
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
    
    /*function view_skills() {         
        $query = $this->db->select('*')
                ->from('skills l')
                ->join('users u', 'l.userID = u.id')
                ->get();
        return $query;
    }*/

    function set_session() {
        $this->session->set_userdata(array(
            'username' => $this->details->username,
            'fname' => $this->details->fname, 
            'lname' => $this->details->lname,
            'email' => $this->details->email,
            'location' => $this->details->location,
            'sector' => $this->details->sector,
            'role' => $this->details->role,
            'logged_in' => true
            )
        );
    }

}

?>