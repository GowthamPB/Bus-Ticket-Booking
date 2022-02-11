<?php
      include 'connect.php';
      $ID=$_GET['smsid'];
      $sql="SELECT * FROM `ticket` WHERE `TICKET_ID`='$ID'";
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

          }
        }
        $SQL1="SELECT `PHONE` FROM `customer` WHERE `customer`.`BUS_ID`='$BUS_ID'";
$result1=mysqli_query($con,$SQL1);
$row1=mysqli_fetch_assoc($result1);
$PHONE=$row1['PHONE'];
          


// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC746e449c71e46d656132479c02a6752e';
$token = '35843a55d416696205af9a4c34022311';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '$PHONE',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+18065152179',
        // the body of the text message you'd like to send
        'body' => 'Hey Jenny! Good luck on the bar exam!'
    ]
);
?>