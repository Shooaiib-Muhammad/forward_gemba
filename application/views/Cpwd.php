<?php
if($this->session->has_userdata('user_id')){
  

$this->load->View('header');
?>

<body class="">
<?php
         include('Topnav.php');
    include('Menu.php')
    ?>
        <script>
$( document ).ready(function() {
  $('#pwd').hide();
  //$('#showprobelms').hide();
});

function Callpwd() {
    $('#pwd').toggle();
}


</script>
      </div>
    </div>
  </nav>
  
  <div class="main-content">
    <!-- Navbar -->
    <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
         href="#"> </a>
     
    <?php
 
 include('nav.php')
 ?>

    <!-- End Navbar -->
    <!-- Header -->
    
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
   
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
    <?php if($this->session->flashdata('info')){ 
?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><strong>Info!</strong> <?php echo $this->session->flashdata('info');?></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
}
 ?>
  <?php if($this->session->flashdata('danger')){ 

 
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><strong>Danger!</strong>  <?php echo $this->session->flashdata('danger');?></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
}
 ?>
    </div>
   
  <div  class="col-md-1"></div>
</div>
    <div class="container-fluid mt--7">

 
    <div class="row" >
        
        <div class="card shadow">
        <div class="card-header border-0">
               <h3 class="mb-0">Account information </h3>
             </div>
           <?php 
               foreach($UserInfor as $Keys){
               ?>
      <form action="<?php echo base_url('Gemba/UpdateProfile'); ?>" method="POST"  enctype="multipart/form-data" >
      
     
      <div class="row">

<button type="button" class="btn btn-default">
  <span>Department :</span>
  <span class="btn btn-primary"><?php Echo $Keys['DeptName'];?></span>
</button>

   
  </div>
  <div class="row">
  <div  class="col-md-1">

</div>
<div  class="col-md-5">
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">User Name :</label>
        <input type="text" value="<?php Echo $this->session->userdata('user_name');?>" class="form-control" name="username" required>
    </div>
  </div>
  <div  class="col-md-5">
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Email Address :</label>
        <input type="text" value="<?php Echo $Keys['EmailAddress'];?>" class="form-control" name="Email" required>
    </div>
  </div>
  <div  class="col-md-1">

</div>
  <div  class="col-md-5">
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Phone No.</label>
        <input type="text"  value="<?php Echo $Keys['Contact_Number'];?>" class="form-control" name="Phone" required>
    </div>
    
  </div>
  </div>
<div class="row">
<div  class="col-md-1">

</div>
<div  class="col-md-10">
<input type="checkbox" class="custom-control-input" id="customCheck1" onclick="Callpwd()" name="check">
  <label class="custom-control-label" for="customCheck1">Change Password</label>
  <div  class="col-md-1">

</div>
</div>
</div>
<div id="pwd">
  <div class="row">
  <div  class="col-md-1"></div>
  <div  class="col-md-5">
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">New Password :</label>
        <input type="text" placeholder="New Password" class="form-control" name="New" >
    </div>
  </div>
  <div  class="col-md-5">
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Old Password</label>
        <input type="text"  placeholder="Old Password" class="form-control" name="Old"  >
    </div>
  </div>
  <div  class="col-md-1"></div></div>
</div>
  <div class="row">
  <div  class="col-md-3">

  </div>
  <div  class="col-md-3">

</div>
<div  class="col-md-3">

</div>
  <div  class="col-md-3">
    <div class="form-group">
    <button type="submit" class="btn btn-success " name="userSubmit"><i class="fas fa-save"></i> Update</button>
    </div>
  </div></div>
   
    <?php
    
               }
               ?>
</form>
           
           
      <?php
      
      include('footer.php');
      ?>
</body>

</html>
<?php

}else{

  redirect('Gemba/Login');
}

?>