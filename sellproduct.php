<?php
    include 'connection.php';
    session_start();
?>

<?php
    
    if(isset($_POST['sell'])){
        $user_id = $_SESSION['user_id'];
        $productname = mysqli_real_escape_string($con,$_POST['product_name']);
        $productdetails = mysqli_real_escape_string($con,$_POST['product_details']);
        $catogory = mysqli_real_escape_string($con,$_POST['catagory']);
        $price = mysqli_real_escape_string($con,$_POST['price']);
        $stock = mysqli_real_escape_string($con,$_POST['stock']);
        $seller = mysqli_real_escape_string($con,$_POST['supplier']);
        $image = $_FILES['product_pic'];

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
            $sellproduct = "INSERT INTO product (product_name, product_detail, catagory, stock, supplier_id, price, product_img) VALUES ('$productname','$productdetails','$catogory','$stock','$seller','$price','$destination')" ;
            
            $qsellproduct = mysqli_multi_query($con,$sellproduct);
            if($qsellproduct){
                echo "data updated successfully";
                header("Location:profile.php");
            }
            else{
                echo "not inserted";
                echo mysqli_error($con);
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
    <title>Document</title>
</head>
<body>
    <div  style="background-color:#6495ED ; margin-left: 30%; margin-right: 30%; padding-left :10%; font-size:20px">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="sellproduct">
        <h1>Sell your product</h1>
        Product Name: <input type="text" required name="product_name"> <br>
        Product Details: <br> <textarea name="product_details" id="product_details" cols="25" rows="5">Write something about your product</textarea> <br>
        Catagory: <input type="text" name="catagory" required> <br>
        Supplier Id: <input type="text" name="supplier" value="<?php echo $_SESSION['user_id']; ?>" readonly > <br>
        Price  : <input type="text" name="price" required> <br>
        Stock: <input type="text" name="stock" required placeholder="total stock "> <br>
        Product image : <input type="file" accept="image/*" name="product_pic" id="product_pic" onchange="previewfile()" ><br><br>
                        <img src="" height="200" alt="Image preview..."> <br>

        <button type="submit" name="sell" >Sell Now</button>


    </form>
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

