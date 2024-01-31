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

    if(isset($_GET['fundAmount'])){
        $fundAmount = $_GET['fundAmount'];
        // echo $fundAmount;
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
        console.log("Projects Index: " + projectIndex[0]);

        fundedProjects = await contract.getProjectsDetail(projectIndex);

        // fundedProjects.map(item=>console.log(item.projectName));
        var passFundedOngoingProjects = new Array();
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
            // projectList.projectMyFunding = fundedProjectsInfo[idx][1].toString();

            let currentTime = Math.floor(new Date().getTime() / 1000);
            console.log(currentTime);
            console.log(projectList.projectEndTime);
            // if(parseInt(projectList.projectAmountRaised) >= parseInt(projectList.projectFundingGoal) && (currentTime < parseInt(projectList.projectEndTime))){
            //     passFundedOngoingProjects.push(projectList);
            // }
            // else{
            //     // console.log("Failed");
            // }

            idx++;
        });

        let fundAmount = <?php echo strval($fundAmount / 1000); ?>;
        console.log(fundAmount);
        let fundAmountStr = fundAmount.toString();
        let amount = ethers.utils.parseEther(fundAmountStr);
        console.log(amount);
        project = await contract.fundProject(projectIndex[0], {value: amount});
        // console.log(ethers.utils.parseEther(amount));
        console.log(projectIndex[0]);
                
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

