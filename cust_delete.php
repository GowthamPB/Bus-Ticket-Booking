<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $CUST_ID=$_GET['deleteid'];
    $sql="DELETE FROM `customer` WHERE `customer`.`CUST_ID` = '$CUST_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:cust_display.php');
    }
    else{
        die(mysqli_error($con));
    }
}


?>