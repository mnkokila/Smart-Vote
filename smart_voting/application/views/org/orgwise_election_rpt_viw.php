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


  <link rel="stylesheet" href="<?=base_url();?>assets/css/dataTables.dataTables.css">
<link rel="stylesheet" href="<?=base_url();?>assets/css/buttons.dataTables.css">
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


                    

                        


            

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <form action="<?=base_url();?>reports/yearly_org_election_list" method="post">
                    <div class="row">
                     <div class="col-md-1">Enter Year</div> 
                    <div class="col-md-2">
                      <input type="number" name="curyear" id="curyear" required="required" class="form-control"  value="<?=$years;?>">
                    </div>
                    <div class="col-md-2"><button type="submit" class="btn btn-sm btn-success" name="searchbtn">Search</div> 
                  </div>

                  <div class="row">
                     <div class="col-md-1">Enter Month</div> 
                    <div class="col-md-2">
                      <input type="number" name="curmonth" id="curmonth" required="required" class="form-control"  value="<?=$years;?>">
                    </div>
                    <div class="col-md-2"><button type="submit" class="btn btn-sm btn-success" name="searchbtn">Search</div> 
                  </div>

                  </form>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Election List (<?=$years;?>)</h4>
                  

                  <div class="table-responsive">
                    <table class="table table-hover" id="example">
                      <thead>
                        <tr>
                          <th>Eelction name</th>
                          <th>Year</th>
                          <th>Start and End</th>
                          <th>No of voters</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //print_r(electionslist);
                        if($electionslist){
                         foreach($electionslist as $ols){

                        ?>
                        <tr>
                          <td><?php echo $ols['election_name'];?></td>
                          <td><?php echo $ols['elect_year'];?></td>
                          <td><?php echo $ols['start_n_end'];?></td>
                          <td><?php echo $ols['votercount'];?></td>
                          
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

  <script src="<?=base_url();?>assets/js/jquery-3.7.1.js"></script>
<script src="<?=base_url();?>assets/js/dataTables.js"></script>
<script src="<?=base_url();?>assets/js/dataTables.buttons.js"></script>
<script src="<?=base_url();?>assets/js/buttons.dataTables.js"></script>
<script src="<?=base_url();?>assets/js/jszip.min.js"></script>
<script src="<?=base_url();?>assets/js/pdfmake.min.js"></script>
<script src="<?=base_url();?>assets/js/vfs_fonts.js"></script>
<script src="<?=base_url();?>assets/js/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/js/buttons.print.min.js"></script>


  <script type="text/javascript">
    $(function(){

      new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});

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

