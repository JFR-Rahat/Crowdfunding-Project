<?php

  session_start();

  if(isset($_SESSION["admin"])){

    $id = $_GET["id"];

    include_once("databaseConnect.php");

    $fetch = "SELECT * FROM `projectLaunchRequest` WHERE id=$id";
    $fetchResult = mysqli_query($conn, $fetch);

    if($row = mysqli_fetch_assoc($fetchResult)){

        extract($row);

        $projectStartTime = time();
        $projectEndTime = strtotime("$campaignDuration days", $projectStartTime);
        $projectStatus = 0;

        $insert = "INSERT INTO `projects`(`ownerName`, `projectTitle`, `projectCategory`, `projectStory`, `projectPhotoDir`, `fundingGoal`, `projectStartTime`, `projectEndTime`, `projectStatus`) 
                    VALUES ('$ownerName','$projectTitle','$projectCategory','$projectStory','$projectPhotoDir','$fundingGoal','$projectStartTime','$projectEndTime','$projectStatus')";

        if(mysqli_query($conn, $insert)){

            $update = "UPDATE `projectLaunchRequest`
                            SET projectLaunchPending=0
                                WHERE id=$id";

            if(mysqli_query($conn, $update)){
                echo "";
                header("location: approvedProject.php?approvedProjectId=$id");
            }
            else{
                echo "Error Updating";
            }
        }
        else{
            echo "Error Inserting Into Projects Table";
        }

    }
    else{
        echo "Error Updating";
    }
  }
  else{
    header("location: index.php");
  }

  
?>