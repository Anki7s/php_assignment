<html>
<head>
    <!--Bootstrap CSS-->
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
    <!--Custom CSS-->
    <link href="<?php echo base_url('assets/css/master.css');?>" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<!-- nav bar -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">Assignment</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="<?php echo base_url('home'); ?>">Home</a></li>
        <?php 
        if ($this->session->has_userdata('username')) { ?>
            <li><a href="<?php echo base_url('logout'); ?>"  >LogOut</a></li>
        <?php
        }else {?> 
            <li><a href="<?php echo base_url('registration'); ?> "  >Sign Up</a></li>
            <li><a href="<?php echo base_url('login'); ?>" >Login</a></li> 
        <?php
        }?>
        </ul>
    </div>
</nav>