<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>

  <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/6469/6469034.png" type="image/x-icon">
    <link rel="stylesheet" href="style1.css">
    <title>Bus Ticket Booking</title>
</head>
    <body>
    <div id="main">
        <div class="container">
            <div class="table1">

 <tb>
     <table class="table table-dark table-striped">
         <thead><th scope="col"></th>
         <th scope="col"></th>
         <th scope="col"></th>
         <th scope="col"></th>
         <th scope="col"><strong>BUS TICKET</strong></th>
         <th scope="col"></th>
         <th scope="col"></th>
        </thead>
  <thead>
    <tr>
      <th scope="col">TICKET ID</th>
      <th scope="col">BUS ID</th>
      <th scope="col">SOURCE</th>
      <th scope="col">DESTINATION</th>
     <th scope="col">TOTAL AMOUNT</th>
     <th scope="col">DATE AND TIME</th>
     <th scope="col">OPERATION</th>
     
    </tr>
<?php
$BILL_ID=$_GET['billid'];

 $sql="SELECT * FROM `ticket` WHERE `TICKET_ID`='$BILL_ID'";
 $result=mysqli_query($con,$sql);
 if($result){
     while($row=mysqli_fetch_assoc($result)) {
             $TICKET_ID=$row['TICKET_ID'];
             $BUS_ID=$row['BUS_ID'];
             $SOURCE=$row['SOURCE'];
             $DESTINATION=$row['DESTINATION'];
             $PRICE=$row['PRICE'];
             $NUM_OF_PASSENGERS=$row['NUM_OF_PASSENGERS'];
             $DATE_TIME=$row['DATE_TIME'];
             $TOTAL_AMOUNT=($PRICE*$NUM_OF_PASSENGERS);
           
            
             
            
            echo '<tr>
            <th scope="row">'.$TICKET_ID.'</th>
            <td>'.$BUS_ID.'</td>
            <td>'.$SOURCE.'</td>
            <td>'.$DESTINATION.'</td>
            <td>'.$TOTAL_AMOUNT.'</td>
            <td>'.$DATE_TIME.'</td>
            
           
            <td>
            <button onclick="window.print()"  class="btn btn-danger">Print</button>
            
            </td>
            
          </tr>';
     }
     }
   
?>

  </thead>
 
  <tbody>
            </div>
        </div>  
    </div>
</body>

</html>
 