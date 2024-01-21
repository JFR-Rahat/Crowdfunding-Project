<?php
session_start();

if(isset($_POST["fundedSuccessfulProjects"])){
    $fundedSuccessfulProjects = json_decode($_POST["fundedSuccessfulProjects"]);
    print_r($fundedSuccessfulProjects);
    $_SESSION["fundedSuccessfulProjects"] = $fundedSuccessfulProjects;
}
else{
    echo "Funded Successful Project Collection Problem";
}
?>