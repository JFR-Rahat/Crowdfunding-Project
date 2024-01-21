<?php
session_start();

if(isset($_POST["ownerSuccessfulProjects"])){
    $ownerProjects = json_decode($_POST["ownerSuccessfulProjects"]);
    print_r($ownerProjects);
    $_SESSION["ownerSuccessfulProjects"] = $ownerProjects;
}
else{
    echo "Owner Successful Project Collection Problem";
}
?>