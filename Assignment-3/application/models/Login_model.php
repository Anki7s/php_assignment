<?php
class Login_model extends CI_Model{
    /*
	* Function to authentication check 
	* @params user name and password
	* @return result of query
	*/
    public function checkLoginAuthentication($username, $password){
        //Authentication check
        $this->db->select("userName,email,userType");
        $this->db->where("userName ",$username);
        $this->db->where("password ", md5($password));
        $query = $this->db->get('customer');
        return $query;
    } 
}
?>