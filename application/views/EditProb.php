<?php
if($this->session->has_userdata('user_id')){
  
foreach($EditProb as $KeysData){


 
$this->load->View('header');
?>

<body class="">
  
        <?php
         include('Topnav.php');
    include('Menu.php')
    ?>

  <script type="text/javascript">

function showLines() {
  //alert(heloo);
 
            fc = $('#PIR').val(); 
            //alert(fc);
                $('#line').val('all')
                url = "<?php echo base_url('Gemba/getdept/') ?>" + fc
               
                    lines = '<option value="">All</option>'
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
            fc = $('#Dept').val();       
                $('#line').val('all')
                url = "<?php echo base_url('Gemba/GetPIR/') ?>" + fc
               
                    lines = '<option value="">Select Issue To</option>'
                    $.get(url, function(res) {
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
          //  alert(dpt);
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
           // alert(dpt);
           // alert(Sect);
           // alert(subSec);
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
         href=#><i class="fas fa-user-edit"></i> Edit Problem</a>
     
    <?php
 
 include('nav.php')
 ?>

 


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
    <form action="<?php echo base_url('Gemba/updateProblem'); ?>" method="POST"   enctype="multipart/form-data" >
  <div class="row">
    
  <div class="col-md-3">
      <div class="form-group">
      <label class="text-white">Department :</label>
      <select class="form-control" id="Dept"  name="Dept" onchange="ShowSections()" required>
      <option value="<?php Echo $KeysData['DeptID'];?>"><?php Echo $KeysData['DeptName'];?></option>
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
    <div class="col-md-3">
      <div class="form-group">
      <label class="text-white">Section :</label>
      <select class="form-control" id="Section" required name="Process" onchange="ShowRTO()">
      <option value="<?php Echo $KeysData['SectionID'];?>"><?php Echo $KeysData['SectionName'];?></option>
      </select>
      </div>
    </div>
  
  
   
  
  

    <div class="col-md-4">
      <div class="form-group">
        <label class="text-white">Issue To :</label>
        
        <select class="form-control" id="RTo"  name="IssueTo" required>
        <option value="<?php Echo $KeysData['IssueToID'];?>"><?php Echo $KeysData['Issue'];?></option>
        
  </select>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-4">
      <div class="form-group">
      <input type="text"  class="form-control" name="TID" required value="<?php Echo $KeysData['TID'];?>" hidden>
      <label class="text-white">What :</label>
        <input type="text" value="<?php Echo $KeysData['what'];?>" class="form-control" name="what" required>
      </div>
    </div>

  <div class="col-md-4">
      <div class="form-group">
      <label class="text-white">When :</label>
        <input type="text" value="<?php Echo $KeysData['Wheen'];?>"  class="form-control" name="when" required>
      </div>
    </div>

  <div class="col-md-4">
      <div class="form-group">
      <label class="text-white">Where :</label>
        <input type="text" value="<?php Echo $KeysData['Wheree'];?>"  class="form-control" name="where" required>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-6">
      <div class="form-group">
      <label class="text-white">Why :</label>
        <input type="text" value="<?php Echo $KeysData['Why'];?>"  class="form-control" name="why" required>
      </div>
    </div>

  <div class="col-md-6">
      <div class="form-group">
      <label class="text-white">How Much</label>
        <input type="text" value="<?php Echo $KeysData['HowMany'];?>"  class="form-control" name="Much" required>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <label for="Desc" class="text-white">Image</label>
    <?php $Image=$KeysData['image'];?>
    <input type="text" value="<?php Echo $Image;?>"  class="form-control" name="oldImage" hidden>
    <img src='<?php echo base_url("assets\img\probelmimages\\$Image")?>' 
     width="600" height="800" class="img-fluid" alt="Responsive image"/>
      </div>
     
    </div>
  
    <div class="col-md-6">
       
    <div class="custom-file">
    
        <input type="file"  class="custom-file-input" id="image" lang="en" name='picture' accept="image/x-png,image/gif,image/jpeg">
        <label class="custom-file-label" for="customFileLang">Change Image</label>
    </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-3">
      <br>
      <div class="form-group">
     <?php if($KeysData['Status']==1){

   ?>
      <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
      <?php
      
      
     }else{
       ?>
       <button type="submit" class="btn btn-success btn-lg btn-block" disabled>Update</button>
       <?php
     }
     
       ?>
      </div>
    </div>
  </div>
  
 
</form>
    </div>
<div class="col-md-1">
</div>
    </div>
    <div class="container-fluid mt--7">
     

              
      <?php
      
      include('footer.php');
      ?>
</body>

</html>
<?php
}
}else{

  redirect('Gemba/Login');
}

?>