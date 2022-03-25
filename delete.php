<?php
session_start();
include 'connection.php';
$id = $_GET['user_id'];
if($id != NULL){
    $delete = "DELETE FROM user WHERE user_id = '$id'";
    $qdelete = mysqli_query($con,$delete);
    session_destroy();
    header("Location:home.php");
}
?>

