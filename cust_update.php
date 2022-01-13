<?php
include 'connect.php';
$ID=$_GET['updateid'];
$sql="SELECT * FROM `customer` WHERE `CUST_ID`='$ID'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$CUST_ID=$row['CUST_ID'];
$CUST_NAME=$row['CUST_NAME'];
$PHONE=$row['PHONE'];
$BUS_ID=$row['BUS_ID'];

if(isset($_POST['submit'])){
  $CUST_NAME=$_POST['CUST_NAME'];
  $PHONE=$_POST['PHONE'];
  $BUS_ID=$_POST['BUS_ID'];


$sql="UPDATE `customer` SET `CUST_ID`='$CUST_ID',`CUST_NAME`='$CUST_NAME',`PHONE`='$PHONE',`BUS_ID`='$BUS_ID' WHERE `customer`.`CUST_ID`='$ID'";

$result=mysqli_query($con,$sql);
if($result){
  header('location:cust_display.php');
}
else{
  die('Connection failed with error'.mysqli_connect_error());
}
}

?>


<!DOCTYPE html>
<html lang='en'>

<head>
  <!-- Required meta tags -->
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>

  <title>Bus Ticket Booking Management System</title>
</head>

<body>
  <h1>Add a customer</h1>
 <div class='container my-5'>
    <form method='post'>
       <!-- <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID' placeholder='Enter the Bus ID'
          autocomplete='off' value=<?php
          echo $BUS_ID;
          ?>
          > 
          <p>Don't give duplicate values</p>
      </div>-->
      <div class='mb-3'>
        <label for='CUST_NAME' class='form-label'>CUST_NAME</label>
        <input type='text' class='form-control' id='CUST_NAME' name='CUST_NAME' placeholder='Enter the customer name'
          autocomplete='off'value=<?php
          echo $CUST_NAME;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='PHONE' class='form-label'>PHONE</label>
        <input type='text' class='form-control' id='PHONE' name='PHONE' placeholder='Enter the phone number'
          autocomplete='off' value=<?php
          echo $PHONE;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS_ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID'
          placeholder='Enter the bus id' autocomplete='off' value=<?php
          echo $BUS_ID;
          ?>
          >
      </div>
      <button type='submit' class='btn btn-primary' name='submit'>Update</button>
    </form>
  </div>
</body>
</html>