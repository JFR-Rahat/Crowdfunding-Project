<link href="../client/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../client/assets/dist/js/bootstrap.bundle.min.js"></script>

<?php

    session_start();

    if(!isset($_SESSION["user"])){
        
        header("location:userDashboard.php?userLogin=false");
    }

    include_once("../server/databaseConnect.php");
    extract($_SESSION["user"]);

    if(isset($_GET["id"]))
        $id = $_GET["id"];

    $fetch = "SELECT * FROM `projects` WHERE id=$id";
    $result = mysqli_query($conn, $fetch);

    if($row = mysqli_fetch_assoc($result)){
        extract($row);
		// echo "Hello";

        $update = "UPDATE `projects` SET projectStatus=1 WHERE id=$id";
        if(mysqli_query($conn, $update)){
            echo "";
        }
        else{
            echo "Update Error".mysqli_error($conn);
        }

		$project = json_encode($row);
		echo "<script>var project = $project;</script>"

        ?>

<script>
$(document).ready(function() {
    $("#exampleModalCenter").modal('show');
});
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-auto" id="exampleModalLongTitle">Do you really want to launch the project?
                </h5>
            </div>
            <div class="modal-body">
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="launchBtn">Yes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

	include_once("contractConnect.php");
?>

<script>
const launchProject = async function() {
    console.log("Button Click event still ongoing");
    try {
        const ethAccounts = await provider.send("eth_requestAccounts", []).then(() => {
            provider.listAccounts().then((accounts) => {
                signer = provider.getSigner(accounts[0]);
                contract = new ethers.Contract(contractAddress, contractABI, signer);
            });
        });

        await contract.createNewProject(project["projectTitle"], project["projectStory"], project[
                "ownerName"], project["projectPhotoDir"], project["fundingGoal"],
            project["projectEndTime"], project["projectStartTime"], project["projectCategory"]);
        

        window.location = "getOwnerProject.php?launchSuccess=true";

    } catch (error) {
        console.log("User rejected the request.");
        window.location = "../client/user/approvedProject.php?launchError=true&id=" + project["id"];
    }
}

document.querySelector("#launchBtn").addEventListener("click", launchProject);
</script>

<?php
    }
    else{
        echo "Fetch Fault";
    }
?>