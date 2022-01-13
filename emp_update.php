<?php
include 'connect.php';
$ID=$_GET['updateid'];
$sql="SELECT * FROM `employee` WHERE `EMP_ID`='$ID'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$EMP_ID=$row['EMP_ID'];
$NAME=$row['NAME'];
$PHONE=$row['PHONE'];
$ADDRESS=$row['ADDRESS'];
$ROLE=$row['ROLE'];
$BUS_ID=$row['BUS_ID'];

if(isset($_POST['submit'])){
  $NAME=$_POST['NAME'];
  $PHONE=$_POST['PHONE'];
  $ADDRESS=$_POST['ADDRESS'];
  $ROLE=$_POST['ROLE'];
  $BUS_ID=$_POST['BUS_ID'];


$sql="UPDATE `employee` SET `EMP_ID`='$EMP_ID',`NAME`='$NAME',`PHONE`='$PHONE',`ADDRESS`='$ADDRESS',`ROLE`='$ROLE',`BUS_ID`='$BUS_ID' WHERE `employee`.`EMP_ID`='$ID'";

$result=mysqli_query($con,$sql);
if($result){
  header('location:emp_display.php');
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
  <h1>Add a employee</h1>
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
        <label for='NAME' class='form-label'>NAME</label>
        <input type='text' class='form-control' id='NAME' name='NAME' placeholder='Enter the name'
          autocomplete='off'value=<?php
          echo $NAME;
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
        <label for='ADDRESS' class='form-label'>ADDRESS</label>
        <input type='text' class='form-control' id='ADDRESS' name='ADDRESS'
          placeholder='Enter the address' autocomplete='off' value=<?php
          echo $ADDRESS;
          ?>
          >
      </div>
      <div class='mb-3'>
        <label for='ROLE' class='form-label'>ROLE</label>
        <input type='text' class='form-control' id='ROLE' name='ROLE'
          placeholder='Enter the role' autocomplete='off' value=<?php
          echo $ROLE;
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