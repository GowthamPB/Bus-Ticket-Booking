<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $ROUTE_ID=$_GET['deleteid'];
    $sql="DELETE FROM `routes` WHERE `routes`.`ROUTE_ID` = '$ROUTE_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:routes_display.php');
    }
    else{
        die(mysqli_error($con));
    }
}


?>