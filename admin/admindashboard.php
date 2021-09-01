<?php

session_start();

if(isset($_SESSION['uid'])){
   //echo $_SESSION['uid'];
}
  else{
      header("location:../login_system/login.php");
  }

?>


<?php
include('header.php');
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student management system</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity = "sha384-AYmEC3Yw5cVv3ZcuHt0A93w35dYTsvhLPVnYs9eStHfGJv0vKxVfELGroGKvsg+p" crossorigin='anonymous'>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
--->
<style>
   h1 {
      font-size: 35px !important;
   }

   .dashboard>div {
      display: flex;
      justify-content: space-evenly;
      margin-top: 40px !important;
   }

   .dashboard>div div {
      width: 205px;
      height: 210px;
   }

   .dashboard>div div .fa {
      font-size: 150px;
   }

   .dashboard>div div .fa-wrench {
      font-size: 148px !important;
   }



   @media screen and (max-width: 800px) {
      .dashboard>div {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
         justify-items: center;
      }

      .dashboard>div div {
         width: 185px;
         height: 190px;
         font-size: 15px;
      }

      .dashboard,
      .dashboard .container-fluid {
         margin: 0 !important;
         padding: 0 !important;
      }

      .dashboard>div div .fa {
         font-size: 120px;
      }

      .dashboard>div div .fa-wrench {
         font-size: 118px !important;
      }
   }

   @media screen and (max-width: 600px) {
      .dashboard>div {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
         justify-items: center;
      }

      .dashboard>div div {
         width: 170px;
         height: 175px;
      }

      .dashboard>div div .fa {
         font-size: 110px;
      }

      .dashboard>div div .fa-wrench {
         font-size: 108px !important;
      }
   }

   @media screen and (max-width: 560px) {
      .dashboard>div {
         display: block;
         text-align: center;
         justify-items: center;
      }

      .dashboard>div div {
         margin: 10px 20px;
      }

      .dashboard>div div .fa {
         font-size: 120px;
      }

      .dashboard>div div .fa-wrench {
         font-size: 118px !important;
      }

      .delete {
         margin: 10px auto;
      }
   }

   @media screen and (max-width: 440px) {
      .dashboard>div {
         display: block;
         text-align: center;
         justify-items: center;
      }

      .dashboard>div div {
         margin: 10px 10px;
         width: 145px;
         height: 150px;
         word-wrap: break-word;
         word-break: break-all;
      }

      .dashboard>div div .fa {
         font-size: 90px;
         padding: 1px 2px !important;
      }

      .dashboard>div div .fa-wrench {
         font-size: 88px !important;
      }
   }
</style>

<body bgcolor="yellow">
   <div class="admintitle" align="center">

      <!--
   <div class="container-fluid">
      <div class="container-fluid pt-3">
         <h1 class='display-4 border-bottom m-auto pl-3 pr-3' style='width: fit-content;font-size: 35px;'>WELCOME TO ADMIN DASHBOARD</h1>
      </div>
   </div>
--->
      <div class="container-fluid text-white" style='background-color: #123;'>
         <div class="container-fluid pt-3 pb-2">
            <h1 id='header' class='display-4 m-auto' style='width: fit-content'>WELCOME TO ADMIN DASHBOARD</h1>
         </div>
      </div>

      <div class="container-fluid">
         <div style='width: fit-content;margin-left: auto;'>
            <span style="margin-right:20px" title='Logout'>
               <a class='btn btn-danger position-relative' style='top: -50px;' href="logout.php">logout</a>
               <a class='btn btn-danger position-relative' style='top: -50px;' href="viewstudent.php">view student</a>
            </span>
         </div>
      </div>


   </div>

   <div class="dashboard container-fluid">
      <div class="container-fluid ">

         <a href="aadstudent.php">
            <div class='text-center text-white btn btn-secondary'>
               <i class="fa fa-user d-block"></i>
               <span>ADD STUDENT</span>
            </div>
         </a>

         <a href="updatestudent.php">
            <div class='text-center text-white btn btn-info'>
               <i class="fa fa-wrench d-block"></i>
               <span>UPDATE STUDENT'S DETAILS</span>
            </div>
         </a>

         <a href="deletestudent.php" class='delete'>
            <div class='text-center text-white  btn btn-dark'>
               <i class="fa fa-user-times d-block"></i>
               <span>DELETE STUDENT</span>
            </div>
         </a>

      </div>
   </div>

</body>

</html>