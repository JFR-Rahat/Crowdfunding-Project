<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>

<script>
	let contractAddress = '0xEfd76eaCD56C712bf69604CF1B1921130fD8b064';
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
				"name": "_endTime",
				"type": "uint256"
			},
			{
				"internalType": "uint256",
				"name": "_creationTime",
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
		"inputs": [
			{
				"internalType": "uint256",
				"name": "_index",
				"type": "uint256"
			}
		],
		"name": "checkRefundClaim",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "view",
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
					},
					{
						"internalType": "bool",
						"name": "claimedAmount",
						"type": "bool"
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
		"name": "getCreatorClaimedProjects",
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
				"internalType": "uint256",
				"name": "_index",
				"type": "uint256"
			}
		],
		"name": "getProjectContributors",
		"outputs": [
			{
				"components": [
					{
						"internalType": "address",
						"name": "contributorAddress",
						"type": "address"
					},
					{
						"internalType": "uint256",
						"name": "totalAmount",
						"type": "uint256"
					}
				],
				"internalType": "struct crowdfunding.Contributors[]",
				"name": "projectContributors",
				"type": "tuple[]"
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
					},
					{
						"internalType": "bool",
						"name": "claimedAmount",
						"type": "bool"
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
		"inputs": [
			{
				"internalType": "address",
				"name": "contributor",
				"type": "address"
			}
		],
		"name": "getUserRefundClaimedLIst",
		"outputs": [
			{
				"internalType": "uint256[]",
				"name": "refundClaimedProjects",
				"type": "uint256[]"
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
</script>