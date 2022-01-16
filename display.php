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
    <a class="navbar-brand" href="index.php"><strong><img src="https://cdn-icons.flaticon.com/png/512/3066/premium/3066259.png?token=exp=1642070562~hmac=bb849ef41d1064bf7c99b53f2c09f8c5" width="35px">Bus Ticket Booking</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="display.php">Bus</a>
        <a class="nav-link" href="emp_display.php">Employee</a>
        <a class="nav-link" href="routes_display.php">Routes</a>
        <a class="nav-link" href="cust_display.php">Customers</a>
        <a class="nav-link" href="pay_display.php">Payment</a>
      </div>
    </div>
  </div>
</nav>

    <div class="container">
    <button class='btn btn-primary my-5'><a href="insert.php" class="text-light">Add Bus</a></button>
    <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">BUS ID</th>
      <th scope="col">BUS TYPE</th>
      <th scope="col">NUMBER PLATE</th>
      <th scope="col">NUMBER OF SEATS</th>
      <th scope="col">OPERATIONS</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql="Select * from `bus`";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $BUS_ID=$row['BUS_ID'];
        $BUS_TYPE=$row['BUS_TYPE'];
        $NUM_PLATE=$row['NUM_PLATE'];
        $NUM_OF_SEATS=$row['NUM_OF_SEATS'];
        echo '<tr>
        <th scope="row">'.$BUS_ID.'</th>
        <td>'.$BUS_TYPE.'</td>
        <td>'.$NUM_PLATE.'</td>
        <td>'.$NUM_OF_SEATS.'</td>
        <td>
            <button class="btn btn-primary"><a href="update.php?updateid='.$BUS_ID.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="delete.php?deleteid='.$BUS_ID.'" class="text-light">Delete</a></button>
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