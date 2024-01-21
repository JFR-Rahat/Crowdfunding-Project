<?php
session_start();

if(isset($_POST["allProjects"])){
    $allProjects = json_decode($_POST["allProjects"]);
    print_r($ownerProjects);
    $_SESSION["allProjects"] = $allProjects;
}
else{
    echo "All Project Collection Problem";
}
?>