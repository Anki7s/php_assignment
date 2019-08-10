<!-- listing product of particular customer -->
<?php $this->load->view('common/header');?>
<div class="card">
  <div class="row">
  <div class="col-md-6 col-md-offset-3"> 
    <h4><b>Products List</b></h4> 
    <?php foreach ($customerProduct as $result){?>
    <li><?php echo $result['ProductName']."<br>";?></li> 
    <?php }?>
  </div>
</div>
</div>
<?php $this->load->view('common/footer');?>

