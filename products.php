<?php
    session_start();
    if (! isset($_SESSION['user_id'])){
        header("Location:login/login.php");
    }
    include 'connection.php';

    $displayproducts = "SELECT * FROM product where supplier_id != ".$_SESSION['user_id'].";";
    $qdisplayproducts = mysqli_query($con,$displayproducts);
    $productscount = mysqli_num_rows($qdisplayproducts);

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">

    <title>All product</title>
</head>
<body>
    <?php $data = 'products'; ?>
    <?php include 'menu.php'; ?>
    <br><h1 style="text-align:center;">Product Available</h1><hr><br>
    <h4> Total products : <?php echo $productscount;?> </h4>
    <div class="productstable">
        <table class="products"  cellspacing="20">
            <thead>
                <th>Product Image</th>
                <th>Product Details</th>
                <th>Supplier Info,</th>
                <th>Place order</th>
            </thead>
            <?php
                while($res = mysqli_fetch_assoc($qdisplayproducts)){ ?>
            
            <tr>
                <?php $product_id = $res['product_id']?>

                <td><img src="<?php echo $res['product_img'];?>" alt="product image..." height= 100px width=100px>  </td>
                <td> <?php $product_id = $res['product_id']?>
                    Product Name: <?php echo $res['product_name'];?><br>
                     Product detail: <?php echo $res['product_detail'];?><br>
                     Catagory : <?php echo $res['catagory'];?><br>
                     Price : <?php echo $res['price'];?><br>
                     Stock : <?php $intialstock = $res['stock'] * 1 ;
                        $findtotalorder = "SELECT SUM(quantity) AS total FROM orders WHERE orders.product_id = $product_id;";
                        $qfindtotalorder = mysqli_query($con,$findtotalorder) ;
                        $spenditem = mysqli_fetch_assoc($qfindtotalorder);
                        $fspenditem = $spenditem['total'] * 1; 
                        $reststock = $intialstock - $fspenditem;
                        echo $reststock;?>
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
                <td><a href="placeorder.php?productid=<?php echo $product_id; ?>">Place Order</a></td>
        


            </tr>
            <?php
                }?>
            
        </table>
    </div>
    <script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>



    

    
</body>
</html>


<!-- $stock_query = " SELECT SUM(quantity) INTO FROM orders WHERE orders.product_id = '$product_id';  
                        SELECT stock INTO @stock FROM product WHERE product_id = '$product_id' ;
                        SET @finalstock := @stock-@total_quantity;
                        SELECT @finalstock AS final;";
                                    $qstock_query = mysqli_multi_query($con,$stock_query);

                                    $res2 = mysqli_store_result($con);
                                    $res3 = mysqli_fetch_row($res2);
                                    echo $res3['final']; ?><br> -->
                    