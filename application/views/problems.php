<?php
if($this->session->has_userdata('user_id')){
  

$this->load->View('header');
?>

<body class="">
<?php
         include('Topnav.php');
    include('Menu.php')
    ?>
     <script>
       $(document).ready(function() {
    $('#myTable').DataTable( {
      
        dom: 'Bfrtip',
        
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            
        ]
    } );
      $('#myTable1').DataTable( {
      
        dom: 'Bfrtip',
        
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            
        ]
    } );
} );
       </script>
      </div>
    </div>
  </nav>
  
  <div class="main-content">
    <!-- Navbar -->
    <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
         href="#"><i class="fas fa-exclamation-circle "></i> Your Problems</a>
     
    <?php
 
 include('nav.php')
 ?>

    <!-- End Navbar -->
    <!-- Header -->
    
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="col-md-1">
    </div>

  <div  class="col-md-1"></div>
</div>
    </div>
    <div class="container-fluid mt--7">
     
     <div class="row"  id="showprobelms">
         <div class="col">
           <div class="card shadow">
             <div class="card-header border-0">
             <h3 class="mb-0">Probelms Informations</h3>
             </div>
             <div class="table-responsive">
               <table class="table align-items-center table-flush"  id="myTable">
                 <thead class="thead-light">
                   <tr>
                    <th scope="col">PIR No.</th>
                   <th scope="col">Issue Date</th>
                     <th scope="col">Department</th>
                     <th scope="col">Sections</th>
                     <th scope="col">Issue To</th>     
                     <th scope="col">Severity level</th> 
                     <th scope="col">Status</th>    
                     <th scope="col">Remaning Days</th>       
                     <th scope="col">Action</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                     foreach($Problems As $Key){
 
                   ?>
                   <tr>
                   <th scope="row">
                       <div class="media align-items-center">
                        
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php Echo $Key['TID'];?></span>
                         </div>
                       </div>
                     </th>
                   <th scope="row">
                       <div class="media align-items-center">
                        
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php Echo $Key['Date'];?></span>
                         </div>
                       </div>
                     </th>
                  
                     <th scope="row">
                       <div class="media align-items-center">
                        
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php Echo $Key['DeptName'];?></span>
                         </div>
                       </div>
                     </th>
                   
                     <td>
                     <?php Echo $Key['SectionName'];?>
                     </td>
                     <th scope="row">
                     <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php Echo $Key['Issue'];?></span>
                        </div>
                      </div>
                     
                     </th>
                     <td>
                     
                     <?php
 
 if($Key['Severitylevel']=="Meduim"){
?>
<button type="button" class="btn btn-default">
  <span> <i class="fab fa-medium"></i> <?php Echo $Key['Severitylevel'];?></span>
</button>
<?php
 }elseif($Key['Severitylevel']=="Low"){
   ?>
   <button type="button" class="btn btn-info">
  <span><i class="far fa-lightbulb"></i> <?php Echo $Key['Severitylevel'];?></span>
</button>
   <?php
 }elseif($Key['Severitylevel']=="High"){
  ?>
  <button type="button" class="btn btn-danger">
  <span><i class="fas fa-exclamation-circle"></i> <?php Echo $Key['Severitylevel'];?></span>
</button>
   <?php

 }
 ?>
                     </td>
                     <td>
                     <?php if($Key['Status']==1){
                         ?>
                         <button type="button" class="btn btn-Default">Sending...</button>
                         <?php
                     }elseif($Key['Status']==2){?>
                     <button type="button" class="btn btn-secondary">In progress ..</button>
                     <?php
                     
                     }elseif($Key['Status']==3){?>
                      <button type="button" class="btn btn-success">Solved <i class="fas fa-question"></i></button>
                      <?php
                      
                      }elseif($Key['Status']==4){?>
                        <button type="button" class="btn btn-primary">Completed</button>
                        <?php
                        
                        }elseif($Key['Status']==5){?>
                          <button type="button" class="btn btn-danger">Rejected</button>
                          <?php
                          
                          }
                      ?>
                     </td>
                     <td>
                     
                     <?php
 
 if($Key['Severitylevel']=="Meduim"){
  
  $TID=$Key['TID'];
  $IssuesDays=$Key['Date'];
  $SYear=substr($IssuesDays,-4,4);
    $SMonth=substr($IssuesDays,3,2);
      $SDay=substr($IssuesDays,0,2);
      $Month=date('m');
      $Year=date('Y');
     $Day=date('d');
         $Date=$SYear.'-'.$SMonth.'-'.$SDay;
         $CurrentDate=$Year.'-'.$Month.'-'.$Day;
   $Days =date('Y-m-d', strtotime($Date. ' + 4 days'));
   $date1 = strtotime("$CurrentDate 00:00:00");  
$date2 = strtotime("$Days 00:00:00");  
  
// Formulate the Difference between two dates 
$diff = abs($date2 - $date1);  
  
  
// To get the year divide the resultant date into 
// total seconds in a year (365*60*60*24) 
$years = floor($diff / (365*60*60*24));  
  
  
// To get the month, subtract it with years and 
// divide the resultant date into 
// total seconds in a month (30*60*60*24) 
$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));
 // To get the day, subtract it with years and  
// months and divide the resultant date into 
// total seconds in a days (60*60*24) 
$days = floor(($diff - $years * 365*60*60*24 -  
$months*30*60*60*24)/ (60*60*24));
	
//echo date('Y-m-d', strtotime($Date. ' + 2 days'));
?>
<button type="button" class="btn btn-default">
  <span> <i class="fas fa-calendar-day"></i> <?php Echo $days; ?> Days Left</span>
</button>
<?php
 }elseif($Key['Severitylevel']=="Low"){
    $IssuesDays=$Key['Date'];
  $SYear=substr($IssuesDays,-4,4);
    $SMonth=substr($IssuesDays,3,2);
      $SDay=substr($IssuesDays,0,2);
      $Month=date('m');
      $Year=date('Y');
     $Day=date('d');
         $Date=$SYear.'-'.$SMonth.'-'.$SDay;
         $CurrentDate=$Year.'-'.$Month.'-'.$Day;
         $Days =date('Y-m-d', strtotime($Date. ' + 6 days'));
         $date1 = strtotime("$CurrentDate 00:00:00");  
         $date2 = strtotime("$Days 00:00:00");  
           
         // Formulate the Difference between two dates 
         $diff = abs($date2 - $date1);  
           
           
         // To get the year divide the resultant date into 
         // total seconds in a year (365*60*60*24) 
         $years = floor($diff / (365*60*60*24));  
           
           
         // To get the month, subtract it with years and 
         // divide the resultant date into 
         // total seconds in a month (30*60*60*24) 
         $months = floor(($diff - $years * 365*60*60*24) 
                                        / (30*60*60*24));
          // To get the day, subtract it with years and  
         // months and divide the resultant date into 
         // total seconds in a days (60*60*24) 
         $days = floor(($diff - $years * 365*60*60*24 -  
         $months*30*60*60*24)/ (60*60*24));
           
   ?>
   <button type="button" class="btn btn-info">
  <span><i class="fas fa-calendar-day"></i> <?php Echo $days; ?> Days Left</span>
</button>
   <?php
 }elseif($Key['Severitylevel']=="High"){
  $IssuesDays=$Key['Date'];
  $IssuesDays=$Key['Date'];
  $SYear=substr($IssuesDays,-4,4);
    $SMonth=substr($IssuesDays,3,2);
      $SDay=substr($IssuesDays,0,2);
      $Month=date('m');
      $Year=date('Y');
     $Day=date('d');
         $Date=$SYear.'-'.$SMonth.'-'.$SDay;
         $CurrentDate=$Year.'-'.$Month.'-'.$Day;
          $Days =date('Y-m-d', strtotime($Date. ' + 2 days'));
        
         $date1 = strtotime("$CurrentDate 00:00:00");  
         $date2 = strtotime("$Days 00:00:00");  
           
         
         // Formulate the Difference between two dates 
         $diff = abs($date2 - $date1);  
           
           
         // To get the year divide the resultant date into 
         // total seconds in a year (365*60*60*24) 
         $years = floor($diff / (365*60*60*24));  
           
           
         // To get the month, subtract it with years and 
         // divide the resultant date into 
         // total seconds in a month (30*60*60*24) 
         $months = floor(($diff - $years * 365*60*60*24) 
                                        / (30*60*60*24));
          // To get the day, subtract it with years and  
         // months and divide the resultant date into 
         // total seconds in a days (60*60*24) 
         $days = floor(($diff - $years * 365*60*60*24 -  
         $months*30*60*60*24)/ (60*60*24));
  ?>
  <button type="button" class="btn btn-danger">
  <span><i class="fas fa-calendar-day"></i><?php Echo $days; ?> Days Left</span>
</button>
   <?php

 }
 ?>
                     </td>
                     <td>
                     
                     <?php
                     if($Key['Status']==1){
                         ?>
                         <a href="<?php echo base_url('Gemba/EditProb/'); Echo $Key['TID'];?>">
                         <button type="button" class="btn btn-Primary"><i class="fas fa-edit"></i> Edit</button></a>
                        
                         <?php
                     }elseif($Key['Status']==4){
                       ?><a href="<?php echo base_url('Gemba/ViewFinalSolution/'); Echo $Key['TID'];?>">
                       <button type="button" class="btn btn-info"><i class="fas fa-eye"></i> View</button>
                        <?php
                        }elseif($Key['Status']==5){
                          ?><a href="<?php echo base_url('Gemba/ViewSolution/'); Echo $Key['TID'];?>">
                          <button type="button" class="btn btn-info" disabled> <i class="fas fa-eye"></i>View</button>
                           <?php
                           }else{

                        ?>
                        <a href="<?php echo base_url('Gemba/ViewSolution/'); Echo $Key['TID'];?>">
                        <button type="button" class="btn btn-info"> <i class="fas fa-eye"></i> View</button>
                        <?php
                        }
                        ?>
                     </td>
                   </tr>
                   <?php
                   }
                   ?>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
     </div>
     <div class="row" id="showIssue">
         <div class="col">
           <div class="card shadow">
             <div class="card-header border-0">
             <h3 class="mb-0"> Issues</h3>
             </div>
             <div class="table-responsive">
               <table class="table align-items-center table-flush"  id="myTable1">
                 <thead class="thead-light">
                   <tr>
                   <th>PIR No.</th>
                   <th scope="col">Date</th>
                   <th scope="col">Issue Send by</th>     
                     <th scope="col">Department</th>
                     <th scope="col">Sections</th>
                     <th scope="col">Severity level</th>
                     <th scope="col">Status</th>
                     <th scope="col">Remaning Days</th>
                     <th scope="col">Action</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                     foreach($ViewProb As $Key){
 
                   ?>
                   <tr>
                    <th scope="row">
                       <div class="media align-items-center">
                        
      <div class="media-body">
                           <span class="mb-0 text-sm"><?php Echo $Key['TID'];?></span>
                         </div>
                       </div>
                     </th>
                   <th scope="row">
                       <div class="media align-items-center">
                        
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php Echo $Key['Date'];?></span>
                         </div>
                       </div>
                     </th>
                   <th scope="row">
                     
                     <div class="media align-items-center">
                        
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php Echo $Key['UserName'];?></span>
                        </div>
                      </div>
                     
                     </th>
                   
                  
                     <th scope="row">
                       <div class="media align-items-center">
                        
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php Echo $Key['DeptName'];?></span>
                         </div>
                       </div>
                     </th>
                   
                     <td>
                     <?php Echo $Key['SectionName'];?>
                     </td>
                     <td>
                     
                     <?php
 
 if($Key['Severitylevel']=="Meduim"){
?>
<button type="button" class="btn btn-default">
  <span> <i class="fab fa-medium"></i> <?php Echo $Key['Severitylevel'];?></span>
</button>
<?php
 }elseif($Key['Severitylevel']=="Low"){
   ?>
   <button type="button" class="btn btn-info">
  <span><i class="far fa-lightbulb"></i> <?php Echo $Key['Severitylevel'];?></span>
</button>
   <?php
 }elseif($Key['Severitylevel']=="High"){
  ?>
  <button type="button" class="btn btn-danger">
  <span><i class="fas fa-exclamation-circle"></i> <?php Echo $Key['Severitylevel'];?></span>
</button>
   <?php

 }
 ?>
                     </td>
                   <td>
                   <?php if($Key['Status']==1){
                         ?>
                         <button type="button" class="btn btn-info">New Issues</button>
                         <?php
                     }elseif($Key['Status']==2){?>
                      <button type="button" class="btn btn-secondary">Not Satisfied</button>
                      <?php
                      
                      }elseif($Key['Status']==3){?>
                      <button type="button" class="btn btn-success">Solved <i class="fas fa-question"></i></button>
                      <?php
                      
                      }elseif($Key['Status']==4){?>
                        <button type="button" class="btn btn-primary">Completed</button>
                        <?php
                        
                        }elseif($Key['Status']==5){?>
                          <button type="button" class="btn btn-danger">Rejected</button>
                          <?php
                          
                          }
                      ?>
                   </td>
                   <td><?php
 
 if($Key['Severitylevel']=="Meduim"){
  
  $TID=$Key['TID'];
  $IssuesDays=$Key['Date'];
  $SYear=substr($IssuesDays,-4,4);
    $SMonth=substr($IssuesDays,3,2);
      $SDay=substr($IssuesDays,0,2);
      $Month=date('m');
      $Year=date('Y');
     $Day=date('d');
         $Date=$SYear.'-'.$SMonth.'-'.$SDay;
         $CurrentDate=$Year.'-'.$Month.'-'.$Day;
   $Days =date('Y-m-d', strtotime($Date. ' + 4 days'));
   $date1 = strtotime("$CurrentDate 00:00:00");  
$date2 = strtotime("$Days 00:00:00");  
  
// Formulate the Difference between two dates 
$diff = abs($date2 - $date1);  
  
  
// To get the year divide the resultant date into 
// total seconds in a year (365*60*60*24) 
$years = floor($diff / (365*60*60*24));  
  
  
// To get the month, subtract it with years and 
// divide the resultant date into 
// total seconds in a month (30*60*60*24) 
$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));
 // To get the day, subtract it with years and  
// months and divide the resultant date into 
// total seconds in a days (60*60*24) 
$days = floor(($diff - $years * 365*60*60*24 -  
$months*30*60*60*24)/ (60*60*24));
	
//echo date('Y-m-d', strtotime($Date. ' + 2 days'));
?>
<button type="button" class="btn btn-default">
  <span> <i class="fas fa-calendar-day"></i> <?php Echo $days; ?> Days Left</span>
</button>
<?php
 }elseif($Key['Severitylevel']=="Low"){
    $IssuesDays=$Key['Date'];
  $SYear=substr($IssuesDays,-4,4);
    $SMonth=substr($IssuesDays,3,2);
      $SDay=substr($IssuesDays,0,2);
      $Month=date('m');
      $Year=date('Y');
     $Day=date('d');
         $Date=$SYear.'-'.$SMonth.'-'.$SDay;
         $CurrentDate=$Year.'-'.$Month.'-'.$Day;
         $Days =date('Y-m-d', strtotime($Date. ' + 6 days'));
         $date1 = strtotime("$CurrentDate 00:00:00");  
         $date2 = strtotime("$Days 00:00:00");  
           
         // Formulate the Difference between two dates 
         $diff = abs($date2 - $date1);  
           
           
         // To get the year divide the resultant date into 
         // total seconds in a year (365*60*60*24) 
         $years = floor($diff / (365*60*60*24));  
           
           
         // To get the month, subtract it with years and 
         // divide the resultant date into 
         // total seconds in a month (30*60*60*24) 
         $months = floor(($diff - $years * 365*60*60*24) 
                                        / (30*60*60*24));
          // To get the day, subtract it with years and  
         // months and divide the resultant date into 
         // total seconds in a days (60*60*24) 
         $days = floor(($diff - $years * 365*60*60*24 -  
         $months*30*60*60*24)/ (60*60*24));
           
   ?>
   <button type="button" class="btn btn-info">
  <span><i class="fas fa-calendar-day"></i> <?php Echo $days; ?> Days Left</span>
</button>
   <?php
 }elseif($Key['Severitylevel']=="High"){
  $IssuesDays=$Key['Date'];
  $IssuesDays=$Key['Date'];
  $SYear=substr($IssuesDays,-4,4);
    $SMonth=substr($IssuesDays,3,2);
      $SDay=substr($IssuesDays,0,2);
      $Month=date('m');
      $Year=date('Y');
     $Day=date('d');
         $Date=$SYear.'-'.$SMonth.'-'.$SDay;
         $CurrentDate=$Year.'-'.$Month.'-'.$Day;
         $Days =date('Y-m-d', strtotime($Date. ' + 2 days'));
         $date1 = strtotime("$CurrentDate 00:00:00");  
         $date2 = strtotime("$Days 00:00:00");  
           
         // Formulate the Difference between two dates 
         $diff = abs($date2 - $date1);  
           
           
         // To get the year divide the resultant date into 
         // total seconds in a year (365*60*60*24) 
         $years = floor($diff / (365*60*60*24));  
           
           
         // To get the month, subtract it with years and 
         // divide the resultant date into 
         // total seconds in a month (30*60*60*24) 
         $months = floor(($diff - $years * 365*60*60*24) 
                                        / (30*60*60*24));
          // To get the day, subtract it with years and  
         // months and divide the resultant date into 
         // total seconds in a days (60*60*24) 
         $days = floor(($diff - $years * 365*60*60*24 -  
         $months*30*60*60*24)/ (60*60*24));
  ?>
  <button type="button" class="btn btn-danger">
  <span><i class="fas fa-calendar-day"></i><?php Echo $days; ?> Days Left</span>
</button>
   <?php

 }
 ?>
                     </td>
                     <td>
                       <?php
                       if($Key['Status']==4){?>
                        <a href="<?php echo base_url('Gemba/ViewFinalSolution/'); Echo $Key['TID'];?>">
                        <button type="button" class="btn btn-Primary"><i class="fas fa-eye"></i> View</button>
                        <?php
                        
                        }elseif($Key['Status']==3){?>
                           <a href="<?php echo base_url('Gemba/ViewFinalSolution/'); Echo $Key['TID'];?>">
                        <button type="button" class="btn btn-Primary"><i class="fas fa-eye"></i> View</button>
                          <?php
                          
                          }else{
                          ?>
                        <a href="<?php echo base_url('Gemba/ViewIssue/'); Echo $Key['TID'];?>">
                         <button type="button" class="btn btn-Primary"><i class="fas fa-eye"></i> View</button></a>
                        
                          <?php
                        }
                      ?>
                      
                    
                     </td>
                   </tr>
                   <?php
                   }
                   ?>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
     </div>
    </div>
    
      <?php
      
      include('footer.php');
      ?>
</body>

</html>
<?php

}else{

  redirect('Gemba/Login');
}

?>