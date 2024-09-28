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
  <!-- endinject -->
  <script src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
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
                  <h4 class="card-title">Update Password</h4>
                  
                  <div class="form-group">
                      <label for="exampleInputPassword1">Current Password</label>
                      <input type="hidden" id="mycurrentpw" value="<?php echo $mydata->main_password;?>">
                      <input type="password" class="form-control" id="formsubmitcurpw" placeholder="Password" required="required" name="password">
                    </div>
                    <p id="errmsg"></p>
                    <button class="btn btn-sm btn-info" id="checkpw">Check Current Password</button>

                  <form class="forms-sample" action="<?=base_url();?>admin_dashboard/update_admin_pw" method="post" id="newpasswordform">
                   

                    <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required" name="npassword">
                    </div>
                                        
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
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
  <script type="text/javascript"
    src="http://github.com/kvz/phpjs/raw/master/functions/strings/md5.js"></script>
  <!-- End custom js for this page-->

  <script type="text/javascript">
     
     $(function(){
       var baselink = "<?php echo base_url()?>";
       $('#newpasswordform').hide();
       $('#errmsg').html("");
       $('#checkpw').click(function(){
         var curpw = $('#mycurrentpw').val();
         var formpwsubmitcurpw = $('#formsubmitcurpw').val();
          
         $.ajax({
            url: baselink+'admin_dashboard/check_pw_validity',
            type: "POST",
            dataType: 'json',
            data: {'curpw': curpw,'formpwsubmitcurpw': formpwsubmitcurpw},
            cache: false,
            success: function(dataResult){
                if(dataResult==1){
                  $('#newpasswordform').fadeIn();
                  $('#errmsg').html("");
                }else{
                  $('#errmsg').html("Password Not Match")
                }                
            }
        }); 


       });

     });

  </script>
</body>

</html>

