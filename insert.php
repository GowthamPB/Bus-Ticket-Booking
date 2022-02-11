<?php
$NOTIFICATION=false;
include 'connect.php';
if(isset($_POST['submit'])){
// $BUS_ID=$_POST['BUS_ID'];`BUS_ID`, '$BUS_ID', 
$BUS_TYPE=$_POST['BUS_TYPE'];
$NUM_PLATE=$_POST['NUM_PLATE'];
$NUM_OF_SEATS=$_POST['NUM_OF_SEATS'];
if($NUM_OF_SEATS<=0 || $NUM_OF_SEATS>50){
  $NOTIFICATION="<p>Number of seats should be between 1 and 50</p>";
  }
  else{
$sql="INSERT INTO `bus` (`BUS_TYPE`, `NUM_PLATE`, `NUM_OF_SEATS`) VALUES ('$BUS_TYPE', '$NUM_PLATE', '$NUM_OF_SEATS')";

$result=mysqli_query($con,$sql);
if($result){
  header('location:display.php');
}
else{
  die('Connection failed with error'.mysqli_connect_error());
}
  }
}

?>


<!DOCTYPE html>
<html lang='en'>

<head>

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
        <a class="nav-link active" aria-current="page" href="display.php">Bus</a>
        <a class="nav-link" href="emp_display.php">Employee</a>
        <a class="nav-link" href="routes_display.php">Routes</a>
        <a class="nav-link" href="cust_display.php">Customers</a>
        <a class="nav-link" href="ticket_display.php">Ticket</a>
      </div>
    </div>
  </div>
</nav>

  <div class='container my-5'>
    <form action='' method='post'>
      <!-- <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID' placeholder='Enter the Bus ID'
          autocomplete='off'>
          <p>Don't give duplicate values</p>
      </div> -->
      <div class='mb-3'>
        <label for='BUS_TYPE' class='form-label'>BUS TYPE</label>
        <input type='text' class='form-control' id='BUS_TYPE' name='BUS_TYPE' placeholder='Enter the Bus type'
          autocomplete='off' required>
      </div>
      <div class='mb-3'>
        <label for='NUM_PLATE' class='form-label'>NUMBER PLATE</label>
        <input type='text' class='form-control' id='NUM_PLATE' name='NUM_PLATE' placeholder='Enter the number plate'
          autocomplete='off' required>
      </div>
      <div class='mb-3'>
        <label for='NUM_OF_SEATS' class='form-label'>NUMBER OF SEATS</label>
        <input type='text' class='form-control' id='NUM_OF_SEATS' name='NUM_OF_SEATS'
          placeholder='Enter the total number of seats' autocomplete='off' required>
      </div>
      <?php
      echo $NOTIFICATION;
      ?>
      <button type='submit' class='btn btn-primary' name='submit'>Submit</button>
    </form>
  </div>
</body>
</html>








<!-- <?php
$sql="SELECT `BUS_ID` FROM `bus`";
$result1=mysqli_query($con,$sql);
$BUS_ID=$_POST['BUS_ID'];
while($col=mysqli_fetch_assoc($result1)){
$BUS=$col['BUS_ID'];
if(!($BUS==$BUS_ID)){
  echo " <p>Don't give duplicate values</p>";
}
}  
 foreach($sql as $values){
  echo $values;
   if($BUS_ID==$value){
     echo " <p>Don't give duplicate values</p>";
   }
 } 
?> -->

