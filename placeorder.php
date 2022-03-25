<?php
    include 'connection.php';
    session_start();
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM `project`.`user` WHERE user_id= '$userid';";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);
    

    if(isset($_POST['buy'])){
        $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
        $price = mysqli_real_escape_string($con,$_POST['price']);
        $total_amount = mysqli_real_escape_string($con,$_POST['total_amount']);
        $productid = mysqli_real_escape_string($con,$_POST['product_id']);
        $customerid = $_SESSION['user_id'];
        $seller = mysqli_real_escape_string($con,$_POST['seller_id']);

        $placeorder = "INSERT INTO orders(quantity, price, total_amount, product_id, customer_id, supplier_id) VALUES ('$quantity','$price','$total_amount','$productid','$customerid','$seller')";

        $qplaceorder = mysqli_query($con,$placeorder);
        if($qplaceorder){
            echo "data updated successfully";
            header("Location:orderafter.php");
        }
        else{
            echo "not inserted";
            echo mysqli_error($con);
            die;
        }
    
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="download.png" type="image/x-icon">
    <link rel="stylesheet" href="placeorder.css">
    <title>Order item</title>
</head>

<body>
<section class="bbtn">
        <button onclick="window.location.href = 'products.php'">&LongLeftArrow; Back</button>
    </section>
    <div class="head">
        <h1>Place your order</h1>
    </div>
    <hr >

    <div class="orderform">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="box1">
        <div class="productdetail">
            <h4>Product Details</h4>
            <?php 
        $productid = $_GET['productid'];
        $product_info = "SELECT * FROM product WHERE product_id = '$productid' " ;
        $qproduct_info = mysqli_query($con,$product_info);
        $productdetail = mysqli_fetch_assoc($qproduct_info);?>
            
            Name: <br> <input type="text" name="product_name" readonly value=<?php echo $productdetail['product_name'];?>><br>
            Catogory: <br> <input type="text" name="product_catagory" readonly value=<?php echo
                $productdetail['catagory'];?>><br>
            
            
            Quantity: <br><input type="text" id="quantity" name="quantity" required onchange="calculate()"><br>
            Price: <br> <input type="text" id="price" name="price" readonly value=<?php echo $productdetail['price'];?>><br>
        
            Total amount: <br><input type="text" id="result" name="total_amount" readonly><br>
        </div>
        <div class="orderdetails">
            <h4>Order Details</h4>
            Product ID : <br> <input type="text" name="product_id" readonly value=<?php echo $productdetail['product_id'];?>>
        </div>
    </div>
    <div class="box2">
        <div class="customerdetails">
            <h4>Your Details</h4>

            Your Name: <br> <input type="text" name="customer_name" readonly value=<?php echo $row['fname']." ".$row['lname'];?>><br>
        Email: <br> <input type=" text" name="customer_email" readonly value=<?php echo $row['email'];?>><br>
            Address: <br><input type="text" name="customer_address" readonly value=<?php echo $row['address']?>><br>
            Contact No. : <br><input type="text" name="customer_name" readonly value=<?php echo $row['contact_no']?>><br>
        </div>
        <div class="sellerdetails">
            <h4>Seller Details</h4>
            <?php $seller_info = "SELECT user.user_id, user.fname,user.lname,user.email,user.address,user.contact_no,product.supplier_id FROM user INNER JOIN product ON product.supplier_id = user.user_id WHERE product.product_id = '$productid' " ;
            $qseller_info = mysqli_query($con,$seller_info);
            $sellerdetail = mysqli_fetch_assoc($qseller_info);?>
            Seller ID : <br> <input type="text" name="seller_id" readonly value=<?php echo $sellerdetail['user_id'];?>> <br>
            Seller Name:  <br><input type="text" name="seller_name" readonly value=<?php echo $sellerdetail['fname']." ".$sellerdetail['lname'];?>> <br>
        Seller Email: <br> <input type=" text" name="seller_email" readonly value=<?php echo $sellerdetail['email'];?>> <br>
            Seller Address: <br><input type="text" name="seller_address" readonly value=<?php echo
                $sellerdetail['address']?>><br>
            Seller Contact No. : <br><input type="text" name="seller_name" readonly value=<?php echo
                $sellerdetail['contact_no']?>><br>
        </div>
    </div>
        <div class="btns">
            <button><a href="products.php">Cancle</a></button>
            <button type="submit" name="buy" >Order</button>
            
        </div>
    </form>
</div>
    <script>
        function calculate() {
            var quantity = document.getElementById('quantity').value;
            var price = document.getElementById('price').value;
            var result = document.getElementById('result');
            var myResult = quantity * price * 1;
            result.value = myResult;

        }
    </script>


</body>

</html>