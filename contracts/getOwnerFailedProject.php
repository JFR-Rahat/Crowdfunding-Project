<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php

    session_start();

    if(!isset($_SESSION["user"])){
        
        header("location:../client/user/userDashboard.php?userLogin=false");
    }

    include_once("contractConnect.php");

?>

<script>

const getOwnerFailedProject = async function() {
    console.log("Button Click event still ongoing");
    try {
        const ethAccounts = await provider.send("eth_requestAccounts", []).then(() => {
            provider.listAccounts().then((accounts) => {
                signer = provider.getSigner(accounts[0]);
                contract = new ethers.Contract(contractAddress, contractABI, signer);
                
            });
        });

        // console.log(signer._address);
        ownerProjectsIndex = await contract.getCreatorProjects(signer._address);
        // console.log("Projects Index: " + ownerProjectsIndex);

        ownerProjects = await contract.getProjectsDetail(ownerProjectsIndex);

        // ownerProjects.map(item=>console.log(item.projectName));
        var passOwnerFailedProjects = new Array();


        ownerProjects.map(async (item)=>{
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
            
            let currentTime = Math.floor(new Date().getTime() / 1000);
            
            let refundClaimed = await contract.checkRefundClaim(projectList.projectId);

            if((parseInt(projectList.projectEndTime) <= currentTime) && (parseInt(projectList.projectAmountRaised) < parseInt(projectList.projectFundingGoal)) && !refundClaimed){
                passOwnerFailedProjects.push(projectList);
            }
            else{
                // console.log("Failed");
            }
                
        });

        // console.log("Projects: ", passOwnerProjects);
        if(passOwnerFailedProjects.length == 0){

            passOwnerFailedProjects.push("Empty");
        }

        $.ajax({
            type: "POST",
            url: "setOwnerFailedProjects.php",
            data: {'ownerFailedProjects': JSON.stringify(passOwnerFailedProjects)},
            // data : {'ownerProjects': },
            success: function(ownerFailedProjects){
                console.log("Succeed to send ownerFailedProjects: ", passOwnerFailedProjects);
            }
        });

        window.location = "../client/user/failedProject.php";
        // console.log("P: ", passOwnerProjects);

        
		
    } catch (error) {
        console.log("User rejected the request.");
    }
}


setTimeout(function(){
    getOwnerFailedProject();
}, 1000);

// document.querySelector("#btn").addEventListener("click", getOwnerProject);


</script>

