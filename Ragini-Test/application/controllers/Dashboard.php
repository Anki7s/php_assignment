<?php
class Dashboard extends CI_Controller{
    public function __construct() { 
        parent::__construct(); 
        $this->load->helper(array('form'));
        // $this->load->model("dashboard_model");
    }
    public function index(){
        // $this->dashboard_model->addImages();
        $this->load->view("dashboard/dashboard");
    }
    public function addNewImages(){
        $this->load->view("dashboard/addImage");
        // echo "addNewImages";
    }
}
?>