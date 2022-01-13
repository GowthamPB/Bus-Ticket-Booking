<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $PAYMENT_ID=$_GET['deleteid'];
    $sql="DELETE FROM `payment` WHERE `payment`.`PAYMENT_ID` = '$PAYMENT_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:pay_display.php');
    }
    else{
        die(mysqli_error($con));
    }
}


?>