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


                    <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create New Organization Member</h4>
                  <p><font color="red">*</font> Use this form to create members of the organization</p>
                  
                  <form class="forms-sample" name="myForm" action="<?=base_url();?>organization/save_admin_member" method="post" onsubmit="return validateForm()">
                    <input type="hidden" name="orgid" value="<?=$this->session->userdata('orgid');?>">
                    <div class="form-group">
                      <label for="exampleInputUsername1">User Type <font color="red">*</font></label>
                      <select class="form-control" id="utype" name="utype" required="required">
                        <option value="">Select User Type</option>
                        <option value="1">Admin</option>
                        <option value="2">Member</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Member name <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Admin Member name" required="required" name="memname">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Member Contact No <font color="red">*</font></label>
                      <input type="text" class="form-control" id="contno" placeholder="Admin Contact NO" required="required"name="contno">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Member E-mail <font color="red">*</font></label>
                      <input type="email" class="form-control" id="exampleInputUsername1" placeholder="E-mail" required="required"name="mail_address" id="mail_address">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Member Address <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Admin Address" required="required"name="address">
                    </div>

                    <!--<div class="form-group">
                      <label for="exampleInputUsername1">Member Email-Address</label>
                      <input type="email" class="form-control" id="exampleInputUsername1" placeholder="Admin Email-Address" required="required"name="mail_address">
                    </div>-->

                    <div class="form-group">
                      <label for="exampleInputUsername1">Member NIC <font color="red">*</font></label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Admin NIC" required="required" name="nic">
                    </div>

                    <!--<div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text" class="form-control" id="username" placeholder="Username" required="required"name="username" value="" readonly="readonly">
                    </div>-->


                   
                    
                                        
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light" type="reset">Cancel</button>
                  </form>
                </div>
              </div>
            </div>













             <div class="col-md-5 grid-margin">

              

              <div class="card">
                <div class="card-body">
                  


                  <h4 class="card-title">Upload member Excel</h4>

                  <p>Please use the below link to download the Excel template.</p>
                  <a href="<?=base_url();?>assets/memberlist.xlsx">Click to download</a>
                  <br><br>
                  
                  <form class="forms-sample" action="<?=base_url();?>organization/save_admin_member_bulk" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="nextno" value="<?=$nextno;?>">
                    <input type="hidden" name="orgid" value="<?=$this->session->userdata('orgid');?>">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1"></label>
                      <input type="file" class="form-control" id="meberfile" required="required" name="meberfile">
                    </div>
                    

                   
                    
                                        
                    <button type="submit" class="btn btn-primary me-2">Upload</button>
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
  
  let contno = document.forms["myForm"]["contno"].value;
  

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


  function isInteger(str) {
  // Try to parse the string as an integer
   //const integerPattern = /^[-+]?[0-9]+$/;
   const integerPattern = /^[-+]?\d+$/;
  // Test the string against the pattern
  return integerPattern.test(str);
  }
}
</script>

  <script type="text/javascript">
    $(function(){

      var baselink = "<?php echo base_url()?>";

      $('#utype').change(function(){
        var utype = $('#utype').val();
        //alert(utype);
        $.ajax({
                                type: 'POST',
                                url:baselink+'organization/get_username_by_type',
                                dataType: 'json',
                                data:{'utype':utype},
                                success: function(response){
                                     $('#username').val(response);                         
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }

              });
      });
    });
  </script>
</body>

</html>

