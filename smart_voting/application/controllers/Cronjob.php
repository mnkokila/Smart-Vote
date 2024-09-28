<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller {
    
   function __construct()    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    } 

   function auto_election_end_process(){
   	  $datenow = date("Y-m-d H:i:s");
   	  echo $datenow;
      $tobeendelectionslist = $this->organization_model->get_to_be_end_elections($datenow);
      if($tobeendelectionslist){
        foreach($tobeendelectionslist as $eleclist){
        	$updarr['election_end_status'] = 0;
            $elecid = $eleclist->election_main_id;
		      $getpositions = $this->organization_model->get_position_list($elecid);
		      if($getpositions){

		        foreach($getpositions as $posi){
		          $getmaxvotecandidate = $this->organization_model->calculate_max_vote_candidate_V1($elecid,$posi->ep_id);
		            if($getmaxvotecandidate){
                  //print_r($getmaxvotecandidate);
                  $maxVotes = -1; // Initialize with a value lower than possible votes
                  $candidatesWithMaxVotes = array();

                  foreach($getmaxvotecandidate as $mcc){
                   
                   $totalVotes = $mcc->total_votes;

                      if ($totalVotes > $maxVotes) {
                          $maxVotes = $totalVotes;
                          $candidatesWithMaxVotes = array($mcc);
                      } elseif ($totalVotes == $maxVotes) {
                          $candidatesWithMaxVotes[] = $mcc;
                      }
         
                    
                  }


                  foreach ($candidatesWithMaxVotes as $candidate) {
                      $candidate_id = $candidate->candidate_id;
                      $total_votes = $candidate->total_votes;
                      $elecid = $elecid;
                      $positionid = $posi->ep_id;

                      $updateelectionwinner['winner_stts'] = 1;
                      $updateelectionwinner['vote_count'] = $total_votes;

                      $this->organization_model->update_winner_v2($candidate_id,$elecid,$positionid,$updateelectionwinner);

                  }

                  $updstts = $this->organization_model->update_end_process($elecid,$updarr);
                           
                  //print_r($candidatesWithMaxVotes);
		             /* $updateelectionwinner['winner_stts'] = 1;
                  $updateelectionwinner['vote_count'] = 1;
		              $updatewinnerstts = $this->organization_model->update_winner($updateelectionwinner,$elecid,$getmaxvotecandidate);
		              if($updatewinnerstts){
		                $updstts = $this->organization_model->update_end_process($elecid,$updarr);
		                
		              } */



		            }
		        }

		      }
        }
      }

      
   }


   function auto_inactive_organization(){
    $curday = date("Y-m-d");
    $orgstts['active_stts'] = 0;
    $this->organization_model->check_expire_date($curday,$orgstts);
   }

  

}