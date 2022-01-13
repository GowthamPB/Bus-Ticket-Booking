<?php
include 'connect.php';
$ID=$_GET['updateid'];
$sql="SELECT * FROM `payment` WHERE `PAYMENT_ID`='$ID'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$PAYMENT_ID=$row['PAYMENT_ID'];
$CUST_ID=$row['CUST_ID'];
$BUS_ID=$row['BUS_ID'];
$DATE=$row['DATE'];
$AMOUNT=$row['AMOUNT'];

if(isset($_POST['submit'])){
  $CUST_ID=$_POST['CUST_ID'];
  $BUS_ID=$_POST['BUS_ID'];
  $AMOUNT=$_POST['AMOUNT'];

$sql="UPDATE `payment` SET `CUST_ID`='$CUST_ID',`BUS_ID`='$BUS_ID',`AMOUNT`='$AMOUNT' WHERE `payment`.`PAYMENT_ID`='$ID'";

$result=mysqli_query($con,$sql);
if($result){
  header('location:pay_display.php');
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
  <h1>Add a payment</h1>
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
        <label for='CUST_ID' class='form-label'>CUST_ID</label>
        <input type='text' class='form-control' id='CUST_ID' name='CUST_ID' placeholder='Enter the Customer ID'
          autocomplete='off'value=<?php
          echo $CUST_ID;
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
      <div class='mb-3'>
        <label for='AMOUNT' class='form-label'>AMOUNT</label>
        <input type='text' class='form-control' id='AMOUNT' name='AMOUNT' placeholder='Enter the amount'
          autocomplete='off' value=<?php
          echo $AMOUNT;
          ?>
          >
      </div>
      <button type='submit' class='btn btn-primary' name='submit'>Update</button>
    </form>
  </div>
</body>
</html>