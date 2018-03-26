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
}