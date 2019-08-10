<?php 
class Registration_model extends CI_model{
    /*
    * function for inserting data 
    * @param user data to insert
    * @return null
    */
    public function userRegister($data){
        $this->db->insert('customer', $data);
    }
}
?>