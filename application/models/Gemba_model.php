<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gemba_model extends CI_Model {


    public function login($username, $password){
      
         $query = $this->db->query("SELECT  dbo.View_PIR_User_informations.* FROM dbo.View_PIR_User_informations 
         WHERE (UserName = '$username') AND (Password = '$password')");
      
        if($query->num_rows() > 0){
            $result = $query->row();
            $session_data = array(
                'user_id' => $result->UserID,
                'user_name' => $result->UserName,
                'user_Email' => $result->EmailAddress,
                'userStus' => 1,
                'logged_in' => TRUE 
            );
            $this->session->set_userdata($session_data);
        }else{
            $this->session->sess_destroy();
            $this->session->set_flashdata('info', 'Wrong username or password');  
            redirect('Gemba/login');
        }
    }
public function CallPIR(){
  $query = $this->db->query('SELECT         DepartmetnName, ID
        FROM            dbo.Tbl_PIR_Main_Dept ');
        return $query->result_array();
}
    public function CallPIRDept()
    {
        $query = $this->db->query('SELECT        DeptID, DeptName, ID, Status
        FROM            dbo.tbl_PIR_Dept 
        WHERE        (Status = 1)');
        return $query->result_array();
    }
    public function CallDept()
    {
        $query = $this->db->query('SELECT        DeptID, DeptName, ID, Status
        FROM            dbo.tbl_PIR_Dept
        WHERE        (Status = 1)');
        return $query->result_array();
    }

    public function getLines($fc)
	{
		$this->db->select(" DeptID, DeptName, ID")
		    ->from(" dbo.tbl_PIR_Dept");
       $this->db->where("ID =", $fc );
       return $this->db->where("Status =", 'True' )
			->get()
			->result();
	
		
    }
    public function getLine($fc)
    {
      $this->db->select(" DeptID, DeptName, ID")
          ->from(" dbo.tbl_PIR_Dept");
          return $this->db->where("ID =", $fc )
         
          
        ->get()
        ->result();
    
      
      }
    public function getprocess($fc)
	{
		$this->db->select(" DeptID,PID, processname,Status")
		    ->from(" dbo.tbl_PIR_Process");
       $this->db->where("DeptID =", $fc);
       return  $this->db->where("Status =", 1)
      
			->get()
			->result();		
    }
    public function getSection($fc)
    {
      $this->db->select("SectionID, DeptID, SectionName,Status")
          ->from(" dbo.tbl_PIR_Section");
           $this->db->where("DeptID =", $fc);
          return $this->db->where("Status =", 1)
          
        ->get()
        ->result();		
      }
      public function Section($fc)
      {
        $this->db->select("SectionID, ProcessID, SectionName,Status")
            ->from(" dbo.tbl_PIR_Section");
           $this->db->where("DeptID =", $fc);
           return $this->db->where("Status =", 1)
          ->get()
          ->result();		
        }
      public function getsubsections($fc)
      {
        $this->db->select("SectionID, ProcessID, SectionName,Status")
            ->from(" dbo.tbl_PIR_Section");
           $this->db->where("ProcessID =", $fc);
          return $this->db->where("Status =", 1)
          ->get()
          ->result();		
        }
      
    public function AddNew($Dept,$UserName, $Password, $Email, $Contact_number)
	{
        $Month=date('m');
        $Year=date('Y');
        $Day=date('d');
        $CurrentDate=$Year.'-'.$Month.'-'.$Day;
		 $query = $this->db->query("INSERT INTO dbo.tbl_PIR_Users 
         (dbo.tbl_PIR_Users.UserName,
         dbo.tbl_PIR_Users.Password,
         dbo.tbl_PIR_Users.DeptID,
         dbo.tbl_PIR_Users.ReportingID,
         dbo.tbl_PIR_Users.EmailAddress,
         dbo.tbl_PIR_Users.Contact_Number,
         dbo.tbl_PIR_Users.EntryDate,
         dbo.tbl_PIR_Users. Status,
         dbo.tbl_PIR_Users.IDMMS)
        VALUES('$UserName','$Password',$Dept,1,'$Email',
        $Contact_number,'$CurrentDate',1,0)");
     if($query){

        ///User Sending Email
        $subject="Welcome In Gemba";
        $Tital="Forward Sports Digital Gemba";
        $user_Email=$this->session->userdata('user_Email');
        $Msg="Gemba User Registration
        Application Link : http://125.209.66.227:2000/Gemba/
        Your User Name   : $UserName
        Your  Password   : $Password 
        Kindly Change Your Password First
        Best Of Luck
        
        For any query please contact to $user_Email

        Regards,

        IT Department.
        Forward Sports (Pvt) Ltd.

        ";
        
        $UserId=$this->session->userdata('user_id');
		$this->email->from('no-reply@sports.pk',  $Tital);
		$this->email->to($Email);
		$this->email->subject($subject);
        $this->email->message($Msg); 
        //  $this->email->priority(1); 
        // $//this->email->set_header("X-Priority: 1 (Highest)");
        // $this->email->cc('another@another-example.com');
        $this->email->bcc('shoaib@forward.pk');
        if($this->email->send()==1){

        }
        else{
      
            $this->session->set_flashdata('danger', "Email is Not Send to' $Email"); 
            redirect('Gemba/Addusers');
        }
        //$SenderAddress=$this->session->userdata('user_Email');
        $insertion=$this->db->query("INSERT INTO dbo.tbl_PIR_Email_Log
        (SenderAddress,ToAddress,Subject,Msg,Date,UserID,Tital)VALUES
        ('no-reply@forward.pk','$Email','$subject','$Msg','$CurrentDate',$UserId,'$Tital')");
        if($insertion){
      $this->session->set_flashdata('info', 'New User Has Been Added Successfully');
      redirect('Gemba/Addusers');
       }else{
        $this->session->set_flashdata('danger', 'New User Has Not Been Added'); 
        redirect('Gemba/Addusers');
       }
	
    
    }
  }


    public function Callusers()
    {
        $query = $this->db->query('SELECT dbo.View_PIR_User_Informations.* FROM  dbo.View_PIR_User_Informations');
        return $query->result_array();
    }

    public function Callusersinfo($userID)
    {
        $query = $this->db->query("SELECT dbo.View_PIR_User_Informations.* FROM  dbo.View_PIR_User_Informations
WHERE        (dbo.View_PIR_User_Informations.UserID = $userID)");
        return $query->result_array();
    }


    
    public function CallReportingTo()
    {
        $query = $this->db->query('SELECT        dbo.tbl_PIR_Users.UserName, dbo.tbl_PIR_Dept.DeptName, dbo.tbl_PIR_Users.UserID, dbo.tbl_PIR_Section.SectionName
        FROM            dbo.tbl_PIR_Users INNER JOIN
                                 dbo.tbl_PIR_Dept ON dbo.tbl_PIR_Users.DeptID = dbo.tbl_PIR_Dept.DeptID INNER JOIN
                                 dbo.tbl_PIR_Section ON dbo.tbl_PIR_Users.DeptID = dbo.tbl_PIR_Section.DeptID AND dbo.tbl_PIR_Users.SectionID = dbo.tbl_PIR_Section.SectionID AND dbo.tbl_PIR_Dept.DeptID = dbo.tbl_PIR_Section.DeptID');
        return $query->result_array();
    }

    
    public function updateUser( $Dept, $UserName, $Email, $Contact_number, $RTo,$UserID)
	{
      $query = $this->db->query("UPDATE dbo.tbl_PIR_Users
         SET UserName = '$UserName'
            ,DeptID = $Dept
            ,ReportingID = $RTo
            ,EmailAddress = '$Email'
            ,Contact_Number =  $Contact_number
                    
       WHERE UserID= $UserID");
      
     if($query){
       
        $this->session->set_flashdata('info', 'Record Has Been Updates');
        redirect('Gemba/Addusers');
       }else{
        $this->session->set_flashdata('danger', 'Record Has Not Been Updates'); 
        redirect('Gemba/Addusers');
       }
	
		
    }
    public function Deleteuser($UserID)
    {
        $query = $this->db->query("Delete  dbo.tbl_PIR_Users        
         WHERE UserID= $UserID");
        
       if($query){
         
          $this->session->set_flashdata('danger', 'Record Has Been Deleted Successfully');
          redirect('Gemba/Addusers');
         }else{
          $this->session->set_flashdata('danger', 'Record Has Not Been  Deleted Deleted'); 
          redirect('Gemba/Addusers');
         }
    
      
      }
  
    public function getRTo($dpt)
	{
		 $this->db->select("DeptID, UserName, UserID,SectionID,SubSectionID,MainProcessID,SubProcessID")
		    ->from(" dbo.View_PIR_User_Informations");
            return $this->db->where("DeptID =", $dpt)
    //   $this->db->where("SectionID =", $Sect);
    //   $this->db->where("SubSectionID =", $subSec);
    //   $this->db->where("MainProcessID =", $Process);
    //   return $this->db->where("SubProcessID =", $SubProcessProcess)
			->get()
			->result();	
    }

   

    public function AddPrb($PIR,$Section,$Severity,$Dept, $IssueTo, $Image, $Desc,$what,$when,$where,$why,$howMany){
        $Month=date('m');
        $Year=date('Y');
        $Day=date('d');
        $CurrentDate=$Year.'-'.$Month.'-'.$Day;
        $UserId=$this->session->userdata('user_id');
        $query = $this->db->query("INSERT  INTO dbo.Tbl_PIR_Problems 
        (UserID,PIRID,DeptID,SectionID,IssueTo,Description,image,Date,Status,
        what,Wheen,Wheree,Why,HowMany,Severitylevel)
        VALUES
        ($UserId,$PIR,$Dept,$Section,$IssueTo,'$Desc','$Image','$CurrentDate',1,'$what',
        '$when','$where','$why','$howMany','$Severity')");
        if($query){
    
            $query1 = $this->db->query("SELECT        MAX(TID) AS TID
            FROM            dbo.Tbl_PIR_Problems");
    
            if($query1->num_rows() > 0){
            $result = $query1->row();
             $TID=$result->TID;
    
             $Insertion= $this->db->query("INSERT  INTO dbo.tbl_PIR_Problem_Transactions
             (dbo.tbl_PIR_Problem_Transactions.PID,
             dbo.tbl_PIR_Problem_Transactions.useriD,
             dbo.tbl_PIR_Problem_Transactions.IssueTO,
             dbo.tbl_PIR_Problem_Transactions.Comments,
             dbo.tbl_PIR_Problem_Transactions.Image,
             dbo.tbl_PIR_Problem_Transactions.Date,
             dbo.tbl_PIR_Problem_Transactions.DeptiD,
             dbo.tbl_PIR_Problem_Transactions.SectionID,
             dbo.tbl_PIR_Problem_Transactions.PtypeiD,
             dbo.tbl_PIR_Problem_Transactions.Status)      
       VALUES
             ($TID,$UserId,$IssueTo,'first Step','$Image',$CurrentDate,$Dept,
             $Section,$PIR,1)");
    
             if($Insertion){
               
        //get Isuue To Email Address
                    $Username=$this->db->query("SELECT  dbo.tbl_PIR_Users.* FROM            dbo.tbl_PIR_Users
                    WHERE        (UserID =$IssueTo)");
                            if($Username->num_rows() > 0){
                                $result = $Username->row();
                                    $EmailAddress=$result->EmailAddress;
                                    $IssueToName=$result->UserName;
                            }
                             
        //get Isuue To Email Address
                $Username=$this->db->query("SELECT  dbo.View_PIR_problems.* FROM            dbo.View_PIR_problems
                WHERE        (IssueToID =$IssueTo)");
                        if($Username->num_rows() > 0){
                            $result = $Username->row();
                            
                                $Department=$result->SenderDeptname;
                                $Section=$result->SectionName;
                                $image=$result->image;
                                $PrbNo=$result->TID;
                                $ProblemDate=$result->Date;
                                $Deptname=$result->DeptName;
                                $Process=$result->Processname;
                                $Severity=$result->Severity;
                                $HODName=$result->HODName;
                                
                                $HODEmailAddres=$result->HODEmailAddres;
                        }
        
                ///Add Problem Sending Email
        
                $subject="Gemba New Issue";
                $Tital="Forward Sports Digital Gemba ";
                 $Attachment=$image;
          
                $user_Email=$this->session->userdata('user_Email');
                $UserName=$this->session->userdata('user_name');
                $UserId=$this->session->userdata('user_id');
                $Msg="Dear Mir $IssueToName,
                        Pro # $PrbNo
                        (Department : $Deptname) /( Section :$Process) / (Sub Section : $Section)                    
                        Problme Date($ProblemDate):
                                What? : $what
                                When? : $when
                                Where?: $where
                                Why?  : $why
                                How Much? :$howMany
                                Find the attached file For More Details 

                                For any query please contact at $user_Email

                                Regard:
                                Name:       $UserName
                                Department: $Department
                                HOD Name:     $HODName

                ";
                
              //  $FilePath=base_url("assets\img\probelmimages");
                $this->email->from('no-reply@forward.pk',  $Tital);
                $this->email->to($EmailAddress);
                $this->email->subject($subject);
                $this->email->message($Msg); 
                $this->email->cc($HODEmailAddres);
                
               
               $this->email->attach("assets/img/probelmimages/$Attachment");
                if($this->email->send()==1){
                 
                }
                else{
                    $this->session->set_flashdata('danger', "Email is Not Send to' $EmailAddress"); 
                    redirect('Gemba/index');
                }
                
                //$SenderAddress=$this->session->userdata('user_Email');
                $insertion=$this->db->query("INSERT INTO dbo.tbl_PIR_Email_Log
                (SenderAddress,ToAddress,Subject,Msg,Date,UserID,Tital)VALUES
                ('no-reply@forward.pk','$EmailAddress','$subject','$Msg','$CurrentDate',$UserId,'$Tital')");
                if($insertion){
                   
                 $this->session->set_flashdata('info', 'New Problem Has Been Added Successfully');
                 redirect('Gemba/index');
             }else{
               
                 $this->session->set_flashdata('danger', 'New Problem Has Not Been Added'); 
                 redirect('Gemba/index');
                 }

                }
            }
        }
    }

        



    public function CallProblems()
    {
        $UserId=$this->session->userdata('user_id');
        $query = $this->db->query("SELECT dbo.View_PIR_problems.* FROM   dbo.View_PIR_problems
         WHERE dbo.View_PIR_problems.userID= '$UserId'");
        return $query->result_array();
    }

    public function CallAllProblems()
    {
        $UserId=$this->session->userdata('user_id');
        $query = $this->db->query("SELECT dbo.View_PIR_problems.* FROM   dbo.View_PIR_problems");
        return $query->result_array();
    }

    Public Function CallProb($ID){
        $query = $this->db->query("SELECT   dbo.View_PIR_problems.* FROM   dbo.View_PIR_problems
        WHERE dbo.View_PIR_problems.TID= '$ID'");
       return $query->result_array();
    }
    public function updatePrb($PIR, $Dept, $Section, $IssueTo,$TID,$Image,$what,$when,$where,$why,$howMany){
        $UserId=$this->session->userdata('user_id');
        $Month=date('m');
        $Year=date('Y');
        $Day=date('d');
        $CurrentDate=$Year.'-'.$Month.'-'.$Day;
        $query=$this->db->query(" 
        UPDATE dbo.Tbl_PIR_Problems 
        SET  dbo.Tbl_PIR_Problems.UserID = $UserId,
        dbo.Tbl_PIR_Problems.DeptID = $Dept,
        dbo.Tbl_PIR_Problems.IssueTo = $IssueTo,
        dbo.Tbl_PIR_Problems.Date = $CurrentDate,
        dbo.Tbl_PIR_Problems.image = '$Image',       
        dbo.Tbl_PIR_Problems.what = '$what',
        dbo.Tbl_PIR_Problems.Wheen = '$when',
        dbo.Tbl_PIR_Problems.Wheree = '$where',
        dbo.Tbl_PIR_Problems.Why = '$why',
        dbo.Tbl_PIR_Problems.HowMany = '$howMany', 
        dbo.Tbl_PIR_Problems.Status = 1,
        dbo.Tbl_PIR_Problems.SectionID = $Section 
         WHERE 
         dbo.Tbl_PIR_Problems.TID=$TID");
         if($query){

             $query1=$this->db->query("
            UPDATE dbo.tbl_PIR_Problem_Transactions
            SET  
            dbo.tbl_PIR_Problem_Transactions.useriD =  $UserId,
            dbo.tbl_PIR_Problem_Transactions.IssueTO = $IssueTo 
               ,dbo.tbl_PIR_Problem_Transactions.Comments = 'First Phase'
               ,dbo.tbl_PIR_Problem_Transactions.Date = '$CurrentDate'
               ,dbo.tbl_PIR_Problem_Transactions.DeptiD = $Dept
               ,dbo.tbl_PIR_Problem_Transactions.PtypeiD = $PIR
               ,dbo.tbl_PIR_Problem_Transactions.Status = 1
               ,dbo.tbl_PIR_Problem_Transactions.ProcessID = $Section
          WHERE PID =$TID");
       
          if ($query1){
            $this->session->set_flashdata('info', 'Problem Has Been Added Updated');
            redirect('Gemba/EditProb'/$TID);
        }else{
          
            $this->session->set_flashdata('danger', 'Problem Has Not Been Updated'); 
            redirect('Gemba/EditProb'/$TID);
           }
          }

         }
         public function CallUserProblems(){
            $UserId=$this->session->userdata('user_id');
            $query = $this->db->query("SELECT        dbo.View_PIR_Problem_Issue_To.*
            FROM            dbo.View_PIR_Problem_Issue_To
            WHERE        (ITOID = $UserId)");
           return $query->result_array();
         }
          public function CallAllProblemsusers(){
            $UserId=$this->session->userdata('user_id');
            $query = $this->db->query("SELECT        dbo.View_PIR_Problem_Issue_To.*
            FROM            dbo.View_PIR_Problem_Issue_To");
           return $query->result_array();
         }
    Public function Callissue($TID){

        $query = $this->db->query("SELECT        dbo.View_PIR_Problem_Issue_To.*
        FROM            dbo.View_PIR_Problem_Issue_To
        WHERE        (TID = $TID)");
       return $query->result_array();

    }
    public function upPrb($TID){

        $UserId=$this->session->userdata('user_id');
        $query=$this->db->query("
            UPDATE dbo.Tbl_PIR_Problems 
            SET dbo.Tbl_PIR_Problems.Status =2
          WHERE TID =$TID");

          $query1 = $this->db->query("SELECT       dbo.Tbl_PIR_Problems.*
          FROM            dbo.Tbl_PIR_Problems Where TID=$TID");
  
          if($query1->num_rows() > 0){
          $result = $query1->row();
           $TID=$result->TID;
           $DeptID=$result->DeptID;
        
           $IssueTo=$result->IssueTo;
            $image=$result->image;
            $SectionID=$result->SectionID;
         ;
        
           $Month=date('m');
           $Year=date('Y');
           $Day=date('d');
           $CurrentDate=$Year.'-'.$Month.'-'.$Day;
          if ($query){
            
            $Insertion= $this->db->query("INSERT  INTO dbo.tbl_PIR_Problem_Transactions
         (dbo.tbl_PIR_Problem_Transactions.PID,
         dbo.tbl_PIR_Problem_Transactions.useriD,
         dbo.tbl_PIR_Problem_Transactions.IssueTO,
         dbo.tbl_PIR_Problem_Transactions.Comments,
         dbo.tbl_PIR_Problem_Transactions.Image,
         dbo.tbl_PIR_Problem_Transactions.Date,
         dbo.tbl_PIR_Problem_Transactions.DeptiD,
         dbo.tbl_PIR_Problem_Transactions.SectionID)      
   VALUES
         ($TID,$UserId,$IssueTo,'problem Chekecd','$image',$CurrentDate,$DeptID,$SectionID)");
            if($Insertion){

            }
        }
    }

    }


public function CallReporintgTo($TID){
    $query1 = $this->db->query("SELECT       dbo.Tbl_PIR_Problems.*
    FROM            dbo.Tbl_PIR_Problems Where TID=$TID");

    if($query1->num_rows() > 0){
    $result = $query1->row();
     $DeptID=$result->DeptID;
     $query = $this->db->query("SELECT        UserID, UserName
     FROM            dbo.tbl_PIR_Users
     WHERE        (DeptID = $DeptID)");
    return $query->result_array();
    }

}

        public function SolvedProblem($PID,$Severitylevel,$PIRType,$DeptID,$SectionID,$AssignedTO
        ,$Image,$SolutionImage,$solitionDescription,$IssuedBy,$ReasonID,
        $ReasonDes,$CorectiveAction,$Precentage,$ExpectedDate){
            $Month=date('m');
            $Year=date('Y');
            $Day=date('d');
            $CurrentDate=$Year.'-'.$Month.'-'.$Day;
            $UserId=$this->session->userdata('user_id');
            $query=$this->db->query("INSERT   INTO dbo.Tbl_PIR_Prob_Solutions
            (PIRType,DeptID,SectionID,UserID,AssignedTO,IssuedBy,image,Date,
            Solutionimge,SolutionDescription,PID,ReasonID,ReasonDes,
            CorrectiveAction,ExpectedDate,ProbPrcentage,Severitylevel)
        VALUES
            ($PIRType,$DeptID,$SectionID,$UserId,$AssignedTO,$IssuedBy,'$Image','$CurrentDate',
            '$SolutionImage','$solitionDescription',$PID,$ReasonID,'$ReasonDes',$CorectiveAction,
            '$ExpectedDate',$Precentage,'$Severitylevel')");
        
            if($query){
                    $query=$this->db->query("
                    UPDATE dbo.Tbl_PIR_Problems 
                    SET dbo.Tbl_PIR_Problems.Status =3
                WHERE TID =$PID");

                if($query){


            $Insertion= $this->db->query("INSERT  INTO dbo.tbl_PIR_Problem_Transactions
         (dbo.tbl_PIR_Problem_Transactions.PID,
         dbo.tbl_PIR_Problem_Transactions.useriD,
         dbo.tbl_PIR_Problem_Transactions.IssueTO,
         dbo.tbl_PIR_Problem_Transactions.Comments,
         dbo.tbl_PIR_Problem_Transactions.Image,
         dbo.tbl_PIR_Problem_Transactions.Date,
         dbo.tbl_PIR_Problem_Transactions.DeptiD,
         dbo.tbl_PIR_Problem_Transactions.SectionID,
         dbo.tbl_PIR_Problem_Transactions.PtypeiD,
         dbo.tbl_PIR_Problem_Transactions.Status)      
   VALUES
         ($PID,$UserId,$IssuedBy,'problem Solved','$Image',$CurrentDate,$DeptID,$SectionID,$PIRType,'3')");
            if($Insertion){
                //get Isuue To Email Address
                $Username=$this->db->query("SELECT  dbo.View_PIR_SOLUTIONS.* FROM      
                      dbo.View_PIR_SOLUTIONS
                WHERE        (PID =$PID)");
                        if($Username->num_rows() > 0){
                            $result = $Username->row();
                            
                                $INsiiator=$result->Inisiator;
                                $what=$result->what;
                                $when=$result->Wheen;
                                $where=$result->Wheree;
                                $why=$result->Why;
                                $howMany=$result->HowMany;
                                $PrbNo=$result->PID;
                                $Deptname=$result->DeptName;
                                $Section=$result->SectionName;
                                $Process=$result->Processname;
                                $Severitylevel=$result->Severitylevel;
                                $image=$result->image;
                                $ProblemDate=$result->Date;
                                $IssuedEmailAddress=$result->IssuedEmailAddress;
                                $ExpectedDatefINAL=$result->ExpectedDate;
                                $Date=$result->Date;
                                $HODEmail=$result->HODEmail;
                                  $HODName=$result->HODName;
                                  $UserDept=$result->UserDept;
                                
                        }
                       
                       
                        if($ReasonID==1){
                        $Reason="MAN";
                        }elseif($ReasonID==2){
                        $Reason="MATERIAl";
                        }elseif($ReasonID==3){
                        $Reason="MACHION";
                        }elseif($ReasonID==4){
                        $Reason="METHOD";
                        }elseif($ReasonID==5){
                        $Reason="ENVIRONMENT";
                        }

                        $CorrectiveID=$CorectiveAction;
                        if($CorrectiveID==1){
                        $CorrectiveAction="Permanent Solution";
                        }elseif($CorrectiveID==2){
                          $CorrectiveAction="Instant Solution";
                        }
                        
                        if($Precentage==1){
                        $Prec="10 %";
                        }elseif($Precentage==2){
                          $Prec="20 %";
                        }elseif($Precentage==3){
                          $Prec="30 %";
                        }elseif($Precentage==4){
                          $Prec="40 %";
                        }elseif($Precentage==5){
                          $Prec="50 %";
                        }elseif($Precentage==6){
                          $Prec="60 %";
                        }elseif($Precentage==7){
                          $Prec="70 %";
                        }elseif($Precentage==8){
                          $Prec="80 %";
                        }elseif($Precentage==9){
                          $Prec="90 %";
                        }elseif($Precentage==10){
                          $Prec="100 %";
                        }
                ///Solution Problem Sending Email

                $subject="Gemba Solution";
                $Tital="Forward Sports Digital Gemba ";
                $Attachment=$image;
                $user_Email=$this->session->userdata('user_Email');
                $UserName=$this->session->userdata('user_name');
                $UserId=$this->session->userdata('user_id');
                $Msg="Dear Mir $INsiiator,
                        Pro # $PrbNo
                        (Department : $Deptname) /( Process :$Process) / (Section : $Section)
                        Severity Level : $Severitylevel
                        Problme Date($ProblemDate):
                                What? : $what
                                When? : $when
                                Where?: $where
                                Why?  : $why
                                How Much? :$howMany

                        Solution Date($Date)
                                Reason : $Reason
                                Reason Descrptions : $ReasonDes
                                Reason Descrptions : $ReasonDes2
                                Corrective Action Plan : $CorrectiveAction
                                Expected Closure Date : $ExpectedDatefINAL
                                Descrptions : $solitionDescription
                                Precentage  : $Prec
                        
                                Find the attached file For More Details 

                                For any query please contact at $user_Email

                                Regard:
                                Name:     $UserName
                                Dept:     $UserDept
                                HOD Name: $HODName

                                

                ";
 

                //  $FilePath=base_url("assets\img\probelmimages");
                $this->email->from('no-reply@forward.pk',  $Tital);
                $this->email->to($IssuedEmailAddress);
                $this->email->subject($subject);
                $this->email->message($Msg); 
                $this->email->cc($HODEmail);
                $this->email->attach("assets/img/probelmimages/$Attachment");
                $this->email->attach("assets/img/Solutionimages/$SolutionImage");
                //$this->email->attach("$FilePath/$Attachment");
                if($this->email->send()==1){
                
                }
                else{
                    $this->session->set_flashdata('danger', "Email is Not Send to' $IssuedEmailAddress"); 
                    redirect('Gemba/index');
                }

                //$SenderAddress=$this->session->userdata('user_Email');
                $insertion=$this->db->query("INSERT INTO dbo.tbl_PIR_Email_Log
                (SenderAddress,ToAddress,Subject,Msg,Date,UserID,Tital)VALUES
                ('no-reply@forward.pk','$IssuedEmailAddress','$subject','Solution','$CurrentDate',$UserId,'$Tital')");
                if($insertion){
                
                $this->session->set_flashdata('info', 'New Problem Has Been Added Successfully');
                redirect('Gemba/index');
            $this->session->set_flashdata('info', 'Solution Has Been Added Submited / Assigned');
            redirect('Gemba/Viewissue'/$PID);
          }
        }else{
          
            $this->session->set_flashdata('danger', 'Solution Has  Not Been Assigned'); 
            redirect('Gemba/Viewissue'/$PID);
           }

                    }

                }
            }

public function Callsolution($TID){

    $query1 = $this->db->query(" SELECT        MAX(soutionID) AS soutionID
    FROM            dbo.View_PIR_Solutions
    WHERE        (PID = $TID)");

    if($query1->num_rows() > 0){
        $result = $query1->row();
        $SolitionID=$result->soutionID;
   
   $query = $this->db->query("SELECT        dbo.View_PIR_Solutions.*
    FROM            dbo.View_PIR_Solutions
    WHERE        (soutionID = $SolitionID)");
   return $query->result_array();
    }

}

Public function updateProbelm($PID ,$Final){
    $UserId=$this->session->userdata('user_id');
    $query=$this->db->query("
    UPDATE dbo.Tbl_PIR_Problems 
    SET dbo.Tbl_PIR_Problems.Status =$Final,dbo.Tbl_PIR_Problems.SolvedBy= $UserId
  WHERE TID =$PID");

  if($query){
    $query1 = $this->db->query(" SELECT        MAX(soutionID) AS soutionID
    FROM            dbo.View_PIR_Solutions
    WHERE        (PID = $PID)");

    if($query1->num_rows() > 0){
        $result = $query1->row();
        $SolitionID=$result->soutionID;
   
   $query32 = $this->db->query("SELECT        dbo.View_PIR_Solutions.*
    FROM            dbo.View_PIR_Solutions
    WHERE        (soutionID = $SolitionID)");

     if($query32->num_rows() > 0){
        $result = $query32->row();
        $SolitionID=$result->soutionID;
       $IssuedBy=$result->IssuedBy;
        $Image=$result->image;
        $DeptID=$result->DeptID;
        $SectionID=$result->SectionID;
        $PIRType=$result->PIRType;
        $SolutionImage=$result->Solutionimge;
        $ProblemDate=$result->PrbDate;
        $INsiiator=$result->Inisiator;
        $what=$result->what;
        $when=$result->Wheen;
        $where=$result->Wheree;
        $why=$result->Why;
        $howMany=$result->HowMany;
        $PrbNo=$result->PID;
        $SolvedBy=$result->SolvedBy;
        $image=$result->image;
        $IssuedEmailAddress=$result->SolvedEmailAddress;
        $ExpectedDatefINAL=$result->ExpectedDate;
        $SolutionDate=$result->Date;
        $Precentage=$result->ProbPrcentage;
        $ReasonID=$result->ReasonID;
        $CorectiveAction=$result->CorectiveAction;
        $ReasonDes=$result->ReasonDes;
        $ReasonDes2=$result->ReasonDes1;
        $solitionDescription=$result->SolutionDescription;
        $Deptname=$result->DeptName;
        $Section=$result->SectionName;
        $Process=$result->Processname;
        $Severitylevel=$result->Severitylevel;
        $Section=$result->SectionName;
        $Process=$result->Processname;
        $Severitylevel=$result->Severitylevel;
        $HODEmail=$result->HODEmail;
        $HODName=$result->IssuedHODname;
        $UserDept=$result->IssueDept;
        $Month=date('m');
        $Year=date('Y');
        $Day=date('d');
        $CurrentDate=$Year.'-'.$Month.'-'.$Day;
        $Insertion= $this->db->query("INSERT  INTO  dbo.tbl_PIR_Problem_Transactions
        (dbo.tbl_PIR_Problem_Transactions.PID,
        dbo.tbl_PIR_Problem_Transactions.useriD,
        dbo.tbl_PIR_Problem_Transactions.IssueTO,
        dbo.tbl_PIR_Problem_Transactions.Comments,
        dbo.tbl_PIR_Problem_Transactions.Image,
        dbo.tbl_PIR_Problem_Transactions.Date,
        dbo.tbl_PIR_Problem_Transactions.DeptiD,
        dbo.tbl_PIR_Problem_Transactions.SectionID,
        dbo.tbl_PIR_Problem_Transactions.PtypeiD,
        dbo.tbl_PIR_Problem_Transactions.Status,
        dbo.tbl_PIR_Problem_Transactions.Solutionimge)      
  VALUES
        ($PID,$UserId,$IssuedBy,'problem Competed','$Image',$CurrentDate,$DeptID,
        $SectionID,$PIRType,$Final,'$SolutionDate')");
           if($Insertion){


                ///Add Problem Sending Email
                if($Final==4){
                    $Result="Accepted";

                }else{
                    $Result="Rejected";
                }
                $subject="Gemba Result";
                $Tital="Forward Sports Digital Gemba ";
                $Attachment=$Image;

                $user_Email=$this->session->userdata('user_Email');
                $UserName=$this->session->userdata('user_name');
                $UserId=$this->session->userdata('user_id');

                if($ReasonID==1){
                    $Reason="MAN";
                    }elseif($ReasonID==2){
                    $Reason="MATERIAl";
                    }elseif($ReasonID==3){
                    $Reason="MACHION";
                    }elseif($ReasonID==4){
                    $Reason="METHOD";
                    }elseif($ReasonID==5){
                    $Reason="ENVIRONMENT";
                    }

                    $CorrectiveID=$CorectiveAction;
                    if($CorrectiveID==1){
                    $CorrectiveAction="Permanent Solution";
                    }elseif($CorrectiveID==2){
                      $CorrectiveAction="Instant Solution";
                    }
                    
                    if($Precentage==1){
                    $Prec="10 %";
                    }elseif($Precentage==2){
                      $Prec="20 %";
                    }elseif($Precentage==3){
                      $Prec="30 %";
                    }elseif($Precentage==4){
                      $Prec="40 %";
                    }elseif($Precentage==5){
                      $Prec="50 %";
                    }elseif($Precentage==6){
                      $Prec="60 %";
                    }elseif($Precentage==7){
                      $Prec="70 %";
                    }elseif($Precentage==8){
                      $Prec="80 %";
                    }elseif($Precentage==9){
                      $Prec="90 %";
                    }elseif($Precentage==10){
                      $Prec="100 %";
                    }
                $Msg="Dear Mir $SolvedBy,
                 
                        Pro # $PID
                        (Department : $Deptname) / ( Process :$Process) / (Section : $Section)
                        Severity Level : $Severitylevel
                        Problme Date($ProblemDate):
                                What? : $what
                                When? : $when
                                Where?: $where
                                Why?  : $why
                                How Much? :$howMany
                                Find the attached file For More Details 

                                Solution Date($SolutionDate)
                                Reason : $Reason
                                Reason Descrptions : $ReasonDes
                                Reason Descrptions : $ReasonDes2
                                Corrective Action Plan : $CorrectiveAction
                                Expected Closure Date : $ExpectedDatefINAL
                                Descrptions : $solitionDescription
                                Precentage  : $Prec
                        
                                Find the attached file For More Details 
                                Your Solution Has Been $Result
                                For any query please contact at $user_Email

                                Regard:
                                Name:       $UserName
                                Dept:       $UserDept
                                HOD Name:   $HODName
                               

                ";

                
                //  $FilePath=base_url("assets\img\probelmimages");
                $this->email->from('no-reply@forward.pk',  $Tital);
                $this->email->to($IssuedEmailAddress);
                $this->email->subject($subject);
                $this->email->message($Msg); 
                $this->email->cc($HODEmail);
                $this->email->attach("assets/img/probelmimages/$Attachment");
                $this->email->attach("assets/img/Solutionimages/$SolutionImage");
                if($this->email->send()==1){
                
                }
                else{
                    $this->session->set_flashdata('danger', "Email is Not Send to' $IssuedEmailAddress"); 
                    redirect('Gemba/index');
                }

                //$SenderAddress=$this->session->userdata('user_Email');
                $insertion=$this->db->query("INSERT INTO dbo.tbl_PIR_Email_Log
                (SenderAddress,ToAddress,Subject,Msg,Date,UserID,Tital)VALUES
                ('no-reply@forward.pk','$IssuedEmailAddress','$subject','Fnal Result','$CurrentDate',$UserId,'$Tital')");
                if($insertion){


            $this->session->set_flashdata('info', 'Solution Has Been Added Submited ');
    redirect('Gemba/index');
  
    }else{
  
    $this->session->set_flashdata('danger', 'Solution Has  Not Been Submited'); 
    redirect('Gemba/index');
   }
     }
    }
}

}
}


public function ViewFinalSolution($TID){
    $query1 = $this->db->query(" SELECT        MAX(soutionID) AS soutionID
    FROM            dbo.View_PIR_Solutions
    WHERE        (PID = $TID)");

    if($query1->num_rows() > 0){
        $result = $query1->row();
        $SolitionID=$result->soutionID;
   
   $query = $this->db->query("SELECT        dbo.View_PIR_Solutions.*
    FROM            dbo.View_PIR_Solutions
    WHERE        (soutionID = $SolitionID)");
   return $query->result_array();
    }
}


public function CallUser(){
  $UserId=$this->session->userdata('user_id');
  $query = $this->db->query("SELECT        dbo.View_PIR_Users.*
  FROM            dbo.View_PIR_Users Where UserID= $UserId");
 return $query->result_array();
}


public function UpdateProfile($EmailAddress,$PhoneNo,$NewPassword,$Oldpassword,$username){
  $UserId=$this->session->userdata('user_id');
  $query = $this->db->query("UPDATE  dbo.Tbl_PIR_Users  
  SET dbo.Tbl_PIR_Users.EmailAddress ='$EmailAddress', dbo.Tbl_PIR_Users.UserName ='$username', 
  dbo.Tbl_PIR_Users.Contact_Number ='$PhoneNo',
  dbo.Tbl_PIR_Users.Password ='$Oldpassword'
        WHERE UserID =$UserId");
        if($query){

          $this->session->set_flashdata('info', 'Your Profle Has been Updated');
          redirect('Gemba/ChangePassword');
        
          }else{
        
          $this->session->set_flashdata('danger', 'Your Profle Has  Not Been Updated'); 
          redirect('Gemba/ChangePassword');
}
}
      public function UpdatePro($EmailAddress,$PhoneNo,$username){
  $UserId=$this->session->userdata('user_id');
  $query = $this->db->query("UPDATE dbo.Tbl_PIR_Users 
  SET dbo.Tbl_PIR_Users.EmailAddress ='$EmailAddress',
  dbo.Tbl_PIR_Users.UserName ='$username',
  dbo.Tbl_PIR_Users.Contact_Number ='$PhoneNo'
        WHERE UserID =$UserId");
        if($query){

          $this->session->set_flashdata('info', 'Your Profle Has been Updated');
          redirect('Gemba/ChangePassword');
        
          }else{
        
          $this->session->set_flashdata('danger', 'Your Profle Has  Not Been Updated'); 
          redirect('Gemba/ChangePassword');
}
}
public function pednotmatch(){
  $this->session->set_flashdata('danger', 'Your Old and New Password is Not Matched s'); 
  redirect('Gemba/ChangePassword');
}
public function getmainProcess($dpt,$Sect,$subSec){
 $this->db->select(" ProcessID, Processname,  Status,SStatus")
 ->from(" dbo.Tbl_PIR_Main_Process");
 $this->db->where("DeptID =", $dpt);
 $this->db->where("SectionID =", $subSec);
  $this->db->where("SubSectionID =", $Sect);
  return $this->db->where("SStatus =", 1)
->get()
->result();	
}

public function getSubProcess($dpt,$Sect,$subSec,$ProcessID){

  $this->db->select("  SubProcessID, SubProcessname, SStatus")
  ->from(" dbo.tbl_PIR_Main_Sub_Process");
  $this->db->where("DeptID =", $dpt);
  $this->db->where("SectionID =", $subSec);
	 $this->db->where("SubSectionID =", $Sect);
   $this->db->where("ProcessID =", $ProcessID);
  return $this->db->where("SStatus =", 1)
	
 ->get()
 ->result();	
 }
}
