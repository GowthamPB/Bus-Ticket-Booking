<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $TICKET_ID=$_GET['deleteid'];
    $BUS_ID=$_GET['busid'];
    $SQL2="SELECT `SEATS_LEFT` FROM `routes` WHERE `routes`.`BUS_ID`='$BUS_ID';";
    $result4=mysqli_query($con,$SQL2);
    $row4=mysqli_fetch_assoc($result4);
    $SEATS_LEFT=$row4['SEATS_LEFT'];
    $SQL3="SELECT `NUM_OF_PASSENGERS` FROM `ticket` WHERE `ticket`.`BUS_ID`='$BUS_ID';";
    $result3=mysqli_query($con,$SQL3);
    $row1=mysqli_fetch_assoc($result3);
    $NUM_OF_PASSENGERS=$row1['NUM_OF_PASSENGERS'];
    $ANS=($SEATS_LEFT+$NUM_OF_PASSENGERS);
    $sql="DELETE FROM `ticket` WHERE `ticket`.`TICKET_ID` = '$TICKET_ID'";
    $sql1="UPDATE `routes` SET `SEATS_LEFT` = '$ANS' WHERE `routes`.`BUS_ID` = '$BUS_ID'";
    $result1=mysqli_query($con,$sql1);
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:ticket_display.php');
    }
    else{
        die(mysqli_error($con));
    }
}


?>