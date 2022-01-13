<?php
include 'connect.php';
$ID=$_GET['updateid'];
$sql="SELECT * FROM `bus` WHERE `BUS_ID`='$ID'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$BUS_ID=$row['BUS_ID'];
$BUS_TYPE=$row['BUS_TYPE'];
$NUM_PLATE=$row['NUM_PLATE'];
$NUM_OF_SEATS=$row['NUM_OF_SEATS'];

if(isset($_POST['submit'])){
$BUS_ID=$_POST['BUS_ID'];
$BUS_TYPE=$_POST['BUS_TYPE'];
$NUM_PLATE=$_POST['NUM_PLATE'];
$NUM_OF_SEATS=$_POST['NUM_OF_SEATS'];


$sql="UPDATE `bus` SET `BUS_ID`='$BUS_ID',`BUS_TYPE`='$BUS_TYPE',`NUM_PLATE`='$NUM_PLATE',`NUM_OF_SEATS`=$NUM_OF_SEATS WHERE `bus`.`BUS_ID`='$ID'";

$result=mysqli_query($con,$sql);
if($result){
  header('location:display.php');
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
  <h1>Add a Bus</h1>
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
      </div> -->
      <div class='mb-3'>
        <label for='BUS_TYPE' class='form-label'>BUS TYPE</label>
        <input type='text' class='form-control' id='BUS_TYPE' name='BUS_TYPE' placeholder='Enter the Bus TYPE'
          autocomplete='off'value=<?php
          echo $BUS_TYPE;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='NUM_PLATE' class='form-label'>NUM PLATE</label>
        <input type='text' class='form-control' id='NUM_PLATE' name='NUM_PLATE' placeholder='Enter the number plate'
          autocomplete='off' value=<?php
          echo $NUM_PLATE;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='NUM_OF_SEATS' class='form-label'>NUM OF SEATS</label>
        <input type='text' class='form-control' id='NUM_OF_SEATS' name='NUM_OF_SEATS'
          placeholder='Enter the total number of seats' autocomplete='off' value=<?php
          echo $NUM_OF_SEATS;
          ?>
          >
      </div>
      <button type='submit' class='btn btn-primary' name='submit'>Update</button>
    </form>
  </div>
</body>
</html>