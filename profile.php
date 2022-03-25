<?php
    session_start();
    include 'connection.php';
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM `project`.`user` WHERE user_id= '$userid';";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);
?>
<?php
    if (! isset($_SESSION['user_id'])){
        header("Location:login/login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>Your profile</title>
</head>

<body>
    <?php $data = 'profile'; ?>
    <?php include 'menu.php'; ?>
    <div class="head">
        <h1>Welcome
            <?php  echo ($row['fname'])." ".($row['lname']); ?>
        </h1>
    </div>

    <div class="accountinfo">
        <div class="box">
            <div class="left">
            <h3>Account Info:</h3>
                <img src="<?php  echo $row['profile_image'];?>" alt="Profile Pic" width="100px" height="100px" style="border-radius:30px"> 
            </div>
            
        
        </div>
        

    </div>
    <div class="userinfo">
        <hr>
        <h3>User Info:</h3>
        <div class="right">
                NAME        :
                <?php  echo ($row['fname'])." ".($row['lname']); ?><br>
                User ID     : <?php  echo ($row['user_id']);?><br>
                
                Email :
                <?php  echo ($row['email']);?><br>
                Contact No. :
                <?php  echo ($row['contact_no']); ?><br>
                Address     :
            <?php echo $row['address'];?><br>
            
            <hr>
        </div>

    </div>
    <h3 style="text-align:center;">Your order:</h3>
    <div class="order">


    <div class="ordertable">
        <table class="order"  cellspacing="20">
            <thead>
                <th>Product Image</th>
                <th>Product Details</th>
                <th>Supplier Info</th>
                <th>Order Details</th>
            </thead>
            <?php
                $findorder = "SELECT * FROM orders INNER JOIN product ON orders.product_id = product.product_id WHERE orders.customer_id = '$userid';";
                $qfindorder = mysqli_query($con,$findorder);
                while($res = mysqli_fetch_assoc($qfindorder)){ ?>
            
            <tr>
                <?php $product_id = $res['product_id']?>

                <td><img src="<?php echo $res['product_img'];?>" alt="product image..." height= 100px width=100px>  </td>
                <td> Product Name: <?php echo $res['product_name'];?><br>
                     Product detail: <?php echo $res['product_detail'];?><br>
                     Catagory : <?php echo $res['catagory'];?><br>
                     Price : <?php echo $res['price'];?><br><br>
                     quantity : <?php echo $res['quantity'];?>
                    <br>
                     <br>
                     

                </td>
                <td>
                    <?php $supplier_id = $res['supplier_id'];
                    $supplierinfo = "SELECT * FROM user WHERE user_id = '$supplier_id'";
                    $qsupplierinfo = mysqli_query($con,$supplierinfo);
                    $ressupplier = mysqli_fetch_assoc($qsupplierinfo); ?> 
                    Supplier Name: <?php echo $ressupplier['fname'].$ressupplier['lname'];?><br>
                    supplier Conatct No. :<?php echo $ressupplier['contact_no'];?><br>
                    Supplier email:<?php echo $ressupplier['email'];?><br>
                    Supplier Address:<?php echo $ressupplier['address'];?><br>
                    <br>
                </td>
                <td>Order ID: <?php echo $res['order_id'];?><br>
                    Order Date: <?php echo $res['date_time'];?><br>
                    Quantity : <?php echo $res['quantity'];?><br>
                    Total Amount : <?php echo $res['total_amount'];?></td>
            </tr>
            <?php
                }?>
            
        </table>
    </div>
        
        <div class="linkbtn"> <button ><a href="products.php">Place an order</a></button></div>
        <hr>
    </div>
    
    <div class="products">
        <h3 style="text-align:center;">Products you are selling:</h3>
        <div class="sellingproduct">


<div class="selltable">
    <table class="sell"  cellspacing="20">
        <thead>
            <th>Product Image</th>
            <th>Product Details</th>
            <th>Stock</th>
            
        </thead>
        <?php
            $findsell = "SELECT * FROM product WHERE product.supplier_id= '$userid';";
            $qfindsell = mysqli_query($con,$findsell);
            while($res = mysqli_fetch_assoc($qfindsell)){ ?>
        
        <tr>
            <?php $product_id = $res['product_id']?>

            <td><img src="<?php echo $res['product_img'];?>" alt="product image..." height= 100px width=100px>  </td>
            <td> Product Name: <?php echo $res['product_name'];?><br>
                 Product detail: <?php echo $res['product_detail'];?><br>
                 Catagory : <?php echo $res['catagory'];?><br>
                 Price : <?php echo $res['price'];?>
                
                <br>
                 <br>
                 

            </td>
            <td>
            Stock : <?php $intialstock = $res['stock'] * 1 ;
                        $findtotalorder = "SELECT SUM(quantity) AS total FROM orders WHERE orders.product_id = $product_id;";
                        $qfindtotalorder = mysqli_query($con,$findtotalorder) ;
                        $spenditem = mysqli_fetch_assoc($qfindtotalorder);
                        $fspenditem = $spenditem['total'] * 1; 
                        $reststock = $intialstock - $fspenditem;
                        echo $reststock;?>
                
            </td>

        </tr>
        <?php
            }?>
        
    </table>
</div>
       <div class="linkbtn"> <button ><a href="sellproduct.php">Sell your product</a></button></div>
        <hr>
    </div>
    
    <div class="btns">
    <button onclick="window.location.href = 'ordersforme.php'">Orders for You</button>
        <button onclick=delete_query()>DELETE ACCOUNT</button>
        <button onclick=update_query()>UPDATE ACCOUNT</button>
        <button onclick="window.location.href = 'logout.php'">LOGOUT</button>
    </div>
    <script>
        function delete_query(){
            var dherf = "delete.php?user_id=<?php echo $_SESSION['user_id']; ?>";
                var r = confirm("are you sure you want to delete");
                if (r == true) {
                    alert("Thanks for making account");
                    alert("Remeber you can always make an new account");
                    window.location.href = dherf;
                } else {
                    txt = "You pressed Cancel!";
                }
        }
        function update_query(){
            var dherf = "update.php? user_id=<?php echo $_SESSION['user_id']; ?>";
            window.location.href = dherf;
                  
        }
    </script>
</body>

</html>

 

                
                

