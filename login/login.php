<?php
    session_start();
    
    include '../connection.php';
    if(isset($_POST['login'])){
        $login_username = mysqli_real_escape_string($con,$_POST['login_username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        $check_existing_username = "SELECT * FROM `login` WHERE login_username = '$login_username' ";
        $qcheck_existing_username = mysqli_query($con,$check_existing_username);
        $usernamecount = mysqli_num_rows($qcheck_existing_username);

        if($usernamecount==0){
            echo "email not registered";
        }
        else{
            $username_details = mysqli_fetch_assoc($qcheck_existing_username);
            $upassword = $username_details['l_password'];
            $_SESSION['username'] =  $email_details['login_username'];
            
            $_SESSION['user_id']=$username_details['id_user'];
           
            $user_id = $_SESSION['user_id'];

            
            if ($upassword == $password){
                echo "loged in!!";
                header('Location: ../profile.php');


            }
            else{
                ?>
                    <script>alert("Password incorrect !!!");</script>
                <?php
            }


        }

    


    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login form</title>
    <link rel="stylesheet" href="loginstyle.css" />
</head>

<body>

    <section class="bbtn">
        <button onclick="window.location.href = '../home.php'">&LongLeftArrow; Back</button>
    </section>

    <div class="container">

        <section class="form">

            <div class="left">
                <h1>Login</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login-form" method="post">
                    Email: <br> <input type="text" required id="login_username" name="login_username" placeholder="Enter Username"><br>
                    password: <br> <input type="password" required id="password" name="password" placeholder="Password" style="margin-bottom: 1px;">
                    <p><a href="#"> Forgot your password? </a></p>
                    <button type="submit" id="login" name="login" value="login">Login</button>
                    <p>Need an account? <a href="../signup/signup.php">Register</a></p>
                </form>
            </div>
            <div class="right">
                <img src="img.jpg" alt="simple qr like image"
                    style="height: 200px; width: 200px; margin-top: 50px; margin-left: 13px;">
                <p>
                <pre>"We are happy to see you again!!"</pre>
                </p>

            </div>

    </div>

    </section>
    </div>
    



</body>

</html>