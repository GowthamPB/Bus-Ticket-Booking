<?php
include 'connect.php';
if(isset($_POST['submit'])){
$CUST_ID=$_POST['CUST_ID'];
$BUS_ID=$_POST['BUS_ID'];
$AMOUNT=$_POST['AMOUNT'];

$sql="INSERT INTO `payment` (`CUST_ID`,`BUS_ID`,`AMOUNT`) VALUES ('$CUST_ID','$BUS_ID','$AMOUNT')";

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

  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>

  <title>Bus Ticket Booking Management System</title>
</head>

<body>
  <h1>Add a payment</h1>
  <div class='container my-5'>
    <form action='' method='post'>
      <!-- <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID' placeholder='Enter the Bus ID'
          autocomplete='off'>
          <p>Don't give duplicate values</p>
      </div> -->
      <div class='mb-3'>
        <label for='CUST_ID' class='form-label'>CUST_ID</label>
        <input type='text' class='form-control' id='CUST_ID' name='CUST_ID' placeholder='Enter the Customer ID'
          autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID'
          placeholder='Enter the bus id from bus table' autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='AMOUNT' class='form-label'>AMOUNT</label>
        <input type='text' class='form-control' id='AMOUNT' name='AMOUNT' placeholder='Enter the amount'
          autocomplete='off'>
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

