<?php
session_start();

if(isset($_POST["fundedOngoingProjects"])){
    $fundedOngoingProjects = json_decode($_POST["fundedOngoingProjects"]);
    print_r($fundedOngoingProjects);
    $_SESSION["fundedOngoingProjects"] = $fundedOngoingProjects;
}
else{
    echo "Funded Ongoing Project Collection Problem";
}
?>