const connectWalletBtn = document.querySelector("#connectWalletBtn");
const connectWalletCnfBtn = document.querySelector("#connectWalletCnfBtn");

let contractAddress = '0xeFd9Da0aD0c2c1E37D6689a6095B30A0A5cb6321';
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
						"internalType": "address",
						"name": "creatorAddress",
						"type": "address"
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
					},
					{
						"internalType": "string",
						"name": "projectPhotoDir",
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
						"internalType": "address",
						"name": "creatorAddress",
						"type": "address"
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
					},
					{
						"internalType": "string",
						"name": "projectPhotoDir",
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
	},
	{
		"inputs": [],
		"name": "invAddress",
		"outputs": [
			{
				"internalType": "address",
				"name": "",
				"type": "address"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
];

let contract, signer;

let chainId = 80001;    // Mumbai's ChainId

const provider = new ethers.providers.Web3Provider(window.ethereum, chainId);
provider.send("eth_requestAccounts", []).then(() => {
    provider.listAccounts().then((accounts) => {
        signer = provider.getSigner(accounts[0]);
        contract = new ethers.Contract(contractAddress, contractABI, signer);

        // console.log("Got Contract");
        console.log(signer);
        console.log(contract);
    });
});

const getAccount = async function () {
    console.log("Button Click event still ongoing");
    try{
        const ethAccounts = await provider.send("eth_requestAccounts", []).then(() => {
            provider.listAccounts().then((accounts) => {
                signer = provider.getSigner(accounts[0]);
                contract = new ethers.Contract(contractAddress, contractABI, signer);

                console.log("Paichi "+signer);
                console.log(`Paichi ${contract}`);
            });
        });

        console.log("Signer Assigned = ", signer);

        // document.querySelector("#userAddress").textContent = "Welcome User: " + signer._address;
        // connectWalletBtn.textContent = signer._address.slice(0, 10) + "...";
        // connectWalletBtn.disabled = true;

        window.location = "../pages/index.php?userAddress="+signer._address;
            
    }
    catch(error){
        console.log("User rejected the request.");
    }
}

connectWalletCnfBtn.addEventListener("click", getAccount);
