<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php

    session_start();

    // if(!isset($_SESSION["user"])){
        
    //     header("location:../client/user/userDashboard.php?userLogin=false");
    // }

    if(isset($_GET['id'])){
        $projectId = $_GET['id'];
        echo $projectId;
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

        project = await contract.claimFund(projectIndex[0]);
                
        window.location = "../client/user/claimedProject.php?id="+projectIndex[0];
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

