<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <a class="nav-link" href="cust_display.php">Customers</a>
        <a class="nav-link active" href="ticket_display.php">Ticket</a>
      </div>
    </div>
  </div>
</nav>

    <div class="container">
    <button class='btn btn-primary my-5'><a href="ticket_insert.php" class="text-light">Book Ticket</a></button>
    <table class="table table-dark table-striped">
  <thead>
    <tr>
    <th scope="col">TICKET ID</th>
    <th scope="col">BUS ID</th>
    <th scope="col">CUSTOMER ID</th>
      <th scope="col">SOURCE</th>
      <th scope="col">DESTINATION</th>
      <th scope="col">TOTAL AMOUNT</th>
      <th scope="col">DATE AND TIME</th>
      <th scope="col">OPERATIONS</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql="Select * from `ticket`";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $TICKET_ID=$row['TICKET_ID'];
        $BUS_ID=$row['BUS_ID'];
        $CUST_ID=$row['CUSTOMER_ID'];
        $SOURCE=$row['SOURCE'];
        $DESTINATION=$row['DESTINATION'];
        $DATE=$row['DATE_TIME'];
        $PRICE=$row['PRICE'];
        $NUM_OF_PASSENGERS=$row['NUM_OF_PASSENGERS'];
        echo '<tr>
        <th scope="row">'.$TICKET_ID.'</th>
        <td>'.$BUS_ID.'</td>
        <td>'.$CUST_ID.'</td>
        <td>'.$SOURCE.'</td>
        <td>'.$DESTINATION.'</td>
        <td>'.($PRICE*$NUM_OF_PASSENGERS).'</td>
        <td>'.$DATE.'</td>
        <td>
            <button class="btn btn-primary"><a href="ticket_update.php?updateid='.$TICKET_ID.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="ticket_delete.php?deleteid='.$TICKET_ID.'&busid='.$BUS_ID.'" class="text-light">Delete</a></button>
            <button class="btn btn-success"><a  href="bill.php?billid='.$TICKET_ID.'" class="text-light">Generate Ticket</a></button>
        
        </td>
      </tr>';
    }
}

?>

  </tbody>
</table>
</div>
</body>
</html>

<!-- <button class="btn btn-primary"><a href="sms.php?smsid='.$TICKET_ID.'" class="text-light">Send SMS</a></button> -->

