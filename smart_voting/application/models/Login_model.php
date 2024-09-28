<?php

class Login_model extends CI_Model {

    function __construct()    {
        parent::__construct();
    }

    function check_login($un,$pw){
      $sql = "SELECT * FROM site_admin WHERE main_username='$un' AND main_password='$pw' AND main_active_stts=1";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
      	$loginarr['status'] = 1;
      	$loginarr['admin_name'] = $query->row()->full_name;
      	$loginarr['user_id'] = $query->row()->main_user_id;
      	return $loginarr;
      }else{
      	$loginarr['status'] = 0;
      	$loginarr['admin_name'] = "";
      	$loginarr['user_id'] = "";
      	return $loginarr;
      }

    }
    
    function check_org_login($un,$pw){
      $sql = "SELECT * FROM org_member_users,organization WHERE org_member_users.org_id=organization.org_id AND org_member_users.u_username='$un' AND org_member_users.u_password='$pw' AND org_member_users.u_active_stts=1 AND organization.active_stts=1 AND org_member_users.user_type=1";
      $query = $this->db->query($sql);
      if($query->num_rows()>0){
      	$loginarr['status'] = 1;
      	$loginarr['org_admin_name'] = $query->row()->user_full_name;
      	$loginarr['orgname'] = $query->row()->org_name;
      	$loginarr['orgid'] = $query->row()->org_id;
        $loginarr['orgcode'] = $query->row()->org_code;
      	$loginarr['user_id'] = $query->row()->user_id;
      	return $loginarr;
      }else{
      	$loginarr['status'] = 0;
      	$loginarr['org_admin_name'] = "";
      	$loginarr['orgname'] = "";
      	$loginarr['orgid'] = "";
        $loginarr['orgcode'] = "";
      	$loginarr['user_id'] = "";
      	return $loginarr;
      }
    }

    function save_admin($insertadminarr){
    	return $this->db->insert('site_admin',$insertadminarr);
    }

    function check_un_exist($username){
      $this->db->where('main_username',$username);
      $query = $this->db->get('site_admin');
      if($query->num_rows()>0){
        return 1;
      }else{
        return 0;
      }
    }


}