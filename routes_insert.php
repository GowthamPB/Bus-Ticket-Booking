<?php
$NOTIFICATION=false;
$NOTIFICATION1=false;
include 'connect.php';
if(isset($_POST['submit'])){
$BUS_ID=$_POST['BUS_ID'];
$SOURCE=$_POST['SOURCE'];
$DESTINATION=$_POST['DESTINATION'];
$PRICE=$_POST['PRICE'];
$SQL1="SELECT `NUM_OF_SEATS` FROM `bus` WHERE `bus`.`BUS_ID`='$BUS_ID'";
$result=mysqli_query($con,$SQL1);
$row=mysqli_fetch_assoc($result);
$SEATS_LEFT=$row['NUM_OF_SEATS'];



$TIMINGS=$_POST['TIMINGS']; 
if(strtolower($SOURCE)==strtolower($DESTINATION)){
  $NOTIFICATION="<p>Enter different source and destination</p>";
  }
  else{
    if($PRICE<=0){
      $NOTIFICATION="<p>Price should be positive</p>";
      }
      else{
$sql="INSERT INTO `routes` (`BUS_ID`, `SOURCE`, `DESTINATION`,`PRICE`,`SEATS_LEFT`,`TIMINGS`) VALUES ('$BUS_ID', '$SOURCE', '$DESTINATION','$PRICE','$SEATS_LEFT','$TIMINGS')";

$result=mysqli_query($con,$sql);
if($result){
  header('location:routes_display.php');
}
else{
  $NOTIFICATION1="Bus ID does not exist";
  // die('Connection failed with error'.mysqli_connect_error());
}
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
        <a class="nav-link" aria-current="page" href="display.php">Bus</a>
        <a class="nav-link" href="emp_display.php">Employee</a>
        <a class="nav-link active" href="routes_display.php">Routes</a>
        <a class="nav-link" href="cust_display.php">Customers</a>
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
          autocomplete='off'>
          <p>Don't give duplicate values</p>
      </div> -->
      <?php
      echo $NOTIFICATION;
      ?>
      <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS_ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID' placeholder='Enter the bus id'
          autocomplete='off' required>
      </div>
      <?php
          echo "$NOTIFICATION1";
      ?>
      <div class='mb-3'>
        <label for='SOURCE' class='form-label'>SOURCE</label>
        <input type='text' class='form-control' id='SOURCE' name='SOURCE' placeholder='Enter the source'
          autocomplete='off' required>
      </div>
      <div class='mb-3'>
        <label for='DESTINATION' class='form-label'>DESTINATION</label>
        <input type='text' class='form-control' id='DESTINATION' name='DESTINATION'
          placeholder='Enter the destination' autocomplete='off' required>
      </div>
      <div class='mb-3'>
        <label for='PRICE' class='form-label'>PRICE</label>
        <input type='text' class='form-control' id='PRICE' name='PRICE'
          placeholder='Enter the price' autocomplete='off' required>
      </div>
      <div class='mb-3'>
        <label for='TIMINGS' class='form-label'>TIMINGS</label>
        <input type='text' class='form-control' id='TIMINGS' name='TIMINGS'
          placeholder='Enter the bus timings' autocomplete='off' required>
      </div>
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

