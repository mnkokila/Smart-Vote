<?php

class Admin_model extends CI_Model {

    function __construct()    {
        parent::__construct();
    }

    function get_admins(){
    	$query = $this->db->get('site_admin');
    	if($query->num_rows()>0){
    		return $query->result();
    	}else{
    		return [];
    	}
    }

    function get_mydata(){
    	$userid = $this->session->userdata('userid');
    	$this->db->where('main_user_id',$userid);
    	$query = $this->db->get('site_admin');
    	if($query->num_rows()>0){
    		return $query->row();
    	}else{
    		return [];
    	}
    }

    function update_admindata($adminid,$updarr){
    	$this->db->where('main_user_id',$adminid);
        return $this->db->update('site_admin',$updarr);
    }



}    