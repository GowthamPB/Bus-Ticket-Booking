<?php
$NOTIFICATION=false;
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
  $NOTIFICATION="<p>Bus ID does not exist<p>";
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
    <a class="navbar-brand" href="index.php"><strong><img src="https://cdn-icons.flaticon.com/png/512/3066/premium/3066259.png?token=exp=1643485325~hmac=761a3a37424b1bb74ee71f64a4e63f98" width="35px">Bus Ticket Booking</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" aria-current="page" href="display.php">Bus</a>
        <a class="nav-link" href="emp_display.php">Employee</a>
        <a class="nav-link" href="routes_display.php">Routes</a>
        <a class="nav-link active" href="cust_display.php">Customers</a>
        <a class="nav-link" href="ticket_display.php">Ticket</a>
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
      <div class='mb-3'>
        <label for='CUST_NAME' class='form-label'>CUST_NAME</label>
        <input type='text'  class='form-control' id='CUST_NAME' name='CUST_NAME' required placeholder='Enter the customer name'
          autocomplete='off'value=<?php
          echo $CUST_NAME;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='PHONE' class='form-label'>PHONE</label>
        <input type='text' pattern="[6-9]{1}[0-9]{9}" class='form-control' id='PHONE' name='PHONE' required placeholder='Enter the phone number'
          autocomplete='off' value=<?php
          echo $PHONE;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS_ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID'
          placeholder='Enter the bus id' required autocomplete='off' value=<?php
          echo $BUS_ID;
          ?>
          >
      </div>
      <?php
          echo "$NOTIFICATION";
      ?>
      <div><button type='submit' class='btn btn-primary' name='submit'>Update</button></div>
    </form>
  </div>
</body>
</html>