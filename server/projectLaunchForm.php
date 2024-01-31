<?php
if(isset($_POST['launchProject'])){

    include_once("databaseConnect.php");
    extract($_POST);

    $sql = "SELECT MAX(Id) AS LastInsertedId FROM projectlaunchrequest";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_array($result);
        $lastId = $row['LastInsertedId'];
    }

    $projectPhotoName = $_FILES["projectPhoto"]["name"];
    $projectPhotoTmp = $_FILES["projectPhoto"]["tmp_name"];

    $projectPhotoDir = "projectPhotos/".($lastId+1)." - ".$projectTitle.".jpg";

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


    $projectLaunchPending = 1;

    
    $insert = "INSERT INTO `projectlaunchrequest`(`ownerName`, `ownerAddress`, `projectTitle`, `projectCategory`, `projectStory`, `projectPhotodir`, `fundingGoal`, `campaignDuration`, `projectLaunchPending`) 
                    VALUES('$ownerName', '$ownerAddress', '$projectTitle', '$projectCategory', '$projectStory', '$projectPhotoDir', '$fundingGoal', '$campaignDuration', '$projectLaunchPending')";

    // echo $insert;

    // // echo $insert;
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
