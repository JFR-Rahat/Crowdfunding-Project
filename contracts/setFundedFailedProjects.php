<?php
session_start();

if(isset($_POST["fundedFailedProjects"])){
    $fundedFailedProjects = json_decode($_POST["fundedFailedProjects"]);
    print_r($fundedFailedProjects);
    $_SESSION["fundedFailedProjects"] = $fundedFailedProjects;
}
else{
    echo "Funded Failed Project Collection Problem";
}
?>