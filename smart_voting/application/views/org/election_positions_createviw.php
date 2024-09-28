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

  <link rel="stylesheet" href="<?=base_url();?>assets/css/chosen.css">
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


                    <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Positions</h4>
                  
                    
                    <input type="hidden" name="orgid" value="<?=$this->session->userdata('orgid');?>">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Election</label>
                      <select class="form-control" id="electionid" name="electionid" required="required" disabled="">
                        <option value="">Select Election</option>
                        <?php
                        if($electionlist){
                          foreach($electionlist as $el){
                          if($el->election_end_status==1){
                            if($eid==$el->election_main_id){
                        ?>
                        <option value="<?php echo $el->election_main_id;?>" selected><?php echo $el->election_name;?></option>
                        <?php
                             }else{
                              ?>
                              <option value="<?php echo $el->election_main_id;?>"><?php echo $el->election_name;?></option>
                              <?php
                             }
                            }
                          }
                        }
                        ?>
                        
                                               
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Positions</label>
                      <input type="text" name="positions" id="positions" class="form-control">
                    
                  </div>

                   
   
                    
                                        
                    <button type="submit" class="btn btn-primary me-2" id="addpositions">Add</button>
                    

                    
                    <div id="">
                      <ul id="addedposition"></ul>
                      <div id="showhidenextbtn">
                        <a href="<?=base_url();?>Elections/assign_candidatesV2/<?=$eid;?>" class="btn btn-sm btn-success">Next</a>
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

  <script src="<?=base_url();?>assets/js/chosen.jquery.js" type="text/javascript"></script>
  <!-- End custom js for this page-->

  <script type="text/javascript">
    
    $(function(){
      var baselink = "<?php echo base_url()?>";
      $(".chosen-select").chosen({allow_single_deselect: true}); 
      
      $('#showhidenextbtn').hide();

      $('#addpositions').click(function(){
        $('#addedposition').html("");
        var electionid = $('#electionid').val();
        var positions = $('#positions').val();

        if(electionid=="" || positions==""){
          alert("please select election and member")
        }else{
          $.ajax({
                                type: 'POST',
                                url:baselink+'elections/add_positions',
                                dataType: 'json',
                                data:{'electionid':electionid,'positions':positions},
                                success: function(response){
                                  console.log(response)
                                    if(response.stts==1){
                                       $('#positions').val(""); 
                                       $.each(response.data, function (index, value) {
                                         $('#addedposition').append("<li>"+value.position+"</li>");
                                       });
                                       $('#showhidenextbtn').show();
                                    }else{
                                       alert("Given Position is already Exists")
                                       $.each(response.data, function (index, value) {
                                         $('#addedposition').append("<li>"+value.position+"</li>");
                                       });
                                       $('#showhidenextbtn').show();
                                    }
                                                             
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }

              });
        }

      });



      $('#electionid').change(function(){
        $('#addedposition').html("");
        var electionid = $('#electionid').val();
        

        
          $.ajax({
                                type: 'POST',
                                url:baselink+'elections/get_positions',
                                dataType: 'json',
                                data:{'electionid':electionid},
                                success: function(response){

                                     //$('#username').val(response); 
                                     $.each(response, function (index, value) {
                                       $('#addedposition').append("<li>"+value.position+"</li>");
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

