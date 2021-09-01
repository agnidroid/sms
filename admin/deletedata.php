<?php
include("../dbcon.php");
$id=$_REQUEST['sid'];

$sql="DELETE FROM `student` WHERE id='$id'";
$res=mysqli_query($conn,$sql);

if($res){
 
  ?>
  
  <script>
  alert("data deleted successfully");
  window.open('deletestudent.php','_self');
  
  </script>
  
  <?php

}

?>