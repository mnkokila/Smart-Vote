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
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/vertical-layout-light/style.css">
  <script src="<?=base_url();?>assets/js/sweetalert.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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


                    


            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Organization list</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ORG Name</th>
                          <th>Contact No</th>
                          <th>Address</th>
                          <th>ORG Code</th>
                          <th></th>
                          <th></th>
                          <th>Payment Activate</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //print_r($orglist);
                        if($orglist){
                         foreach($orglist as $ols){

                        ?>
                        <tr>
                          <td><?php echo $ols['org_name'];?></td>
                          <td><?php echo $ols['contact_no'];?></td>
                          <td><?php echo $ols['address'];?></td>
                          <td><label class="badge badge-danger"><?php echo $ols['org_code'];?></label></td>
                          <td><a href="<?php echo base_url();?>organization/edit_organization/<?php echo $ols['org_id'];?>" class="btn btn-sm btn-info">Edit</a></td>
                          <td>
                            <?php
                            if($ols['is_admin_creted']==0){
                            ?>
                            <a class="btn btn-sm btn-info" href="<?=base_url();?>organization/create_org_admin/<?php echo $ols['org_id'];?>/<?php echo $ols['org_code'];?>">Create ORG Admin</a>
                            <?php
                            }else{
                            ?>
                            <button class="btn btn-sm btn-warning viewadmins" data-orgname="<?php echo $ols['org_name'];?>" data-orgid="<?php echo $ols['org_id'];?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View ORG Admins</button>
                            <?php  
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            //if($ols['active_stts']==0){
                              ?>
                              <a class="btn btn-sm btn-success" href="<?php echo base_url();?>organization/makepaymentdone/<?php echo $ols['org_id'];?>" onclick="return confirm('Are you sure You want proceed this organization payMent renewal?')">Payment Renewal</a>
                              <?php
                            //}
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




<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <table class="table">
           <tbody id="adminslist"></tbody>
         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
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
    swal("Error!", "Please Enter Numbers only.you can use + also", "error");
    return false;
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


<script type="text/javascript">
  $(function(){


     var baselink = "<?php echo base_url()?>";

    $('.viewadmins').click(function(){
      var orgname = $(this).attr('data-orgname');
      var orgid = $(this).attr('data-orgid');
      console.log(orgname)
      $('#staticBackdropLabel').html(orgname+" Admin List");
      $('#adminslist').html("");
      $.ajax({
                                type: 'POST',
                                url:baselink+'organization/get_adminlist',
                                dataType: 'json',
                                data:{'orgid':orgid},
                                success: function(response){
                                  //console.log(response)
                                    // $('#username').val(response); 
                                    $.each(response, function(index, value) {
                                        var actinactstts = "";
                                        if(value.u_active_stts==1){
                                          actinactstts = "Active";
                                        }else{
                                          actinactstts = "Inactive";
                                        }

                                        $('#adminslist').append('<tr><td>'+value.user_full_name+'</td><td>'+actinactstts+'</td></tr>');
                                    });                        
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

