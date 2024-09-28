<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller {

   public function __construct(){
    parent::__construct();
    $this->load->library('excel');
    date_default_timezone_set("Asia/Kolkata");
   } 


	public function index()
	{
		$this->is_logged();
    $data['country_list']=$this->organization_model->get_country_list();
		$this->load->view('admin/create_organization',$data);

	}

	function registered_org_list(){
		$this->is_logged();
		$orglist = $this->organization_model->get_all_organization_list();
		$mainarr = [];
        foreach ($orglist as $org) {
        	$subarr['org_id'] = $org->org_id;
        	$subarr['org_name'] = $org->org_name;
        	$subarr['contact_no'] = $org->contact_no;
        	$subarr['address'] = $org->address;
        	$subarr['org_code'] = $org->org_code;
        	$subarr['active_stts'] = $org->active_stts;
          //$subarr['country'] = $org->country;
        	$subarr['is_admin_creted'] = $this->organization_model->check_org_admin_exist($org->org_id);
        	array_push($mainarr,$subarr);
        }

		$data['orglist'] = $mainarr;
		//print_r($data['orglist']);
		$this->load->view('admin/org_registered_list_viw',$data);
	}

    function save_organization(){
      // get form submit data
    	$orgname = $this->input->post('orgname');
    	$contno = $this->input->post('contno');
    	$org_address = $this->input->post('org_address');
    	$org_mail = $this->input->post('org_mail');
    	$prefixcode = $this->input->post('prefixcode');
      //$country = $this->input->post('country');

    	$chekexist = $this->organization_model->check_prefix_exist($prefixcode);
        if($chekexist==0){
        	//get current price..
        $priceid = $this->organization_model->get_current_priceid();
    

    // save data to "organization" table
 		$orgarr['org_name'] = $orgname;
		$orgarr['contact_no'] = $contno;
		$orgarr['address'] = $org_address;
		$orgarr['email_address'] = $org_mail;
		$orgarr['created_by'] = $this->session->userdata('userid');
		$orgarr['created_on'] = date("Y-m-d");
		$orgarr['active_stts'] = 1;
		$orgarr['org_code'] = $prefixcode;
    //$orgarr['country'] = $country;
    
    // save organization
		$orgid = $this->organization_model->save_organization($orgarr);

		//get current date
		$currentdate = date("Y-m-d");

		//week remainder date..
    $weekremainderdate = date('Y-m-d', strtotime($currentdate. ' + 358 days'));

		// expire date ..
    $expiredate = date('Y-m-d', strtotime($currentdate. ' + 365 days'));

		$orgpaymentarr['org_id'] = $orgid;
		$orgpaymentarr['register_from'] = $currentdate;
		$orgpaymentarr['register_to'] = $expiredate;
		$orgpaymentarr['payment_stts'] = 1;
		$orgpaymentarr['price_id'] = $priceid; 
		$orgpaymentarr['week_remainder_date'] = $weekremainderdate;

		$saveorgpayment = $this->organization_model->insert_org_payment($orgpaymentarr);
        if($orgid && $saveorgpayment){
          $this->session->set_flashdata('successmsg', 'Succesfully Created Organization');	
          redirect('organization/create_org_admin/'.$orgid.'/'.$prefixcode);
		}else{
		  $this->session->set_flashdata('errormsg', 'Error creating Organization');		
		  redirect('organization');
		}
        }else{
          $this->session->set_flashdata('orgname', $orgname);
          $this->session->set_flashdata('contno', $contno);
          $this->session->set_flashdata('org_address', $org_address);
          $this->session->set_flashdata('org_mail', $org_mail);
          $this->session->set_flashdata('prefixcode', $prefixcode);
        	$this->session->set_flashdata('errormsg', 'Organization Prefix already exists.please enter another');		
		  redirect('organization');
        }
    	


    }

    function create_org_admin(){
    	$this->is_logged();
    	$orgid = $this->uri->segment(3);
    	$prefix = $this->uri->segment(4);
    	$data['orgid'] = $orgid;
    	$adminun = $prefix."admin1";
    	$data['prefix'] = $prefix;
    	$data['username'] = $adminun;
		$this->load->view('admin/create_org_admin',$data);
    }

    function save_org_admin(){
      $prefix = $this->input->post('prefix');
      $orgid= $this->input->post('orgid');


	$orgadminarr['org_id'] = $orgid;
	$orgadminarr['user_full_name'] = $this->input->post('orgadminname');
	$orgadminarr['u_address'] = $this->input->post('org_admin_address');
	$orgadminarr['u_contact_no'] = $this->input->post('org_admin_contno');
	$orgadminarr['u_email_address'] = $this->input->post('org_admin_mail');
	$orgadminarr['u_username'] = $this->input->post('org_admin_username');
	$orgadminarr['u_password'] = md5(sha1($this->input->post('admin_nic')));
	$orgadminarr['u_active_stts'] = 1;
	$orgadminarr['u_created_on'] = date("Y-m-d");
	$orgadminarr['u_created_by'] = $this->session->userdata('userid');
	$orgadminarr['user_type'] = 1;
	$orgadminarr['admin_nic'] = $this->input->post('admin_nic');

	$saveorgadmin = $this->organization_model->save_organization_admin($orgadminarr);
     if($saveorgadmin){
          $this->session->set_flashdata('successmsg', 'Succesfully Created Organization Admin');	
          redirect('organization');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error creating Organization Admin');		
		  redirect('organization/create_org_admin/'.$orgid.'/'.$prefix);
		}


    }



    function save_member(){
      
	$orgadminarr['org_id'] = $this->session->userdata('orgid');
	$orgadminarr['user_full_name'] = $this->input->post('memname');
	$orgadminarr['u_address'] = $this->input->post('address');
	$orgadminarr['u_contact_no'] = $this->input->post('contno');
	$orgadminarr['u_email_address'] = $this->input->post('mail_address');
	$orgadminarr['u_username'] = $this->input->post('username');
	$orgadminarr['u_password'] = md5(sha1($this->input->post('nic')));
	$orgadminarr['u_active_stts'] = 1;
	$orgadminarr['u_created_on'] = date("Y-m-d");
	$orgadminarr['u_created_by'] = $this->session->userdata('userid');
	$orgadminarr['user_type'] = 2;
	$orgadminarr['admin_nic'] = $this->input->post('nic');

	$saveorgadmin = $this->organization_model->save_organization_admin($orgadminarr);
     if($saveorgadmin){
          $this->session->set_flashdata('successmsg', 'Succesfully Created Organization Admin');	
          redirect('org_admin_dashboard/create_org_member');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error creating Organization Admin');		
		  redirect('org_admin_dashboard/create_org_member');
		}


    }

    function save_admin_member(){
    $orgid = $this->session->userdata('orgid');	
    $nic = $this->input->post('nic');
    $checkstts = $this->organization_model->checkmember_exist($orgid,$nic);
    if($checkstts==0){	
    $orgadminarr['org_id'] = $this->session->userdata('orgid');
	$orgadminarr['user_full_name'] = $this->input->post('memname');
	$orgadminarr['u_address'] = $this->input->post('address');
	$orgadminarr['u_contact_no'] = $this->input->post('contno');
	$orgadminarr['u_email_address'] = $this->input->post('mail_address');
	//$orgadminarr['u_username'] = $this->input->post('username');
	//$orgadminarr['u_password'] = md5(sha1($this->input->post('nic')));
	$orgadminarr['u_active_stts'] = 1;
	$orgadminarr['u_created_on'] = date("Y-m-d");
	$orgadminarr['u_created_by'] = $this->session->userdata('userid');
	$orgadminarr['user_type'] = $this->input->post('utype');
	$orgadminarr['admin_nic'] = $this->input->post('nic');

	$orgcode = $this->session->userdata('orgcode');
	$utype = $this->input->post('utype');
    $getcodeid = $this->organization_model->getNextAdminid($orgid);

	if($utype==1){
        	$shortcode = $orgcode."admin".$getcodeid;
        	$orgadminarr['u_username'] = $shortcode;
        	$orgadminarr['u_password'] = md5(sha1($this->input->post('nic')));
        }

	$saveorgadmin = $this->organization_model->save_organization_admin($orgadminarr);
     if($saveorgadmin){
          $this->session->set_flashdata('successmsg', 'Succesfully Created Organization Admin');	
          redirect('org_admin_dashboard/create_org_admin');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error creating Organization Admin');		
		  redirect('org_admin_dashboard/create_org_admin');
		}

	  }else{
	  	$this->session->set_flashdata('errormsg', 'Member Already Exist');		
		  redirect('org_admin_dashboard/create_org_admin');
	  }	
  }

    function get_username_by_type(){
    	$utype = $this->input->post('utype');
        $shortcode = "";
        if($utype==1){
        	$shortcode = "admin";
        }else{
        	$shortcode = "MEM";
        }

    	$memberno = $this->organization_model->get_member_count($utype);
    	$username = $this->session->userdata('orgcode').$shortcode.$memberno;
    	echo json_encode($username);
    }

    function save_admin_member_bulk(){
    	if(isset($_FILES["meberfile"]["name"])){
         $path = $_FILES["meberfile"]["tmp_name"];
         $object = PHPExcel_IOFactory::load($path);

       foreach($object->getWorksheetIterator() as $worksheet){
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $empwdarr = [];
        $i=$this->input->post('nextno');
        for($row=1; $row<=$highestRow; $row++){
         $fullname = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
         $address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
         $contact = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
         $email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
         $nic = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
         $orgid = $this->session->userdata('orgid');
         $orgcode = $this->session->userdata('orgcode');
         $username = $orgcode."MEM".$i;
         $pw = md5(sha1($nic));
          
         $checkstts = $this->organization_model->checkmember_exist($orgid,$nic);
          
          if($checkstts==0){

            $instarr['org_id'] = $orgid;
			$instarr['user_full_name'] = $fullname;
			$instarr['u_address'] = $address;
			$instarr['u_contact_no'] = $contact;
			$instarr['u_email_address'] = $email;  
			//$instarr['u_username'] = $username;
			//$instarr['u_password'] = $pw;
			$instarr['u_active_stts'] = 1;
			$instarr['u_created_on'] = date("Y-m-d");
			$instarr['u_created_by'] = $this->session->userdata('userid');
			$instarr['user_type'] = 2;
			$instarr['admin_nic'] = $nic;
			array_push($empwdarr,$instarr); 
          } 

          /*if($checkstts==0){
          	$instarr['org_id'] = $orgid;
			$instarr['user_full_name'] = $fullname;
			$instarr['u_address'] = $address;
			$instarr['u_contact_no'] = $contact;
			$instarr['u_email_address'] = $email;
			$instarr['u_username'] = $username;
			$instarr['u_password'] = $pw;
			$instarr['u_active_stts'] = 1;
			$instarr['u_created_on'] = date("Y-m-d");
			$instarr['u_created_by'] = $this->session->userdata('userid');
			$instarr['user_type'] = 2;
			$instarr['admin_nic'] = $nic;

		    $insertstts = $this->organization_model->insert_member_bulk($instarr);
		    if($insertstts){
	          $this->session->set_flashdata('successmsg', 'Succesfully Created Organization Members');	
	          redirect('org_admin_dashboard/create_org_admin');
			}else{
			  $this->session->set_flashdata('errormsg', 'Error creating Organization Members');		
			  redirect('org_admin_dashboard/create_org_admin');
			}
          }else{
          	$this->session->set_flashdata('errormsg', 'Member Already Exist');		
		    redirect('org_admin_dashboard/create_org_admin');
          } */
			

           



         //echo "results ".$fullname." ".$address." ".$contact." ".$email." ".$nic."<br>";
         
          $i++;
        }

        //print_r($empwdarr);
        if(sizeof($empwdarr)==0){
        	$this->session->set_flashdata('errormsg', 'Member Already Exist');		
			  redirect('org_admin_dashboard/create_org_admin');
        }else{
        	$insertstts = $this->organization_model->insert_member_bulk($empwdarr);
		    if($insertstts){
	          $this->session->set_flashdata('successmsg', 'Succesfully Created Organization Members');	
	          redirect('org_admin_dashboard/create_org_admin');
			}else{
			  $this->session->set_flashdata('errormsg', 'Error creating Organization Members');		
			  redirect('org_admin_dashboard/create_org_admin');
			}
        }
        

       }
      }

    }


    function edit_organization(){
    	$this->is_logged();
    	$orgid = $this->uri->segment(3);
    	$data['orgid'] = $orgid;
    	$data['orgdetail'] = $this->organization_model->get_org_detail($orgid);
    	$this->load->view('admin/edit_organization_viw',$data);
    }

    function update_organization(){
    	$orgid = $this->input->post('orgid');
    	$orgname = $this->input->post('orgname');
    	$contno = $this->input->post('contno');
    	$org_address = $this->input->post('org_address');
    	$org_mail = $this->input->post('org_mail');
    	
 		$orgarr['org_name'] = $orgname;
		$orgarr['contact_no'] = $contno;
		$orgarr['address'] = $org_address;
		$orgarr['email_address'] = $org_mail;
		$updateorg = $this->organization_model->update_org_data($orgarr,$orgid);
		if($updateorg){
          $this->session->set_flashdata('successmsg', 'Succesfully Updated Organization');	
          redirect('organization');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error Updating Organization');		
		  redirect('organization');
		}
    }

    function makepaymentdone(){
    	$id = $this->uri->segment(3);
    	$priceid = $this->organization_model->get_current_priceid();

    	//get current date
		$currentdate = date("Y-m-d");

		//week remainder date..
        $weekremainderdate = date('Y-m-d', strtotime($currentdate. ' + 358 days'));

		// expire date ..
        $expiredate = date('Y-m-d', strtotime($currentdate. ' + 365 days'));
        
        //insert new payment details..
        $instarr['org_id'] = $id;
        $instarr['register_from'] = $currentdate;
        $instarr['register_to'] = $expiredate;
        $instarr['payment_stts'] = 1;
        $instarr['price_id'] = $priceid;
        $instarr['week_remainder_date'] = $weekremainderdate;

        $updarr['active_stts'] = 1;

        $updstts = $this->organization_model->payment_done_process($instarr,$updarr,$id);
        if($updstts){
          $this->session->set_flashdata('successmsg', 'Succesfully Updated Payment');	
          redirect('organization/registered_org_list');
		}else{
		  $this->session->set_flashdata('errormsg', 'Error Updating Payment');		
		  redirect('organization/registered_org_list');
		}
    }

    function get_adminlist(){
      $orgid = $this->input->post('orgid');
      $adminlist = $this->organization_model->get_adminlist($orgid);
      echo json_encode($adminlist);
    }
    

    function is_logged(){
      if($this->session->userdata('userid')==""){
      	redirect('login');
      }
	}

}	