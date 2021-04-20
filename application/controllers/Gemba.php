<?php
defined('BASEPATH') OR exit('No direct script access allowed');






class Gemba extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Gemba_model', 'gm');
		$this->load->library('email');
	}

	public function index()
	{
	
		$data['CallPIR'] = $this->gm->CallPIR();
		$data['DeptInfo'] = $this->gm->CallPIRDept();
		$data['ReporingTo'] = $this->gm->CallReportingTo();
		$data['Problems'] = $this->gm->CallProblems();
		$data['ViewProb'] = $this->gm->CallUserProblems();
		

	
		$this->load->view('index',$data);
	// 	$data['CallPIR'] = $this->gm->CallPIR();
	// $data['DeptInfo'] = $this->gm->CallDept();
	// $data['UsersInfo'] = $this->gm->Callusers();
	// $data['ReporingTo'] = $this->gm->CallReportingTo();
	// $data['addData'] =Null;
	
	// 	$this->load->view('AddUsers',$data);
	}

	public function Addprb($value)
	{
		$data['CallPIR'] = $this->gm->CallPIR();
		$data['DeptInfo'] = $this->gm->CallPIRDept();
		$data['ReporingTo'] = $this->gm->CallReportingTo();
		$data['Problems'] = $this->gm->CallProblems();
		$data['ViewProb'] = $this->gm->CallUserProblems();
		
		
		// if($value==1){
		// 	$data['Tital'] ="Defects";
		// }elseif($value==2){
		// 	$data['Tital'] ="Over Production";
		// }elseif($value==3){
		// 	$data['Tital'] ="Waiting - Delay";
		// }elseif($value==4){
		// 	$data['Tital'] ="Transportation";
		// }elseif($value==5){
		// 	$data['Tital'] ="Inventory";
		// }elseif($value==6){
		// 	$data['Tital'] ="Motion";
		// }elseif($value==7){
		// 	$data['Tital'] ="Over Processing";
		// }elseif($value==8){
		// 	$data['Tital'] ="Non Utlized/ Under Utlized Talent";
		// }
	
		$this->load->view('index',$data);
	}
	
	public function login()
	{
	
		$this->load->view('login');
	}

	public function process_login(){
		$user = $this->input->post('username');
		$password = $this->input->post('password');
		$this->gm->login($user, $password);

		if($this->session->has_userdata('user_id')){
			redirect('Gemba/index');
		}
	}


	public function logout()
    {
		$this->session->sess_destroy();
		redirect('Gemba/Login');
    }


	public function tables()
	{
	
		$this->load->view('tables');
	}

	public function Addusers()
	{
		//$data['CallPIR'] = $this->gm->CallPIR();
	$data['DeptInfo'] = $this->gm->CallDept();
	$data['UsersInfo'] = $this->gm->Callusers();
	$data['ReporingTo'] = $this->gm->CallReportingTo();
	$data['addData'] =Null;
	
		$this->load->view('AddUsers',$data);
	}


	public function getdept($fc)
	{
		$data = $this->gm->getLines($fc);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));
	}
	public function dept($fc)
	{
		$data = $this->gm->getLine($fc);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));
	}
	
	public function getprocess($fc)
	{
		$data = $this->gm->getprocess($fc);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));
	}
	
	
	public function getsections($fc)
	{
		$data = $this->gm->getSection($fc);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));
	}
	public function sections($fc)
	{
		$data = $this->gm->Section($fc);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));
	}
	public function getsubsections($fc)
	{
		$data = $this->gm->getsubsections($fc);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));
	}
	

	public function Addnewusers()
	{
		//$PIR = $this->input->post('PIR');
		$Dept = $this->input->post('Dept');
		//$Section = $this->input->post('Section');
	
		$UserName = $this->input->post('username');
		$Password = $this->input->post('password');
		$Email = $this->input->post('Email');
		$Contact_number = $this->input->post('CNumber');
		 // $RTo = $this->input->post('RTo');
		
	  $this->gm->AddNew( $Dept, $UserName, $Password, $Email, $Contact_number);
	  ////Email Sending 
	 
		$this->load->view('AddUsers');
		
		}
	


	public function EditUsers($userID)
	{
	$data['ReporingTo'] = $this->gm->CallReportingTo();
	$data['user'] = $this->gm->Callusersinfo($userID);
	$data['DeptInfo'] = $this->gm->CallDept();
		$this->load->view('EditUser',$data);
	}
	public function DeleteUser($userID)
	{

	$data['user'] = $this->gm->DeleteUser($userID);

		$this->load->view('EditUser',$data);
	}
	
	
	public function updateuser()
	{
		$UserID = $this->input->post('UserID');
		
		$Dept = $this->input->post('Dept');
	
	 
		$UserName = $this->input->post('username');
		$Email = $this->input->post('Email');
		$Contact_number = $this->input->post('CNumber');
	 	$RTo = 1;
	  $this->gm->updateUser( $Dept, $UserName ,$Email, $Contact_number, $RTo,$UserID
	  );
		$this->load->view('EditUser');
	}
	
	public function GetPIR($dpt)
	{
	
		$data = $this->gm->getRTo($dpt);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));
	}
	public function AddProblem()
	{
		$CurrentDate=date('Y-m-d');
		$UserName= $this->session->userdata('user_name');
		if(!empty($_FILES['picture']['name'])){

			$config['upload_path'] = 'assets\img\probelmimages';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = "$UserName' '$CurrentDate.jpg" ;
			
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('picture')){
			$uploadData = $this->upload->data();
					$picture = $uploadData['file_name'];
					$config['image_library'] = 'gd2';  
					 $config['source_image'] = 'assets/img/probelmimages/'.$picture;
					
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE;  
                     $config['quality'] = '60%';  
                     $config['width'] = 800;  
					 $config['height'] = 600;  
					 $config['new_image'] = 'assets/img/probelmimages/'.$picture;
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize(); 
			}else{
				$picture = '';
			}
		}else{

			$picture = '';
		}

		$PIR = 3;
		$Dept = $this->input->post('Dept');
		$Section = $this->input->post('Process');
		
		//$Defects = $this->input->post('Defects');
		$IssueTo = $this->input->post('IssueTo');
		$Severity = $this->input->post('Severity');
		$what = $this->input->post('what');
		$when = $this->input->post('when');
		$where = $this->input->post('where');
		$why = $this->input->post('why');
		$howMany = $this->input->post('Much');	
		$why = $this->input->post('why');
		$howMany = $this->input->post('Much');
		  $Image = $picture;
	
		$Desc = $this->input->post('Desc');
		
	 $this->gm->AddPrb($PIR,$Section,$Severity,$Dept, $IssueTo, $Image, $Desc,$what,$when,$where,$why,$howMany);
	$this->load->view('Gemba/index');
	}
	
	public function EditProb($ID)
	{
		$data['DeptInfo'] = $this->gm->CallPIRDept();
		$data['ReporingTo'] = $this->gm->CallReportingTo();
		$data['EditProb'] = $this->gm->CallProb($ID);
		$this->load->view('EditProb',$data);
	}
	
	Public function updateProblem(){
		$PIR = 3;
		$Dept = $this->input->post('Dept');
		$Section = $this->input->post('Process');
		
		
	 	
		$IssueTo = $this->input->post('IssueTo');
		$TID= $this->input->post('TID');
		$what = $this->input->post('what');
		$when = $this->input->post('when');
		$where = $this->input->post('where');
		$why = $this->input->post('why');
		$howMany = $this->input->post('Much');
		$CurrentDate=date('Y-m-d');
		$UserName= $this->session->userdata('user_name');
		$oldImage= $this->input->post('oldImage');
		if(!empty($_FILES['picture']['name'])){
			
			$config['upload_path'] = 'assets\img\probelmimages';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = "$UserName' '$CurrentDate.jpg" ;
			
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('picture')){
		$uploadData = $this->upload->data();
		
				$picture = $uploadData['file_name'];
				$config['image_library'] = 'gd2';  
					 $config['source_image'] = 'assets/img/probelmimages/'.$picture;
					
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE;  
                     $config['quality'] = '60%';  
                     $config['width'] = 800;  
					 $config['height'] = 600;  
					 $config['new_image'] = 'assets/img/probelmimages/'.$picture;
                     $this->load->library('image_lib', $config);  
                     $this->image_lib->resize(); 
			}else{
				$picture = '';
			}
		}else{
			// Echo "Hellll";
			// die;
			$picture = $oldImage;
		}
	 $Image=$picture;

	 $this->gm->updatePrb($PIR, $Dept, $Section, $IssueTo,$TID,$Image,$what,$when,$where,$why,$howMany);
	$this->load->view('Gemba/EditProb');
	}


	public function ViewIssue($TID){
		$data['ViewIssue'] = $this->gm->Callissue($TID);
		$data['ReporintingTo'] = $this->gm->CallReporintgTo($TID);
		$this->gm->upPrb($TID);
		$this->load->view('ViewIssue',$data);


	}
	public function AddSolution(){

		$CurrentDate=date('Y-m-d');
		$UserName= $this->session->userdata('user_name');
		$IssuedBy= $this->input->post('ITOID');
		

		
		if(!empty($_FILES['solutionimage']['name'])){
		
		
			$config['upload_path'] = 'assets\img\Solutionimages';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = "$UserName' '$CurrentDate.jpg" ;
			
			//Load upload library and initialize configuration
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
			if($this->upload->do_upload('solutionimage')){
		$uploadData = $this->upload->data();
		$picture = $uploadData['file_name'];
		$config['image_library'] = 'gd2';  
		$config['source_image'] = 'assets/img/Solutionimages/'.$picture;
	   
		$config['create_thumb'] = FALSE;  
		$config['maintain_ratio'] = FALSE;  
		$config['quality'] = '60%';  
		$config['width'] = 800;  
		$config['height'] = 600;  
		$config['new_image'] = 'assets/img/Solutionimages/'.$picture;
		$this->load->library('image_lib', $config);  
		$this->image_lib->resize(); 
			}else{
				$picture = '';
			}
		}else{
			
			$picture = '';
		}
		 $ReasonID = $this->input->post('ReasonID');
		 $ReasonDes = $this->input->post('ReasonDesc');
		if(empty($ReasonDes2)){
			$ReasonDes2="Nothing to Say More";
		}else{
			$ReasonDes2="Nothing to Say More";
		}
		 $CorectiveAction = $this->input->post('CorrectiveAction');	
		 $ExpectedDate = $this->input->post('expectedDate');	
		 //$Desc = $this->input->post('Desc');	
		 $Precentage = 0;
		$PIRType = 3;
		$DeptID = $this->input->post('DeptID');
		$SectionID = $this->input->post('SectionID');
		$AssignedTO = 1;
		$Image= $this->input->post('Image');
		 $SolutionImage=$picture;
		 $solitionDescription= $this->input->post('Desc');
		 $PID= $this->input->post('PID');
		$Severitylevel= $this->input->post('Severitylevel');
		$this->gm->SolvedProblem($PID,$Severitylevel,$PIRType,$DeptID,$SectionID,$AssignedTO
		,$Image,$SolutionImage,$solitionDescription,$IssuedBy,$ReasonID,
		$ReasonDes,$CorectiveAction,$Precentage,$ExpectedDate);

	}


	public function Viewsolution($TID){
		$data['Viewsolution'] = $this->gm->Callsolution($TID);
		$this->load->view('Viewsolution',$data);
	}


	public function prdSol(){
		$Final = $this->input->post('Final');
		$PID = $this->input->post('PID');
		$this->gm->updateProbelm($PID ,$Final);
	}

	public function ViewFinalSolution($TID){
	$data['ViewFinalSolution']=$this->gm->ViewFinalSolution($TID);
	$this->load->view('ViewFinalSolution',$data);
	}
	Public function Problems(){
		$data['Problems'] = $this->gm->CallAllProblems();
			$data['ViewProb'] = $this->gm->CallAllProblemsusers();
	$this->load->view('Problems',$data);
	}
	Public function Issues(){
		$data['ViewProb'] = $this->gm->CallUserProblems();
	$this->load->view('Issues',$data);
	}
	Public function ChangePassword(){
		$data['UserInfor'] = $this->gm->CallUser();
		$this->load->view('Cpwd',$data);
	}
	
	public function UpdateProfile(){
		$username = $this->input->post('username');
		$EmailAddress = $this->input->post('Email');
		$PhoneNo = $this->input->post('Phone');
		$NewPassword = $this->input->post('New');
		$Oldpassword = $this->input->post('Old');
	
		 $check= $this->input->post('check');
		if($check=='on'){
			if($NewPassword==$Oldpassword){
				
				$this->gm->UpdateProfile($EmailAddress,$PhoneNo,$NewPassword,$Oldpassword,$username);
			}else{
				
				$this->gm->pednotmatch();
			}
			
		}else{
			
			$this->gm->UpdatePro($EmailAddress,$PhoneNo,$username);
		}
		
		$data['UserInfor'] = $this->gm->CallUser();
		$this->load->view('Cpwd',$data);
	}

	Public function Home(){
	
		$this->load->view('Home');
	}
	public function getmainProcess($dpt,$Sect,$subSec){
		$data = $this->gm->GetmainProcess($dpt,$Sect,$subSec);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));

	}
	public function getSubProcess($dpt,$Sect,$subSec,$ProcessID){
		$data = $this->gm->getSubProcess($dpt,$Sect,$subSec,$ProcessID);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
			'data' => $data,)));

	}
}



  
        

