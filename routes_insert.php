<?php
include 'connect.php';
if(isset($_POST['submit'])){
$BUS_ID=$_POST['BUS_ID'];
$SOURCE=$_POST['SOURCE'];
$DESTINATION=$_POST['DESTINATION'];
$PRICE=$_POST['PRICE'];
$TIMINGS=$_POST['TIMINGS']; 
$sql="INSERT INTO `routes` (`BUS_ID`, `SOURCE`, `DESTINATION`,`PRICE`,`TIMINGS`) VALUES ('$BUS_ID', '$SOURCE', '$DESTINATION','$PRICE','$TIMINGS')";

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

  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>

  <title>Bus Ticket Booking Management System</title>
</head>

<body>
  <h1>Add a route</h1>
  <div class='container my-5'>
    <form method='post'>
      <!-- <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID' placeholder='Enter the Bus ID'
          autocomplete='off'>
          <p>Don't give duplicate values</p>
      </div> -->
      <div class='mb-3'>
        <label for='BUS_ID' class='form-label'>BUS_ID</label>
        <input type='text' class='form-control' id='BUS_ID' name='BUS_ID' placeholder='Enter the bus id'
          autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='SOURCE' class='form-label'>SOURCE</label>
        <input type='text' class='form-control' id='SOURCE' name='SOURCE' placeholder='Enter the source'
          autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='DESTINATION' class='form-label'>DESTINATION</label>
        <input type='text' class='form-control' id='DESTINATION' name='DESTINATION'
          placeholder='Enter the destination' autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='PRICE' class='form-label'>PRICE</label>
        <input type='text' class='form-control' id='PRICE' name='PRICE'
          placeholder='Enter the price' autocomplete='off'>
      </div>
      <div class='mb-3'>
        <label for='TIMINGS' class='form-label'>TIMINGS</label>
        <input type='text' class='form-control' id='TIMINGS' name='TIMINGS'
          placeholder='Enter the bus timings' autocomplete='off'>
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

