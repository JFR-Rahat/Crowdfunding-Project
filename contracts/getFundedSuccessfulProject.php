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
        fundedProjectsInfo = await contract.getUserFundings(signer._address);
        console.log("Projects Index: ", fundedProjectsInfo);

        fundedProjectsIndex = new Array();
        fundedProjectsInfo.forEach(item => {
            fundedProjectsIndex.push(item[0]);
        });
        console.log(fundedProjectsIndex);

        fundedProjects = await contract.getProjectsDetail(fundedProjectsIndex);

        // fundedProjects.map(item=>console.log(item.projectName));
        var passFundedSuccessfulProjects = new Array();
        let idx = 0;
        console.log(fundedProjects);
        fundedProjects.map((item)=>{
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
            projectList.projectMyFunding = fundedProjectsInfo[idx][1].toString();

            let currentTime = Math.floor(new Date().getTime() / 1000);

            if(parseInt(projectList.projectAmountRaised) >= parseInt(projectList.projectFundingGoal)){
                passFundedSuccessfulProjects.push(projectList);
                // console.log("Hello");
            }
            else{
                // console.log("Failed");
            }

            idx++;
        });

        // console.log("Projects: ", passFundedSuccessfulProjects);
        if(passFundedSuccessfulProjects.length == 0){

            passFundedSuccessfulProjects.push("Empty");
        }

        $.ajax({
            type: "POST",
            url: "setFundedSuccessfulProjects.php",
            data: {'fundedSuccessfulProjects': JSON.stringify(passFundedSuccessfulProjects)},
            // data : {'fundedProjects': },
            success: function(fundedSuccessfulProjects){
                console.log("Succeed to send ownerProjects: ", passFundedSuccessfulProjects);
            }
        });

        window.location = "../client/user/fundedSuccessfulProject.php";
        // console.log("P: ", passFundedSuccessfulProjects);

        
		
    } catch (error) {
        console.log("User rejected the request.");
    }
}


setTimeout(function(){
    getOwnerProject();
}, 1000);

// document.querySelector("#btn").addEventListener("click", getOwnerProject);


</script>

