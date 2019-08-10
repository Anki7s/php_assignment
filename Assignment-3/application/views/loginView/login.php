<?php $this->load->view('common/header');?>
<!-- login form for user -->
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6 col-md-offset-3">
                    <div id="login-box" class="col-md-6 col-md-offset-3 ">
                    <?php echo form_open(); ?>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="userName" id="userName" class="form-control">
                                <?php echo form_error("userName");?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                                <?php echo form_error("password");?>
                            </div>
                            <div id="register-link" class="text-center">
                            <input type="submit" class="btn btn-success" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('common/footer');?>