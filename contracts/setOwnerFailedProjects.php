<?php
session_start();

if(isset($_POST["ownerFailedProjects"])){
    $ownerProjects = json_decode($_POST["ownerFailedProjects"]);
    print_r($ownerProjects);
    $_SESSION["ownerFailedProjects"] = $ownerProjects;
}
else{
    echo "Owner Failed Project Collection Problem";
}
?>