<?php

session_start();

if(isset($_SESSION['uid'])){
   // echo $_SESSION['uid'];
}
  else{
      header("location:../login.php");
  }

?>


<?php
include('header.php');
include('../dbcon.php');

$sid=$_GET['sid'];

$sql=" select * from student where id='$sid'";
$res=mysqli_query($conn,$sql);
$x=mysqli_fetch_assoc($res);
?>

<style>
    input{
        border: 0;
        outline: 0;
        padding-top: 4px;
    }
</style>

<div class="container-fluid p-0 m-0">
    <header class="container-fluid p-0 m-0">
        <div class="container-fluid text-white" style='background-color: #123;'>
            <div class="container-fluid pt-3 pb-2">
                <h1 id='header' class='display-4 m-auto pl-3 pr-3' style='width: fit-content;font-size: 35px;'>UPDATE DATA</h1>
            </div>
        </div>


        <div class='pb-2 position-absolute' style='text-align: left; width: fit-content; top: 17px; left: 20px;'>
            <a href="updatestudent.php" class='btn btn-secondary fa fa-arrow-left'></a>
        </div>
    </header>

    <div class="container-fluid mt-3">
        <form action="updatedata.php" method="post" enctype="multipart/form-data">
            <div class="container-fluid p-0">
                <div class='d-flex border-bottom border-top border-left border-right p-0' style='align-items: center;'>
                    <label class='pt-2 pl-2 w-50'>ROLL NO.</label>
                    <input type="text" placeholder='Enter Roll no.' class='w-50' name="roll" value="<?php echo $x['roll'];?>" required>
                </div>
                
                <div class='d-flex border-bottom border-left border-right p-0'>
                    <label class='pt-2 pl-2 w-50'>FULL NAME</label>
                    <input placeholder='Enter Fullname..' class='w-50' type="text" name="name" value="<?php echo $x['name'];?>" required>
                </div>
                <div class='d-flex border-bottom border-left border-right p-0'>
                    <label class='pt-2 pl-2 w-50'>CLASS</label>
                    <input placeholder='Enter Class' class='w-50' type="text" name="class" value="<?php echo $x['class'];?>" required>
                </div>
                <div class='d-flex border-bottom border-left border-right p-0'>
                    <label class='pt-2 pl-2 w-50'>ADDRESS</label>
                    <input placeholder='Enter Address' class='w-50' type="text" name="address" value="<?php echo $x['address'];?>" required >
                </div>
                <div class='d-flex border-bottom border-left border-right p-0'>
                    <label class='pt-2 pl-2 w-50'>PHONE NO.</label>
                    <input class='w-50' placeholder='Enter Phone no.' type="text" name="phone" value="<?php echo $x['phone'];?>" required>
                </div>
                <div class='d-flex border-bottom border-left border-right p-0'>
                    <label class='pt-2 pl-2 w-50'>DATE OF BIRTH</label>
                    <input class='w-50' placeholder='D.O.B' type="date" name="dob" value="<?php echo $x['dob'];?>" required>
                </div>
                <div class='d-flex border-bottom border-left border-right p-0'>
                    <label class='pt-2 pl-2 w-50'>IMAGE</label>
                    <input class='w-50' type="file" name="image" >
                </div>
                <div class='d-flex border-bottom border-left border-right p-0 mt-3'>
                    <input type="hidden" name="sid" value="<?php echo $x['Id']?>">
                    <input class='btn btn-primary w-100' type="submit" value="SUBMIT" name="submit">
                </div>
            </div>
        </form>
    </div>
    

</div>







<form action="updatedata.php" method="post" enctype="multipart/form-data">


    <table border="1" align="center" style="width:70%; margin-top:40px">
    
       
    
    </table>
    

</form>