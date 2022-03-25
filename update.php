<?php
    include 'connection.php';
    session_start();
    $id=$_SESSION['user_id'];
    
$sql = "SELECT * FROM `project`.`user` WHERE user_id= '$id';";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);


    if(isset($_POST['update'])){
        $user_id = $_SESSION['user_id'];
        echo $user_id;
        $fname = mysqli_real_escape_string($con,$_POST['fname']);
        $lname = mysqli_real_escape_string($con,$_POST['lname']);
        $contact_no = mysqli_real_escape_string($con,$_POST['contact_no']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $pincode = mysqli_real_escape_string($con,$_POST['pincode']);
        $role = mysqli_real_escape_string($con,$_POST['role']);
        $image = $_FILES['profile_pic'];

        // profile-pic
        $filename = $image['name'];
        $file_error = $image['error'];
        $filetemp = $image['tmp_name'];

        // file extension 
        $fileext = explode('.',$filename);
        $file_check = strtolower(end($fileext));
        $fileextallowed = array('png','jpg','jpeg','pdf','img','gif','svg');

        if(in_array($file_check,$fileextallowed)){
            
            $destination = 'images/'.$filename;
            move_uploaded_file($filetemp,$destination);
            $_SESSION['profile_pic'] = $destination;
            $_SESSION['role'] = $role;
            $_SESSION['address'] = $address;
            $update = "SELECT role_id INTO @role_id FROM role WHERE role_def = '$role';
            UPDATE user SET id_role = @role_id WHERE user_id  = $user_id;
            SELECT id_role FROM user WHERE user_id = $user_id;
            UPDATE `user` SET `fname`= '$fname',`lname`='$lname',`contact_no`='$contact_no',`address`='$address', `profile_image`='$destination'  WHERE user_id = $user_id ; " ;
            
            $qupdate = mysqli_multi_query($con,$update);
            if($qupdate){
                echo "data updated successfully";
                header("Location:profile.php");
            }
            else{
                mysqli_error($con);
                die;
            }
            }
        else{
            echo "your file type doesn't match";
        }
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">
    <title>Update Profile</title>
</head>
<body>
<div class="form-item">
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"
                class="signup">
                <h1 style="text-align:center;">Update Your Profile</h1>


                <div class="name">
                    <div class="ntitle">Name:</div>
                    <div class="feildname">
                        <div class="ffeildname">
                            First Name: <br><input type="text" name="fname" required id="fname"
                                value="<?php echo $row['fname'];  ?>">
                        </div>
                        <div class="lfeildname">
                            Last Name: <br><input type="text" name="lname" id="lname" required
                            value="<?php echo $row['lname']; ?>">
                        </div>
                    </div>


                    <div class="otherinfo">
                        Contact Number: <br><input type="text" name="contact_no" required id="contact_no"
                        value="<?php echo $row['contact_no']; ?>"><br>

                        Email Address: <br><input type="email" name="email" required id="email"
                        value="<?php echo $row['email']; ?>" readonly="true" > <br>

                        Address: <br><input type="text" name="address" required id="address" 
                        value="<?php echo $row['address']; ?>" readonly="true" > <br>
                        
                        
                        

                        Profile-pic: <br><input type="file" accept="image/*" name="profile_pic" id="profile_pic" onchange="previewfile()" ><br><br>
                        <img src="" height="200" alt="Image preview...">

                        <br>
                        <hr><br>
                        <button type="submit" id="update" name="update">UPDATE DETAILS</button>
                        <button><a href="profile.php">Cancle</a></button>
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
    </script>
    
</body>
</html>