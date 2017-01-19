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
	
}
?>