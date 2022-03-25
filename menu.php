<?php 
 include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menustyle.css">
    <title>Home</title>
</head>
<body>
    <div class="menu">
        <div class="logo">
            <h1>AGRO WORLD</h1>
        </div>
        <div class="navbar">
            
            <a href="products.php" <?php if ($data == 'products'): ?> style="background-color: rgba(170, 61, 224,0.8);" <?php endif; ?>>Product Available</a>
            <a href="contactus.php" <?php if ($data == 'contact us'): ?> style="background-color: rgba(170, 61, 224,0.8);" <?php endif; ?>>Contact Us</a>
            <a href="aboutus.php" <?php if ($data == 'about us'): ?> style="background-color: rgba(170, 61, 224,0.8);" <?php endif; ?>>About Us</a>
            <a href="profile.php" <?php if ($data == 'profile'): ?> style="background-color: rgba(170, 61, 224,0.8);" <?php endif; ?>>Your Profile</a>
                
        </div>
    </div>
    
    
</body>
</html>