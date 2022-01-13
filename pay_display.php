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
    <title>Bus Ticket Booking</title>
</head>
<body>
    <div class="container">
    <button class='btn btn-primary my-5'><a href="pay_insert.php" class="text-light">Add Payment</a></button>
    <table class="table table-dark table-striped">
  <thead>
    <tr>
    <th scope="col">PAYMENT ID</th>
    <th scope="col">CUSTOMER ID</th>
      <th scope="col">BUS ID</th>
      <th scope="col">DATE AND TIME</th>
      <th scope="col">AMOUNT</th>
      <th scope="col">OPERATIONS</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql="Select * from `payment`";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $PAYMENT_ID=$row['PAYMENT_ID'];
        $CUST_ID=$row['CUST_ID'];
        $BUS_ID=$row['BUS_ID'];
        $DATE=$row['DATE'];
        $AMOUNT=$row['AMOUNT'];
        echo '<tr>
        <th scope="row">'.$PAYMENT_ID.'</th>
        <td>'.$CUST_ID.'</td>
        <td>'.$BUS_ID.'</td>
        <td>'.$DATE.'</td>
        <td>'.$AMOUNT.'</td>
        <td>
            <button class="btn btn-primary"><a href="pay_update.php?updateid='.$PAYMENT_ID.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="pay_delete.php?deleteid='.$PAYMENT_ID.'" class="text-light">Delete</a></button>
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