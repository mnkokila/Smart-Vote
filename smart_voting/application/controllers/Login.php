<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login_view');
	}

	function check_login(){
		$username = $this->input->post('username');
		$password = md5(sha1($this->input->post('password')));
        $checkaccess = $this->login_model->check_login($username,$password);
        if($checkaccess['status']==1){
          $this->session->set_userdata('fullname',$checkaccess['admin_name']);
          $this->session->set_userdata('userid',$checkaccess['user_id']);	
          redirect('admin_dashboard');
        }else{
          $this->session->set_flashdata('errormsg', 'Wrong username or password');	
          redirect('login');
        }
	}

	function signout(){
		session_destroy();
		redirect('login');
	}
}
