<?php
$NOTIFICATION=false;
include 'connect.php';
if(isset($_POST['submit'])){
$BUS_ID=$_POST['BUS_ID'];
$CUST_ID=$_POST['CUSTOMER_ID'];
$SOURCE=$_POST['SOURCE'];
$DESTINATION=$_POST['DESTINATION'];
$PRICE=$_POST['PRICE'];
$NUM_OF_PASSENGERS=$_POST['NUM_OF_PASSENGERS'];
$SQL2="SELECT `SEATS_LEFT` FROM `routes` WHERE `routes`.`BUS_ID`='$BUS_ID';";
$result=mysqli_query($con,$SQL2);
$row=mysqli_fetch_assoc($result);
$SEATS_LEFT=$row['SEATS_LEFT'];
$ANS=($SEATS_LEFT-$NUM_OF_PASSENGERS);

$SQL3="SELECT `PRICE` FROM `routes` WHERE `routes`.`BUS_ID`='$BUS_ID';";
$result1=mysqli_query($con,$SQL3);
$row1=mysqli_fetch_assoc($result1);
$PRICE2=$row1['PRICE'];

if($NUM_OF_PASSENGERS<=0 || $PRICE<=0){
  $NOTIFICATION="<p>Enter a positive number</p>";
  }
  else{
    if($ANS<0){
      $NOTIFICATION="Required quantity of seats not availablle";
    }
    else{
    if($PRICE>$PRICE2){
      $NOTIFICATION="Price should be lower than or equal to ".$PRICE2;
    }
    else{
    if(strtolower($SOURCE)==strtolower($DESTINATION)){
      $NOTIFICATION="<p>Enter different source and destination</p>";
      }
      else{
      $sql="INSERT INTO `ticket` (`BUS_ID`,`CUSTOMER_ID`,`SOURCE`,`DESTINATION`,`PRICE`,`NUM_OF_PASSENGERS`,`DATE_TIME`) VALUES ('$BUS_ID','$CUST_ID','$SOURCE','$DESTINATION','$PRICE','$NUM_OF_PASSENGERS',current_timestamp())";
      $sql1="UPDATE `routes` SET `SEATS_LEFT` = '$ANS' WHERE `routes`.`BUS_ID` = '$BUS_ID'";
      $result1=mysqli_query($con,$sql1);
      $result=mysqli_query($con,$sql);
      if($result){
        header('location:ticket_display.php');
      }
      else{
        $NOTIFICATION="Please give proper input!!!";
        // die('Connection failed with error'.mysqli_connect_error());
          }
        }
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
      <a class="navbar-brand" href="index.php"><strong><img
            src="https://cdn-icons.flaticon.com/png/512/3066/premium/3066259.png?token=exp=1643485325~hmac=761a3a37424b1bb74ee71f64a4e63f98"
            width="35px">Bus Ticket Booking</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" aria-current="page" href="display.php">Bus</a>
          <a class="nav-link" href="emp_display.php">Employee</a>
          <a class="nav-link" href="routes_display.php">Routes</a>
          <a class="nav-link" href="cust_display.php">Customers</a>
          <a class="nav-link active" href="ticket_display.php">Ticket</a>
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
      <?php
          echo $NOTIFICATION;
      ?>

      <div class='dropdown1'>

        <label for='BUS_ID' class='form-label'>BUS ID</label>
        <!-- <input type='text' class='form-control' id='BUS_ID' name='BUS_ID'
          placeholder='Enter the bus id from bus table' autocomplete='off' required> -->
        <div>
          <select name="BUS_ID" id="BUS_ID" required>
            <option selected disabled>Select a Bus ID</option>
            <?php
          $sql="Select `BUS_ID` from `bus`";
          $result=mysqli_query($con,$sql);
          if($result){
          while($row=mysqli_fetch_assoc($result)){
          $BUS_ID=$row['BUS_ID'];
          echo'
          
            <option name="BUS_ID" value='.$BUS_ID.'>'.$BUS_ID.'</option>
          ';
          }
        }
          ?>
          </select>
        </div>
      </div>

      <!-- <div class='mb-3'>
        <label for='CUST_ID' class='form-label'>CUST_ID</label>
        <input type='text' class='form-control' id='CUST_ID' name='CUST_ID' placeholder='Enter the Customer ID'
          autocomplete='off' required>
      </div> -->

      <div class='dropdown1'>

        <label for='CUSTOMER_ID' class='form-label'>CUSTOMER ID</label>
        <div>
          <select name="CUSTOMER_ID" id="CUSTOMER_ID" required>
            <option selected disabled>Select a Customer ID</option>
            <?php
        $sql="Select `CUST_ID` from `customer`";
        $result=mysqli_query($con,$sql);
        if($result){
        while($row=mysqli_fetch_assoc($result)){
        $CUSTOMER_ID=$row['CUST_ID'];
        echo'<option name="CUSTOMER_ID" value='.$CUSTOMER_ID.'>'.$CUSTOMER_ID.'</option>';
        }
        }
        ?>
          </select>
        </div>
      </div>



      <div class='mb-3'>
        <label for='SOURCE' class='form-label'>SOURCE</label>
        <input type='text' class='form-control' id='SOURCE' name='SOURCE' placeholder='Enter the source of passenger'
          autocomplete='off' required>
      </div>
      <div class='mb-3'>
        <label for='DESTINATION' class='form-label'>DESTINATION</label>
        <input type='text' class='form-control' id='DESTINATION' name='DESTINATION'
          placeholder='Enter the destination of passenger' autocomplete='off' required>
      </div>
      <div class='mb-3'>
        <label for='PRICE' class='form-label'>PRICE</label>
        <input type='text' class='form-control' id='PRICE' name='PRICE' placeholder='Enter the price of each seat'
          autocomplete='off' required>
      </div>
      <div class='mb-3'>
        <label for='NUM_OF_PASSENGERS' class='form-label'>NUMBER OF PASSENGERS</label>
        <input type='text' class='form-control' id='NUM_OF_PASSENGERS' name='NUM_OF_PASSENGERS'
          placeholder='Enter the number of passengers' autocomplete='off' required>
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
?> 

        <div class="dropdown">
  <button class="btn btn-ligh dropdown-toggle" type="text" data-toggle="dropdown">Enter your bus id
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>



-->