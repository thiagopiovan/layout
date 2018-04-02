<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    // Insert registration data in database
    public function registration_insert($data) {
        // Query to check whether username already exist or not
        $condition = "name =" . "'" . $data['name'] . "'";

        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($condition);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 0) {    
            // Query to insert data in database
            $this->db->insert('login', $data);

            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }
    
    // Read data using username and password
    public function login($data) {    
        $condition = "name =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";

        $this->db->select('*');
        $this->db->from('login');
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
        $condition = "name =" . "'" . $username . "'";

        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($condition);
        $this->db->limit(1);

        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }    

    public function get_records($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('test');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('test', array('id' => $id));
        return $query->row_array();
    }

    public function record_insert($id = 0) {  
        $data = array(
            'text' => $this->input->post('text')
        );
        
        if ($id == 0) {
            return $this->db->insert('test', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('test', $data);
        }
    }

    public function delete_record($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('test');
    }
}