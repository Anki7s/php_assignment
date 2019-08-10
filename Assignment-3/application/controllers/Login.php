<?php
class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        //Redirect user to home page if already logged in
        if($this->session->has_userdata('username'))
            redirect('/');
        // Load form helper library
        $this->load->helper(array('form')); 
        // Load form validation library
        $this->load->library('form_validation');
        $this->load->model("login_model");
    }
    /*
	* Function to login 
	* @params null
	* @return null
	*/
    public function index(){
        //Validation to the input field
        $this->form_validation->set_rules('userName', 'userName', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
             $this->load->view('loginView/login');
        }
        else
        {   //Authentication check in model
            $username = $this->input->post("userName");
            $password = $this->input->post("password");
            $result=$this->login_model->checkLoginAuthentication($username, $password);
            $data = $result->row_array();
            if($data){  
                // If user is Admin 
                if($data["userType"]=="admin"){
                    $sessionData = array(
                        'username' => $this->input->post('userName')
                    );
                    // Set session if login
                    $this->session->set_userdata($sessionData);
                    // Redierct to dash board
                    redirect(base_url().'dashboard/userList/'); 
                }
                else{
                    // If user is customer
                    $sessionData = array(
                        'username' => $this->input->post('userName')
                    );
                    // Set session if login
                    $this->session->set_userdata($sessionData);
                    // Redierct to home page
                    $this->load->view("registration/registration");  
                }//Else end
            }else{
            echo "login failed";
            }//Else end
        }   
    }
}

?>