<?php
    session_start();
    include '../connection.php';
    if(isset($_POST['create'])){
        $fname = mysqli_real_escape_string($con,$_POST['fname']);
        $lname = mysqli_real_escape_string($con,$_POST['lname']);
        $contact_no = mysqli_real_escape_string($con,$_POST['contact_no']);
        $email = mysqli_real_escape_string($con,$_POST['email']); 
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $id_role = mysqli_real_escape_string($con,$_POST['role']);
        $login_username = mysqli_real_escape_string($con,$_POST['login_username']);
        $l_password = mysqli_real_escape_string($con,$_POST['l_password']);
        $r_password = mysqli_real_escape_string($con,$_POST['r_password']);

        


        $check_existing_email = "SELECT * FROM `user` WHERE email = '$email' ";
        $qcheck_existing_email = mysqli_query($con,$check_existing_email);
        $emailcount = mysqli_num_rows($qcheck_existing_email);


        if($emailcount>0){
            echo '<script> alert("Entered email already exist")</script>';
            /*header("signup.php");
            exit; */
        }
        else{
            $check_existing_username = "SELECT * FROM `login` WHERE login_username = '$login_username' ";
            $qcheck_existing_username = mysqli_query($con,$check_existing_username);
            $usernamecount = mysqli_num_rows($qcheck_existing_username);
            if($usernamecount>0){
                echo '<script> alert("Entered username already exist")</script>';
                /*header("signup.php");
                exit; */
            }
            else{

            if($l_password == $r_password){

                
            $sql = "INSERT INTO `project`.`user` (`fname` ,`lname`,`contact_no`, `email`,`address`,`id_role`) 
            values ('$fname','$lname','$contact_no','$email','$address','$id_role');";
            $con->query($sql);
            
            $id=$con->insert_id;

            $sql = "INSERT INTO `project`.`login` (`id_user`,`login_username` ,`l_password`) values ($con->insert_id,'$login_username','$l_password')";
            $result=$con->query($sql);
                if($result){
                    echo "entered";
                    $check_existing_username = "SELECT * FROM `user` WHERE user_id = '$id';";
                    $qcheck_existing_username = mysqli_query($con,$check_existing_username);
                $usernamecount = mysqli_num_rows($qcheck_existing_username);



                    if($usernamecount==0){
                        echo "email not registered";
                    }
                    else{
                        $email_details = mysqli_fetch_assoc($qcheck_existing_username);
                        $_SESSION['fname'] =  $email_details['fname'];
                        $_SESSION['lname'] = $email_details['lname'];
                        $_SESSION['email'] =  $email_details['email'];
                        $_SESSION['contactno'] = $email_details['contact_no'];
                        $_SESSION['user_id']=$email_details['user_id'];
                        $_SESSION['address'] = $email_details['address'];
                        $_SESSION['profile_pic'] = $email_details['profile_image'];
                        $user_id = $_SESSION['user_id'];

                       

                        
                    ?>
                    <script>window.location.replace("../profile.php");</script>
                    <?php
                    }
                }
            
            

            }
            else{
                echo "Two password doesn't match";
            }

        }


    }
    }
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signupstyle.css">
    <title>Document</title>
</head>

<body>
    <section class="bbtn">
        <button onclick="window.location.href = '../home.php'">&LongLeftArrow; Back</button>
    </section>

    <div class="form-item">
        <div class="container">
            <div class="img">
                <img src="img.jpeg" width="100px" height="100px" alt="Image preview" style="border-radius:200px"
                    style="float:right;"><br><br>
            </div>
            


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"
                class="signup">
                <h1>New user Registration</h1>


                <div class="name">
                    <div class="ntitle">Name:</div>
                    <div class="feildname">
                        <div class="ffeildname">
                            First Name: <br><input type="text" name="fname" required id="fname"
                                placeholder="Enter your Fisrt Name">
                        </div>
                        <div class="lfeildname">
                            Last Name: <br><input type="text" name="lname" id="lname"
                                placeholder="Enter your Last Name">
                        </div>
                    </div>


                    <div class="otherinfo">
                        Contact Number:<input type="text" name="contact_no" required id="contact_no"
                            placeholder="Enter your Contact Number">

                        Email Address:<input type="email" name="email" required id="email"
                            placeholder="Enter your Email address">

                        Address:<input type="text" name="address" required id="address"
                         placeholder="Enter Your Address"> 
            Pincode:<input type="text" name="pincode" required id="pincode"
             placeholder="Enter Your Pincode"> <br>

             Role: <br> <select name="role" id="role">
                                    <option selected value="1">Farmer</option>
                                    <option value="2">Merchant</option>
                                    <option value="3">Other</option>
                                </select><br>

        

                    Login username:<input type="text" name="login_username" required id="login_username"
                            placeholder="Enter Username">

                        Password: <input type="password" name="l_password" required id="l_password"
                            placeholder="Enter Password" style="margin-bottom: 0px;">
                        <div><input type="checkbox" onclick="show_password()">Show </div>
                        Re-Type Password:<input type="password" name="r_password" required id="l_password"
                            placeholder="Re-Enter Password" style="margin-bottom: 0px;">

                        <!-- Profile-pic: <input type="file" accept="image/*" name="profile_pic" id="profile_pic" onchange="previewfile()" ><br><br> -->

                        <br>
                        <hr><br>
                        <button type="submit" id="register" name="create" value="Sign Up">Register</button>
                        <p>Already have an account? <a href="../login/login.php">Login</a> </p>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <script>
        function previewfile() {
            var preview = document.querySelector('img');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();
            preview.src = "";

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

        function show_password() {
            var get = document.getElementById("l_password");
            if (get.type === "password") {
                get.type = "text";
            }

            else {
                get.type = "password";
            }
        }
    </script>

</body>

</html>