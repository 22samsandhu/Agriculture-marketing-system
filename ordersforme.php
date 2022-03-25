<?php
session_start();

include 'connection.php';

$sql = "select `fname`,`lname`,`contact_no`,`address`,`product_name`,`quantity`,`date_time`,`total_amount` FROM `project`.`orders` O join 
(`project`.`product` P join `project`.`user` U
ON  P.supplier_id = U.user_id)
ON O.product_id = P.product_id
 WHERE P.supplier_id = ".$_SESSION['user_id']."; ";
 $result = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agroworld</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>

<div class="text-center" style ="color: red"> 
    <h2> Orders for me</h2> <br>
					<a href="profile.php" class="ml-2" style ="background-color: blue; font:2x; margin:30px; padding:10px"></i>Back</a>
				</div>
                 <div class="container"> 
            <div class="row text-center py-5">
                <?php
                
                 while ($row = mysqli_fetch_assoc($result)){
                     
                     component($row['product_name'], $row['quantity'], $row['date_time'],$row['total_amount'],$row['fname'],$row['lname'],$row['contact_no'],$row['address']);
                 }
                ?>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
<?php
    function component($productname, $quantity, $date_time,$total_amount,$fname,$lname,$contact_no,$address){
        
        $element = "
        
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\" style =\"background-color: yellow\">
                    <form action=\"myorder.php\" method=\"post\">
                        <div class=\"card shadow\">
                        
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">$productname</h5>
                                
                                <p class=\"card-text\">
                                    Quantity : $quantity
                                </p>
                                <p class=\"card-text\">
                                    Date and Time  : $date_time
                                </p>
                                <h5>
                                    <span class=\"price\"><i class=\"fa fa-inr\"></i>$total_amount</span>
                                </h5>
                                <p class=\"card-text\">
                                    Customer name  : $fname $lname
                                </p>
                                <p class=\"card-text\">
                                    Contact Number  : $contact_no
                                </p>
                                <p class=\"card-text\">
                                    Address  : $address
                                </p>
                               
                            </div>
                        </div>
                    </form>
                </div>
        ";
        echo $element;
    
       
    }
   


?>