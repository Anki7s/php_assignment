<?php
class Dashboard extends CI_Controller{
    public function __construct() { 
        parent::__construct(); 
        // Load pagination library
        $this->load->library("pagination");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        // Check session 
        if(!$this->session->has_userdata('username')){
        //     $sessionname = $this->session->has_userdata('username');
        //    echo "seeion value".$sessionname ; 
            redirect('/');	
        }
        else {
        //     $sessionname = $this->session->has_userdata('username');
        // echo "seeion value".$sessionname ; 
        }
        $this->load->model("dashboard_model");
        $this->load->model('product_model');
    } 
     /*
	* Function to display list of user 
	* @params null
	* @return null
	*/
    public function userList(){
        $searchText='-';
        $product = 0;
        //posting searched user 
        if(trim($this->input->post('searchText'))!=''){
            $searchText = $this->input->post('searchText');
        }else{
             
            // Searched text will segmented on 3rd position of url 
            $searchText = ($this->uri->segment(3)) ? $this->uri->segment(3) : '-';
        }//else end
        if($searchText == '')
            $searchText='-';
            //posting drop down searched data
        if($this->input->post('product')!=''){
            $product = $this->input->post('product');
        }else{
            
            // Product id will segmented on 4th position of url 
            $product = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        }//else end 
        
        // Get total number of rows 
        $totalRows = $this->dashboard_model->getTotalUsers($searchText, $product);
        $config['total_rows'] = $totalRows;
		$config['per_page'] = 2;
		$config["uri_segment"] = 5;
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

        $config['base_url'] = 'http://[::1]/php/Assignment-3/dashboard/userList/'.$searchText."/".$product;

        // Initialize config
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["data"] = $this->dashboard_model->getUsersList($config["per_page"], $page, $searchText, $product);
        if( $searchText != '-'){
            $data['searchText'] = $searchText;
        }	
		else{
            $data['searchText'] = '';
        }//else end 
        $data['productId']= $product;
        $data['productData'] = $this->product_model->getProduct();
        $this->load->view("dashboard/dashboard",$data);  
    }
    /*
	* Function to Add new user 
	* @params null
	* @return null
    */
    public function addUser(){
        $error["error"]="";
		//Form validation Rules
		$this->form_validation->set_rules('firstName', 'Firstname', 'required');
		$this->form_validation->set_rules('lastName', 'Lastname', 'required');
		$this->form_validation->set_rules('userName', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE)
        {   $productList['productList']= $this->product_model->getProduct();
            $data= $productList + $error;
            $this->load->view('dashboard/adduser', $data);
		}
		else
		{   // Upload image of user
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('imagefile'))
            {  
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('dashboard/adduser', $error);
            }
            else
            {   
                $imageData = array('upload_data' => $this->upload->data());
                // Thumbnail 
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
                // Clear
                $this->image_lib->clear();
                //Posting user datain database
                $data = array(
                            'firstName' => $this->input->post('firstName'),
                            'lastName' => $this->input->post('lastName'),
                            'userName' => $this->input->post('userName'),
                            'password' => md5($this->input->post('password')),
                            'email' => $this->input->post('email'),
                            'gender' => $this->input->post('gender'),
                            'age' => $this->input->post('age'),
                            "imageName"=>$imageData['upload_data']['file_name'],
                        );
                $this->dashboard_model->saveDetails($data);
                $customerId = $this->db->insert_id();
                $productId = $this->input->post('product');
                
                foreach($productId as $prod){
                    $customerProduct['id'] = $customerId;
                    $customerProduct['productId'] = $prod;
                    $this->product_model->saveCustomerProducts($customerProduct);
                }
                redirect('dashboard/userList');
            }//else end	
		}//else end
    }
    /*
	* Function to Delete User details 
	* @params user id 
	* @return null
	*/
    public function deleteUser($id){
        $this->dashboard_model->deleteUserById($id);
        redirect('dashboard/userList');
    }
    /*
	* Function to Edit User details 
	* @params user id 
	* @return null
	*/
    public function editUser($id){
        $data["user"] = $this->dashboard_model->getUserById($id)->row_array(); 
        // echo "<pre>";
        // print_r($userDetails);
        // die;
        //Form validation Rules
		$this->form_validation->set_rules('firstName', 'Firstname', 'required');
		$this->form_validation->set_rules('lastName', 'Lastname', 'required');
		$this->form_validation->set_rules('userName', 'Username', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == FALSE)
        {   $data['productList']= $this->product_model->getProduct();
            $data['productSelected']= $this->dashboard_model->getProduct($id)->result_array();
            $data['productId'] = array_column($data['productSelected'], 'ProductId');
			$this->load->view('dashboard/edit',$data);
		}
		else
		{
            $data = array(
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'userName' => $this->input->post('userName'),
                'email' => $this->input->post('email'),
                'age' => $this->input->post('age'),
            );
            // $this->deleteCustomerProduct()
            $this->dashboard_model->updateUser($data, $id);
            redirect('dashboard/userList');
        }//else end
    }
    /*
	* Function to view product list by customer
	* @params customer id
	* @return null
    */
    public function viewProductList($id){
        $customerProductList["customerProduct"] =  $this->dashboard_model->getProduct($id)->result_array();
        $this->load->view("dashboard/productlist", $customerProductList);
    }
}

?>