<?php
$NOTIFICATION=false;
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
  $NOTIFICATION="Please give proper input!!!";
  // die('Connection failed with error'.mysqli_connect_error());
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

  <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/6469/6469034.png" type="image/x-icon">
    <link rel="stylesheet" href="style1.css">
    <title>Bus Ticket Booking</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><strong><img src="https://cdn-icons.flaticon.com/png/512/3066/premium/3066259.png?token=exp=1642070562~hmac=bb849ef41d1064bf7c99b53f2c09f8c5" width="35px">Bus Ticket Booking</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" aria-current="page" href="display.php">Bus</a>
        <a class="nav-link" href="emp_display.php">Employee</a>
        <a class="nav-link" href="routes_display.php">Routes</a>
        <a class="nav-link" href="cust_display.php">Customers</a>
        <a class="nav-link active" href="pay_display.php">Payment</a>
      </div>
    </div>
  </div>
</nav>
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
      <?php
          echo $NOTIFICATION;
      ?>
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