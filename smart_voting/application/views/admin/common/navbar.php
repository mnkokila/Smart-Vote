 <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            Smart Voting
          </a>
          
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-right" style="text-align: right;"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            
            
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
         
          <h4 class="welcome-text">Welcome, <span class="text-black fw-bold"><?=$this->session->userdata('fullname');?> </span></h4>
          
          
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="<?=base_url();?>assets/images/faces/icon.png" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?=base_url();?>assets/images/faces/icon.png" alt="Profile image" width="150" height="auto"> 
                <p class="mb-1 mt-3 font-weight-semibold"><?=$this->session->userdata('fullname');?></p>
                
              </div>
              <a href="<?=base_url();?>admin_dashboard/profile" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
              
              <a class="dropdown-item" href="<?=base_url();?>login/signout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>