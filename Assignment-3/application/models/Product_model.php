<?php
class Product_model extends CI_Model{
    /*
	* Function to get product list 
	* @params null
	* @return  product details
    */
    public function getProduct(){
        return  $this->db->get("products")->result_array();
    }
    /*
	* Function to save customer_id and product_id in db
	* @params customer and product id
	* @return null
    */
    public function saveCustomerProducts($customerProduct){
        $this->db->insert("customer_products", $customerProduct);
    }
    // public function deleteCustomerProduct(){
    //     $this->db->where('id', $id);
    //     $this->db->delete('customer');
    // }
}
