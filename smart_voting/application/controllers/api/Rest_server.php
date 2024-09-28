<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Rest_server extends REST_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model("Api_model");
        
    }

    public function register_post(){
       $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         $nic = $this->post('nic');
         $email = $this->post('email');
         $pw = md5(sha1($this->post('password')));
         $memname = $this->post('membername');
         //check nic no exists in the member table..
         $checkexistingnic = $this->Api_model->check_nic_exist($nic);
         if($checkexistingnic==1){
           $checkcommonlogin = $this->Api_model->check_common_login_exist($email,$nic);
           if($checkcommonlogin==0){
             $regarr['nic'] = $nic;
             $regarr['email'] = $email;
             $regarr['password'] = $pw;
             $regarr['member_name'] = $memname;
             $regstts = $this->Api_model->login_register($regarr);
             if($regstts){
               $response['status'] = 200;
               $response['message'] = 'Registration Success.Now you can login with given email and password';
               $this->set_response($response, REST_Controller::HTTP_OK);
             }else{
              $this->response(array('status' => 401,'message' => 'Error Registration!!!'), 401);
             }
           }else{
             $this->response(array('status' => 401,'message' => 'You have Already Registered !!!'), 401);
           }
         }else{
          $this->response(array('status' => 401,'message' => 'NIC No not Found in our database !!!'), 401);
         }

        }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
        } 
    }


    // to do..
    public function forget_password_post(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         $email = $this->post('email');
         $checkemailvalidity = $this->Api_model->check_email_validity($email);
         if($checkemailvalidity['stts']==1){
          // send reset email to the member
               $reset_url = base_url()."org_admin_dashboard/app_login_password_reset/".$checkemailvalidity['datas']->common_login_id."/".$checkemailvalidity['datas']->nic;

               $response['status'] = 200;
               $response['message'] = 'Go to Your Email and click on Reset Password Link';
               $response['url'] = $reset_url;

               $this->set_response($response, REST_Controller::HTTP_OK);
         }else{
          $this->response(array('status' => 401,'message' => 'Email not Valid. !!!'), 401);
         }         

        }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
        } 
    }



    public function login_post(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         $un = $this->post('username');
         $pw = md5(sha1($this->post('password')));
         $checklogin = $this->Api_model->check_login($un,$pw);
         if($checklogin['stts']==1){
           $response['status'] = 200;
           $response['TOKEN'] = "dfxalanfcifdfffdfs";
           $response['member'] = $checklogin['datas']->member_name;
           $response['nic'] = $checklogin['datas']->nic;

           $this->set_response($response, REST_Controller::HTTP_OK);
         }else{
          $this->response(array('status' => 401,'message' => 'Invalid Login.please Try Again !!!'), 401);
         } 

        }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
        } 
    }


    public function available_org_get(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         $nic = $this->get('nic');
         
         //$checkevestts = $this->Api_model->get_available_elections($nic);
         $checkevestts = $this->Api_model->get_available_orglist($nic);
         if($checkevestts['stts']==1){
           $response['status'] = 200;
           $response['records'] = $checkevestts['orgs'];
           $this->set_response($response, REST_Controller::HTTP_OK);
         }else{
          $this->response(array('status' => 401,'message' => 'No Records found!!!'), 401);
         } 

        }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
        } 
    }


    public function available_elections_get(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         $orgid = $this->get('orgid');
         
         $checkevestts = $this->Api_model->get_available_elections($orgid);
         if($checkevestts['stts']==1){
           $response['status'] = 200;
           $response['records'] = $checkevestts['elections'];
           $this->set_response($response, REST_Controller::HTTP_OK);
         }else{
          $this->response(array('status' => 401,'message' => 'No Records found!!!'), 401);
         } 

        }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
        } 
    }

    public function available_positions_get(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         $eid = $this->get('electionid');
         
         $checkevestts = $this->Api_model->get_available_positions($eid);
         if($checkevestts['stts']==1){
           $response['status'] = 200;
           $response['records'] = $checkevestts['positions'];
           $this->set_response($response, REST_Controller::HTTP_OK);
         }else{
          $this->response(array('status' => 401,'message' => 'No Records found!!!'), 401);
         } 

        }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
        } 
    } 

    
    public function candidate_list_get(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         
         $positionid = $this->get('positionid');
         $checkevestts = $this->Api_model->get_candidates_list_byElection($positionid);
         if($checkevestts['stts']==1){
           $response['status'] = 200;
           $response['records'] = $checkevestts['elections_candidates'];
           $this->set_response($response, REST_Controller::HTTP_OK);
         }else{
          $this->response(array('status' => 401,'message' => 'No Records found!!!'), 401);
         } 

        }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
        } 
    }

    public function vote_add_get(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         $candidate_id = $this->get('candidate_id');
         $voter_id = md5(sha1($this->get('voter_id')));
         $election_id = $this->get('electionid');
         $positionid = $this->get('positionid');


         $votearr['candidate_id'] = $candidate_id;
         $votearr['nic_no'] = $voter_id;
         $votearr['elelction_id'] = $election_id;
         $votearr['position_id'] = $positionid;
         
        $checkexist = $this->Api_model->check_already_vote($voter_id,$election_id,$positionid);
        if($checkexist){
          $this->response(array('status' => 401,'message' => 'Sorry..You have already voted!!!'), 401);
        }else{
           $voteaddstts = $this->Api_model->add_vote($votearr);
           if($voteaddstts){
             //$response['status'] = 200;
             //$this->set_response($response, REST_Controller::HTTP_OK);
            $this->response(array('status' => 200,'message' => 'Your Vote Added!!!'), 401);
           }else{
            $this->response(array('status' => 401,'message' => 'Error adding vote!!!'), 401);
           }
        }
      }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
      } 
    }


    public function winnerslist_get(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
      if($check_auth_client == true){
         $winnerlist = $this->Api_model->get_winner_list();
         if($winnerlist['stts']==1){
           $response['status'] = 200;
           $response['records'] = $winnerlist['winners'];
           $this->set_response($response, REST_Controller::HTTP_OK);
         }else{
          $this->response(array('status' => 401,'message' => 'No Records found!!!'), 401);
         } 

      }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
      }
    }

    function electionresults_get(){
      $check_auth_client = true;//$this->Api_model->check_auth_client();
        if($check_auth_client == true){
         $orgid = $this->get('orgid');
         
         $checkevestts = $this->Api_model->get_org_related_election_results($orgid);
         if($checkevestts['stts']==1){
           $response['status'] = 200;
           $response['records'] = $checkevestts['results'];
           $this->set_response($response, REST_Controller::HTTP_OK);
         }else{
          $this->response(array('status' => 401,'message' => 'No Records found!!!'), 401);
         } 

        }else{
          $this->response(array('status' => 401,'message' => 'access denaid !!!'), 401);
        } 

    }


}