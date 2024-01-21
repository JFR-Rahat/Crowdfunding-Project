<?php
session_start();

if(isset($_POST["ownerProjects"])){
    $ownerProjects = json_decode($_POST["ownerProjects"]);
    print_r($ownerProjects);
    $_SESSION["ownerProjects"] = $ownerProjects;
}
else{
    echo "Owner Project Collection Problem";
}
?>