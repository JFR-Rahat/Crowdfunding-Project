<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php

    session_start();

    if(!isset($_SESSION["user"])){
        
        header("location:../client/user/userDashboard.php?userLogin=false");
    }

    include_once("contractConnect.php");

?>

<script>

const getOwnerProject = async function() {
    console.log("Button Click event still ongoing");
    try {
        const ethAccounts = await provider.send("eth_requestAccounts", []).then(() => {
            provider.listAccounts().then((accounts) => {
                signer = provider.getSigner(accounts[0]);
                contract = new ethers.Contract(contractAddress, contractABI, signer);
                
            });
        });
                
        // console.log(signer._address);
        refundClaimedProjectIndex = await contract.getUserRefundClaimedLIst(signer._address);
        console.log("Projects Index: ", refundClaimedProjectIndex);


        refundClaimedProjects = await contract.getProjectsDetail(refundClaimedProjectIndex);

        // fundedProjects.map(item=>console.log(item.projectName));
        var passRefundClaimedProjects = new Array();
        console.log(refundClaimedProjects);
        refundClaimedProjects.map((item)=>{
            console.log("hello");
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

            console.log(projectList);

            passRefundClaimedProjects.push(projectList);
        });

        // console.log("Projects: ", passRefundClaimedProjects);
        if(passRefundClaimedProjects.length == 0){

            passRefundClaimedProjects.push("Empty");
        }

        $.ajax({
            type: "POST",
            url: "setRefundClaimedProjects.php",
            data: {'refundClaimedProjects': JSON.stringify(passRefundClaimedProjects)},
            // data : {'fundedProjects': },
            success: function(refundClaimedProjects){
                console.log("Succeed to send ownerProjects: ", passRefundClaimedProjects);
            }
        });

        window.location = "../client/user/refundClaimedProject.php";
        // console.log("P: ", passRefundClaimedProjects);

        
		
    } catch (error) {
        console.log("User rejected the request.");
    }
}


setTimeout(function(){
    getOwnerProject();
}, 1000);

// document.querySelector("#btn").addEventListener("click", getOwnerProject);


</script>

