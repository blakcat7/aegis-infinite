<?php

class model extends CI_Model {

<<<<<<< HEAD
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

=======
	function __construct() {
		parent::__construct();
	}
	 
<<<<<<< HEAD
	// Read data using username and password
	public function login($data) {
	
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('users');
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
	
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function insert($data) {
		if ($this->db->insert("users", $data)) {
			return true;
		}
=======
	public function insertUser($data) {
		return $this->db->insert("users", $data);
>>>>>>> origin/master
	}
	
	public function insertProjects($data) {
		return $this->db->insert("projects", $data);
	}
	
>>>>>>> origin/master
}

?>