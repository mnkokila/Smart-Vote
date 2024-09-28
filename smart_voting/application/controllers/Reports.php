 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function yearly_org_election_list(){
       if(isset($_POST['searchbtn'])){
           $curyear = $this->input->post('curyear');	
		   $elections = $this->organization_model->get_electionlist($curyear);	
		   $mainarr = [];
	       foreach ($elections as $el) {
	       	 $subarr['election_name'] = $el->election_name; 
	       	 $subarr['elect_year'] = $el->elect_year; 
	       	 $subarr['start_n_end'] = $el->election_start." to ".$el->election_end; 
	       	 $subarr['votercount'] = $this->organization_model->get_voters_count($el->election_main_id);
	       	 array_push($mainarr,$subarr);
	       }
	       $data['years'] = $curyear;
           
       }else{
       	   $curyear = date("Y");	
		   $elections = $this->organization_model->get_electionlist($curyear);	
		   $mainarr = [];
	       foreach ($elections as $el) {
	       	 $subarr['election_name'] = $el->election_name; 
	       	 $subarr['elect_year'] = $el->elect_year; 
	       	 $subarr['start_n_end'] = $el->election_start." to ".$el->election_end; 
	       	 $subarr['votercount'] = $this->organization_model->get_voters_count($el->election_main_id);
	       	 array_push($mainarr,$subarr);
	       }
	       $data['years'] = $curyear;
       }


       //--------------------------------------

       function monthly_org_election_list(){

        if(isset($_POST['searchbtn'])){
           $curmonth = $this->input->post('curmonth');  
       $elections = $this->organization_model->get_electionlist($curmonth);  
       $mainarr = [];
         foreach ($elections as $el) {
           $subarr['election_name'] = $el->election_name; 
           $subarr['elect_year'] = $el->elect_year; 
           $subarr['start_n_end'] = $el->election_start." to ".$el->election_end; 
           $subarr['votercount'] = $this->organization_model->get_voters_count($el->election_main_id);
           array_push($mainarr,$subarr);
         }
         $data['years'] = $curmonth;
           
       }else{
           $curmonth = date("M");  
       $elections = $this->organization_model->get_electionlist($curmonth);  
       $mainarr = [];
         foreach ($elections as $el) {
           $subarr['election_name'] = $el->election_name; 
           $subarr['elect_year'] = $el->elect_year; 
           $subarr['start_n_end'] = $el->election_start." to ".$el->election_end; 
           $subarr['votercount'] = $this->organization_model->get_voters_count($el->election_main_id);
           array_push($mainarr,$subarr);
         }
         $data['years'] = $curmonth;
       }


       }

       


       //--------------------------------------

	   

	   $data['electionslist'] = $mainarr;
       $this->load->view('org/orgwise_election_rpt_viw',$data);
	}

    function memberlist(){
    	if(isset($_POST['searchbtn'])){
           $curyear = $this->input->post('curyear');	
		   $data['years'] = $curyear;
           $data['memberlist'] = $this->organization_model->get_yearwise_members($curyear);
       }else{
       	   $curyear = date("Y");	
       	   $data['memberlist'] = $this->organization_model->get_yearwise_members($curyear);
		   $data['years'] = $curyear;
       }
    	$this->load->view('org/orgwise_registrations_rpt_viw',$data);
    }


    function registered_org_list(){
    	if(isset($_POST['searchbtn'])){
           $curyear = $this->input->post('curyear');	
		   $data['years'] = $curyear;
           $data['orglist'] = $this->organization_model->get_registered_org_list($curyear);
       }else{
       	   $curyear = date("Y");	
       	   $data['orglist'] = $this->organization_model->get_registered_org_list($curyear);
		   $data['years'] = $curyear;
       }
    	$this->load->view('admin/registered_org_list_viw',$data);
    
    }

    function yearly_income_report(){
    	if(isset($_POST['searchbtn'])){
           $selectedyear = $this->input->post('curyear');	
		   $data['years'] = $selectedyear;
           $data['orglist'] = $this->organization_model->get_org_list_payments($selectedyear);
       }else{
       	   $curyear = date("Y");	
       	   $data['orglist'] = $this->organization_model->get_org_list_payments($curyear);
		   $data['years'] = $curyear;
       }
    	$this->load->view('admin/yearly_income_rpt_viw',$data);
    }

    function admin_list_report(){

      $data['admin_list'] = $this->organization_model->get_admin_list();

      $this->load->view('admin/active_admin_list',$data);

    }



}