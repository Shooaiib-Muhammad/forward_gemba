<?php 
 include_once('../panel/config.php');


if(isset($_POST['Datta'])){
 $DEPTID=$_POST['Datta'];
$sql= "SELECT        DeptID, DeptName, ID
   FROM            dbo.tbl_PIR_Dept
   WHERE        (ID =  $DEPTID=$_POST['Datta'];
)";

 $do=sqlsrv_query($conn,$sql); 
//echo '<option value="">Select User Name </option>';
?>
<?php
while ($row=sqlsrv_fetch_array($do)) {

$DeptName=$row['DeptName'];
$DeptID=$row['DeptID'];
?>
<option  value="<?php Echo $DeptID;?>"><?php Echo $DeptName;?></option>
<?php	 
}





}



?>