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
        $this->db->group_by('p.projectID');
        $query = $this->db->get();

        $result = $query->result_array();
        if ($query->num_rows() >= 0) {
            return $result;
        } else {
            return $result;
        }
    }

    function all_project($username) {
        $this->db->select('*');
        $this->db->from('projects_skills ps');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('skills s', 's.skillsID = ps.skillsID', 'left');
        $this->db->join('users_skills us', 'ps.skillsID = us.skillsID');
        $this->db->where('us.userID', $username);
        $this->db->order_by('ps.projectID', 'asc');
        $this->db->group_by('ps.projectID');
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() > 1) {
            return $result;
        } else {
            return $result;
        }
    }

    function view_project_skills($id) {
        $this->db->select('*');
        $this->db->from('projects_skills ps');
        $this->db->join('skills s', 's.skillsID = ps.skillsID', 'left');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('users_skills e', 'e.skillsID = s.skillsID');
        $this->db->join('projects_users r', 'r.projectID = p.projectID');
        $this->db->join('users u', 'u.userID = e.userID');
        $this->db->order_by('ps.projectID', 'desc');
        $this->db->group_by('ps.projectID');
        $this->db->where('r.userID !=', $id);

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

    function view_manager($id, $role) {
        $this->db->select('*');
        $this->db->from('projects_users ps');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('users u', 'u.userID = ps.userID');
        $this->db->where('ps.projectID', $id);
        $this->db->where('u.role', $role);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() >= 0) {
            return $result;
        } else {
            return $result;
        }
    }

    function view_staffs($id, $role, $category) {
        $this->db->select('*');
        $this->db->from('projects_users ps');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('users u', 'u.userID = ps.userID');
        $this->db->where('ps.projectID', $id);
        $this->db->where('u.role', $role);
        $this->db->where('u.category', $category);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() >= 0) {
            return $result;
        } else {
            return $result;
        }
    }

    function view_projects($id) {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('projectID', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() >= 0) {
            return $result;
        } else {
            return $result;
        }
    }

    function project_skills($id) {
        $this->db->select('*');
        $this->db->from('projects_skills ps');
        $this->db->join('projects p', 'p.projectID = ps.projectID', 'left');
        $this->db->join('skills s', 's.skillsID = ps.skillsID');
        $this->db->where('ps.projectID', $id);
        $this->db->group_by('ps.skillsID');
        $query = $this->db->get();
        $result = $query->result_array();
        if ($query->num_rows() > 1) {
            return $result;
        } else {
            return $result;
        }
    }

    function set_session() {
        $this->session->set_userdata(array(
            'userID' => $this->details->userID,
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
            'availability' => $this->details->availability,
            'pics' => $this->details->picture,
            'logged_in' => true
                )
        );
    }

    function get_image($username) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $query = $this->db->get()->result();
        return $query;
    }

    function show_projects() {
        $this->db->get('projects');
    }

    function search_keyword($keyword) {
        $this->db->like('name', $keyword);
        $query = $this->db->get('tablename');
        return $query->result();
    }

    public function get_id($field, $table, $id) {
        $this->db->where($field, $id);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function update_image($data) {
        //$file = $this->input->post('userfile'); 
        $id = $this->input->post('txt_hidden');
        $this->db->set('picture', $data);
        $this->db->where('userID', $id);
        $this->db->update('users');
    }

    public function update() {
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $designation = $this->input->post('designation');
        $sector = $this->input->post('sector');
        $location = $this->input->post('location');
        $plocation = $this->input->post('plocation');
        $availability = $this->input->post('availability');
        $id = $this->input->post('txt_hidden');

        $field = array(
            'fname' => $fname,
            'lname' => $lname,
            'designation' => $designation,
            'sector' => $sector,
            'location' => $location,
            'plocation' => $plocation,
            'availability' => $availability,
        );
        $this->db->where('userID', $id);
        $this->db->update('users', $field);
        echo $this->db->last_query();

        if ($this->db->affected_rows() > 0) {
            $this->session->set_userdata('fname', $fname);
            $this->session->set_userdata('lname', $lname);
            $this->session->set_userdata('designation', $designation);
            $this->session->set_userdata('sector', $sector);
            $this->session->set_userdata('location', $location);
            $this->session->set_userdata('plocation', $plocation);
            $this->session->set_userdata('availability', $availability);

            return true;
        } else {
            return false;
        }
    }

    public function add_skills() {
        $skill = $this->input->post('skill');
        $id = $this->input->post('txt_hidden');

        $field = array(
            'userID' => $id,
            'skillsID' => $skill,
            'percentage' => $this->input->post('percentage')
        );

        $this->db->where('userID', $id);
        $this->db->insert('users_skills', $field);
    }

    public function update_project() {
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

    public function update_skills() {
        $id = $this->input->post('userID');
        $skill = $this->input->post('skillsID');
        $field = array(
            'percentage' => $this->input->post('percentage')
        );

        $array = array(
            'userID' => $id,
            'skillsID' => $skill
        );

        $this->db->where($array);
        $this->db->update('users_skills', $field);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function view_users($data) {
        $this->db->select('*');
        $this->db->from('users u');
        $this->db->where('u.username', $data);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    function insert_temp($data) {
        $projectID = $this->uri->segment(3);
        $userID = $this->uri->segment(4);
        $this->db->insert('request_temp', $data);
    }

    function count_notif($id, $table, $user) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($user, $id);
        return $this->db->count_all_results();
    }

    public function get_request($id) {
        $this->db->select('*');
        $this->db->from('interested_temp r');
        $this->db->join('projects p', 'p.projectID = r.projectID');
        $this->db->join('users u', 'u.userID = r.userID');
        $this->db->where('r.pmID', $id);
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