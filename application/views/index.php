<?php
if($this->session->has_userdata('user_id')){
  

$this->load->View('header');
?>

<body class="">
<?php
         include('Topnav.php');
    include('Menu.php')
    ?>
     
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
         href="#"> <i class="fas fa-asterisk"></i></i> Problem</a>
     
    <?php
 
 include('nav.php')
 ?>
    <!-- End Navbar -->
    <!-- Header -->
    <script>
$( document ).ready(function() {
  $('#showIssue').hide();
  $('#showprobelms').hide();

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
function showLines() {
  //alert(heloo);
 
            fc = $('#PIR').val(); 
            //alert(fc);
                $('#line').val('all')
                url = "<?php echo base_url('Gemba/getdept/') ?>" + fc
               
                    lines = '<option value="">Select Departments</option>'
                    $.get(url, function(res) {
                        data = res.data
                        for (i = 0; i < data.length; i++) {
                            lines += '<option value="' + data[i].DeptID + '">' + data[i].DeptName +
                                '</option>'
                        }
                        $('#Dept').html(lines);
                        $('#line-option').removeClass('d-none');
                    })

                
            }

            function Showprocess() {
  //alert(heloo);
 
            fc = $('#Dept').val(); 
           //alert(fc);
                $('#line').val('all')
                url = "<?php echo base_url('Gemba/getprocess/') ?>" + fc
               
                    lines = '<option value="">Select Process</option>'
                    $.get(url, function(res) {
                     
                        data = res.data
                        for (i = 0; i < data.length; i++) {
                            lines += '<option value="' + data[i].PID + '">' + data[i].processname +
                                '</option>'
                        }
                        $('#Process').html(lines);
                       // $('#line-option').removeClass('d-none');
                    })

                
            }
            function ShowSections() {
  //alert(heloo);
 
            fc = $('#Dept').val(); 
           //alert(fc);
                $('#line').val('all')
                url = "<?php echo base_url('Gemba/getsections/') ?>" + fc
               
                    lines = '<option value="">Select Section</option>'
                    $.get(url, function(res) {
                        data = res.data
                        for (i = 0; i < data.length; i++) {
                            lines += '<option value="' + data[i].SectionID + '">' + data[i].SectionName +
                                '</option>'
                        }
                        $('#Section').html(lines);
                       // $('#line-option').removeClass('d-none');
                    })

                
            }

            function ShowSubSections() {
          fc = $('#Section').val(); 
                $('#line').val('all')
                url = "<?php echo base_url('Gemba/getsubsections/') ?>" + fc
               
                    lines = '<option value="">Select Sub Sections</option>'
                    $.get(url, function(res) {
                     
                        data = res.data
                        for (i = 0; i < data.length; i++) {
                            lines += '<option value="' + data[i].SectionID + '">' + data[i].SectionName +
                                '</option>'
                        }
                        $('#SubSection').html(lines);
                       // $('#line-option').removeClass('d-none');
                    })

                
            }
            

            
            function ShowRTO() {
              dpt = $('#Dept').val(); //Dept
            // Sect = $('#Process').val();  //Section
            // subSec = $('#Section').val();  // Sub Section
            // Process = $('#MainProcess').val();  // Processs 
            // SubProcessProcess = $('#SubProcess').val();  // Sub Process 
        //     alert(dpt);
        //   alert(Sect);
        //  alert(subSec);
        //  alert(Process);
        //  alert(SubProcessProcess);
                $('#line').val('all')
                url = "<?php echo base_url('Gemba/GetPIR/') ?>" +  dpt 
              // alert(url);
                    lines = '<option value="">Select Issue To</option>'
                    $.get(url, function(res) {
                      console.log(res);
                        data = res.data
                        for (i = 0; i < data.length; i++) {
                            lines += '<option value="' + data[i].UserID + '">' + data[i].UserName +
                                '</option>'
                        }
                        $('#RTo').html(lines);
                       // $('#line-option').removeClass('d-none');
                    })

                
            }
           function ShowmainProcess(){
            dpt = $('#Dept').val(); //Dept
            Sect = $('#Process').val();  //Section
            subSec = $('#Section').val();  // Sub Section
            //alert(dpt);
           // alert(Sect);
           // alert(subSec);
                $('#line').val('all') 
                url = "<?php echo base_url('Gemba/getmainProcess/') ?>" + dpt + "/" + Sect + "/" + subSec 
               
                    lines = '<option value="">Select Process</option>'
                    $.get(url, function(res) {
                      console.log(res);
                        data = res.data
                        for (i = 0; i < data.length; i++) {
                            lines += '<option value="' + data[i].ProcessID + '">' + data[i].Processname +
                                '</option>'
                        }
                        $('#MainProcess').html(lines);
                       // $('#line-option').removeClass('d-none');
                    })

           }
           function ShowSubProcess(){
            dpt = $('#Dept').val(); //Dept
            Sect = $('#Process').val();  //Section
            subSec = $('#Section').val();  // Sub Section
            Process = $('#MainProcess').val();  // Sub Section
      
                $('#line').val('all') 
                url = "<?php echo base_url('Gemba/getSubProcess/') ?>" + dpt + "/" + Sect + "/" + subSec + "/" + Process 
               
                    lines = '<option value="">Select Process</option>'
                    $.get(url, function(res) {
                      console.log(res);
                        data = res.data
                        for (i = 0; i < data.length; i++) {
                            lines += '<option value="' + data[i].SubProcessID + '">' + data[i].SubProcessname +
                                '</option>'
                        }
                        $('#SubProcess').html(lines);
                       // $('#line-option').removeClass('d-none');
                    })

           }
           
            function showIssue(){
              
              $('#showIssue').show();
              $('#showprobelms').hide();
              
            }
            function showprobelms(){
              
              $('#showIssue').hide();
              $('#showprobelms').show();
              
            }
            function Alertbox(){
              alert('Are Your Sure Its Not Confidential');
            }
            
           
</script>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
    <?php if($this->session->flashdata('info')){ 
?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><strong>Info!</strong> <?php echo $this->session->flashdata('info');?></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
}
 ?>
  <?php if($this->session->flashdata('danger')){ 

 
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><strong>Danger!</strong>  <?php echo $this->session->flashdata('danger');?></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
}
 ?>
    </div>
    <div class="col-md-1">
    </div>
    
    <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-3">
      <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus-circle"></i> Add Problem
</button>
  </div>
  <div class="col-md-3">
     
<button type="button" class="btn btn-outline-info btn-lg btn-block" onclick="showprobelms()">
<i class="fas fa-eye"></i> View Problem
</button>
  </div>
  <div class="col-md-3">
      
<button type="button" class="btn btn-outline-success btn-lg btn-block"  onclick="showIssue()">
<i class="fas fa-eye"></i> View Isuses
</button>
  </div>
  <div class="col-md-1">
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-plus-circle"></i> Add Problem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url('Gemba/AddProblem'); ?>" method="POST"  enctype="multipart/form-data" >
  <div class="row">
  <div class="col-md-6">
      <div class="form-group">
      <label class="text-black">Department :</label>
      <select class="form-control" id="Dept"  name="Dept" onchange="ShowSections()" required>
        <option value="">Select Departments</option>
          <?php
 
            foreach($DeptInfo As $Key){
            ?>
    <option value="<?php Echo $Key['DeptID'];?>" class="text-black"><?php Echo $Key['DeptName'];?></option>
  
    <?php
            }
          
  ?>
  </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <label class="text-black">Section :</label>
      <select class="form-control" id="Section" required name="Process" onchange="ShowRTO()">
      </select>
      </div>
    </div>
    </div>
 
   
  
    <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="text-black">Issue To :</label>
        
        <select class="form-control" id="RTo"  name="IssueTo" required>
  </select>
      </div>
    </div>
    <div class="col-md-6">
    
    <!-- <label class="text-red" style="font-size: 10; font-weight:bold;">Are Your Sure It's Not Confidential ?</label> -->
    <div class="custom-file">
    
    
        <input  onclick="Alertbox()"  type="file" required class="custom-file-input" id="image" lang="en" name='picture' accept="image/x-png,image/gif,image/jpeg">
        <label class="custom-file-label" for="customFileLang">Upload Image :</label>
    </div>
    </div>
      </div>
      <div class="row">
  <div class="col-md-12">
      <div class="form-group">
      <label class="text-black">Severity level :</label>
        <select class="form-control" id="Severity" required  name="Severity" >
        <option value="">Select Severity level</option>
        <option value="Low" style="color:blue;">Low (Must Be resloved Within 6 Days)</option>
        <option value="Meduim"  style="color:green;">Meduim (Must Be resloved Within 4 Days)</option>
        <option value="High"  style="color:red;">High (Must Be resloved Within 2 Days)</option>

          
  </select>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12">
      <div class="form-group">
      <label class="text-black">What :</label>
        <input type="text" placeholder="What" class="form-control" name="what" required>
       
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12">
      <div class="form-group">
      <label class="text-black">When :</label>
        <input type="text" placeholder="When" class="form-control" name="when" required>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12">
      <div class="form-group">
      <label class="text-black">Where :</label>
        <input type="text" placeholder="Where" class="form-control" name="where" required>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12">
      <div class="form-group">
      <label class="text-black">Why :</label>
        <input type="text" placeholder="Why" class="form-control" name="why" required>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-12">
      <div class="form-group">
      <label class="text-black">How Much :</label>
        <input type="text" placeholder="How Much" class="form-control" name="Much" required>
      </div>
    </div>
  </div>
 
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-times-circle"></i> Close</button>
        <button type="submit" class="btn btn-success " name="userSubmit"><i class="fas fa-save"></i> SAVE</button>
      </div>
      </form>
    </div>
  </div>
</div>
  </div></div>
  <!-- <button type="button" class="btn btn-info">Info</button> -->
      

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
                     }elseif($Key['Status']==2){
                         ?>
                         <a href="<?php echo base_url('Gemba/EditProb/'); Echo $Key['TID'];?>">
                         <button type="button" class="btn btn-Primary"><i class="fas fa-eye"></i> view </button></a>
                        
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
    </div>
    <div class="container-fluid mt--7">
     
     <div class="row" id="showIssue">
         <div class="col">
           <div class="card shadow">
             <div class="card-header border-0">
               <h3 class="mb-0">Your Issues</h3>
             </div>
             <div class="table-responsive">
               <table class="table align-items-center table-flush"  id="myTable1">
                 <thead class="thead-light">
                   <tr>
                   <th scope="col">PIR No.</th>
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
