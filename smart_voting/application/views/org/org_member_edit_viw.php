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
                  <h4 class="card-title">Edit Organization Member</h4>
                  
                  <form class="forms-sample" action="<?=base_url();?>org_admin_dashboard/update_member_details" method="post">
                    <input type="hidden" name="orgid" value="<?=$this->session->userdata('orgid');?>">
                    <input type="hidden" name="memno" id="memno" value="<?=$memid;?>">
                    <!--<div class="form-group">
                      <label for="exampleInputUsername1">User Type</label>
                      <select class="form-control" id="utype" name="utype" required="required">
                        <option value="">Select User Type</option>
                        <option value="1">Member</option>
                        <option value="2">Member</option>
                      </select>
                    </div>-->
                    <div class="form-group">
                      <label for="exampleInputUsername1">Member name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Member name" required="required" name="memname" value="<?=$memberdetails->user_full_name;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Member Contact NO</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Member Contact NO" required="required"name="contno" value="<?=$memberdetails->u_contact_no;?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Member Address</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Member Address" required="required"name="address" value="<?=$memberdetails->u_address;?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Member Email-Address</label>
                      <input type="email" class="form-control" id="exampleInputUsername1" placeholder="Member Email-Address" required="required"name="mail_address" value="<?=$memberdetails->u_email_address;?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Member NIC</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Member NIC" required="required" name="nic" value="<?=$memberdetails->admin_nic;?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text" class="form-control" id="username" placeholder="Username" required="required" name="username" readonly="readonly" value="<?=$memberdetails->u_username;?>">
                    </div>

                   
                    
                                        
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="<?=base_url();?>org_admin_dashboard/create_org_admin" class="btn btn-sm btn-default me-2">Cancel</a>
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
        <?php $this->load->view('org/common/footer');?>
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

