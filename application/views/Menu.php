<ul class="navbar-nav">
          <li class="nav-item   ">
            <a class="nav-link   " href="<?php echo base_url('Gemba/index')?>">
            <i class="fas fa-home text-primary"></i> Home
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('Gemba/Addprb')?>">
            <i class="fas fa-plus-circle text-green"></i>  Add Problems
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('Gemba/Problems')?>">
         <i class="fas fa-exclamation-circle text-red"></i> Problems
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('Gemba/Issues')?>">
            <i class="fas fa-asterisk text-green"></i></i> Issues
            </a>
          </li>
         <?php
          $UserID= $this->session->userdata('user_id');
     if($UserID==479 or $UserID==352){
         ?>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('Gemba/AddUsers')?>">
          <i class="fas fa-user-plus text-blue"></i>  Add Users
            </a>
          </li>
         <?php
         
         
     }
     
     ?>
          <!-- <li class="nav-item">
            <a class="nav-link " href="./examples/maps.html">
              <i class="ni ni-pin-3 text-orange"></i> Maps
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i> User profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('Gemba/tables')?>">
              <i class="ni ni-bullet-list-67 text-red"></i> Tables
            </a>
          </li> -->
      
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Gemba/logout')?>">
              <i class="fas fa-power-off text-info" ></i> Logout
            </a>
          </li>
         
          <!-- <li class="nav-item">
            <a class="nav-link" href="./examples/register.html">
              <i class="ni ni-circle-08 text-pink"></i> Register
            </a>
          </li> -->
        </ul>