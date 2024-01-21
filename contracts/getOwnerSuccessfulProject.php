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
        ownerProjectsIndex = await contract.getCreatorProjects(signer._address);
        // console.log("Projects Index: " + ownerProjectsIndex);

        ownerProjects = await contract.getProjectsDetail(ownerProjectsIndex);

        // ownerProjects.map(item=>console.log(item.projectName));
        var passOwnerSuccessfulProjects = new Array();
        console.log(ownerProjects);

        ownerProjects.map((item)=>{
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

            let currentTime = Math.floor(new Date().getTime() / 1000);
            // var currentTime = 100000;
            console.log("Raised: ",parseInt(projectList.projectAmountRaised));
            console.log("Goal: ", parseInt(projectList.projectFundingGoal));
            console.log("End: ", parseInt(projectList.projectEndTime));
            console.log("Curr: ", currentTime);
            console.log("Time: ", new Date());

            if(parseInt(projectList.projectAmountRaised) >= parseInt(projectList.projectFundingGoal) && (currentTime >= projectList.projectEndTime) && projectList.projectClaimedFund == false){
                passOwnerSuccessfulProjects.push(projectList);
                // console.log("Hello");
            }
            else{
                // console.log("Failed");
            }
                
        });

        // console.log("Projects: ", passOwnerProjects);
        if(passOwnerSuccessfulProjects.length == 0){

            passOwnerSuccessfulProjects.push("Empty");
        }

        $.ajax({
            type: "POST",
            url: "setOwnerSuccessfulProjects.php",
            data: {'ownerSuccessfulProjects': JSON.stringify(passOwnerSuccessfulProjects)},
            // data : {'ownerProjects': },
            success: function(ownerSuccessfulProjects){
                console.log("Succeed to send ownerProjects: ", passOwnerSuccessfulProjects);
            }
        });

        window.location = "../client/user/successfulProject.php";
        // console.log("P: ", passOwnerProjects);

        
		
    } catch (error) {
        console.log("User rejected the request.");
    }
}


setTimeout(function(){
    getOwnerSuccessfulProject();
}, 1000);

// document.querySelector("#btn").addEventListener("click", getOwnerProject);


</script>

