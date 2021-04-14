
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"> 
                     <?php Echo $this->session->userdata('user_name') ?> <i class="fas fa-user-cog"></i></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="<?php echo base_url('Gemba/ChangePassword')?>" class="dropdown-item">
              <i class="fas fa-user"></i> 
                <span>Profile</span>
              </a>
              
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('Gemba/logout')?>" class="dropdown-item">
              <i class="fas fa-power-off"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>