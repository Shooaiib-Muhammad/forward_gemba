<?php
if($this->session->has_userdata('user_id')){
  

$this->load->View('header');
?>

<body class="">
<?php
         include('Topnav.php');
    include('Menu.php')
    ?>
     
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
         href="#"> <i class="fas fa-home"></i></i> Home</a>
     
    <?php
 
 include('nav.php')
 ?>

    
   
    
      </div>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  
      <div class="container-fluid">
    
        <div class="header-body">
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
          <!-- Card stats -->
          <div class="row">
          
       
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
              <a href="<?php echo base_url('Gemba/Addprb')?>/1">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase  mb-0">Defects</h3>
                    
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <i class="fas fa-exclamation-circle"></i>
                      </div>
                    </div>
                  </div>
                
                </div>
                </a>
              </a>
              </div>
            </div>
       
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
              <a href="<?php echo base_url('Gemba/Addprb')?>/2">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase mb-0">Over Production</h3>
                      
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <i class="fas fa-industry"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
              <a href="<?php echo base_url('Gemba/Addprb')?>/3">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase  mb-0">Waiting / Delay</h3>
                  
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                      <i class="fas fa-hourglass-half"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
              <a href="<?php echo base_url('Gemba/Addprb')?>/4">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase  mb-0">Transportation</h3>
                   
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                      <i class="fas fa-truck-moving"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header bg-gradient-primary">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
              <a href="<?php echo base_url('Gemba/Addprb')?>/5">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase  mb-0">Inventory</h3>
                    
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <i class="fas fa-boxes"></i>
                      </div>
                    </div>
                  </div>
                
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
              <a href="<?php echo base_url('Gemba/Addprb')?>/6">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase mb-0">Motion</h3>
                      
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <i class="fas fa-expand-arrows-alt"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
              <a href="<?php echo base_url('Gemba/Addprb')?>/7">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase  mb-0">Over Processing</h3>
                  
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                      <i class="fab fa-pushed"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
              <a href="<?php echo base_url('Gemba/Addprb')?>/8">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title text-uppercase  mb-0">Non Utlized/ Under Utlized Talent</h3>
                   
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                      <i class="fas fa-user-tie"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</div>
   
</div>
     </div>
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