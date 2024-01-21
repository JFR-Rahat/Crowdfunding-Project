<?php

date_default_timezone_set('Asia/Dhaka');

$conn = mysqli_connect("localhost", "root", "", "crowdfunding");

if(!$conn){
    die("Error connecting".mysqli_connect_error());
}   

?>