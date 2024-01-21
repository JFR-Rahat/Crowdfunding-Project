<?php
session_start();

if(isset($_POST["projectDetails"])){
    $projectDetails = json_decode($_POST["projectDetails"]);
    print_r($projectDetails);
    $_SESSION["projectDetails"] = $projectDetails;
}
else{
    echo "Project Details Collection Problem";
}
?>