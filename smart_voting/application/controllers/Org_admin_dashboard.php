<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Org_admin_dashboard extends CI_Controller {

	public function index()
	{
		$this->is_logged();
    $data['act_mem'] = $this->organization_model->get_active_member_count(1);
    $data['inact_mem'] = $this->organization_model->get_active_member_count(0);

    $data['act_elec'] = $this->organization_model->get_active_election_count(1);
    $data['inact_elec'] = $this->organization_model->get_active_election_count(0);
    $data['remainder_message'] = $this->organization_model->check_remainder();
		$this->load->view('org/org_admin_dashboard_view',$data);
	}

    function create_admin(){
    	$this->is_logged();
		$this->load->view('admin/create_admin_view');
    }

    function create_org_member(){
    	$this->is_logged();
		$memberno = $this->organization_model->get_member_count(2);
    	$username = $this->session->userdata('orgcode')."mem".$memberno;
        $data['username'] = $username;
    	$this->load->view('org/org_member_create_viw',$data);
    }

    function create_org_admin(){
    	$this->is_logged();
    	$memberno = $this->organization_model->get_member_count(1);
    	$username = $this->session->userdata('orgcode')."admin".$memberno;
        $data['username'] = $username;
        $data['adminlist'] = $this->organization_model->get_org_admins();
        $data['nextno'] = $this->organization_model->get_next_org_memno();
    	$this->load->view('org/org_admin_create_viw',$data);
    }

    function org_list(){
      $this->is_logged();
      $memberno = $this->organization_model->get_member_count(1);
      $username = $this->session->userdata('orgcode')."admin".$memberno;
        $data['username'] = $username;
        $data['adminlist'] = $this->organization_model->get_org_admins();
        $data['nextno'] = $this->organization_model->get_next_org_memno();
      $this->load->view('org/org_list_viw',$data);
    }

    function save_admin(){
    	$fullname = $this->input->post('fullname');
    	$username = $this->input->post('username');
    	$password = md5(sha1($this->input->post('password')));
 	
		$insertadminarr['full_name'] = $fullname;
		$insertadminarr['user_type'] = 1;
		$insertadminarr['main_username'] = $username;
		$insertadminarr['main_password'] = $password;
		$insertadminarr['main_active_stts'] = 1;

		$savestts=$this->login_model->save_admin($insertadminarr);
		if($savestts){
		  $this->session->set_flashdata('successmsg', 'Succesfully Saved');	
          redirect('admin_dashboard/create_admin');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error saving data');		
		  redirect('admin_dashboard/create_admin');
		}

    }

    function active_inactive_org_user(){
        $userid = $this->uri->segment(3);
        $stts = $this->uri->segment(4);
        $updmember['u_active_stts'] = $stts;
        $upd_stts = $this->organization_model->update_user($userid,$updmember);
        if($upd_stts){
          $this->session->set_flashdata('successmsg', 'Succesfully updated');  
          redirect('org_admin_dashboard/org_list');
        }else{
          $this->session->set_flashdata('errormsg', 'Error Updating data');        
          redirect('org_admin_dashboard/org_list');
        }
    }


    function list_members(){
       $this->is_logged();
       $data['members'] = $this->organization_model->get_member_count(1);

       $this->load->view('org/org_member_list_viw',$data); 
    }

    function edit_member(){
      $this->is_logged();
      $memno = $this->uri->segment(3);
      $data['memid'] = $memno;
      $data['memberdetails'] = $this->organization_model->get_member_details($memno);
      $this->load->view('org/org_member_edit_viw',$data); 
    }

    function update_member_details(){
      $memno = $this->input->post('memno');
      $orgadminarr['user_full_name'] = $this->input->post('memname');
      $orgadminarr['u_address'] = $this->input->post('address');
      $orgadminarr['u_contact_no'] = $this->input->post('contno');
      $orgadminarr['u_email_address'] = $this->input->post('mail_address');
      $orgadminarr['u_password'] = md5(sha1($this->input->post('nic')));
      $orgadminarr['admin_nic'] = $this->input->post('nic');
      $upd_stts = $this->organization_model->update_user($memno,$orgadminarr);
        if($upd_stts){
          $this->session->set_flashdata('successmsg', 'Succesfully updated');  
          redirect('org_admin_dashboard/org_list');
        }else{
          $this->session->set_flashdata('errormsg', 'Error Updating data');        
          redirect('org_admin_dashboard/org_list');
        }
    }

    function app_login_password_reset(){
      $id = $this->uri->segment(3);
      $nic = $this->uri->segment(4);
      $resetpw = md5(sha1($nic));
      $update_comm_logarr['password'] = $resetpw;
      $this->organization_model->reset_pw($id,$update_comm_logarr);
    }


    function profile(){
      $this->is_logged();
      $data['mydata'] = $this->organization_model->get_mydata();
      $this->load->view('org/profile_view',$data);  
    }

    function update_admin_pw(){
        $pw = $this->input->post('npassword');
        $adminid = $this->session->userdata('userid');
      $updarr['u_password'] = md5(sha1($pw));
      $updatestatus = $this->organization_model->update_admindata($adminid,$updarr);
      if($updatestatus){
      $this->session->set_flashdata('successmsg', 'Succesfully Changed Password');  
          redirect('org_admin_dashboard/profile');
    }else{
      $this->session->set_flashdata('errormsg', 'Error change Password');   
      redirect('org_admin_dashboard/profile');
    } 
    }

    

	function is_logged(){
      if($this->session->userdata('userid')==""){
      	redirect('login');
      }
	}
}
