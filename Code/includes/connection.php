<?php

$server = "localhost";
$username ="root";
$password ="";
$db ="network_info";

$conn =mysqli_connect($server,$username,$password,$db);

if(!$conn){
    die("CONNECTION FAILED:".mysqli_connect_error());
}
/*else{
    echo "DATABASE CONNECTED!!" ;
}*/
?>
