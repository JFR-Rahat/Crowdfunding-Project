<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<?php

    session_start();

    if(!isset($_SESSION["user"])){
        
        header("location:userDashboard.php?userLogin=false");
    }

    include_once("databaseConnect.php");
    extract($_SESSION["user"]);

    $fetch = "SELECT * FROM `projects` WHERE ownerName='Jack Reaper'";
    $result = mysqli_query($conn, $fetch);

    if($row = mysqli_fetch_assoc($result)){
        extract($row);
		// echo "Hello";

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

<script>
let contractAddress = '0xb936574B10c68A2AB7D1b273DD3f5745A41A52fb';
let contractABI = [
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "_index",
				"type": "uint256"
			}
		],
		"name": "claimFund",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "_index",
				"type": "uint256"
			}
		],
		"name": "claimRefund",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_name",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_desc",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_creatorName",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_projectPhotoDir",
				"type": "string"
			},
			{
				"internalType": "uint256",
				"name": "_fundingGoal",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_creationTime",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_endTime",
				"type": "uint256"
			},
			{
				"internalType": "string",
				"name": "_category",
				"type": "string"
			}
		],
		"name": "createNewProject",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "_index",
				"type": "uint256"
			}
		],
		"name": "fundProject",
		"outputs": [],
		"stateMutability": "payable",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "getAllProjectsDetail",
		"outputs": [
			{
				"components": [
					{
						"internalType": "string",
						"name": "projectName",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "projectDescription",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "creatorName",
						"type": "string"
					},
					{
						"internalType": "uint256",
						"name": "projectId",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "fundingGoal",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "amountRaised",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "totalContributors",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "endTime",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "creationTime",
						"type": "uint256"
					},
					{
						"internalType": "string",
						"name": "category",
						"type": "string"
					}
				],
				"internalType": "struct crowdfunding.ProjectMetadata[]",
				"name": "allProjects",
				"type": "tuple[]"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "creator",
				"type": "address"
			}
		],
		"name": "getCreatorProjects",
		"outputs": [
			{
				"internalType": "uint256[]",
				"name": "createdProjects",
				"type": "uint256[]"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256",
				"name": "_index",
				"type": "uint256"
			}
		],
		"name": "getProject",
		"outputs": [
			{
				"components": [
					{
						"internalType": "string",
						"name": "projectName",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "projectDescription",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "creatorName",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "projectPhotoDir",
						"type": "string"
					},
					{
						"internalType": "uint256",
						"name": "projectId",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "fundingGoal",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "endTime",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "creationTime",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "amountRaised",
						"type": "uint256"
					},
					{
						"internalType": "address",
						"name": "creatorAddress",
						"type": "address"
					},
					{
						"internalType": "string",
						"name": "category",
						"type": "string"
					},
					{
						"internalType": "address[]",
						"name": "contributors",
						"type": "address[]"
					},
					{
						"internalType": "uint256[]",
						"name": "amount",
						"type": "uint256[]"
					},
					{
						"internalType": "bool[]",
						"name": "refundClaimed",
						"type": "bool[]"
					},
					{
						"internalType": "bool",
						"name": "claimedAmount",
						"type": "bool"
					}
				],
				"internalType": "struct crowdfunding.Project",
				"name": "project",
				"type": "tuple"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "uint256[]",
				"name": "_indexList",
				"type": "uint256[]"
			}
		],
		"name": "getProjectsDetail",
		"outputs": [
			{
				"components": [
					{
						"internalType": "string",
						"name": "projectName",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "projectDescription",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "creatorName",
						"type": "string"
					},
					{
						"internalType": "uint256",
						"name": "projectId",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "fundingGoal",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "amountRaised",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "totalContributors",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "endTime",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "creationTime",
						"type": "uint256"
					},
					{
						"internalType": "string",
						"name": "category",
						"type": "string"
					}
				],
				"internalType": "struct crowdfunding.ProjectMetadata[]",
				"name": "projectsList",
				"type": "tuple[]"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "contributor",
				"type": "address"
			}
		],
		"name": "getUserFundings",
		"outputs": [
			{
				"components": [
					{
						"internalType": "uint256",
						"name": "projectIndex",
						"type": "uint256"
					},
					{
						"internalType": "uint256",
						"name": "totalAmount",
						"type": "uint256"
					}
				],
				"internalType": "struct crowdfunding.Funded[]",
				"name": "fundedProjects",
				"type": "tuple[]"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
];

let contract, signer;

let chainId = 80001; // Mumbai's ChainId

const provider = new ethers.providers.Web3Provider(window.ethereum, chainId);
provider.send("eth_requestAccounts", []).then(() => {
    provider.listAccounts().then((accounts) => {
        signer = provider.getSigner(accounts[0]);
        contract = new ethers.Contract(contractAddress, contractABI, signer);

        console.log(signer);
        console.log(contract);

    });
});

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
		

    } catch (error) {
        console.log("User rejected the request.");
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

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>