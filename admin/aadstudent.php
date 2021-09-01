<?php

session_start();

if(isset($_SESSION['uid'])){
   // echo $_SESSION['uid'];
}
  else{
      header("location:../login_system/login.php");
  }

?>


<?php
include('header.php');
?>

<style>
  input::placeholder{
    color: black;
  }

  @media screen and (max-width: 450px){
    #main, #main .container-fluid{
      padding: 0 !important;
      margin: 0 !important;
    }
  }
</style>

<div class="container-fluid text-white" style='background-color: #123;'>
    <div class="container-fluid pt-3 pb-2">
      <h1 id='header' class='display-4 m-auto pl-3 pr-3' style='width: fit-content;font-size: 35px;'>ADD DATA</h1>
    </div>
</div>

<div class='pb-2 position-absolute' style='text-align: left; width: fit-content; top: 17px; left: 20px;'>
  <a href="admindashboard.php" class='btn btn-secondary fa fa-arrow-left'></a>
</div>

<div id='main' class="container-fluid mt-3">
  <form action="aadstudent.php" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
      <div id='container' class='border'>
        <div style='justify-content: space-between;' class='d-flex p-2 border-bottom'>
          <div class='w-50 border-right pl-2 p-0 m-0'>Admission NO.</div>
          <div class='w-50 pl-2 p-0 m-0'> <input class='w-100 border-0' style='outline: 0;' type="number" name="add" placeholder="Enter Admission No."  min="1" required> </div>
        </div>
        <div style='justify-content: space-between;' class='d-flex p-2 border-bottom'>
            <div class='w-50 border-right pl-2 p-0 m-0'>ROLL NO.</div>
            <div class='w-50 pl-2 p-0 m-0'> <input class='w-100 border-0' style='outline: 0;' type="text" name="roll" placeholder="Enter Roll No." required> </div>
        </div>
      
        <div style='justify-content: space-between;' class='d-flex p-2 border-bottom'>
            <div class='w-50 border-right pl-2 p-0 m-0'>FULL NAME</div>
            <div class='w-50 pl-2 p-0 m-0'> <input class='w-100 border-0' style='outline: 0;' type="text" name="name" placeholder="Enter Full Name" required></div>
        </div>
        <div style='justify-content: space-between;' class='d-flex p-2 border-bottom'>
              <div class='w-50 border-right pl-2 p-0 m-0'>CLASS</div>
              <div class='w-50 pl-2 p-0 m-0'>
                  <select name="class"  class='w-100 border-0' style='outline: 0;color: black;' id="" required>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4th</option>
                    <option value="5">5th</option>
                    <option value="6">6th</option>
                    <option value="7">7th</option>
                    <option value="8">8th</option>
                    <option value="9">9th</option>
                    <option class='d-none' selected>CHOOSE STANDARD</option>

                  </select>
              </div>
        </div>
        <div style='justify-content: space-between;' class='d-flex p-2 border-bottom'>
              <div class='w-50 border-right pl-2 p-0 m-0'>ADDRESS</div>
              <div class='w-50 pl-2 p-0 m-0'> <input class='w-100 border-0' placeholder='Address..' style='outline: 0;' type="text" name="address" required ></div>
        </div>
        <div style='justify-content: space-between;' class='d-flex p-2 border-bottom'>
              <div class='w-50 border-right pl-2 p-0 m-0'>PHONE NO.</div>
                <div class='w-50 pl-2 p-0 m-0'> <input class='w-100 border-0'  placeholder='Phone..' style='outline: 0;' type="text" name="phone" required></div> 
        </div>
        <div style='justify-content: space-between;' class='d-flex p-2 border-bottom'>
              <div class='w-50 border-right pl-2 p-0 m-0'>DATE OF BIRTH</div>
              <div class='w-50 pl-2 p-0 m-0'> <input class='w-100 border-0' style='outline: 0;color: black;' type="date" name="dob" required></div>
        </div>
        <div style='justify-content: space-between;' class='d-flex  p-2'>
              <div class='w-50 border-right pl-2 p-0 m-0'>IMAGE</div>
              <div class='w-50 pl-2 p-0 m-0'> <input class='w-100 border-0' style='outline: 0; color: black;' type="file" name="image" required></div> 
        </div>    
      </div>

      <div class='mt-2'>
        <input class='btn btn-primary w-100' type="submit" name="submit" value="SUBMIT">
       </div>
    </div>
  </form>
</div>

   
   </body>
   </html>


<?php

if(isset($_POST['submit'])){


include("../dbcon.php");
$add=$_POST['add'];
$roll=$_POST['roll'];
$name=$_POST['name'];
$class=$_POST['class'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$image=$_FILES['image']['name'];
$tempname=$_FILES['image']['tmp_name'];
move_uploaded_file($tempname,"../dataimg/$image");
//echo $roll . $name . $class . $address . $phone . $dob ."     ". $add  ;

$sql2="select * from student where roll='$roll' and class='$class'";
$res2=mysqli_query($conn,$sql2);
  if(mysqli_num_rows($res2)<1){
     
    $sql1="select * from student where addmission='$add'";
    $res1=mysqli_query($conn,$sql1);
   if(mysqli_num_rows($res1)<1){

             $sql="insert into student(addmission,name,roll,class,phone,address,dob,image) values('$add','$name','$roll','$class','$phone','$address','$dob','$image')";
             $res=mysqli_query($conn,$sql);

             if($res){
              ?>
              <script>alert("DATA ADDED SUCCESSFULLY");</script>
              
              <?php

             }

    }
  else{
      ?>
         <script>alert("ALREADY REGISTERED WITH SAME ADMISSSION NO.!");</script>
    
       <?php
      }
   

  }   
 else{
  
     ?>
      <script>alert("ALREADY STUDENT FOUND WITH GIVEN ROLL IN SAME CLASS !");</script>
  
      <?php  

 }



}


?>


