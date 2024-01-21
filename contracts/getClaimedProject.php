<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php

    session_start();

    if(!isset($_SESSION["user"])){
        
        header("location:../client/user/userDashboard.php?userLogin=false");
    }

    include_once("contractConnect.php");

?>

<script>

const getOwnerSuccessfulProject = async function() {
    console.log("Button Click event still ongoing");
    try {
        const ethAccounts = await provider.send("eth_requestAccounts", []).then(() => {
            provider.listAccounts().then((accounts) => {
                signer = provider.getSigner(accounts[0]);
                contract = new ethers.Contract(contractAddress, contractABI, signer);
                
            });
        });

        // console.log(signer._address);
        ownerClaimedProjectsIndex = await contract.getCreatorClaimedProjects(signer._address);
        // console.log("Projects Index: " + ownerClaimedProjectsIndex);

        ownerClaimedProjects = await contract.getProjectsDetail(ownerClaimedProjectsIndex);

        // ownerProjects.map(item=>console.log(item.projectName));
        var passOwnerClaimedProjects = new Array();
        console.log(ownerClaimedProjects);

        ownerClaimedProjects.map((item)=>{
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

            passOwnerClaimedProjects.push(projectList);
                // console.log("Hello");        
        });

        // console.log("Projects: ", passownerClaimedProjects);
        if(passOwnerClaimedProjects.length == 0){

            passOwnerClaimedProjects.push("Empty");
        }

        $.ajax({
            type: "POST",
            url: "setClaimedProject.php",
            data: {'ownerClaimedProjects': JSON.stringify(passOwnerClaimedProjects)},
            // data : {'ownerClaimedProjects': },
            success: function(ownerSuccessfulProjects){
                console.log("Succeed to send ownerClaimedProjects: ", passOwnerClaimedProjects);
            }
        });

        window.location = "../client/user/claimedProject.php";
        // console.log("P: ", passownerClaimedProjects);

        
		
    } catch (error) {
        console.log("User rejected the request.");
    }
}


setTimeout(function(){
    getOwnerSuccessfulProject();
}, 1000);

// document.querySelector("#btn").addEventListener("click", getOwnerProject);


</script>

