<?php
    include 'connection.php';
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $text = mysqli_real_escape_string($con,$_POST['msg']);

        $inset = "INSERT INTO contactus(name, email, text) VALUES ('$name','$email','$text');";
        $qinset = mysqli_query($con,$inset);
        if($qinset){
            echo '<script> alert("Your message sent successfully!!")</script>';


        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <title>Contact Us</title>
</head>
<body>
    <?php $data = 'contact us'; ?>
    <?php include 'menu.php'; ?>
    <h1>conatact us </h1>
    <section class="contact">
        <div class="c-form">
        
        <form action=<?php echo $_SERVER['PHP_SELF']; ?> class="form" method="post">
            <div class="info"><h3>contact form</h3>
            Name: <br> <input type="text" name="name" id="name" auto-complete="off" /><br />
            Email: <br><input type="email" name="email" id="email"  auto-complete="off"/><br />
            </div>
            <div class="msg">
            Message: <br> <textarea name="msg" id="msg" cols="40" rows="10" auto-complete="off"></textarea><br />
            <button type="submit" value="Send" class="msgsubmit" name="submit">Send</button>
            </div>
        </form>
        </div>
        <div class="c-info" id=contact>
        <h3>contact info</h3>
        <p>email: email@mail.com</p>
        <p>phone no.: +91 5245157823</p>
        <p>whatsapp : 5245157823</p>
        </div>

    </section>
    
</body>
</html>