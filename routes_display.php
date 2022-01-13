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
    <button class='btn btn-primary my-5'><a href="routes_insert.php" class="text-light">Add route</a></button>
    <table class="table table-dark table-striped">
  <thead>
    <tr>
    <th scope="col">ROUTE ID</th>
      <th scope="col">BUS ID</th>
      <th scope="col">SOURCE</th>
      <th scope="col">DESTINATION</th>
      <th scope="col">PRICE</th>
      <th scope="col">TIMINGS</th>
      <th scope="col">OPERATIONS</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql="Select * from `routes`";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $ROUTE_ID=$row['ROUTE_ID'];
        $BUS_ID=$row['BUS_ID'];
        $SOURCE=$row['SOURCE'];
        $DESTINATION=$row['DESTINATION'];
        $PRICE=$row['PRICE'];
        $TIMINGS=$row['TIMINGS'];
        echo '<tr>
        <th scope="row">'.$ROUTE_ID.'</th>
        <td>'.$BUS_ID.'</td>
        <td>'.$SOURCE.'</td>
        <td>'.$DESTINATION.'</td>
        <td>'.$PRICE.'</td>
        <td>'.$TIMINGS.'</td>
        <td>
            <button class="btn btn-primary"><a href="routes_update.php?updateid='.$ROUTE_ID.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="routes_delete.php?deleteid='.$ROUTE_ID.'" class="text-light">Delete</a></button>
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