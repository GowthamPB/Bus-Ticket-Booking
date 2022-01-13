<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $BUS_ID=$_GET['deleteid'];
    $sql="DELETE FROM `bus` WHERE `bus`.`BUS_ID` = '$BUS_ID'";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:display.php');
    }
    else{
        die(mysqli_error($con));
    }
}


?>