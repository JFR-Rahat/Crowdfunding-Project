<?php

session_start();

if(isset($_POST['signin'])){
    
    include_once("databaseConnect.php");
    extract($_POST);

    $fetch = "SELECT * FROM admin WHERE adminUsername='$adminUsername' && adminPassword='$adminPassword'";
    $result = mysqli_query($conn, $fetch);
    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_assoc($result);
        extract($row);

        $_SESSION["admin"] = array("adminUsername" => $adminUsername);
        
        header("location:adminDashboard.php?loginSuccessfulMsg=true");
    }
    else{
        header("location:index.php?loginFailMsg=true");
    }
}
else{
    header("location:index.php");
}

?>