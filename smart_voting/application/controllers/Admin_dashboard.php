<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

	public function index()
	{
		$this->is_logged();
		$data['act_org_count'] = $this->organization_model->get_org_count();
    $data['inact_org_count'] = $this->organization_model->get_inactive_org_count();
		$data['act_admin_count'] = $this->organization_model->get_admin_count();
    $data['inactive_admin_count'] = $this->organization_model->get_inactive_admin_count();
		$this->load->view('admin/admin_dashboard_view',$data);
	}

    function create_admin(){
    	$this->is_logged();
    	$data['adminlist'] = $this->admin_model->get_admins();
		$this->load->view('admin/create_admin_view',$data);
    }

    function save_admin(){
    	$fullname = $this->input->post('fullname');
    	$username = $this->input->post('username');
    	$password = md5(sha1($this->input->post('password')));

      $checkunexist = $this->login_model->check_un_exist($username);
      if($checkunexist==0){
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
      }else{
            $this->session->set_flashdata('errormsg', 'Username Already Exist.Please Enter Another One');   
            redirect('admin_dashboard/create_admin');
      }
 	
		

    }

    function admin_access_change(){
    	$adminid = $this->uri->segment(3);
    	$status = $this->uri->segment(4);

    	$updarr['main_active_stts'] = $status;
    	$updatestatus = $this->admin_model->update_admindata($adminid,$updarr);
    	if($updatestatus){
		  $this->session->set_flashdata('successmsg', 'Succesfully Changed Status');	
          redirect('admin_dashboard/create_admin');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error change Status');		
		  redirect('admin_dashboard/create_admin');
		}
    }

    function profile(){
      $this->is_logged();
      $data['mydata'] = $this->admin_model->get_mydata();
      $this->load->view('admin/profile_view',$data);	
    }

    function check_pw_validity(){
    	$curpw = $_POST['curpw'];
    	$formpwsubmitcurpw = md5(sha1($_POST['formpwsubmitcurpw']));
    	if($curpw==$formpwsubmitcurpw){
    		echo json_encode(1);
    	}else{
    		echo json_encode(0);
    	}
    }

    function update_admin_pw(){
    	$pw = $this->input->post('npassword');
        $adminid = $this->session->userdata('userid');
    	$updarr['main_password'] = md5(sha1($pw));
    	$updatestatus = $this->admin_model->update_admindata($adminid,$updarr);
    	if($updatestatus){
		  $this->session->set_flashdata('successmsg', 'Succesfully Changed Password');	
          redirect('admin_dashboard/profile');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error change Password');		
		  redirect('admin_dashboard/profile');
		}
    }



    function renew_amount(){
      $this->is_logged();
      $data['currentamount'] = $this->organization_model->getcurrentamount();
      $data['pricelist'] = $this->organization_model->get_pricelist();
      $this->load->view('admin/payment_config_viw',$data);  
    }

    function save_new_payment(){
      $curday = date("Y-m-d");
      $newamount = $this->input->post('newamount');
      $instarr['amount'] = $newamount;
      $instarr['effective_from'] = $curday;
      $instarr['created_by'] = $this->session->userdata('userid');
      $instarr['created_on'] = $curday;

      $paymentstts = $this->organization_model->insert_payment($instarr);
      if($paymentstts){
      $this->session->set_flashdata('successmsg', 'Succesfully added new payment');  
          redirect('admin_dashboard/renew_amount');
    }else{
      $this->session->set_flashdata('errormsg', 'error adding payment');   
      redirect('admin_dashboard/renew_amount');
    }
    }

    function manage_country(){
      $this->is_logged();
      $this->load->view('admin/country_create_viw');

    }

    function save_country(){
      $country = $this->input->post('country');
      $instarr['country_name'] = $country;

      $country_status = $this->organization_model->insert_country($instarr);
      if($country_status){
      $this->session->set_flashdata('successmsg', 'Succesfully added new payment');  
          redirect('admin_dashboard/manage_country');
    }else{
      $this->session->set_flashdata('errormsg', 'error adding payment');   
      redirect('admin_dashboard/manage_country');
    }
    }


	function is_logged(){
      if($this->session->userdata('userid')==""){
      	redirect('login');
      }
	}
}
