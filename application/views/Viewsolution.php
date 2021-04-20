<?php
if($this->session->has_userdata('user_id')){
  
foreach($Viewsolution as $KeysData){


 
$this->load->View('header');
?>

<body class="">
  
        <?php
         include('Topnav.php');
    include('Menu.php')
    ?>


           
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
         ><i class="fas fa-eye"></i> View Solution</a>
     
    <?php
 
 include('nav.php')
 ?>

 


    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
   

    <div class="col-md-1">
    </div>
    <div class="col-md-10">
    
    <form action="<?php echo base_url('Gemba/prdSol'); ?>" method="POST"  enctype="multipart/form-data" >
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
        <label class="text-white">Issue Solved By </label>
      
        <input type="text" class="form-control" name="IsseeTO"
         required value="<?php Echo $KeysData['SolvedBy'];?>" readonly>
        
        
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
        <input type="text" class="form-control" name="SectionName"
         required value="<?php Echo $KeysData['SectionName'];?>">
       
      </div>
    </div>
    
  </div>
  <div class="row">
  <div class="col-md-4">
      <div class="form-group">
     
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
  <div class="row" style="border: 1px white solid;">
  <div class="col-md-6">
  <div class="form-group">
    <label for="Desc" class="text-white">Problem</label>
    <?php $Image=$KeysData['image'];?>
    <img src='<?php echo base_url("assets\img\probelmimages\\$Image")?>'  width="600" height="250" class="img-fluid" alt="Responsive image"/>
      </div>
     
    </div>
  
  </div>
  <br>
  <div class="row">
  <div class="col-md-3">
  
    <?php
    $RessonID=$KeysData['ReasonID'];
    if($RessonID==1){
    $Reason="MAN";
    }elseif($RessonID==2){
      $Reason="MATERIAl";
    }elseif($RessonID==3){
      $Reason="MACHION";
    }elseif($RessonID==4){
      $Reason="METHOD";
    }elseif($RessonID==5){
      $Reason="ENVIRONMENT";
    }
    ?>
    <label class="text-white">Reason :</label>
     <button type="button" class="btn btn-secondary btn-lg">
  <span><?php Echo $Reason;?></span> 
</button>
   
    
    </div>

  <div class="col-md-4">
      <div class="form-group">
      <label class="text-white">Reason Descrpition :</label>
        <input type="text" value="<?php Echo $KeysData['ReasonDes'];?>"    class="form-control" name="ReasonDesc" required>
      </div>
    </div>

  
  </div>
  <div class="row">
  <div class="col-md-3">
  
  <?php
    $CorrectiveID=$KeysData['CorectiveAction'];
    if($CorrectiveID==1){
    $CorrectiveAction="Permanent Solution";
    }elseif($CorrectiveID==2){
      $CorrectiveAction="Instant Solution";
    }
    $ExpectedDate=$KeysData['ExpectedDate'];
  
    ?>
      
<label class="text-white">Corrective Action Plan : </label>
     <button type="button" class="btn btn-secondary btn-lg">
  <span><?php Echo $CorrectiveAction;?></span> 
</button>
     
    </div>
    <div class="col-md-4">
    <div class="form-group">
        <label for="example-date-input" class="form-control-label text-white"  > Expected Closure Date :</label>
        <input class="form-control" type="text" value="<?php Echo $ExpectedDate;?>" id="example-date-input" required name="expectedDate">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
    <label for="exampleFormControlTextarea1" class="text-white">Description :</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" required name="Desc"><?php Echo $KeysData['SolutionDescription'];?></textarea>
  </div>
    </div>
  </div>
    <div class="row" >
   
   
  <div class="row" style="border: 1px white solid;">
  <div class="col-md-6">
  <div class="form-group">
    <label for="Desc" class="text-white">Solution</label>
    <?php $Solutionimge=$KeysData['Solutionimge'];?>
    <img src='<?php echo base_url("assets\img\Solutionimages\\$Solutionimge")?>'  width="600" height="250" class="img-fluid" alt="Responsive image"/>
      </div>
     
    </div>
  
    </div>
  </div>
  <div class="row">
  <div class="col-md-3">
  <div class="form-group">
  <label for="Desc" class="text-white">Action:</label>
  <select class="form-control" id="Final" required  name="Final" onchange="showLines()">
        <option value="4">Accepted</option>
        <option value="5">Rejection</option>
  </select>
  </div></div>

    <div class="col-md-3">
      <br>
      <div class="form-group">
    
   
      <input type="text" class="form-control" name="PID"
         required value="<?php Echo $KeysData['PID'];?>" hidden>
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