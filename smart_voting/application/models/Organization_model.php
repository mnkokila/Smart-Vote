<?php

class Organization_model extends CI_Model {

    function __construct()    {
        parent::__construct();
    }

    function get_current_priceid(){
    	$sql = "SELECT * FROM payment_config ORDER BY price_id DESC limit 1";
    	$query = $this->db->query($sql);
    	if($query->num_rows()>0){
    		return $query->row()->price_id;
    	}else{
    		return 0;
    	}
    }

    function save_organization($orgarr){
    	$this->db->insert('organization',$orgarr);
    	return $this->db->insert_id();
    }

    function insert_org_payment($orgpaymentarr){
    	return $this->db->insert('org_registration_payment',$orgpaymentarr);
    }

    function get_all_organization_list(){
    	$this->db->select('*');
    	$this->db->from('organization');
    	$query = $this->db->get();
    	if($query->num_rows()>0){
    		return $query->result();
    	}else{
    		return [];
    	}
    }

    function check_org_admin_exist($org_id){
    	$this->db->where('org_id',$org_id);
    	$query = $this->db->get('org_member_users');
    	if($query->num_rows()>0){
    		return 1;
    	}else{
    		return 0;
    	}
    }

    function save_organization_admin($orgadminarr){
    	return $this->db->insert('org_member_users',$orgadminarr);
    }

    function get_member_count($utypeid){
       $orgid = $this->session->userdata('orgid'); 
       $sql = "SELECT COUNT(org_id) AS memcount FROM org_member_users WHERE org_id='$orgid' AND user_type='$utypeid' GROUP BY org_id";
       $query=$this->db->query($sql);
       if($query->num_rows()>0){
        return $query->row()->memcount+1;
       }else{
        return 1;
       }
    }

    function get_org_admins(){
        $orgid = $this->session->userdata('orgid'); 
        $sql = "SELECT * FROM org_member_users WHERE org_id='$orgid'";
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function update_user($userid,$updmember){
        $this->db->where('user_id',$userid);
        return $this->db->update('org_member_users',$updmember);
    }

    function get_all_election_list(){
        $orgid = $this->session->userdata('orgid'); 
        $sql = "SELECT * FROM elections WHERE org_id='$orgid' ORDER BY election_main_id DESC";
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_all_election_list_activelist(){
        $orgid = $this->session->userdata('orgid'); 
        $sql = "SELECT * FROM elections WHERE org_id='$orgid' AND election_end_status=1 ORDER BY election_main_id DESC";
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }


    function blavla(){
        $sql = "";
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }    

    function add_new_election($electionadd){
        $this->db->insert('elections',$electionadd);
        return $this->db->insert_id();
    }

    function update_election($electionid,$updelection){
        $this->db->where('election_main_id',$electionid);
        return $this->db->update('elections',$updelection);
    }

    function get_active_member_count($id){
        $orgid = $this->session->userdata('orgid'); 
        $sql = "SELECT * FROM org_member_users WHERE u_active_stts='$id' AND org_id='$orgid'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    function get_active_election_count($id){
        $orgid = $this->session->userdata('orgid'); 
        $sql = "SELECT * FROM elections WHERE election_active_stts='$id' AND org_id='$orgid'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    function get_org_count(){
        $sql = "SELECT * FROM organization WHERE active_stts=1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    function get_inactive_org_count(){
        $sql = "SELECT * FROM organization WHERE active_stts=0";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    function get_admin_count(){
        $sql = "SELECT * FROM site_admin WHERE main_active_stts=1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    function get_inactive_admin_count(){
        $sql = "SELECT * FROM site_admin WHERE main_active_stts=0";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }

    

    }

    function insert_member_bulk($instarr){
        return $this->db->insert_batch('org_member_users',$instarr);
    }

    function checkmember_exist($orgid,$nic){
        $sql = "SELECT * FROM org_member_users WHERE org_id='$orgid' AND admin_nic='$nic'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return 1;
        }else{
            return 0;
        }
    }

    function get_member_details($memno){
        $sql = "SELECT * FROM org_member_users WHERE user_id='$memno'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
    }

    function get_org_detail($orgid){
         $sql = "SELECT * FROM organization WHERE org_id='$orgid'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->row();
        }else{
            return [];
        }
    }

    function update_org_data($orgarr,$orgid){
        $this->db->where('org_id',$orgid);
        return $this->db->update('organization',$orgarr);
    }

    function get_next_org_memno(){
        $orgid = $this->session->userdata('orgid'); 
        $sql = "SELECT * FROM org_member_users WHERE org_id='$orgid' AND user_type=2 ORDER BY user_id DESC LIMIT 1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            //return $query->row();
            $orgcode = $this->session->userdata('orgcode')."MEM";
            $nextno = 0;//trim(str_replace($orgcode,'',$query->row()->u_username))+1;

            return $nextno;
        }else{
            return 1;
        }
    }

    function election_data($eid){
        $this->db->where('election_main_id',$eid);
        $query = $this->db->get('elections');
        return $query->row();
    }

    function reset_pw($id,$update_comm_logarr){
        $this->db->where('common_login_id',$id);
        return $this->db->update('common_login',$update_comm_logarr);
    }

    function get_elections(){
        $orgid = $this->session->userdata('orgid'); 
        $sql = "SELECT * FROM elections WHERE org_id='$orgid' AND election_active_stts=1 ORDER BY election_main_id='DESC'";
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_members($elecid,$positionid){
        $orgid = $this->session->userdata('orgid');
        //$sql = "SELECT * FROM org_member_users WHERE org_id='$orgid' AND u_active_stts=1";
 
        $sql ="SELECT * FROM org_member_users WHERE u_active_stts=1 AND org_id='$orgid' AND user_id NOT IN (SELECT candidate_id FROM election_candidates WHERE election_id='$elecid' AND position_id!='$positionid')";

        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_members_all(){
        $orgid = $this->session->userdata('orgid');
        $sql = "SELECT * FROM org_member_users WHERE org_id='$orgid' AND u_active_stts=1";
 
        
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function add_election_candidate($candarr,$m,$electionid,$positionids){
        $this->db->where('candidate_id',$m);
        $this->db->where('election_id',$electionid);
        $this->db->where('position_id',$positionids);
        $query = $this->db->get('election_candidates');
        if($query->num_rows()==0){
          return $this->db->insert('election_candidates',$candarr);    
        }
        
    }

    function get_candidates(){
       $mainarr = []; 
       $orgid = $this->session->userdata('orgid');
       $this->db->order_by('election_main_id','DESC');
       $this->db->where('org_id',$orgid);

       $query1 = $this->db->get('elections');
       if($query1->num_rows()>0){


          $elections = $query1->result();
          foreach($elections as $e){
            $election_id = $e->election_main_id;
            $subarr['electionid'] = $election_id;
            $subarr['electionname'] = $e->election_name." ".$e->elect_year;
            $subarr['election_end_status'] = $e->election_end_status;
            $subarr['positions'] = $this->get_position_list_all($election_id);
            array_push($mainarr, $subarr);
          }
         return $mainarr;

       }else{
         return [];
       }
       
    }

    function get_position_list_all($election_id){
        $mainarr2 = [];
        $sql = "SELECT * FROM election_positions WHERE election_id='$election_id'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
          $positionslist = $query->result();
          foreach($positionslist as $pl){
            $subarr2['position'] = $pl->position;
            $subarr2['positionid'] = $pl->ep_id;
            $subarr2['candidates'] = $this->get_related_candidates($election_id,$pl->ep_id);
            array_push($mainarr2, $subarr2);
          }
          return $mainarr2;
        }else{
         return [];
        }
    }

    function get_related_candidates($election_id,$positionid){
        $this->db->select('*');
        $this->db->from('election_candidates');
        $this->db->join('org_member_users','election_candidates.candidate_id=org_member_users.user_id');
        $this->db->where('election_candidates.election_id',$election_id);
        $this->db->where('election_candidates.position_id',$positionid);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_assigned_candidates($elecid,$positionid){
        
        $this->db->select('candidate_id');
        $this->db->from('election_candidates');
        $this->db->where('election_id',$elecid);
        $this->db->where('position_id',$positionid);
        $query = $this->db->get();
        if($query->num_rows()>0){
            $mainarr = [];
            foreach($query->result() as $qr){
                 array_push($mainarr,$qr->candidate_id);
            }
            return $mainarr;
        }else{
            return [];
        }
    }

    function delete_previous_candidates($electionids,$positionids){
        $this->db->where('election_id',$electionids);
        $this->db->where('position_id',$positionids);
        return $this->db->delete('election_candidates');
    }

    function update_end_process($elecid,$updarr){
        $this->db->where('election_main_id',$elecid);
        return $this->db->update('elections',$updarr);
    }

    function calculate_max_vote_candidate($elecid,$ep_id){
        $sql = "SELECT candidate_id,COUNT(candidate_id) AS total_votes FROM election_votes WHERE elelction_id='$elecid' AND position_id='$ep_id' GROUP BY candidate_id ORDER BY COUNT(candidate_id) DESC LIMIT 1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->row()->candidate_id;
        }else{
            return 0;
        }
    }

    function calculate_max_vote_candidate_V1($elecid,$ep_id){
        $sql = "SELECT candidate_id,COUNT(candidate_id) AS total_votes FROM election_votes WHERE elelction_id='$elecid' AND position_id='$ep_id' GROUP BY candidate_id";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function check_winners_stts($elecid,$ep_id){
        $sql = "SELECT vote_count FROM election_candidates WHERE election_id='$elecid' AND position_id='$ep_id' ORDER BY vote_count DESC LIMIT 1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->row()->vote_count;
        }else{
            return 0;
        }
    }

    function update_winner($updateelectionwinner,$elecid,$winnercandidate){
        $this->db->where('election_id',$elecid);
        $this->db->where('candidate_id',$winnercandidate);
        return $this->db->update('election_candidates',$updateelectionwinner);
    }

    function update_winner_v2($candidate_id,$elecid,$positionid,$updateelectionwinner){
        $this->db->where('election_id',$elecid);
        $this->db->where('candidate_id',$candidate_id);
        $this->db->where('position_id',$positionid);
        return $this->db->update('election_candidates',$updateelectionwinner);
    }

    function get_elections_with_results(){
        $orgid = $this->session->userdata('orgid'); 
        $sql = "SELECT * FROM elections WHERE org_id='$orgid' AND election_end_status=0 ORDER BY election_main_id='DESC'";
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            $mainarr = [];
            foreach($query->result() as $ele){
              $subarr['election_name'] = $ele->election_name;
              $subarr['elect_year'] = $ele->elect_year;
              $subarr['candidatewithvotes'] = $this->get_candidate_votescount($ele->election_main_id);
              $subarr['winner'] = $this->get_winner($ele->election_main_id);
              array_push($mainarr, $subarr);
            }
            return $mainarr;

        }else{
            return [];
        }
    }

    function get_candidate_votescount($elec_id){
      $sql ="SELECT org_member_users.user_full_name,candidate_id,COUNT(candidate_id) AS total_votes FROM election_votes,org_member_users WHERE org_member_users.user_id=election_votes.candidate_id  AND elelction_id='$elec_id' GROUP BY candidate_id";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        return $query->result();
      }else{
        return [];
      }
    }

    function get_winner($elec_id){
        $sql ="SELECT org_member_users.user_full_name FROM election_candidates,org_member_users WHERE org_member_users.user_id=election_candidates.candidate_id  AND election_candidates.election_id='$elec_id' AND election_candidates.winner_stts=1";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        return $query->row()->user_full_name;
      }else{
        return [];
      }
       
    }

    function check_prefix_exist($prefixcode){
        $this->db->where('org_code',$prefixcode);
        $query = $this->db->get('organization');
        if($query->num_rows()>0){
            return 1;
        }else{
            return 0;
        }

    }

    function check_prefix($prefixcode){
        $sql = "SELECT * FROM organization WHERE org_code='$prefixcode'";
        $query = $this->db->query($sql);
         if($query->num_rows()>0){
            return 1;
        }else{
            return 0;
        }


    }

    function getNextAdminid($orgid){
        $this->db->where('org_id',$orgid);
        $this->db->where('user_type',1);
        $query = $this->db->get('org_member_users');
        if($query->num_rows()>0){
            $curval = $query->num_rows();
            $nextno = $curval+1;
            return $nextno;
        }else{
            return 1;
        }
    }

    function get_mydata(){
        $memid = $this->session->userdata('userid');
        $this->db->where('user_id',$memid);
        $query = $this->db->get('org_member_users');
        return $query->row();
    }

    function update_admindata($adminid,$updarr){
        $this->db->where('user_id',$adminid);
        return $this->db->update('org_member_users',$updarr);
    }

    function get_electionlist($curyear){
        $orgid = $this->session->userdata('orgid');
        $sql = "SELECT * FROM elections WHERE elect_year='$curyear' AND org_id='$orgid'";
        $query = $this->db->query($sql);
          if($query->num_rows()>0){
            return $query->result();
          }else{
            return [];
          }
    }

    //-----------------------------------------------------------------------
    // function get_electionlist($curmonth){
    //     $orgid = $this->session->userdata('orgid');
    //     $sql = "SELECT * FROM elections WHERE elect_year='$curyear' AND org_id='$orgid'";
    //     $query = $this->db->query($sql);
    //       if($query->num_rows()>0){
    //         return $query->result();
    //       }else{
    //         return [];
    //       }
    // }

    //-----------------------------------------------------------------------

    function get_voters_count($election_main_id){
        $sql = "SELECT COUNT(election_vote_id) AS numbersscount FROM election_votes WHERE elelction_id='$election_main_id'ORDER BY election_main_id DESC";
        $query = $this->db->query($sql);
          if($query->num_rows()>0){
            return $query->row()->numbersscount;
          }else{
            return 0;
          }
    }

    function get_yearwise_members($curyear){
        $orgid = $this->session->userdata('orgid');
        $sql = "SELECT * FROM org_member_users WHERE org_id='$orgid' AND YEAR(u_created_on) = '$curyear'";
        $query = $this->db->query($sql);
          if($query->num_rows()>0){
            return $query->result();
          }else{
            return [];
          }
    }

    function get_registered_org_list($curyear){
        $sql = "SELECT * FROM organization WHERE YEAR(created_on)='$curyear'";
        $query = $this->db->query($sql);
          if($query->num_rows()>0){
            return $query->result();
          }else{
            return [];
          }
    }

    function add_election_positions($elect){
        return $this->db->insert('election_positions',$elect);
    }

    function get_position_list($electionid){
        $sql = "SELECT * FROM election_positions WHERE election_id='$electionid'";
         $query = $this->db->query($sql);
          if($query->num_rows()>0){
            return $query->result();
          }else{
            return [];
          }
    }

    function get_other_members($electionid){
        $orgid = $this->session->userdata('orgid');
        $sql ="SELECT * FROM org_member_users WHERE u_active_stts=1 AND org_id='$orgid' AND user_id NOT IN (SELECT candidate_id FROM election_candidates WHERE election_id='$electionid')";
        $query = $this->db->query($sql);
          if($query->num_rows()>0){
            return $query->result();
          }else{
            return [];
          }
    }

    function get_position_name($positionid){
        $sql = "SELECT * FROM election_positions WHERE ep_id='$positionid'";
        $query = $this->db->query($sql);
          if($query->num_rows()>0){
            return $query->row()->position;
          }else{
            return "";
          }
    }

    function check_exist_position($electionid,$positions){
        $sql = "SELECT * FROM election_positions WHERE election_id='$electionid' AND position='$positions'";
        $query = $this->db->query($sql);
          if($query->num_rows()>0){
            return 1;
          }else{
            return 0;
          }
    }

    function get_to_be_end_elections($datenow){
        //$sql = "SELECT * FROM elections WHERE election_end='$datenow'";
        $sql = "SELECT * FROM elections WHERE election_main_id=6";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
          }else{
            return [];
          }
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    function get_org_related_election_results($orgid){
      $sql = "SELECT * FROM elections WHERE org_id='$orgid' AND election_end_status=0";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
          $mainarr=[];
          foreach($query->result() as $orgele){
             $subarr1['electionname'] = $orgele->election_name." ".$orgele->elect_year;
             $subarr1['electionid'] = $orgele->election_main_id;
             $subarr1['positions'] = $this->get_positionlist($orgid,$orgele->election_main_id);
             array_push($mainarr,$subarr1);
          }
          $resp['stts'] = 1;
          $resp['results'] = $mainarr;
          return $resp;
      }else{
          $resp['stts'] = 0;
          $resp['results'] = [];
          return $resp;
      }
    }

    function get_positionlist($orgid,$election_main_id){
      $sql = "SELECT * FROM election_positions WHERE election_id='$election_main_id'";
      $query = $this->db->query($sql);
      
      if($query->num_rows()>0){
       $mainarr = [];
       foreach($query->result() as $eleposi){     
        $subarr['electposition'] = $eleposi->position;
        $subarr['electposition_id'] = $eleposi->ep_id;
        $subarr['positioncandidates'] = $this->get_election_position_csandidates($election_main_id,$eleposi->ep_id);
        array_push($mainarr,$subarr);
       }
       return $mainarr;
      }else{
        return [];
        
      }
    }

    function get_election_position_csandidates($election_main_id,$ep_id){
      $sql = "SELECT omu.user_full_name,omu.user_id,ec.winner_stts FROM election_candidates AS ec,org_member_users AS omu WHERE ec.candidate_id=omu.user_id AND ec.position_id='$ep_id' AND ec.election_id='$election_main_id'";
      $query = $this->db->query($sql);
      
      if($query->num_rows()>0){
       $mainarr = [];
       foreach($query->result() as $eleposis){     
        $subarr['candidate_name'] = $eleposis->user_full_name;
        $subarr['candidate_id'] = $eleposis->user_id;
        if($eleposis->winner_stts==1){
          $subarr['winnerstts'] = 1;
        }else{
          $subarr['winnerstts'] = 0;
        }

        $subarr['votecount'] = $this->get_vote_count($eleposis->user_id,$election_main_id,$ep_id);
        
        array_push($mainarr,$subarr);
       }
       return $mainarr;
      }else{
        return [];
        
      }
    }

    function get_vote_count($user_id,$election_main_id,$ep_id){
      $sql = "SELECT count(candidate_id) as totalvotescount FROM election_votes WHERE candidate_id='$user_id' AND elelction_id='$election_main_id' AND position_id='$ep_id' GROUP BY candidate_id";
       $query = $this->db->query($sql);
        if($query->num_rows()>0){
          return $query->row()->totalvotescount;
        }else{
          return 0;
        }
    }

    function check_expire_date($curday,$orgstts){
        $sql ="SELECT * FROM org_registration_payment WHERE register_to='$curday'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            foreach($query->result() as $exp){
                $orgid = $exp->org_id;
                $this->db->where('org_id',$orgid);
                $this->db->update('organization',$orgstts);
                
            }
        }
    }

    function check_remainder(){
        $curday = date("Y-m-d");
        $orgid = $this->session->userdata('orgid');
        $sql = "SELECT * FROM org_registration_payment WHERE org_id='$orgid' ORDER BY org_registration_id DESC LIMIT 1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $remainderdate = $query->row()->week_remainder_date;
            $expiredate = $query->row()->register_to;
            if($curday > $remainderdate && $curday < $expiredate){
                return "This is Payment Remainder. Your Account is going to expire on ".$query->row()->register_to.". Please Renew Before Expiration";
            }else{
                return "";
            }
            
        }else{
            return "";
        }
    }

    function payment_done_process($instarr,$updarr,$id){
        $resp = $this->db->insert('org_registration_payment',$instarr);
        if($resp){
           $this->db->where('org_id',$id);
           return $this->db->update('organization',$updarr);  
        }
    }

    function getcurrentamount(){
        $sql = "SELECT * FROM payment_config ORDER BY price_id DESC LIMIT 1";
        $query= $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->row()->amount;
        }else{
            return 0;
        }
    }

    function insert_payment($instarr){
        return $this->db->insert('payment_config',$instarr);
    }

    function insert_country($instarr){
        return $this->db->insert('country',$instarr);
    }

    function get_pricelist(){
        $sql = "SELECT * FROM payment_config as pc,site_admin as sa WHERE pc.created_by=sa.main_user_id ORDER BY pc.price_id ASC";
        $query= $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_country_list(){
        $sql = "SELECT * FROM country";
        $query= $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_org_list_payments($curyear){
        $sql = "SELECT * FROM organization AS o,payment_config AS pc,org_registration_payment AS orp WHERE o.org_id=orp.org_id AND orp.price_id=pc.price_id AND YEAR(orp.register_from)='$curyear'";
        $query= $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_adminlist($orgid){
        $sql ="SELECT * FROM org_member_users WHERE org_id='$orgid' AND user_type=1 ORDER BY user_id ASC";
        $query= $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

    function get_admin_list(){
        $sql ="SELECT * FROM site_admin";
        $query= $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return [];
        }
    }

}    