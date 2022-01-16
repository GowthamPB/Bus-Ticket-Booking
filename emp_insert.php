<?php
$NOTIFICATION=false;

include 'connect.php';
if(isset($_POST['submit'])){
$NAME=$_POST['NAME'];
$PHONE=$_POST['PHONE'];
$ADDRESS=$_POST['ADDRESS'];
$ROLE=$_POST['ROLE'];
$BUS_ID=$_POST['BUS_ID']; 
$sql="INSERT INTO `employee` (`NAME`, `PHONE`, `ADDRESS`,`ROLE`,`BUS_ID`) VALUES ('$NAME', '$PHONE', '$ADDRESS','$ROLE','$BUS_ID')";

$result=mysqli_query($con,$sql);
if($result){
  header('location:emp_display.php');
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
        <a class="nav-link active" href="emp_display.php">Employee</a>
        <a class="nav-link" href="routes_display.php">Routes</a>
        <a class="nav-link" href="cust_display.php">Customers</a>
        <a class="nav-link" href="pay_display.php">Payment</a>
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
        <label for='NAME' class='form-label'>NAME</label>
        <input type='text' class='form-control' id='NAME' name='NAME' placeholder='Enter the employee name'
          autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='PHONE' class='form-label'>PHONE</label>
        <input type='text' class='form-control' id='PHONE' name='PHONE' placeholder='Enter the phone number'
          autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='ADDRESS' class='form-label'>ADDRESS</label>
        <input type='text' class='form-control' id='ADDRESS' name='ADDRESS'
          placeholder='Enter the address' autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='ROLE' class='form-label'>ROLE</label>
        <input type='text' class='form-control' id='ROLE' name='ROLE'
          placeholder='Enter the role' autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID'
          placeholder='Enter the bus id from bus table' autocomplete='off'>
      </div>
      <?php
          echo "$NOTIFICATION";
      ?>
      <div><button type='submit' class='btn btn-primary' name='submit'>Submit</button></div>
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
