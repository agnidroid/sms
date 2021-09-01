<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student management system</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <style>
         *{
              text-transform: capitalize;
         }
          select, input{
               outline: none;
               border: none;
               padding-left: 10px;
          }
          input{
               padding-left: 15px;
          }
          .heading > h1{
               font-size:  35px !important;
          }
          @media screen and (max-width: 800px){
               .heading > h1{
                    font-size:  24px !important;
                    word-wrap: break-word;  
                    font-weight: bolder;                                    
               }
          }
          @media screen and (max-width: 550px){
               .heading > h1{
                    border: none !important;  
                    padding: 10px 10px; 
                    font-size:  22px !important; 
                    text-decoration: underline;                                
               }
          }

          @media screen and (max-width: 440px){
               .heading > h1{
                    padding: 10px 0 !important;  
                    font-size:  20px !important;                                
               }
          }
          
          
    </style>
</head>
<body>
     
<div id='main'>
     <header class="container-fluid p-0 m-0">
          <div class="container-fluid p-0 m-0">
               <div style="margin-right:20px;text-align: right;" class='pt-2 pl-1' title='Admin Login'>
                    <a href="login_system/login.php" class='btn btn-info ml-auto fa fa-user'> ADMIN</a>
               </div>
          </div>
          
          <div class="heading d-flex p-0 m-0" style='align-items: right;flex-direction: column;'>
               <h1 class='border-bottom m-auto display-4 pt-3' style='text-align: center;width: fit-content !important;'>WELCOME TO STUDENT MANAGEMENT SYSTEM</h1>
          </div>

         
     </header>
    

<div class="container-fluid">
       <form action="" method="post">
          <div class="container-fluid mt-5">
               <table class='container-fluid border' style="" border='1' align="center">
                    <div>
                         <h5 style='text-align: center;'>Student Information</h5>
                    </div>
                    
                    <tr class='p-2'>
                         <td class='p-2 w-50' align="left" class='pl-3'>Enter Admission No.</td> 
                         <td class='p-2 w-50'> <input autocompleted='false' class='w-100' type="number" name="add"  min="1" required></td>
                    </tr>
                    <tr class='p-2'>
                         <td class='p-2 w-50' align="left"  class='pl-3'>Class</td>
                         <td class='p-2 w-50'>
                              <select name="std" class='w-100' id="" required>
                                   <option value="1">1st</option>
                                   <option value="2">2nd</option>
                                   <option value="3">3rd</option>
                                   <option value="4">4th</option>
                                   <option value="5">5th</option>
                                   <option value="6">6th</option>
                                   <option value="7">7th</option>
                                   <option value="8">8th</option>
                                   <option value="9">9th</option>
                                   <option class='d-none'  selected>CHOOSE STANDARD</option>
                              </select>
                         </td>
                    </tr>
                    <tr class='p-2'>
                         <td class='p-2 w-50' align="left" class='pl-3'>Enter Roll No.</td> 
                         <td class='p-2 w-50'> <input autocomplete='none' class='w-100' type="tel" name="roll" required></td>
                    </tr>
               </table>
               <div class='mt-2'>
                    <input class='btn btn-primary w-100' type="submit" name="submit" value="Show Details">
               </div>
               
          </div>
       </form>
    </div>
    
</div>

    <div class="container-fluid position-relative" style='top: -10px;' id='output'>
    <?php
  if(isset($_POST['submit'])){
   include('dbcon.php');
 $add=$_POST['add'];
 $roll=$_POST['roll'];
 $class=$_POST['std'];
 
  
 $sql="SELECT * FROM `student` WHERE addmission='$add'";
 $res=mysqli_query($conn,$sql);
   
  if(mysqli_num_rows($res)>0){

   $x=mysqli_fetch_assoc($res);
   ?>

     <header class="container-fluid p-0 m-0">
          <div class="container-fluid p-0 m-0 d-flex justify-content-between">
               <div style="margin-right:20px;text-align: left;" class='pt-3 pl-1'>
                    <a href="index.php" class='btn btn-secondary ml-auto fa fa-arrow-left'> Back</a>
               </div>
               <div style="margin-right:20px;text-align: right;" class='pt-3 pl-1' title='Admin Login'>
                    <a href="login.php" class='btn btn-info ml-auto fa fa-user'> LOGIN</a>
               </div>
          </div>
          
          <div class="heading d-flex" style='align-items: right;flex-direction: column;'>
               <h1 class='border-bottom m-auto display-4 pl-3 pr-3 pt-2' style='text-align: center;font-size: 35px !important;width: fit-content !important;'>WELCOME TO STUDENT MANAGEMENT SYSTEM</h1>
          </div>

         
     </header>


   <div class="container-fluid">
          <table class='container-fluid border' style="" border='1' align="center">
          <div>
               <h5 style='text-align: center;'>Student Details</h5>
          </div>

          

          <div class="container-fluid pb-3">
               <div style="width: fit-content; border-radius: 10px;" class='border p-2 m-auto' >
                    <img src="dataimg/<?php echo $x['image']; ?>" style="max-width:100px; border-radius: 10px;" >
               </div>
          </div>

          <tr>
               
               <th class='pl-3'>ADDMISSION NO.</th>
               <td class='pl-3'><?php echo $x['addmission']; ?></td>

          </tr>

          <tr>
               
               <th class='pl-3'>NAME</th>
               <td class='pl-3'><?php echo $x['name']; ?></td>

          </tr>

          <tr>
               
               <th class='pl-3'>ROLL NO.</th>
               <td class='pl-3'><?php echo $x['roll']; ?></td>

          </tr>

          <tr>
               
               <th class='pl-3'>CLASS</th>
               <td class='pl-3'><?php echo $x['class']; ?></td>

          </tr>

          <tr>
               
               <th class='pl-3'>ADDRESS</th>
               <td class='pl-3'><?php echo $x['address']; ?></td>

          </tr>

          <tr>
               
               <th class='pl-3'>PHONE NO.</th>
               <td class='pl-3'><?php echo $x['phone']; ?></td>

          </tr>

          <tr>
               
               <th class='pl-3'>D.O.B</th>
               <td class='pl-3'><?php echo $x['dob']; ?></td>

          </tr>
          
          </table>

          
   
   </div>

   <script>
        document.querySelector('#main').style.display = 'none'
        document.querySelector('#output').style.display = 'block'
   </script>
   
   
   <?php

  }
     else{
        ?>
        <script> 
          alert("No student found!");
          document.querySelector('#main').style.display = 'block' 
          document.querySelector('#output').style.display = 'none'
        </script>
        <?php
     }
  }

?>
    </div>
</body>
</html>

