<?php
class Registration extends CI_Controller{
    public function __construct() { 
        parent::__construct(); 
        
        // Load form helper library
        $this->load->helper(array('form'));
        $this->load->model('registration_model');
        $this->load->model('product_model');
    }
    /*
	* Function to registration form
	* @params null
	* @return null
	*/
    public function index(){
        $error["error"]="";
        // check validation field 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstName', 'firstName', 'required' );
        $this->form_validation->set_rules('lastName', 'lastName', 'required');
        $this->form_validation->set_rules('userName', 'userName', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required' );
        $this->form_validation->set_rules('age', 'age', 'required');
        $this->form_validation->set_rules('gender', 'gender', 'required');
        if ($this->form_validation->run() == FALSE)
        {   
            $productList['productList'] = $this->product_model->getProduct();
            $data = $productList + $error;
            $this->load->view('registration/registration', $data );
        }
        else
        {   //image upload 
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            // Load library to upload file/image
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('imagefile'))
            {  
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('registration/registration', $error);
            }
            else
            {
                $imageData = array('upload_data' => $this->upload->data());
                //Thumbnail
                $sourcePath = $imageData['upload_data']['full_path'];;
				$targetPath = './upload/thumb/';
				$configManip = array(
					'image_library' => 'gd2',
					'source_image' => $sourcePath,
					'new_image' => $targetPath,
					'maintain_ratio' => TRUE,
					'create_thumb' => TRUE,
					'thumb_marker' => '_thumb',
					'width' => 150,
					'height' => 150
                );

                //load library for thumbnail
				$this->load->library('image_lib', $configManip);
				if (!$this->image_lib->resize()) {
					echo $this->image_lib->display_errors();
				}
                $this->image_lib->clear();  
                //Posting user data
                $data= array(
                    "firstName"=>$this->input->post("firstName"),
                    "lastName"=>$this->input->post("lastName"),
                    "userName"=>$this->input->post("userName"),
                    "email"=>$this->input->post("email"),
                    "password"=>md5($this->input->post("password")),
                    "age"=>$this->input->post("age"),
                    "gender"=>$this->input->post("gender"),
                    "imageName"=>$imageData['upload_data']['file_name'],
                );
                $this->registration_model->userRegister($data);
                //get last insert id 
                $customerId = $this->db->insert_id();
                $products = $this->input->post('product');
                foreach($products as $prod){
                    $customerProduct['id'] = $customerId;
                    $customerProduct['productId'] = $prod;
                    $this->product_model->saveCustomerProducts($customerProduct);
                }
            // if registration succesfull than redirect it to login page
            redirect(base_url()."login");
        }//else end
    }//else end
    }
}
?>