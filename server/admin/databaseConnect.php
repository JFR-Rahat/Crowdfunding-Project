<?php

$conn = mysqli_connect("localhost", "root", "", "crowdfunding");

if(!$conn){
    die("Error connecting".mysqli_connect_error());
}   

?>