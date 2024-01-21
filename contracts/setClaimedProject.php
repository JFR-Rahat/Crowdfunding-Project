<?php
session_start();

if(isset($_POST["ownerClaimedProjects"])){
    $ownerClaimedProjects = json_decode($_POST["ownerClaimedProjects"]);
    print_r($ownerClaimedProjects);
    $_SESSION["ownerClaimedProjects"] = $ownerClaimedProjects;
}
else{
    echo "Owner Claimed Project Collection Problem";
}
?>