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
// $(document).ready( function () {
//     $('#myTable').DataTable();
// } );
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
} );
function showLines() {
  //alert(heloo);
 
            fc = $('#PIR').val(); 
            //alert(fc);
                $('#line').val('all')
                url = "<?php echo base_url('Gemba/dept/') ?>" + fc
               
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
                //alert(url);
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
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
         href="#"><i class="fas fa-user-plus"></i> Add User </a>
     
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
    <form action="<?php echo base_url('Gemba/Addnewusers'); ?>" method="POST" >
  <div class="row">
  
    <div class="col-md-3">
      <div class="form-group">
        <label class="text-white">Department</label>
        <select class="form-control" id="Dept"  name="Dept" required>
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
      <label class="text-white">User Name</label>
        <input type="text" placeholder="User Name" class="form-control"   name="username" required>
      </div>
    </div>
    
  <div class="col-md-3">
      <div class="form-group">
      <label class="text-white">Password</label>
        <input type="password" placeholder="Password" class="form-control"  name="password" required>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <label class="text-white">Email</label>
        <input type="Email" placeholder="Email" class="form-control" name="Email" required>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
      <label class="text-white">Phone No.</label>
        <input type="text" placeholder="Contact Number" class="form-control" name="CNumber" required >
      </div>
    </div>
    
    <div class="col-md-3">
      <br>
      <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg btn-block">Enter</button>
      </div>
    </div>
  </div>
  
 
</form>
    </div>
<div class="col-md-1">
</div>
    </div>
    <div class="container-fluid mt--7">
     
    <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">User Informations</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush"  id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Department</th>
                    
                 
                    <th scope="col">Users</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($UsersInfo As $Key){

                  ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php Echo $Key['DeptName'];?></span>
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
                    <td>
                    <?php Echo $Key['EmailAddress'];?>
                    </td>
                    <td>
                    0<?php Echo $Key['Contact_Number'];?>
                    </td>
                    <td>
                    <a href="<?php echo base_url('Gemba/EditUsers/'); Echo $Key['UserID'];?>">
                    <button type="button" class="btn btn-primary btn-sm">Edit 
                  </button></a>
                  <a href="<?php echo base_url('Gemba/DeleteUser/'); Echo $Key['UserID'];?>">
                    <button Onclick="return confirm('Are you sure you want to Delete  this User ?')"  type="button" class="btn btn-danger btn-sm">Delete 
                  </button></a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div></div>
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