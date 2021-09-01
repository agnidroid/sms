<?php
include("../dbcon.php");
$id=$_POST['sid'];
//$add=$_POST['add'];
$roll=$_POST['roll'];
$name=$_POST['name'];
$class=$_POST['class'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
//$image=$_FILES['image']['name'];
//$tempname=$_FILES['$image']['tmp_img'];
//move_uploaded_file($tempname,"../dataimg/$image");
//echo $roll . $name . $class . $address . $phone . $dob ."     ". $add  ;
$sql="UPDATE `student` SET  `name` = '$name', `roll` = '$roll',`class` = '$class', `phone` = '$phone', `address` = '$address', `dob` = '$dob' WHERE `id` = $id;";
$res=mysqli_query($conn,$sql);

if($res){
 
  ?>
  
  <script>
  alert("data updated successfully");
  window.open('updateform.php?sid= <?php echo $id;?>','_self');
  
  </script>
  
  <?php

}

?>