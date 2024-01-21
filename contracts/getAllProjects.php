<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php

    session_start();

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

        allProjects = await contract.getAllProjectsDetail();
        console.log("Projects: ", allProjects);

        var passAllProjects = new Array();


        allProjects.map((item)=>{
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

            passAllProjects.push(projectList);
        });

        console.log("Projects: ", passAllProjects);


        $.ajax({
            type: "POST",
            url: "setAllProjects.php",
            data: {'allProjects': JSON.stringify(passAllProjects)},
            // data : {'ownerProjects': },
            success: function(ownerProjects){
                console.log("Succeed to send ownerProjects: ", passAllProjects);
            }
        });

        // window.location = "../client/user/ongoingProject.php";
        window.location = "../client/pages/index.php";
		
    } catch (error) {
        console.log("User rejected the request.");
    }
}


setTimeout(function(){
    getOwnerProject();
}, 1000);

</script>