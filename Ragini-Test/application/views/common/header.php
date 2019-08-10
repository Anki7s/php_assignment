<html>
<head>
    <!--Bootstrap CSS-->
    <link href="<?php echo base_url('assets\css\bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets\css\master.css');?>" rel="stylesheet">
</head>
</body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Capture</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="<?php echo base_url('home'); ?>">Home</a></li>
        <?php 
        if($this->session->has_userdata('username')) { 
        ?>
            <li><a href="<?php echo base_url('logout'); ?>" >LogOut</a></li>
        <?php
        }else {?> 
            <li><a href="<?php echo base_url('login'); ?>"><span class="glyphicon "></span> Login</a></li>
        <?php
        }
        ?>
    </ul>
  </div>
</nav>
