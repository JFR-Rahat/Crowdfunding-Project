// SPDX-License-Identifier: MIT
pragma solidity >=0.8.0 <0.9.0;
import "hardhat/console.sol";

contract crowdfunding{

    address siteOwner = 0xe38B07D476eD4161ccEB240DcEC223F60d148E0A;

    // Structure of each project in our dApp 
    struct Project{
        string projectName;
        string projectDescription;
        string creatorName;
        string projectPhotoDir;
        uint256 projectId;
        uint256 fundingGoal;
        uint256 endTime;
        uint256 creationTime;
        uint256 amountRaised;
        address creatorAddress;
        string category;
        address[] contributors;
        uint256[] amount;
        bool[] refundClaimed;
        bool claimedAmount;
    }

    // Structure used to return metadata of each project
    struct ProjectMetadata{
        string projectName;
        string projectDescription;
        string creatorName;
        address creatorAddress;
        uint256 projectId;
        uint256 fundingGoal;
        uint256 amountRaised;
        uint256 totalContributors;
        uint256 endTime;
        uint256 creationTime;
        string category;
        string projectPhotoDir;
        bool claimedAmount;
    }

    // Each user funding gets recorded in Funded structure
    struct Funded{
		uint256 projectIndex;
		uint256 totalAmount;
    }

    struct Contributors{
        address contributorAddress;
        uint256 totalAmount;
    }

    // Stores all the projects 
    Project[] projects;

    // Stores the indexes of projects created on projects list by an address
    mapping(address => uint256[]) addressProjectsList;

    mapping(address => uint256[]) addressClaimedProjectsList;

    // Stores the list of fundings  by an address
    mapping(address => Funded[]) addressFundingList;

    mapping(address => uint256[]) addressRefundClaimedList;

    // Checks if an index is a valid index in projects array
    modifier validIndex(uint256 _index) {
        require(_index < projects.length, "Invalid Project Id");
        _;
    }

    // Create a new project and updates the addressProjectsList and projects array
    function createNewProject(
        string memory _name,
        string memory _desc,
        string memory _creatorName,
        string memory _projectPhotoDir,
        uint256 _fundingGoal,
        uint256 _endTime,
        uint256 _creationTime,
        string memory _category
    ) external{
        projects.push(Project({
            creatorAddress: msg.sender,
            projectName: _name,
            projectDescription: _desc,
            creatorName: _creatorName,
            projectPhotoDir: _projectPhotoDir,
            projectId: projects.length,
            fundingGoal: _fundingGoal * 1e15,
            endTime: _endTime,
            creationTime: _creationTime,
            category: _category,
            amountRaised: 0,
            contributors: new address[](0),
            amount: new uint256[](0),
            claimedAmount: false,
            refundClaimed: new bool[](0)
        }));
        addressProjectsList[msg.sender].push(projects.length - 1);
    }

    // Returns the project metadata of all entries in projects
    function getAllProjectsDetail() external view returns(ProjectMetadata[] memory allProjects) {
        ProjectMetadata[] memory newList = new ProjectMetadata[](projects.length);
        for(uint256 i = 0; i < projects.length; i++){
            newList[i] = ProjectMetadata(
                projects[i].projectName,
                projects[i].projectDescription,
                projects[i].creatorName,
                projects[i].creatorAddress,
                projects[i].projectId,
                projects[i].fundingGoal,
                projects[i].amountRaised,
                projects[i].contributors.length,
                projects[i].endTime,
                projects[i].creationTime,
                projects[i].category,
                projects[i].projectPhotoDir,
                projects[i].claimedAmount
            );
        }
        return newList;
    }

    address constant public invAddress = 0xE0f5206BBD039e7b0592d8918820024e2a7437b9;
    // Takes array of indexes as parameter
    // Returns array of metadata of project at respective indexes 
    function getProjectsDetail(uint256[] memory _indexList) external view returns(ProjectMetadata[] memory projectsList) {
        ProjectMetadata[] memory newList = new ProjectMetadata[](_indexList.length);
        for(uint256 index = 0; index < _indexList.length; index++) {
            if(_indexList[index] < projects.length) {
                uint256 i = _indexList[index]; 
                newList[index] = ProjectMetadata(
                    projects[i].projectName,
                    projects[i].projectDescription,
                    projects[i].creatorName,
                    projects[i].creatorAddress,
                    projects[i].projectId,
                    projects[i].fundingGoal,
                    projects[i].amountRaised,
                    projects[i].contributors.length,
                    projects[i].endTime,
                    projects[i].creationTime,
                    projects[i].category,
                    projects[i].projectPhotoDir,
                    projects[i].claimedAmount
                );
            } else {
                newList[index] = ProjectMetadata(
                    "Invalid Project",
                    "Invalid Project",
                    "Invalid Project",
                    invAddress,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    "Invalid Project",
                    "Invalid Project",
                    false
                );
            }

        }
        return newList;
    }

    // Returns the project at the given index
    function getProject(uint256 _index) external view validIndex(_index) returns(Project memory project) {
        return projects[_index];
    }

    // Returns array of indexes of projects created by creator
    function getCreatorProjects(address creator) external view returns(uint256[] memory createdProjects) {
        return addressProjectsList[creator];
    }

    // Returns array of indexes of projects created by creator
    function getCreatorClaimedProjects(address creator) external view returns(uint256[] memory createdProjects) {
        return addressClaimedProjectsList[creator];
    }

    // Returns array of details of fundings by the contributor
    function getUserFundings(address contributor) external view returns(Funded[] memory fundedProjects) {
        return addressFundingList[contributor];
    }

    function checkRefundClaim(uint256 _index) external view validIndex(_index) returns(bool){
        uint256 contributorIndex = uint256(getContributorIndex(_index));
        return projects[_index].refundClaimed[contributorIndex];
    }

    function getUserRefundClaimedLIst(address contributor) external view returns(uint256[] memory refundClaimedProjects) {
        return addressRefundClaimedList[contributor];
    }

    function getProjectContributors(uint256 _index) external view validIndex(_index) returns (Contributors[] memory projectContributors) {
        Contributors[] memory contributorInfo = new Contributors[](projects[_index].contributors.length);

        uint256 count = 0; 

        for (uint256 i = 0; i < projects[_index].contributors.length; i++) {
            address contributor = projects[_index].contributors[i];

            for (uint256 j = 0; j < addressFundingList[contributor].length; j++) {
                if (addressFundingList[contributor][j].projectIndex == _index) {
                    contributorInfo[count] = Contributors(contributor, addressFundingList[contributor][j].totalAmount);
                    count++;
                    break;
                }
            }
        }

        assembly {
            mstore(contributorInfo, count)
        }

        return contributorInfo;
    }


    // Helper function adds details of Funding to addressFundingList
    function addToFundingList(uint256 _index) internal validIndex(_index) {
        for(uint256 i = 0; i < addressFundingList[msg.sender].length; i++) {
            if(addressFundingList[msg.sender][i].projectIndex == _index) {
                addressFundingList[msg.sender][i].totalAmount += msg.value;
                return;
            }
        }
        addressFundingList[msg.sender].push(Funded(_index, msg.value));
        projects[_index].refundClaimed.push(false);
    }

    // Helper fundtion adds details of funding to the project in projects array
    function addContribution(uint256 _index) internal validIndex(_index)  {
        for(uint256 i = 0; i < projects[_index].contributors.length; i++) {
            if(projects[_index].contributors[i] == msg.sender) {
                projects[_index].amount[i] += msg.value;
                addToFundingList(_index);
                return;
            }
        }
        projects[_index].contributors.push(msg.sender);
        projects[_index].amount.push(msg.value);
        addToFundingList(_index);
    }

    // Funds the projects at given index
    function fundProject(uint256 _index) payable external validIndex(_index)  {
        console.log(projects[_index].endTime);
        console.log(block.timestamp);

        require(projects[_index].creatorAddress != msg.sender, "You are the project owner");
        require(projects[_index].endTime > block.timestamp, "Project Funding Time Expired.");
        addContribution(_index);
        projects[_index].amountRaised += msg.value;
    }

    // Helps project creator to transfer the raised funds to his address
    function claimFund(uint256 _index) validIndex(_index) external {
        require(projects[_index].creatorAddress == msg.sender, "You are not Project Owner");
        require(projects[_index].endTime < block.timestamp, "Project Funding Time Not Expired");
        require(projects[_index].amountRaised >= projects[_index].fundingGoal, "Funding goal not reached");
        require(!projects[_index].claimedAmount, "Already claimed raised funds");
        projects[_index].claimedAmount = true;

        payable(msg.sender).transfer(projects[_index].amountRaised * 95 / 100);
        payable(siteOwner).transfer(projects[_index].amountRaised * 5 / 100);
        addressClaimedProjectsList[msg.sender].push(_index);
    }

    // Helper function to get the contributor index in the projects' contributor's array
    function getContributorIndex(uint256 _index) validIndex(_index) internal view returns(int256) {
        int256 contributorIndex = -1;
        for(uint256 i = 0; i < projects[_index].contributors.length; i++) {
            if(msg.sender == projects[_index].contributors[i]) {
                contributorIndex = int256(i);
                break;
            }
        }
        return contributorIndex;
    }

    // Enables the contributors to claim refund when refundable project doesn't reach its goal
    function claimRefund(uint256 _index) validIndex(_index) external {
        console.log(projects[_index].endTime);
        console.log(block.timestamp);

        require(projects[_index].endTime  <= block.timestamp, "Project Funding Time Not Expired");
        require(projects[_index].amountRaised < projects[_index].fundingGoal, "Funding goal already reached");
        
        int256 index = getContributorIndex(_index);
        require(index != -1, "You did not contribute to this project");
        
        uint256 contributorIndex = uint256(index);
        require(!projects[_index].refundClaimed[contributorIndex], "Already claimed refund amount");
        
        projects[_index].refundClaimed[contributorIndex] = true;

        uint256 transferAmount = projects[_index].amount[contributorIndex];
        require(address(this).balance >= transferAmount, "Insufficient contract balance.");

        payable(msg.sender).transfer(projects[_index].amount[contributorIndex]);

        addressRefundClaimedList[msg.sender].push(_index);
    }
}