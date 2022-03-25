
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>about us</title>
</head>
<body>
    <?php $data = 'about us'; ?>
    <?php include 'menu.php'; ?>
    <h1>About us</h1>
    <p>
        This Website is based on marketing of agricultural products.

        
    </p><br>
    <h2>Developers</h2>

    <div class="row text-center py-5">
    <?php
    component();
    component1();
    ?>
    </div>
</body>
</html>
<?php
    function component(){
        
        $element = "
        
        <div class=\"col-md-6 col-sm-3 my-6 my-md-0\" >
                    <form action=\"aboutus.php\" method=\"post\">
                        <div class=\"card shadow\">
                        <div>
                                
                                <img src=\"img/avatar.png\"  style =\"border-radius: 50%;  height: 20%; width: 20%\"><br>
                            </div>
                        
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">SAMANDEEP SINGH</h5>
                                
                                <p class=\"card-text\">
                                    Contact No : 7412831060
                                </p>
                                <p class=\"card-text\">
                                    Email  : 201210039@nitdelhi.ac.in
                                </p>
                               
                                <p class=\"card-text\">
                                    Address  : Sriganganagar ,Rajasthan
                                </p>
                               
                            </div>
                        </div>
                    </form>
                </div>
        ";
        echo $element;
    
       
    }
    function component1(){
        
        $element = "
        
        <div class=\"col-md-6 col-sm-6 my-3 my-md-0\" style =\"background-color: yellow\">
                    <form action=\"aboutus.php\" method=\"post\">
                        <div class=\"card shadow\">
                        <div>
                                
                                <img src=\"img/avatar.png\"  style =\"border-radius: 50%;  height: 20%; width: 20%\"><br>
                            </div>
                        
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">AADHAR KUMAR </h5>
                                
                                <p class=\"card-text\">
                                    Contact No : 9560836503
                                </p>
                                <p class=\"card-text\">
                                    Email  : 201210001@nitdelhi.ac.in
                                </p>
                               
                                <p class=\"card-text\">
                                    Address  : Noida ,Delhi
                                </p>
                               
                            </div>
                        </div>
                    </form>
                </div>
        ";
        echo $element;
    
       
    }
   


?>