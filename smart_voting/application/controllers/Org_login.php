<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Org_login extends CI_Controller {

	public function index()
	{
		$this->load->view('org/org_login_view');
	}

	function check_login(){
		$username = $this->input->post('username');
		$password = md5(sha1($this->input->post('password')));
        $checkaccess = $this->login_model->check_org_login($username,$password);

        //print_r($checkaccess);
        if($checkaccess['status']==1){
          $this->session->set_userdata('fullname',$checkaccess['org_admin_name']);
          $this->session->set_userdata('userid',$checkaccess['user_id']);
          $this->session->set_userdata('orgname',$checkaccess['orgname']);
          $this->session->set_userdata('orgid',$checkaccess['orgid']);	
          $this->session->set_userdata('orgcode',$checkaccess['orgcode']);	
          redirect('org_admin_dashboard');
        }else{
          $this->session->set_flashdata('errormsg', ' - Wrong username or password <br> - You have been blocked temparalry because of the Account Expiration.please contact System Admin');	
          redirect('org_login');
        }
	}

	function signout(){
		session_destroy();
		redirect('org_login');
	}
}
