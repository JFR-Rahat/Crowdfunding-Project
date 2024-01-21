<?php
session_start();

if(isset($_POST["ownerSuccessfulOngoigProjects"])){
    $ownerSuccessfulOngoigProjects = json_decode($_POST["ownerSuccessfulOngoigProjects"]);
    print_r($ownerSuccessfulOngoigProjects);
    $_SESSION["ownerSuccessfulOngoigProjects"] = $ownerSuccessfulOngoigProjects;
}
else{
    echo "Owner Successful Ongoing Project Collection Problem";
}
?>