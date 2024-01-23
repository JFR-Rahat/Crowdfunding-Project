<?php 

    session_start();

    if(!isset($_SESSION["user"])){

        header("location:userdashboard.php?userLogin=false");
    }

    if(isset($_GET['id'])){
        $projectId = $_GET['id'];
    }

    include_once("databaseConnect.php");

    $update1 = "UPDATE `projectLaunchRequest` SET projectLaunchPending=-1 WHERE id=$projectId";
    $update2 = "UPDATE `projects` SET projectStatus=-1 WHERE id=$projectId";

    $query1 = mysqli_query($conn, $update1);
    $query2 = mysqli_query($conn, $update2);

    if(!$query1 and !$query2){
        echo "Project Delete Failed.";
    }
    else{
        header("location:userDashboard.php");
    }

?>