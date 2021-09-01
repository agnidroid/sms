
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <script src="js/myscript.js"></script>
</head>
<body>

    <!------  Login section  ------>
    <section id="login-section">

        <form action="" method="post" id="_form" onsubmit="return validate()">
            <fieldset>
                <header id="header">
                        <h2>Login to you account</h2>
        


                        <?php
        //  session_start();
        
        // if(isset($_SESSION['message']))
        // {

        //   echo $_SESSION['message'];
        // }
        
        
        ?>
                </header>
                <div id="main">
                    <div id="fill-up-area">
                        <div>
                            <input type="email" name="email" id="email" class="formInput" required>
                            <label for="email" id="hi">Username</label>
                        </div>
                        <div>
                            <input type="password" name="password" id="password" class="formInput" onkeyup="toggle()" required>
                            <label for="password">Password</label>
                            <span  class="fa fa-eye" id="toggle" aria-hidden="true" onclick="hideShow()"></span>
                        </div>
                        <div id="error-box">
                        </div>
                    </div>
                    <div id="submit-area">
                        <div>
                            <span><a href="sign_up.php">I don't have account</a></span>                    
                            <button type="submit" name="submit">Next</button>
                        </div>
                        <a href="">forgot password?</a>
                    </div>
                </div>
            </fieldset>
            
        </form>
    </section>

</body>
</html> 
    
       <!---  javascript <-> Login section --->
       <script>
        function validate(){
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
            }
            else if(_email.value){

            }
            else {
                true;
            }

        }
    </script>
    <!---  End  ---->

 <?php
include("../dbcon.php");

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $password = $_POST["password"];
   // echo $email. $password;

    $sql="select * from admin where email='$email'";
    $res=mysqli_query($conn,$sql);
    $x=mysqli_fetch_assoc($res);
    $y=$x['password'];
    //echo $y;

    if($password==$y){
       // echo "logined successfully";
       session_start();
            $_SESSION['uid']="successfully registered";
            
        header("location:../admin/admindashboard.php");
    }
    else{ echo "  <script> alert('Bad credentials ')</script> ";}

}

?>