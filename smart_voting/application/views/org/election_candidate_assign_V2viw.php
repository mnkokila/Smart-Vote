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
                  <h4 class="card-title">Assign Candidate</h4>
                  
                    <form action="<?=base_url();?>elections/add_candidates_v2" method="post">
                    <input type="hidden" name="orgid" value="<?=$this->session->userdata('orgid');?>">
                    <input type="hidden" name="electionids" value="<?=$eid;?>">
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
                      <select class="form-control" id="positions" name="positions" required="required">
                        <option value="">Select Positions</option>
                         <?php
                         if($position){
                          foreach($position as $po){
                         ?>
                         <option value="<?=$po->ep_id;?>"><?=$po->position;?></option>
                         <?php
                          }
                         }
                         ?>    
                                               
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputUsername1">Candidate</label>
                    <select name="member[]" id="member"  class="form-control select2 chosen-select" multiple required="required">
                      <option value="">Select members</option>
                                            
                    </select>
                    
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

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Election Candidates list</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Election</th>
                          <th>Candidates</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //print_r($candidatelist);
                        if($candidatelist){
                         foreach($candidatelist as $el){

                        ?>
                        <tr>
                          <td><?php echo $el['electionname'];?></td>
                          <td>
                            <?php
                             if($el['positions']){
                              foreach($el['positions'] as $ep){
                                echo "<strong>" . $ep['position']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='".base_url()."/elections/edit_election_candidate/".$el['electionid']."/".$ep['positionid']."' class='btn btn-sm btn-info'>Edit</a></strong><br>";
                                echo "<ul>";
                                foreach($ep['candidates'] as $cd){
                                  echo "<li>".$cd->user_full_name."</li>";
                                }
                                echo "</ul>";
                              }
                             }
                             
                            ?>
                          </td>
                                                    
                          <td>
                            <?php
                            if($el['election_end_status']==0){
                               ?>
                               <button class="btn btn-sm btn-warning">Election End</button>
                               <?php
                            }else{
                            ?>
                            <!--<a href="<?php echo base_url();?>elections/edit_election_candidate/<?php echo $el['electionid'];?>" class="btn btn-sm btn-info">Edit</a>-->
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

     $('#electionid').change(function(){
        $('#positions').html("");
        var electionid = $('#electionid').val();
        get_members_list(electionid);

        
          $.ajax({
                                type: 'POST',
                                url:baselink+'elections/get_positions',
                                dataType: 'json',
                                data:{'electionid':electionid},
                                success: function(response){
                                     $('#positions').append("<option value=''>Select Position</option>")
                                     //$('#username').val(response); 
                                     $.each(response, function (index, value) {
                                       $('#positions').append("<option value='"+value.ep_id+"'>"+value.position+"</option>");
                                     });                        
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }

              });
        

      });
     
     var electionid = '<?php echo $eid;?>';
     get_members_list(electionid);

     function get_members_list(electionid){
      $('#member').html("");
       $.ajax({
                                type: 'POST',
                                url:baselink+'elections/get_other_members',
                                dataType: 'json',
                                data:{'electionid':electionid},
                                success: function(response){
                                     console.log(response)
                                     
                                     //$('#username').val(response); 
                                     $.each(response, function (index, value) {
                                       $('#member').append("<option value='"+value.user_id+"'>"+value.user_full_name+"["+value.admin_nic+"]</option>");
                                       $('#member').trigger("chosen:updated");
                                     });                        
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }

              });
     }

    });
  </script>
  
</body>

</html>

