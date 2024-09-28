<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Elections extends CI_Controller {

	public function index()
	{
	   $this->is_logged();	
	   $data['electionlist'] = $this->organization_model->get_all_election_list();	
       $this->load->view('org/election_manage_viw',$data); 
	}

  function elections_edits(){
    
    $data['electionlist'] = $this->organization_model->get_all_election_list(); 
    $this->load->view('org/elections_edit_viw',$data);
  }

    function save_election(){
       //$eyear = $this->input->post('eyear');
       //$electmnt = $this->input->post('electmnt');
       $election_name = $this->input->post('election_name');
       $electfrom = $this->input->post('electfrom');
       $electto = $this->input->post('electto');

       $eyear = date('Y', strtotime($electfrom));
       $electmnt = "";


		$electionadd['election_name'] = $this->session->userdata('orgcode')." ".$election_name;
		$electionadd['org_id'] = $this->session->userdata('orgid');
		$electionadd['elect_year'] = $eyear;
		$electionadd['elect_month'] = $electmnt;
		$electionadd['election_start'] = $electfrom;
		$electionadd['election_end'] = $electto;
		$electionadd['election_active_stts'] = 1;
    $electionadd['election_end_status'] = 1;

		$electionid = $this->organization_model->add_new_election($electionadd);
        if($electionid){
          //$this->session->set_flashdata('successmsg', 'Succesfully Created Election');	
          redirect('Elections/elections_positions_create/'.$electionid);
		}else{
		  $this->session->set_flashdata('errormsg', 'Error creating Election');		
		  redirect('Elections');
		}
    }

    function active_inactive_elections(){
    	$electionid = $this->uri->segment(3);
        $stts = $this->uri->segment(4);
        
        $updelection['election_active_stts'] = $stts;
        $update_electionstts = $this->organization_model->update_election($electionid,$updelection);
        if($update_electionstts){
          $this->session->set_flashdata('successmsg', 'Succesfully Update Election');	
          redirect('Elections');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error Updating Election');		
		  redirect('Elections');
		}
    }


    function edit_election(){
      $eid = $this->uri->segment(3);
      $data['electiondata'] = $this->organization_model->election_data($eid); 
      $this->is_logged(); 
      $this->load->view('org/election_edit_viw',$data); 
    }

    function update_elections(){
      $electid = $this->input->post('electid');
      //$eyear = $this->input->post('eyear');
       $electmnt = "";
       $election_name = $this->input->post('election_name');
       $electfrom = $this->input->post('electfrom');
       $electto = $this->input->post('electto');

       $eyear = date('Y', strtotime($electfrom));

      $electionadd['election_name'] = $election_name;
      $electionadd['elect_year'] = $eyear;
      $electionadd['elect_month'] = $electmnt;
      $electionadd['election_start'] = $electfrom;
      $electionadd['election_end'] = $electto;

      $update_electionstts = $this->organization_model->update_election($electid,$electionadd);
        if($update_electionstts){
          $this->session->set_flashdata('successmsg', 'Succesfully Update Election'); 
          redirect('elections/elections_edits');
      }else{
        $this->session->set_flashdata('errormsg', 'Error Updating Election');   
        redirect('elections/elections_edits');
      }
    
    }

    function assign_candidates(){
      $this->is_logged();
      $data['electionlist'] = $this->organization_model->get_elections();
      $data['memberlist'] = $this->organization_model->get_members_all();
      $data['candidatelist'] = $this->organization_model->get_candidates();
      //print_r($data['candidatelist']);
      $this->load->view('org/election_candidate_assign_viw',$data); 
    }

    function assign_candidatesV2(){
      $this->is_logged();
      $eid = $this->uri->segment(3);
      $data['eid'] = $eid;
      $data['position'] = $this->organization_model->get_position_list($eid);
      $data['electionlist'] = $this->organization_model->get_elections();
      $data['memberlist'] = $this->organization_model->get_members_all();
      $data['candidatelist'] = $this->organization_model->get_candidates();
      //print_r($data['candidatelist']);
      $this->load->view('org/election_candidate_assign_V2viw',$data); 
    }

    function add_candidates(){
      $orgid = $this->input->post('orgid');
      $electionid = $this->input->post('electionid');
      $member = $this->input->post('member');
      $positions = $this->input->post('positions');

       //echo $orgid." ".$electionid;
       //echo "<br>";
       foreach($member as $m){
        //echo $m."<br>";
         $candarr['candidate_id'] = $m;
         $candarr['election_id'] = $electionid;
         $candarr['position_id'] = $positions;
         $this->organization_model->add_election_candidate($candarr,$m,$electionid,$positions);
       }

       $this->session->set_flashdata('successmsg', 'Succesfully added Election candidates'); 
       redirect('Elections/assign_candidates');

    }

    function add_candidates_v2(){
      $orgid = $this->input->post('orgid');
      $electionid = $this->input->post('electionids');
      $member = $this->input->post('member');
      $positions = $this->input->post('positions');

       //echo "org - ".$orgid." elec -".$electionid." pos - ".$positions;
       //echo "<br>";
       foreach($member as $m){
        //echo $m."<br>";
         $candarr['candidate_id'] = $m;
         $candarr['election_id'] = $electionid;
         $candarr['position_id'] = $positions;
         $this->organization_model->add_election_candidate($candarr,$m,$electionid,$positions);
       } 

       $this->session->set_flashdata('successmsg', 'Succesfully added Election candidates'); 
       redirect('Elections/assign_candidatesV2/'.$electionid);

    }

    function edit_election_candidate(){
      $this->is_logged();
      $elecid = $this->uri->segment(3);
      $positionid = $this->uri->segment(4);
      $data['election_id'] = $elecid;
      $data['positionid'] = $positionid;
       
      $data['positionname'] = $this->organization_model->get_position_name($positionid);

      $data['electionlist'] = $this->organization_model->get_elections();
      $data['memberlist'] = $this->organization_model->get_members($elecid,$positionid);
      $data['candidatelist'] = $this->organization_model->get_assigned_candidates($elecid,$positionid);//
      $data['candidatelist1'] = [6,13,29,31];
      $this->load->view('org/election_candidate_assign_edit_viw',$data); 
    }

    function edit_assign_candidate(){
      $orgid = $this->input->post('orgid');
      $electionids = $this->input->post('electionids');
      $positionids = $this->input->post('positionids');
      $electionid = $this->input->post('electionid');
      $member = $this->input->post('member');
      
      $deleteold = $this->organization_model->delete_previous_candidates($electionids,$positionids);
      if($deleteold){
        foreach($member as $m){
         $candarr['candidate_id'] = $m;
         $candarr['election_id'] = $electionids;
         $candarr['position_id'] = $positionids;
         $this->organization_model->add_election_candidate($candarr,$m,$electionid,$positionids);
       }
      }
       
       $this->session->set_flashdata('successmsg', 'Succesfully edit Election candidates'); 
       redirect('Elections/assign_candidates');
      
    }

    function end_elections(){
      $this->is_logged();
      $data['electionlist'] = $this->organization_model->get_all_election_list_activelist();
      $this->load->view('org/manual_end_elections_viw',$data); 
    }

    function manual_end_election_process(){
      $elecid = $this->uri->segment(3);
      $updarr['election_end_status'] = 0;
      
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

      $this->session->set_flashdata('successmsg', 'Succesfully end Election'); 
      redirect('Elections/end_elections');


      // calculate votes count and update winner..
      
    
    }

    function elections_positions(){
      $this->is_logged();
      $data['electionlist'] = $this->organization_model->get_elections();
      $this->load->view('org/election_positions_viw',$data);
    }

    function elections_positions_create(){
      $this->is_logged();
      $eid = $this->uri->segment(3);
      $data['eid'] = $eid;
      $data['electionlist'] = $this->organization_model->get_elections();
      $this->load->view('org/election_positions_createviw',$data);
    }


    function elections_results(){
      $this->is_logged();
      //$data['electionwithresullts'] = $this->organization_model->get_elections_with_results();
      $orgid = $this->session->userdata('orgid');
      $data['electionwithresullts'] = $this->organization_model->get_org_related_election_results($orgid);
      $this->load->view('org/election_results_viw',$data); 
    }

    function add_positions(){
      $electionid = $this->input->post('electionid');
      $positions = $this->input->post('positions');
      $elect['election_id'] = $electionid;
      $elect['position'] = $positions;
      $checkexists = $this->organization_model->check_exist_position($electionid,$positions);
      if($checkexists==0){
       $insertstts = $this->organization_model->add_election_positions($elect);
       if($insertstts){
        $getlist = $this->organization_model->get_position_list($electionid);
        $newarr['stts'] = 1;
        $newarr['data'] = $getlist;
        echo json_encode($newarr);
       }
      }else{
        $getlist = $this->organization_model->get_position_list($electionid);
        $newarr['stts'] = 0;
        $newarr['data'] = $getlist;
        echo json_encode($newarr);
      }
      
    }

    function get_positions(){
      $electionid = $this->input->post('electionid');
      $getlist = $this->organization_model->get_position_list($electionid);
        echo json_encode($getlist);
    }

    function get_other_members(){
      $electionid = $this->input->post('electionid');
      $getlist = $this->organization_model->get_other_members($electionid);
        echo json_encode($getlist);
    }
    

    function is_logged(){
      if($this->session->userdata('userid')==""){
      	redirect('login');
      }
	}


}