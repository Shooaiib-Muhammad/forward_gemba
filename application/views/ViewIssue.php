<?php
if($this->session->has_userdata('user_id')){
  
foreach($ViewIssue as $KeysData){


 
$this->load->View('header');
?>

<body class="">
  
        <?php
         include('Topnav.php');
    include('Menu.php')
    ?>

  <script type="text/javascript">


            function ShowRTO() {
  //alert(heloo);
 
            fc = $('#Dept').val(); 
           //alert(fc);
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
         href="#"><i class="fas fa-eye"></i> View Problem</a>
     
    <?php
 
 include('nav.php')
 ?>

 


    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
   

    <div class="col-md-1">
    </div>
    <div class="col-md-10">
    
    <form action="<?php echo base_url('Gemba/AddSolution'); ?>" method="POST" enctype="multipart/form-data" >
 
    <div class="col">
           <div class="card shadow">
             <div class="card-header border-0">
               <h3 class="mb-0">Problem</h3>
             </div>
           </div>
  </div>
  <br>
  <label class="text-white">Severity Level : </label>
  <?php
 
 if($KeysData['Severitylevel']=="Meduim"){
?>
<button type="button" class="btn btn-default">
  <span> <i class="fab fa-medium"></i> <?php Echo $KeysData['Severitylevel'];?></span>
</button>
<?php
 }elseif($KeysData['Severitylevel']=="Low"){
   ?>
   <button type="button" class="btn btn-info">
  <span><i class="far fa-lightbulb"></i> <?php Echo $KeysData['Severitylevel'];?></span>
</button>
   <?php
 }elseif($KeysData['Severitylevel']=="High"){
  ?>
  <button type="button" class="btn btn-danger">
  <span><i class="fas fa-exclamation-circle"></i> <?php Echo $KeysData['Severitylevel'];?></span>
</button>
   <?php

 }
 ?>
  
  <div class="row">
  <div class="col-md-3">
      <div class="form-group">
        <label class="text-white">Issue send By </label>
      
        <input type="text" class="form-control" name="IsseeTO"
         required value="<?php Echo $KeysData['UserName'];?>">
        
        
      </div>
    </div>
   
    <div class="col-md-3">
      <div class="form-group">
        <label class="text-white">Department :</label>
        <input type="text" class="form-control" name="DeptName"
         required value="<?php Echo $KeysData['DeptName'];?>">
       
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="text-white">Section :</label>
        <input type="text" class="form-control" name="Processname"
         required value="<?php Echo $KeysData['SectionName'];?>">
       
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
    <img src='<?php echo base_url("assets\img\probelmimages\\$Image")?>'
       width="800" height="600" class="img-fluid" alt="Responsive image" />
      </div>
     
    </div>
 
  </div>
  <div class="col">
           <div class="card shadow">
             <div class="card-header border-0">
               <h3 class="mb-0">Solution</h3>
             </div>
           </div>
  </div>
  <br>
  <div class="row">
  <div class="col-md-4">
  <div class="form-group">
        <label class="text-white">Reason</label>
        <select class="form-control" id="PIR" required  name="ReasonID" required>
        <option value="">Select Reasons</option>
        <option value="1">MAN</option>
        <option value="2">MATERIAl</option>
        <option value="3">MACHION</option>
        <option value="4">METHOD</option>
        <option value="5">ENVIRONMENT</option>
        
  </select>
      </div>
    </div>

  <div class="col-md-4">
      <div class="form-group">
      <label class="text-white">Reason Descrpition :</label>
        <input type="text" placeholder="Reason Descrpition"   class="form-control" name="ReasonDesc" required>
      </div>
    </div>


  <div class="row">
  <div class="col-md-4">
  <div class="form-group">
        <label class="text-white">Corrective Action Plan</label>
        <select class="form-control" id="PIR" required  name="CorrectiveAction" required>
        <option value="">Select Action Plan</option>
        <option value="1">Permanent Solution</option>
        <option value="2">Instant Solution</option>
       
  </select>
      </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="example-date-input" class="form-control-label text-white"  > Expected Closure Date :</label>
        <input class="form-control" type="date"  id="example-date-input" required name="expectedDate">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
    <label for="exampleFormControlTextarea1" class="text-white">Description :</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" required name="Desc"></textarea>
  </div>
    </div>
  </div>
    <div class="row" >
    <div class="col-md-2">
      <div class="form-group">
      <label class="text-white">Solution Precentage :</label>
      <select class="form-control" id="PIR" required  name="Precentage" required>
        <option value="">Select Precentage %</option>
        <option value="1">10 %</option>
        <option value="2">20 %</option>
        <option value="3">30 %</option>
        <option value="4">40 %</option>
        <option value="5">50 %</option>
        <option value="6">60 %</option>
        <option value="7">70 %</option>
        <option value="8">80 %</option>
        <option value="9">90 %</option>
        <option value="10">100 %</option>
       
  </select>
      </div>
    </div>
  <div class="col-md-6">
  <label class="text-white">Solution Image :</label>
  <div class="custom-file">
 
    <input type="file" required class="custom-file-input" id="image" lang="en" name='solutionimage' accept="image/x-png,image/gif,image/jpeg">
    <label class="custom-file-label" for="customFileLang">Click here to Upload</label>
</div>
     
    </div>
 
  </div>
  <div class="row">
    <div class="col-md-3">
      <br>
      <div class="form-group">
      
      <input type="text" class="form-control" name="PID" value="<?php Echo $KeysData['TID'];?> " hidden>
      <input type="text" class="form-control" name="ITOID" value="<?php Echo $KeysData['ITOID'];?> " hidden>
 
      <input type="text" class="form-control" name="DeptID" value="<?php Echo $KeysData['DeptID'];?>" hidden>
      <input type="text" class="form-control" name="SectionID" value="<?php Echo $KeysData['SectionID'];?>" hidden>
      <input type="text" class="form-control" name="Image" value="<?php Echo $Image;?>" hidden >
      <input type="text" class="form-control" name="Severitylevel" value="<?php Echo   $KeysData['Severitylevel'];?>" hidden >
     
    
      
   

      <button type="submit" class="btn btn-secondary btn-lg btn-block">Submit</button>
      </div>
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