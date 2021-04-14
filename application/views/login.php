<?php
if($this->session->has_userdata('user_id')){
  redirect('Gemba/index');
}else{
$this->load->View('header');
?>
<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Gemba Login</h1>
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
    <div class="col-md-1">
    </div>

              
            </div>
          </div>
        </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
       
            <div class="card-body px-lg-5 py-lg-5">
            
      
              <form action="<?php echo base_url('Gemba/process_login'); ?>" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="User Name" type="text" name="username" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                  </div>
                </div>
              
                <div class="text-right">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        
        </div>
      </div>
    </div>
    
  </div>
 



</body>

</html>
<?php


}
?>