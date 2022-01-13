<?php
$server="localhost";
$username="root";
$password="";
$db="bus-ticket-booking";
$con=mysqli_connect($server,$username,$password,$db);
if(!$con){
    die("Connection failed with error ".mysqli_connect_error());
}
?>