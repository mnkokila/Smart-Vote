<?php

class Api_model extends CI_Model {

    function __construct()    {
        parent::__construct();
    }

    function check_nic_exist($nic){
      $sql = "SELECT * FROM org_member_users WHERE admin_nic='$nic' AND u_active_stts=1";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
           return 1;
      }else{
           return 0;
      }
    }

    function check_common_login_exist($email,$nic){
      $sql = "SELECT * FROM common_login WHERE email='$email' AND nic='$nic'";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
           return 1;
      }else{
           return 0;
      }
    }

    function login_register($regarr){
      return $this->db->insert('common_login',$regarr);
    }

    function check_email_validity($email){
      $sql = "SELECT * FROM common_login WHERE email='$email'";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
           $arr['stts'] = 1;
           $arr['datas'] = $query->row();
           return $arr;
      }else{
           $arr['stts'] = 0;
           $arr['datas'] = [];
           return $arr;
      }
    }


    function check_login($un,$pw){
    	//$sql = "SELECT * FROM org_member_users AS omu,organization as og WHERE omu.org_id=og.org_id AND omu.u_username='$un' AND omu.u_password='$pw' AND omu.u_active_stts=1 AND omu.user_type=2 AND og.active_stts=1";

      $sql = "SELECT * FROM common_login WHERE email='$un' AND password='$pw'";
    	$query = $this->db->query($sql);
    	if($query->num_rows()>0){
           $arr['stts'] = 1;
           $arr['datas'] = $query->row();
           return $arr;
    	}else{
    	   $arr['stts'] = 0;
           $arr['datas'] = [];
           return $arr;
    	}
    }

  /******************************************************************************************************************/
 
     

  /******************************************************************************************************************/

    function get_available_orglist($nic){
      //$sql = "SELECT org.org_name,org.org_id,el.election_name,el.election_main_id FROM org_member_users AS omu,organization as org,elections AS el WHERE omu.org_id=org.org_id AND org.org_id=el.org_id AND omu.admin_nic='$nic' AND el.election_end_status=1 AND omu.u_active_stts=1 GROUP BY org.org_id";

      $sql = "SELECT org.org_name,org.org_id FROM org_member_users AS omu,organization as org WHERE omu.org_id=org.org_id AND  omu.admin_nic='$nic' AND omu.u_active_stts=1 GROUP BY org.org_id";

      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        $arr['stts'] = 1;
        $arr['orgs'] = $query->result();
        return $arr;
      }else{
        $arr['stts'] = 0;
        $arr['orgs'] = [];
        return $arr;
      }
    }


    function get_available_elections($orgid){
      /* $sql = "SELECT org.org_name,el.election_name,el.election_main_id FROM org_member_users AS omu,organization as org,elections AS el WHERE omu.org_id=org.org_id AND org.org_id=el.org_id AND el.org_id='$orgid' AND el.election_end_status=1 AND omu.u_active_stts=1"; */

      $sql = "SELECT el.election_name,el.election_main_id,el.elect_year,el.election_start,el.election_end FROM elections AS el WHERE  el.org_id='$orgid' AND el.election_end_status=1 ORDER BY election_main_id DESC";


      $query = $this->db->query($sql);
      if($query->num_rows()>0){
        $arr['stts'] = 1;
        $arr['elections'] = $query->result();
        return $arr;
      }else{
        $arr['stts'] = 0;
        $arr['elections'] = [];
        return $arr;
      }
    }

    function get_candidateslist($election_id){
        $sql = "SELECT * FROM elections AS el,organization AS org WHERE el.org_id=org.org_id AND el.election_main_id='$election_id'";
        $query = $this->db->query($sql);
        $arr['election_name'] = $query->row()->org_name." - ".$query->row()->election_name;
        $arr['candidateslist'] = $this->get_candidates_list($election_id);
        $mainarr['elections_candidates'] = $arr;
        $mainarr['stts'] = 1;
        return $mainarr;
    }

    function get_candidates_list($election_id){
      $sql = "SELECT omu.user_full_name,omu.user_id FROM elections AS el,election_candidates AS ec,org_member_users AS omu WHERE el.election_main_id=ec.election_id AND ec.candidate_id=omu.user_id AND ec.election_id='$election_id'";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
          return $query->result();
      }else{
          return [];
      }
    }

    function get_candidates_list_byElection($positionid){

     // $sql = "SELECT omu.user_full_name,omu.user_id,el.election_main_id FROM elections AS el,election_candidates AS ec,org_member_users AS omu WHERE el.election_main_id=ec.election_id AND ec.candidate_id=omu.user_id AND el.election_name='$positionid'";

     $sql = "SELECT omu.user_full_name,omu.user_id,ec.election_id,ec.position_id FROM election_candidates AS ec,org_member_users AS omu WHERE ec.candidate_id=omu.user_id AND ec.position_id='$positionid'";


      $query = $this->db->query($sql);
      if($query->num_rows()>0){
          $resp['stts'] = 1;
          $resp['elections_candidates'] = $query->result();
          return $resp;
      }else{
          $resp['stts'] = 0;
          $resp['elections_candidates'] = [];
          return $resp;
      }
    }

    function check_already_vote($voter_id,$election_id,$positionid){
      $this->db->where('nic_no',$voter_id);
      $this->db->where('elelction_id',$election_id);
      $this->db->where('position_id',$positionid);
      $query = $this->db->get('election_votes');
      if($query->num_rows()>0){
        return true;
      }else{
        return false;
      }
    }

    function add_vote($votearr){
      return $this->db->insert('election_votes',$votearr);
    }

    function get_winner_list(){
      $resp['stts'] = 0;
      $resp['winners'] = [];
      return $resp;
    }

    function get_available_positions($eid){
      $sql = "SELECT * FROM election_positions WHERE election_id='$eid'";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
          $resp['stts'] = 1;
          $resp['positions'] = $query->result();
          return $resp;
      }else{
          $resp['stts'] = 0;
          $resp['positions'] = [];
          return $resp;
      }
    }

    function get_org_related_election_results($orgid){
      $sql = "SELECT * FROM elections WHERE org_id='$orgid' AND election_end_status=0";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
          $mainarr=[];
          foreach($query->result() as $orgele){
             $subarr1['electionname'] = $orgele->election_name;
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
        /*$pc = $this->get_election_position_csandidates($election_main_id,$eleposi->ep_id);
        
        usort($pc, function ($a, $b) {
            return $b['votecount'] - $a['votecount'];
        });

        $subarr['positioncandidates'] =  $pc; */
        array_push($mainarr,$subarr);
       }
       return $mainarr;
      }else{
        //return [];
        $subarr['electposition'] = "No Election Position Assinged";
        $subarr['electposition_id'] = "";
        $subarr['positioncandidates'] = [];
        
        return $subarr;
      }
    }

    function get_election_position_csandidates($election_main_id,$ep_id){
      $sql = "SELECT omu.user_full_name,omu.user_id,ec.winner_stts,ec.election_candidate_id FROM election_candidates AS ec,org_member_users AS omu WHERE ec.candidate_id=omu.user_id AND ec.position_id='$ep_id' AND ec.election_id='$election_main_id'";
      $query = $this->db->query($sql);
      
      if($query->num_rows()>0){
       $mainarr = [];
       foreach($query->result() as $eleposis){ 
        $subarr['election_candidate_id'] = $eleposis->election_candidate_id;    
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
        //return [];
        $subarr['candidate_name'] = "No Candidates Assigned";
        $subarr['candidate_id'] = "";
        $subarr['winnerstts'] = "";
        $subarr['votecount'] = "";
        return $subarr;
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

}