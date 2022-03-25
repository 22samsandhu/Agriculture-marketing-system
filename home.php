<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        header("Location: profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>
<body>
    <?php $data = 'home'; ?>
    <?php include 'menu.php'; ?>

    <section class="banner">
        <div class="text">
            <h1 class="heading">Agro World</h1>
            <h4>Grow your buisness with Agro world</h4>
        </div>
        <div class="btns">
            <a href="login/login.php">Login</a>
            <a href="signup/signup.php">Sign Up</a>
        </div>
    </section>

    <!-- <section class="products">
        <h1>Products</h1>
        <div class="pro">
            <div class="pr">
                <h3>Wheat</h3>
                <img src="pr1.jpg" alt="" />
                
                <p>Average Rate = ______</p>

            </div>
            <div class="pr">
                <h3>Mango</h3>
                <img src="pr2.jpg" alt="" />
                
                <p>Average Rate = ______</p>
            </div>
            <div class="pr">
                <h3>Apple</h3>
                <img src="pr3.jpg" alt="" />
                
                <p>Average Rate = ______</p>
            </div>
        </div>
        <div class="btn">
        <button><a href="products.php">More &LongRightArrow;</a></button>
        </div>
        </section> -->

        <section class="service">
        <div class="heading">
            <h1>Services</h1>
        </div>
        <div class="content">
            <div class="buy">
                <h1>Buy</h1>
                <p>Buy products of your choice</p>
            </div>
            <img src="buy-sell.png" alt="logo">

            <div class="sell">
                <h1>Sell</h1>
                <p>Sell your crops or products</p>
            </div>
        </div>
    </section>
    
    <section class="footer">
        <div class="c-form">
        <h3>contact form</h3>
        <form action="contactus.php">
            Name: <br> <input type="text" name="name" id="name" auto-complete="off" /><br />
            Email: <br><input type="email" name="email" id="email"  auto-complete="off"/><br />
            Message: <br> <textarea name="msg" id="msg" cols="30" rows="10" auto-complete="off"></textarea><br />
            <button type="submit" value="Send" class="msgsubmit">Send</button>
        </form>
        </div>
        <div class="c-info" id=contact>
        <h3>contact info</h3>
        <p>email: email@mail.com</p>
        <p>phone no.: +91 5245157823</p>
        <p>whatsapp : 5245157823</p>
        </div>
    </section>

    <section class="end">
        <p>this is yet to host</p>
    </section> 

        
    
</body>
</html>