<?php $this->load->view('common/header');?>
<!-- registration from -->
<div id="contact" class="paddsection">
    <div class="container">
      <div class="contact-block1">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact-contact">
            <img src="<?php base_url(); ?>assets\images\index.jpg"  class="img-rounded" alt="Cinque Terre"> 
              <h2 class="mb-30">Register here...</h2>
            </div>
          </div>
          <div class="col-lg-6"  class="contactForm">
          <?php  echo form_open_multipart(); ?>
              <div class="row">
              <div class="col-lg-6">
                  <div class="form-group contact-block1">
                  <?php echo form_error("firstName");?>
                    <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Your firstName" >
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <?php echo form_error("lastName");?>
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Your lastName" >
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group contact-block1">
                  <?php echo form_error("userName");?>
                    <input type="text" name="userName" class="form-control" id="userName" placeholder="Your User Name">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <?php echo form_error("email");?>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" >
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                  <?php echo form_error("password");?>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <?php echo form_error("age");?>
                    <input type="text" class="form-control" name="age" id="age" placeholder="Your Age" data-rule="minlen:4">
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group radio-button">
                    <?php echo form_error("gender");?>
                        <label>Gender</label>
                        <label class="radio-inline"><input class="in" type="radio" value="male" name="gender" id="gender" formControlName="gender">Male</label>
                        <label class="radio-inline"><input class="in" type="radio" value="female" name="gender" id="gender" formControlName="gender">Female</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                      <?php echo form_error("imagefile");?>
                      <?php echo $error;?>
                      <input type="file" name="imagefile" size="20" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                   
                    <?php foreach($productList as $row){?>
                      <input type="checkbox" name="product[]" value="<?php echo $row["ProductId"] ; ?>" /><?php echo $row["ProductName"];
                    } ?>
                    </div>
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
  

