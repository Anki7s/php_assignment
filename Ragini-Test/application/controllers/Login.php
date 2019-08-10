<?php
class Login extends CI_Controller{
    public function __construct() { 
        parent::__construct(); 
        // $this->load->helper(array('form')); 
        // Load form validation library
        $this->load->library('form_validation');
        $this->load->model("login_model");
    }
    /*
	* Function to admin login
	* @params null
	* @return null
	*/
    public function index(){
        //Validation to the input field
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("login/login");
        }
        else
        {    //Check login authentication  
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->login_model->checkLoginAuthentication($username,  $password)->result_array();
            if($data){  
                $sessionData = array(
                    'username' => $this->input->post('username')
                );
                // Set session if login
                $this->session->set_userdata($sessionData);
                // Redierct to home
                redirect(base_url().'dashboard'); 
            }
            else{
                    echo "login failed";
            }//Else end         
        }//Else end    
    }
}
?>