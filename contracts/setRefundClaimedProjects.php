<?php
session_start();

if(isset($_POST["refundClaimedProjects"])){
    $refundClaimedProjects = json_decode($_POST["refundClaimedProjects"]);
    print_r($refundClaimedProjects);
    $_SESSION["refundClaimedProjects"] = $refundClaimedProjects;
}
else{
    echo "Project Details Collection Problem";
}
?>