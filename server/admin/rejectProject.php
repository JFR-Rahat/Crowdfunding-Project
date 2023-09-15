<?php

  session_start();

  if(isset($_SESSION["admin"])){

    $id = $_GET["id"];

    include_once("databaseConnect.php");

    $update = "UPDATE `projectLaunchRequest`
                    SET projectLaunchPending=-1
                        WHERE id=$id";

    if(mysqli_query($conn, $update)){
        echo "";
        header("location: pendingProject.php?rejectedProjectId=$id");
    }
    else{
        echo "Error Updating";
    }

  }
  else{
    header("location: index.php");
  }

  
?>