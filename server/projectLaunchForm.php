<?php
if(isset($_POST['launchProject'])){

    include_once("databaseConnect.php");
    extract($_POST);

    $projectPhotoName = $_FILES["projectPhoto"]["name"];
    $projectPhotoTmp = $_FILES["projectPhoto"]["tmp_name"];

    $projectPhotoDir = "projectPhotos/".$projectTitle.".jpg";

    if(move_uploaded_file($projectPhotoTmp, $projectPhotoDir)){
        echo "";
    }
    else{
        echo "Error";
    }

    if(empty($ownerName) || empty($projectTitle) || empty($projectStory) || empty($fundingGoal) || empty($campaignDuration)){
        ?>
        <script>
            window.alert("Fields can't be empty");
            window.location = "../client/pages/start_project.php";
        </script>
        <?php
        exit();
    }

    if(!preg_match("/^[a-zA-Z ]*$/", $ownerName)){
        ?>
        <script>
            window.alert("Owner's name field should only contain alphabets & spaces");
            window.location = "../client/pages/start_project.php";
        </script>
        <?php
        exit();
    }
    
    if(!preg_match("/^[a-zA-Z ]*$/", $projectTitle)){
        ?>
        <script>
            window.alert("Project Title field should only contain alphabets & whitespace");
            window.location = "../client/pages/start_project.php";
        </script>
        <?php
        exit();
    }

    if(!preg_match("/^[a-zA-Z., ]*$/", $projectStory)){
        ?>
        <script>
            window.alert("Project Story field should only contain alphabets & whitespace & punctuations");
            window.location = "../client/pages/start_project.php";
        </script>
        <?php
        exit();
    }

    $projectLaunchPending = 1;
    
    $insert = "INSERT INTO `projectlaunchrequest`(`ownerName`, `projectTitle`, `projectCategory`, `projectStory`, `projectPhotodir`, `fundingGoal`, `campaignDuration`, `projectLaunchPending`) 
                    VALUES('$ownerName', '$projectTitle', '$projectCategory', '$projectStory', '$projectPhotoDir', '$fundingGoal', '$campaignDuration', '$projectLaunchPending')";

    // echo $insert;
    if(mysqli_query($conn, $insert)){
        header("location:../client/pages/index.php?projectLaunchPending=true");
    }
    else{
        echo "Error inserting"; 
    }
}
else{
    header("location:../client/pages/index.php");
}

?>
