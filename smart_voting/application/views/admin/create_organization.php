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


                    <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create New Organization</h4>
                  
                  <form class="forms-sample" name="myForm" action="<?=base_url();?>organization/save_organization" method="post" onsubmit="return validateForm()">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Organization name <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Organization name" required="required" name="orgname" id="orgname" value="<?php echo $this->session->flashdata('orgname');?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Contact NO <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Contact NO" required="required"name="contno" id="contno" value="<?php echo $this->session->flashdata('contno');?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Address <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Address" required="required"name="org_address" value="<?php echo $this->session->flashdata('org_address');?>">
                    </div>

                     <!-- <div class="form-group">
                      <label for="exampleInputUsername1">Country <font color="red">*</font></label>
                      <select class="form-control" name="country" required="required">
                        <option value="">Select Country</option>
                        <?php 
                        if($country_list){
                          foreach($country_list as $cl){
                            ?>
                            <option value="<?php echo $cl->country_name;?>"><?php echo $cl->country_name;?></option>

                           <?php 
                          }
                        }

                         ?>
                      </select>
                    </div> -->

                    <div class="form-group">
                      <label for="exampleInputUsername1">Email-Address <font color="red">*</font></label>
                      <input type="email" class="form-control" id="exampleInputUsername1" placeholder="Email-Address" required="required"name="org_mail" value="<?php echo $this->session->flashdata('org_mail');?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Organization prefix (ex : Rotrac -> RTC) <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Organization prefix" required="required"name="prefixcode" value="<?php echo $this->session->flashdata('prefixcode');?>">
                    </div>
                    
                                        
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light" type="reset">Cancel</button>
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
function validateForm() {
  let x = document.forms["myForm"]["orgname"].value;
  let contno = document.forms["myForm"]["contno"].value;
  if (containsNumbers(x)) {
    //alert("Please Enter Characters only");
    swal("Error!", "Please Enter Characters only", "error");
    return false;
  }

  if (!isInteger(contno)) {
    swal("Error!", "Please Enter Numbers only.dont use + with country code", "error");
    return false;
  }else{
    var len = contno.length;
    if(len!=10){
      swal("Error!", "Please Enter 10 numbers", "error");
      return false;
    }
  }


  
}

function containsNumbers(str) {
  return /\d/.test(str);
}

function isInteger(str) {
  // Try to parse the string as an integer
   //const integerPattern = /^[-+]?[0-9]+$/;
   const integerPattern = /^[-+]?\d+$/;
  // Test the string against the pattern
  return integerPattern.test(str);
}
</script>
</body>

</html>

