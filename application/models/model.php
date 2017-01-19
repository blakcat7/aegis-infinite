<?php
class model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	 
	public function insert($data) {
		if ($this->db->insert("users", $data)) {
			return true;
		}
	}
	
	public function insertProjects($data) {
		if ($this->db->insert("projects", $data)) {
			return true;
		}
	}
	
}
?>