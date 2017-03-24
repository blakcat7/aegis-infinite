<?php

class model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function assignUser($data) {
        $record = array(
            'userID' => $data['user'],
            'projectID' => $data['project'],
        );
        $this->db->insert('projects_users', $record);
    }
    
    public function getAll($table) {
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();
        $result = $query->result_array();
        
        return $result;
    }

}

?>