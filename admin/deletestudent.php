<?php

session_start();

if (isset($_SESSION['uid'])) {
  // echo $_SESSION['uid'];
} else {
  header("location:../login_system/login.php");
}

?>


<?php
include('header.php');
include('../dbcon.php');
?>


<div class="container-fluid text-white" style='background-color: #123;'>
  <div class="container-fluid pt-3 pb-2">
    <h1 id='header' class='display-4 m-auto pl-3 pr-3' style='width: fit-content;font-size: 35px;'>DELETE DATA</h1>
  </div>
</div>


<div class='pb-2 position-absolute' style='text-align: left; width: fit-content; top: 17px; left: 20px;'>
  <a href="admindashboard.php" class='btn btn-secondary fa fa-arrow-left'></a>
</div>


<div class="container-fluid pt-3">
  <form action="deletestudent.php" method="post">
    <div class="d-flex" style='justify-content: center;'>
      <div class="form-group pt-1 mr-3">
        <label class='mr-1' for="name">ENTER STUDENT NAME</label>
        <input type="text" name="name" required>
      </div>
      <div class="form-group pt-1 mr-3">
        <label class='mr-1' for="std">ENTER STANDARD</label>
        <input type="text" name="std" required>
      </div>
      <div class="form-group">
        <input type="submit" class='btn btn-primary' name="submit" value="search">
      </div>

    </div>
  </form>
</div>

<style>
  .srno {
    -ms-flex: 0 0 3.933333%;
    flex: 0 0 3.933333%;
    max-width: 3.933333%;
  }

  .image {
    -ms-flex: 0 0 9.933333%;
    flex: 0 0 9.933333%;
    max-width: 9.933333%;
  }

  .name {
    -ms-flex: 0 0 14.933333%;
    flex: 0 0 14.933333%;
    max-width: 14.933333%;
  }

  .rollno {
    -ms-flex: 0 0 7.933333%;
    flex: 0 0 7.933333%;
    max-width: 7.933333%;
  }

  .stand {
    -ms-flex: 0 0 4.933333%;
    flex: 0 0 4.933333%;
    max-width: 4.933333%;
  }

  .phone {
    -ms-flex: 0 0 9.933333%;
    flex: 0 0 9.933333%;
    max-width: 9.933333%;
  }

  .dob {
    -ms-flex: 0 0 8.933333%;
    flex: 0 0 8.933333%;
    max-width: 8.933333%;
  }

  .add {
    -ms-flex: 0 0 17.933333%;
    flex: 0 0 17.933333%;
    max-width: 17.933333%;
  }

  .edit {
    -ms-flex: 0 0 3.933333%;
    flex: 0 0 3.933333%;
    max-width: 3.933333%;
  }
</style>



<div class="container-fluid" style='overflow-y: auto; height: 100%;'>
  <div class="container-fluid p-0 m-0 text-center" style=''>
    <div class='d-flex text-light bg-dark' style="background-color:#; color:#;justify-content: space-between;">
      <div class='text-center pl-0 pr-0 pt-1 pb-1 srno'>NO.</div>
      <div class='text-center pl-0 pr-0 pt-1 pb-1 image'>IMAGE</div>
      <div class='text-center pl-0 pr-0 pt-1 pb-1 name'>NAME OF STUDENT</div>
      <div class='text-center pl-0 pr-0 pt-1 pb-1 rollno'>ROLL NO.</div>
      <div class='text-center pl-0 pr-0 pt-1 pb-1 stand'>CLASS</div>
      <div class='text-center pl-0 pr-0 pt-1 pb-1 phone'>PHONE NO.</div>
      <div class='text-center pl-0 pr-0 pt-1 pb-1 dob'>D.O.B</div>
      <div class='text-center pl-0 pr-0 pt-1 pb-1 add'>ADDRESS</div>
      <div class='text-center pl-0 pr-0 pt-1 pb-1 edit' style='visibility: hidden;'>EDIT</div>
    </div>

    <div class="container-fliud position-fixed w-100" style='overflow-y: scroll; height: 100%;'>
      <?php

      if (isset($_POST['submit'])) {

        //echo "submitted";
        $name = $_POST['name'];
        $std = $_POST['std'];
        // echo $name;
        //echo $std;
        $sql = "select * from student where class='$std' and name like '%$name%'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) < 1) {
          echo "<tr><td colspan='9' >No records found</td></td>";
        } else {
          $count = 0;
          while ($x = mysqli_fetch_assoc($res)) {
            $count++;
      ?>

            <div class='d-flex text-center border' style="background-color:#; color:#;justify-content: space-between; margin-right: 13.5px;">
              <div class='text-center pl-0 pr-0 pt-1 pb-1 srno'><?php echo $count . '.'; ?></div>
              <div class='text-center pl-0 pr-0 pt-1 pb-1 image'><img src="../dataimg/<?php echo $x['image']; ?>" style="padding: 0; margin: 0;max-width: 100px !important;"></div>
              <div class='text-center pl-0 pr-0 pt-1 pb-1 name'><?php echo $x['name'] ?></div>
              <div class='text-center pl-0 pr-0 pt-1 pb-1 rollno'><?php echo $x['roll'] ?></div>
              <div class='text-center pl-0 pr-0 pt-1 pb-1 stand'><?php echo $x['class'] ?></div>
              <div class='text-center pl-0 pr-0 pt-1 pb-1 phone'><?php echo $x['phone'] ?></div>
              <div class='text-center pl-0 pr-0 pt-1 pb-1 dob'><?php echo $x['dob'] ?></div>
              <div class='text-center pl-0 pr-0 pt-1 pb-1 add'><?php echo $x['address'] ?></div>
              <div class='text-center pl-0 pr-0 pt-1 pb-1 edit'><a class='fa fa-close btn text-primary' title='Delete' href="deletedata.php?sid=<?php echo $x['Id'] ?>"></a></div>
            </div>



      <?php
          }
        }
      }
      ?>
    </div>
  </div>
</div>