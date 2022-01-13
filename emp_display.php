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
    <button class='btn btn-primary my-5'><a href="emp_insert.php" class="text-light">Add Employee</a></button>
    <table class="table table-dark table-striped">
  <thead>
    <tr>
    <th scope="col">EMPLOYEE ID</th>
      <th scope="col">NAME</th>
      <th scope="col">PHONE</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">ROLE</th>
      <th scope="col">BUS ID</th>
      <th scope="col">OPERATIONS</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql="Select * from `employee`";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $EMP_ID=$row['EMP_ID'];
        $NAME=$row['NAME'];
        $PHONE=$row['PHONE'];
        $ADDRESS=$row['ADDRESS'];
        $ROLE=$row['ROLE'];
        $BUS_ID=$row['BUS_ID'];
        echo '<tr>
        <th scope="row">'.$EMP_ID.'</th>
        <td>'.$NAME.'</td>
        <td>'.$PHONE.'</td>
        <td>'.$ADDRESS.'</td>
        <td>'.$ROLE.'</td>
        <td>'.$BUS_ID.'</td>
        <td>
            <button class="btn btn-primary"><a href="emp_update.php?updateid='.$EMP_ID.'" class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="emp_delete.php?deleteid='.$EMP_ID.'" class="text-light">Delete</a></button>
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