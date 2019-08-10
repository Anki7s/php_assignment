<?php $this->load->view('common/header');?>
<!-- Add new user from -->
<div id="contact" class="paddsection">
    <div class="container">
      <div class="contact-block1">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact-contact">
            <img src="assets\images\index.jpg" class="img-rounded" alt="Cinque Terre"> 
              <h2 class="mb-30">Edit User</h2>
            </div>
          </div>
          <div class="col-lg-6"  class="contactForm">
          <?php echo form_open(); ?>
              <div class="row">
              <div class="col-lg-6">
                  <div class="form-group contact-block1">
                  <?php echo form_error("firstName");?>
                    <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Your firstName" value="<?php echo $user['firstName'] ?>">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <?php echo form_error("lastName");?>
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Your lastName" value=" <?php echo $user["lastName"] ?>">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group contact-block1">
                  <?php echo form_error("userName");?>
                    <input type="text" name="userName" class="form-control" id="userName" placeholder="Your User Name" value="<?php echo $user["userName"]  ?>">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <?php echo form_error("email");?>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" value="<?php echo $user["email"] ?>">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <?php echo form_error("age");?>
                    <input type="text" class="form-control" name="age" id="age" placeholder="Your Age" data-rule="minlen:3" value="<?php echo $user["age"]  ?>">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <?php foreach($productList as $product){
                          $checked ='';
                          if(in_array($product['ProductId'] , $productId)) 
                            $checked = "checked=checked";
                  ?>
                    <div class="checkbox">
                    <label><input <?php echo $checked; ?>  type="checkbox" name= "product[]" value="<?php echo $product['ProductId']?>"><?php echo $product["ProductName"]?></label>
                  </div>
                  <?php } ?>
                </div>
                <div class="col-lg-12">
                  <input type="submit" class="btn btn-success" value="Send message">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('common/footer');?>
