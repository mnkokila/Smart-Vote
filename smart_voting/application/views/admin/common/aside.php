<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>admin_dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>


          
          <li class="nav-item nav-category">Organization</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Organization</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>organization">Create Organization</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>organization/registered_org_list">Registered Organizations</a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Admin</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Admin</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>admin_dashboard/create_admin">Create New Admin</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>admin_dashboard/renew_amount">Renew Amount</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>admin_dashboard/manage_country">Manage Country</a></li> -->
                
                
              </ul>
            </div>
          </li>



          <li class="nav-item nav-category">Reports</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic4">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>reports/registered_org_list">Registered ORG List</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>reports/yearly_income_report">Yearly Income Report</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>reports/admin_list_report">Admin List</a></li> -->
          
                <!--<li class="nav-item"> <a class="nav-link" href="">ORG wise Member List</a></li>
                <li class="nav-item"> <a class="nav-link" href="">ORG wise Election List</a></li>-->
              </ul>
            </div>
          </li>








          
        </ul>
      </nav>
