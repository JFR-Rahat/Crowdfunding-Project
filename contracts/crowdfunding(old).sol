//SPDX-License-Identifier:MIT
pragma solidity ^0.8.9;

contract Crowdfunding{

    mapping(address => uint256) public funders;
    uint256 public targetFunds;
    uint256 public deadline;
    string public projectName;
    address public owner;
    bool public fundsWithdrawn;

    event Funded(address _funder, uint256 _amount);
    event OwnerWithdraw(uint256 _amount);
    event FunderWithdraw(address _funder, uint256 _amount);

    constructor(string memory _projectName, uint256 _targetFunds, uint256 _deadline){

        owner = msg.sender;
        projectName = _projectName;
        targetFunds = _targetFunds;
        deadline = _deadline;
    }

    function fund() public payable{

        require(isFundEnabled(), "Funding is now disabled.");

        funders[msg.sender] += msg.value;
        emit Funded(msg.sender, msg.value);
    }

    function withdrawOwner() public{

        require(msg.sender == owner, "Unauthorised access.");
        require(isFundSuccess(), "Target hasn't been met yet.");

        uint256 amountToSend = address(this).balance;
        (bool ownerWithdrawSuccess, ) = msg.sender.call{value: amountToSend}("");

        require(ownerWithdrawSuccess, "Unable to withdraw");

        fundsWithdrawn = true;
        emit OwnerWithdraw(amountToSend);
    }

    function withdrawFunder() public{

        require(!isFundEnabled() && !isFundSuccess(), "Can't withdraw now.");

        uint256 amountToSend = funders[msg.sender];
        (bool funderWithdrawSuccess, ) = msg.sender.call{value: amountToSend}("");

        require(funderWithdrawSuccess, "Unable to withdraw");

        funders[msg.sender] = 0;
        emit FunderWithdraw(msg.sender, amountToSend);
    }

    function isFundEnabled() public view returns(bool){

        if(block.timestamp > deadline || fundsWithdrawn){
            return false;
        }
        else{
            return true;
        }
    }

    function isFundSuccess() public view returns(bool){

        if(address(this).balance >= targetFunds || fundsWithdrawn){
            return true;
        }
        else{
            return false;
        }
    }
}