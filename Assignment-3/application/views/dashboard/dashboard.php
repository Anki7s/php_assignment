<!-- header is loaded -->
<?php $this->load->view('common/header');?>

<!-- display user details -->
<div class="container">
  <h2  class="text-center" >Customer Information</h2>   
  <a href="<?php echo base_url().'dashboard/addUser' ?>" class="btn btn-primary">Add User</a>
  <?php echo form_open('dashboard/userList')?> 
    <div class="search_name">  
      <input type="text" placeholder="Search.." value="<?php echo $searchText; ?>" name="searchText">
      <button type="submit" class=" btn btn-info" >Search</button>
    </div>
    <select name="product" id ="product">
      <option value="">Select Product</option>
        <?php  
          foreach($productData as $product)
          {  
            $selectedProduct = '';
				    if($product['ProductId'] == $productId) 
					     $selectedProduct = "selected='selected'";  
        ?>
            <option <?php echo $selectedProduct; ?> value="<?php echo $product['ProductId']; ?>"><?php echo $product["ProductName"]; ?></option>
        <?php 
          }
        ?>
    </select>
  </form>
  <!-- Customer List -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
      </tr>
    </thead>
    <?php 
  if(isset($data)){
      foreach ($data as $row)  
      {?>
        <tbody>
          <tr>
            <td><?php echo $row["firstName"]." ".$row["lastName"];?></td>
            <td><?php echo $row["userName"];?></td>
            <td><?php echo $row["email"];?></td>
            <td><a href="<?php echo base_url().'dashboard/editUser/'.$row['id'] ?>" class=" btn btn-info" >Edit</a></td>
            <td><a onclick="confirmDelete('<?php echo $row['id']  ?>');" href="javascript:void(0);" class="btn btn-danger" >Delete</a></td>
            <td><a href="<?php echo base_url().'dashboard/viewProductList/'.$row['id'] ?>" class=" btn btn-info" >View Products</a></td>
          </tr>
        </tbody> 
<?php 
      } 
  } 
?>
  </table>
  <!-- Pagination links -->
  <?php 
    if(isset($links)){
      echo $links;
    }
  ?>
</div>
<!-- Modal for conform message to delete user record-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete this record?</p>
        </div>
        <div class="modal-footer">
			<input type="hidden" name="userId" id="userId" />
          
		   <button type="button" onclick="deleteRecord();" class="btn btn-success" >Yes</button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php $this->load->view('common/footer');?>
