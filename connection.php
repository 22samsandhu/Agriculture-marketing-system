<?php


$chostname = "localhost";
$cusername = "root";
$cpassword = "";
$cdatabasename = "project";

$con = new mysqli($chostname,$cusername,$cpassword,$cdatabasename);
if(!$con){
    echo "hey buddy";

}


?>

