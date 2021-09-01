<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>

    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" href="css/jquery-ui.theme.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section id="signup-section">
        <form action="" method="post" onsubmit="return validate()">
            <fieldset>
                <header id="header">
                    <h2>Create new account</h2>
                </header>
                <div id="main">
                    <div id="fill-up-area">








                        <div id="name-container">
                            <input type="text" name="name" id="name" onkeyup="fname()" required>
                            <label for="name">Full Name</label>
                        </div>



                        <div id="email-container">
                            <input type="email" name="email" id="email" required>
                            <label for="email">Email</label>
                        </div>

                        <div id="phone-container">
                            <input type="tel" name="phone" id="tel" required>
                            <label for="tel">Phone</label>
                        </div>



                        <div id="gender-container">
                            <select name="gender" id="gender" required>
                                <option value="" style="display: none;"></option>
                                <option value="Male" id="male">Male</option>
                                <option value="Female" id="female">Female</option>
                                <option value="Rather not say" id="Rather not say">Rather not say</option>
                            </select>
                            <label for="gender">Gender</label>
                        </div>
                        <div id="password-container">
                            <div>
                                <input type="password" name="password" id="password" onkeyup="toggle()" required>
                                <label for="password">Password</label>
                                <span class="fa fa-eye" aria-hidden="true" onclick="hideShow()"><img src="" alt="" srcset=""></span>
                            </div>
                            <div class="ml-1">
                                <input type="password" name="password" id="c-password" onkeyup="cPassword()" required>
                                <label for="c-password">Confirm password</label>
                                <p id="cIcon" class="fa" title="Password Not Match"></p>
                            </div>
                        </div>
                        <div id="error-box">
                        </div>
                    </div>
                    <div id="submit-area">
                        <span><a href="login.php">Already have account</a></span>
                        <button type="submit" name="submit">submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </section>


    <!---  javascript <-> signup section --->
    <script>
        function validate() {
            const error = document.querySelector("#error-box");
            const _email = document.querySelector("#email");
            const _password = document.querySelector("#password");

            const emailPattern = /a-z/;
            const passwordPattern = /a-z1-9/;
            // Email validation

            if (_password.value.length <= 8) {
                error.style.visibility = "visible";
                error.innerHTML = "Password must be of 8 char.";
                _password.style.border = "1.4px solid red";
                return false;
            } else if (_email.value) {

            } else {
                true;
            }

        }
    </script>
    <!---  End  ---->

    <script>
        function fname() {
            const _fname = querySelector("#firstname");
            parseInt(_fname);
        }
    </script>

    <script>
        // eye
        function toggle() {

            let password = document.querySelector('#password');
            let toggle = document.querySelector('.fa-eye');


            // Password attribute
            // this will not show suggestion
            if (password.value.length == 0) {
                password.setAttribute('type', 'password');
                document.querySelector('.fa').style.display = "none";
                toggle.classList.toggle('fa-eye-slash');
            } else if (password.value.length <= 0) {
                document.querySelector('.fa').style.display = "none";
            } else {
                document.querySelector('.fa').style.display = "block";
            }

        }
    </script>


    <script>
        function hideShow() {
            let password = document.querySelector('#password');
            let toggle = document.querySelector('.fa-eye');

            if (password.type === "password") {
                toggle.classList.toggle('fa-eye-slash');
                password.setAttribute('type', 'text');
            } else {
                password.setAttribute('type', 'password');
                toggle.classList.toggle('fa-eye-slash');
            }

        }
    </script>
    <script>
        let password = document.querySelector('#password');
        let $cPassword = document.querySelector('#c-password');

        function cPassword() {
            if ($cPassword.value.trim() === "") {
                document.querySelector('#cIcon').classList.remove('fa-times');
                document.querySelector('#cIcon').classList.remove('fa-check');
                return false;
            } else if (password.value !== $cPassword.value) {
                document.querySelector('#cIcon').classList.add('fa-times');
                document.querySelector('#cIcon').classList.remove('fa-check');
                return false;
            } else {
                document.querySelector('#cIcon').classList.remove('fa-times');
                document.querySelector('#cIcon').classList.add('fa-check');
                true;
            }
        }
    </script>

    <script src="myscript.js"></script>
</body>

</html>



<?php

include("../dbcon.php");
if (isset($_POST["submit"])) {
    // echo "submitted";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    // echo $name . $email . $phone . $gender . $password;

    $sql1 = "select * from admin where email='$email'";
    $res1 = mysqli_query($conn, $sql1);
    $x = mysqli_fetch_assoc($res1);
    // $y=$x['name'];
    //echo $y;
    if ($x) {
        echo "  <script> alert('Email is already registered')</script> ";
    } else {

        // echo "email not registerd";

        $sql = "INSERT INTO admin(name,email,phone,gender,password) values('$name', '$email', '$phone', '$gender', '$password')";

        $res = mysqli_query($conn, $sql);

        if ($res) {
            //  echo "well done";
            // header("Location:hello.php");
            session_start();
            $_SESSION['uid']="successfully registered";
            
            echo "  <script> alert('Congratulations $name, Your account has been created successfully ')</script> ";

            echo " 
            <script>
                window.open('../admin/admindashboard.php', '_self')
            </script>
            ";
        } else {
            echo "error";
        }
    }
}
?>