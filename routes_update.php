<?php
include 'connect.php';
$ID=$_GET['updateid'];
$sql="SELECT * FROM `routes` WHERE `ROUTE_ID`='$ID'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$ROUTE_ID=$row['ROUTE_ID'];
$BUS_ID=$row['BUS_ID'];
$SOURCE=$row['SOURCE'];
$DESTINATION=$row['DESTINATION'];
$PRICE=$row['PRICE'];
$TIMINGS=$row['TIMINGS'];

if(isset($_POST['submit'])){
  $BUS_ID=$_POST['BUS_ID'];
  $SOURCE=$_POST['SOURCE'];
  $DESTINATION=$_POST['DESTINATION'];
  $PRICE=$_POST['PRICE'];
  $TIMINGS=$_POST['TIMINGS'];

$sql="UPDATE `routes` SET `ROUTE_ID`='$ROUTE_ID',`BUS_ID`='$BUS_ID',`SOURCE`='$SOURCE',`DESTINATION`='$DESTINATION',`PRICE`='$PRICE',`TIMINGS`='$TIMINGS' WHERE `routes`.`ROUTE_ID`='$ID'";

$result=mysqli_query($con,$sql);
if($result){
  header('location:routes_display.php');
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
  <h1>Add a route</h1>
 <div class='container my-5'>
    <form action='' method='post'>
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
        <label for='BUS_ID' class='form-label'>BUS ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID' placeholder='Enter the bus id'
          autocomplete='off'value=<?php
          echo $BUS_ID;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='SOURCE' class='form-label'>SOURCE</label>
        <input type='text' class='form-control' id='SOURCE' name='SOURCE' placeholder='Enter the source'
          autocomplete='off' value=<?php
          echo $SOURCE;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='DESTINATION' class='form-label'>DESTINATION</label>
        <input type='text' class='form-control' id='DESTINATION' name='DESTINATION'
          placeholder='Enter the destination' autocomplete='off' value=<?php
          echo $DESTINATION;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='PRICE' class='form-label'>PRICE</label>
        <input type='text' class='form-control' id='PRICE' name='PRICE'
          placeholder='Enter the price' autocomplete='off' value=<?php
          echo $PRICE;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='TIMINGS' class='form-label'>TIMINGS</label>
        <input type='text' class='form-control' id='TIMINGS' name='TIMINGS'
          placeholder='Enter the timings' autocomplete='off' value=<?php
          echo $TIMINGS;
          ?>
          >
      </div>
      <button type='submit' class='btn btn-primary' name='submit'>Update</button>
    </form>
  </div>
</body>
</html>