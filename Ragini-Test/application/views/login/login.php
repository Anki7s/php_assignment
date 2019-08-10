<?php $this->load->view('common/header');?>
<div class="contact-us-section ">
	<div class=" contact-us-header">
		<div class="contact-us-content">
		<h3>Login</h3>
			<div class="row">
				<div class="col-md-5 col-md-offset-4 col-lg-5 col-lg-offset-4">
                    <?php echo form_open(); ?>
						<div class="row">
							<div class="form-group">
                                <input type="text" class="form-control" id="username" placeholder="User Name" name="username">
                                <?php echo form_error("userName");?>
							</div>
							<div class="form-group">									
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                <?php echo form_error("password");?>
							</div>
						</div>
						<button type="submit" name="submit" class="btn btn-success">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('common/footer');?>