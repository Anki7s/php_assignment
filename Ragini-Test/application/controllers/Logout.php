<?php
class Logout extends CI_Controller {
    public function __construct(){
        parent::__construct(); 
    }
    /*
	* Function to logout 
	* @params null
	* @return null
	*/
    public function index(){
        $this->session->unset_userdata('username');
        // redirect to login page
        redirect(base_url()."admin");
    }
}
?>