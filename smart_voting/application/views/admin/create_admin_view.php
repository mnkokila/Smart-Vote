<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=webname;?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?=base_url();?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/vertical-layout-light/style.css">
  <script src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
  <!-- endinject -->
 
</head>
<body>
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
   <?php $this->load->view('admin/common/navbar');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view('admin/common/aside');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    
                    <div class="row">

                    <?php
                      if($this->session->userdata('successmsg')){
                    ?>
                    <script type="text/javascript">
                      swal("Success!", "<?=$this->session->userdata('successmsg');?>", "success");
                    </script>
                    <?php
                    }
                    ?>

                    <?php
                      if($this->session->userdata('errormsg')){
                    ?>
                    <script type="text/javascript">
                      swal("Error!", "<?=$this->session->userdata('errormsg');?>", "error");
                    </script>
                    <?php
                    }
                    ?>


                    <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create New Admin</h4>
                  
                  <form class="forms-sample" name="myForm" action="<?=base_url();?>admin_dashboard/save_admin" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Full name <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Full Name" required="required" name="fullname" id="fullname">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" required="required"name="username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password <font color="red">*</font></label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required" name="password">
                    </div>
                                        
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light" type="reset">Cancel</button>
                  </form>
                </div>
              </div>
            </div>


            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Admin list</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Admin Name</th>
                          <th>Username</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //print_r($orglist);
                        if($adminlist){
                         foreach($adminlist as $al){

                        ?>
                        <tr>
                          <td><?php echo $al->full_name;?></td>
                          <td><?php echo $al->main_username;?></td>
                          <td>
                            <?php
                            if($al->main_active_stts==1){
                              echo "Active";
                            }else{
                              echo "Inactive";
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            if($al->main_active_stts==1){
                            ?>
                            <a href="<?=base_url();?>admin_dashboard/admin_access_change/<?php echo $al->main_user_id;?>/0" class="btn btn-sm btn-danger">Inactive me</a>
                            <?php
                            }else{
                              ?>
                            <a href="<?=base_url();?>admin_dashboard/admin_access_change/<?php echo $al->main_user_id;?>/1" class="btn btn-sm btn-success">Active me</a>
                            <?php
                            }
                            ?>
                          </td>
                        </tr>
                        <?php
                         }
                        }
                        ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php $this->load->view('admin/common/footer');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?=base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?=base_url();?>assets/vendors/chart.js/Chart.min.js"></script>
  <script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="<?=base_url();?>assets/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url();?>assets/js/off-canvas.js"></script>
  <script src="<?=base_url();?>assets/js/hoverable-collapse.js"></script>
  <script src="<?=base_url();?>assets/js/template.js"></script>
  <script src="<?=base_url();?>assets/js/settings.js"></script>
  <script src="<?=base_url();?>assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?=base_url();?>assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="<?=base_url();?>assets/js/dashboard.js"></script>
  <script src="<?=base_url();?>assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <script>
function validateForm() {
  let x = document.forms["myForm"]["fullname"].value;
  if (containsNumbers(x)) {
    //alert("Please Enter Characters only");
    swal("Error!", "Please Enter Characters only", "error");
    return false;
  }
}

function containsNumbers(str) {
  return /\d/.test(str);
}
</script>
</body>

</html>

