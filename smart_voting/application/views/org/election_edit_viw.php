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
   <?php $this->load->view('org/common/navbar');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view('org/common/aside');?>
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


                    <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Election</h4>
                  
                  <form class="forms-sample" action="<?=base_url();?>elections/update_elections" method="post">
                    <input type="hidden" name="orgid" value="<?=$this->session->userdata('orgid');?>">
                    <input type="hidden" name="electid" value="<?=$electiondata->election_main_id?>">
                    <!--<div class="form-group">
                      <label for="exampleInputUsername1">Election Year</label>
                      <select class="form-control" id="eyear" name="eyear" required="required">
                        <option value="">Select Election Year</option>
                        <?php
                        $curyr = date("Y");
                        for($i=$curyr;$i<=2040;$i++){
                        if($electiondata->elect_year == $i){
                        ?>
                        <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
                        <?php
                        }else{
                        ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php
                        }
                        
                         }
                        ?>
                        
                      </select>
                    </div>-->

                    <!--<div class="form-group">
                      <label for="exampleInputUsername1">Election Month</label>
                    <select name="electmnt" id="electmnt"  class="form-control select2" required="required">
                      <option value="">Select Election month</option>
                      <?php
                       for($mnt=1;$mnt<=12;$mnt++){
                       if($electiondata->elect_month == $mnt){
                       ?>
                      <option value="<?php echo $mnt;?>" selected><?php echo $mnt;?></option>
                      <?php
                       }else{
                       ?>
                      <option value="<?php echo $mnt;?>"><?php echo $mnt;?></option>
                      <?php
                       }
                      
                       }
                      ?>
                    </select>
                  </div>-->



                    <div class="form-group">
                      <label for="exampleInputUsername1">Election name</label>
                      <input type="text" class="form-control" id="election_name" placeholder="Election name" required="required" name="election_name" value="<?=$electiondata->election_name;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Election Start date</label>
                      <input type="datetime-local" class="form-control" id="electfrom" placeholder="Admin Contact NO" required="required"name="electfrom" value="<?=$electiondata->election_start;?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Election End date</label>
                      <input type="datetime-local" class="form-control" id="electto" placeholder="Admin Contact NO" required="required"name="electto" value="<?=$electiondata->election_end;?>">
                    </div>
              
                    
                                        
                    <button type="submit" class="btn btn-primary me-2">Edit</button>
                    <!-- <button class="btn btn-light" type="reset">Cancel</button> -->
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
  <!-- End custom js for this page-->

  <script>
var today = new Date().toISOString().slice(0, 16);

document.getElementsByName("electfrom")[0].min = today;

document.getElementsByName("electto")[0].min = today;

</script>
  
</body>

</html>

