<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>org_admin_dashboard">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>


          <li class="nav-item nav-category">Member</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Member</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>org_admin_dashboard/create_org_admin">Registration</a></li>
               <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>org_admin_dashboard/org_list">Memeber List</a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Elections</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Elections</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>elections">Create an Election</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>elections/elections_positions">Election Positions</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>elections/assign_candidates">Assign Candidates</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>elections/elections_edits">Elections List</a></li>
          
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>elections/end_elections">End Election(Manual)</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>elections/elections_results">Election Results</a></li>
                
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
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>reports/yearly_org_election_list">Election List</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url();?>reports/memberlist">Member List</a></li>
              </ul>
            </div>
          </li>






          
        </ul>
      </nav>