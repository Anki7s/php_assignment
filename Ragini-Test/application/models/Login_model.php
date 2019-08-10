<?php
class Login_model extends CI_Model{
    /*
	* Function to authentication check 
	* @params user name and password
	* @return result of query
    */
    public function checkLoginAuthentication($username,  $password){
        $this->db->select("username");
        $this->db->where("username ", $username);
        $this->db->where("password ", $password);
        return $query = $this->db->get('admin');
    }
}