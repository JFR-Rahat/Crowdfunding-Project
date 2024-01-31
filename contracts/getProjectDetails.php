<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php

    session_start();

    // if(!isset($_SESSION["user"])){
        
    //     header("location:../client/user/userDashboard.php?userLogin=false");
    // }

    if(isset($_GET['id'])){
        $projectId = $_GET['id'];
        // echo $projectId;
    }

    include_once("contractConnect.php");

?>

<script>

const getProjectDetails = async function() {
    console.log("Button Click event still ongoing");
    try {
        const ethAccounts = await provider.send("eth_requestAccounts", []).then(() => {
            provider.listAccounts().then((accounts) => {
                signer = provider.getSigner(accounts[0]);
                contract = new ethers.Contract(contractAddress, contractABI, signer);
                
            });
        });

        // console.log(signer._address);
        projectIndex = [<?php echo $projectId;?>];
        console.log("Projects Index: " + projectIndex);

        project = await contract.getProjectsDetail(projectIndex);

        contributorInfo = await contract.getProjectContributors(projectIndex[0]);
        
        let contributorInfoList = [];

        contributorInfo.forEach(function (item) {
            let address = item.contributorAddress;
            let amount = item.totalAmount.toString();
            console.log(address);
            console.log(amount);
            
            let serializedItem = {
                address: address,
                amount: amount
            };

            contributorInfoList.push(serializedItem);
        });

        // console.log(contributorInfoList);

        // console.log(contributorInfo);

        var passProjectDetails = new Array();

        project.map((item)=>{
            var projectList = {};
            projectList.projectTitle= item[0];
            projectList.projectStory = item[1];
            projectList.projectOwnerName = item[2];
            projectList.projectOwnerAddress = item[3];
            projectList.projectId = item[4].toString();
            projectList.projectFundingGoal = item[5].toString();
            projectList.projectAmountRaised = item[6].toString();
            projectList.projectTotalContributors = item[7].toString();
            projectList.projectEndTime = item[8].toString();
            projectList.projectStartTime = item[9].toString();
            projectList.projectCategory = item[10];
            projectList.projectPhotoDir = item[11];
            projectList.projectClaimedFund = item[12];
            projectList.projectContributorsInfo = contributorInfoList;

            passProjectDetails.push(projectList);
            console.log(projectList);
        });

        $.ajax({
            type: "POST",
            url: "setProjectDetails.php",
            data: {'projectDetails': JSON.stringify(passProjectDetails)},
            // data : {'ownerProjects': },
            success: function(projectDetails){
                console.log("Succeed to send projectDetails: ", projectDetails);
            }
        });

        window.location = "../client/user/viewProject.php?id="+projectIndex[0];
        // console.log("P: ", passOwnerProjects);

        
		
    } catch (error) {
        console.log("User rejected the request.");
    }
}


setTimeout(function(){
    getProjectDetails();
}, 1000);

// document.querySelector("#btn").addEventListener("click", getOwnerProject);


</script>

