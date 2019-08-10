<?php
class Dashboard_model extends CI_Model{
    /*
	* Function to get user list except admin
	* @params $limit, $offset, $searchText, $product
	* @return searched data or user_data
    */
    public function getUsersList ($limit, $offset ,$searchText='', $product= 0){  
        $this->db->select("cus.id, cus.firstName, cus.lastName,cus.userName, cus.email" );  
        if($searchText!='-'){
            $this->db->where("(cus.firstName LIKE '%".$searchText."%' OR cus.lastName LIKE '%".$searchText."%' OR cus.userName LIKE '%".$searchText."%' OR cus.email LIKE '%".$searchText."%' )");
        }
        if($product!=0){
            $this->db->where('cprod.ProductId',$product);
        }
        $this->db->group_by('cus.id');
        $this->db->join('customer_products cprod' , 'cprod.id = cus.id');
        $this->db->where("userType <>", "admin");
        $this->db->limit($limit, $offset);
        return $this->db->get('customer cus')->result_array();        
    }
    /*
	* Function to calculate total rows 
	* @params null
	* @return total rows
	*/
    public function getTotalUsers($searchText='', $product =0 ){
            $this->db->select("cus.id");
            if($searchText!='-'){
                $this->db->where("(cus.firstName LIKE '%".$searchText."%' OR cus.lastName LIKE '%".$searchText."%' OR cus.userName LIKE '%".$searchText."%' OR cus.email LIKE '%".$searchText."%' )");
            }
            if($product!=0){
                $this->db->where('cprod.ProductId',$product);
            }
            $this->db->group_by('cus.id');
            $this->db->join('customer_products cprod ' , 'cprod.id = cus.id');
            $this->db->where("userType <>", "admin");
            return $this->db->get('customer cus')->num_rows();     
    }
    /*
	* Function to Save details of new user 
	* @params user data
	* @return null
	*/
    public function saveDetails($data){
        $this->db->insert("customer" , $data);
    }
     /*
	* Function to Delete user data form database
	* @params user id
	* @return null
	*/
    public function deleteUserById($id){
        $this->db->where('id', $id);
        $this->db->delete('customer');
    }
    /*
	* Function to Get user details to edit 
	* @params user id
	* @return user details
	*/
    public function getUserById($id){
        $this->db->select("id, firstName, lastName, userName, age, email");
        $this->db->where("id", $id);
        return $this->db->get('customer');   
    }
    /*
	* Function to Update user details
	* @params user data and user id
	* @return null
	*/
    public function updateUser($data , $id){  
        $this->db->where('id', $id);
        $this->db->update('customer', $data);
    }
     /*
	* Function to get product list
	* @params user data and user id
	* @return null
	*/
    public function getProduct( $id ){
        $this->db->select("products.ProductName, products.ProductId");
        $this->db->from("customer", "customer_products ");
        $this->db->join("customer_products cprod" , "customer.id= cprod.id");
        $this->db->join("products", "products.ProductId = cprod.ProductId");
        $this->db->where("customer.id" ,$id);
        return $this->db->get();
    }
}


