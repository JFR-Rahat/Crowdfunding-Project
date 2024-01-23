<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="userDashboard.php">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="requestedProject.php">
                    <span data-feather="loader"></span>
                    Requested Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="deletedProject.php">
                    <span data-feather="loader"></span>
                    Deleted Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="approvedProject.php">
                    <span data-feather="bell"></span>
                    Approved Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ongoingProject.php">
                    <span data-feather="check-circle"></span>
                    Ongoing Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="successfulOngoingProject.php">
                    <span data-feather="award"></span>
                    Successful-Ongoing Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="successfulProject.php">
                    <span data-feather="award"></span>
                    Successful Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="claimedProject.php">
                    <span data-feather="award"></span>
                    Claimed Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="failedProject.php">
                    <span data-feather="thumbs-down"></span>
                    Failed Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fundedOngoingProject.php">
                    <span data-feather="award"></span>
                    Funded-Ongoing Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fundedSuccessfulProject.php">
                    <span data-feather="award"></span>
                    Funded-Successful Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fundedFailedProject.php">
                    <span data-feather="award"></span>
                    Funded-Failed Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="refundClaimedProject.php">
                    <span data-feather="award"></span>
                    Refund-Claimed Projects
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    const currentLocation = location.href;
    const sidebarItem = document.querySelectorAll("#sidebarMenu ul a");

    console.log(currentLocation);
    console.log(sidebarItem);
    for(let i=0; i<sidebarItem.length; i++){
        if(sidebarItem[i].href === currentLocation){
            sidebarItem[i].classList.add("active");
            console.log("Success");
        }
    }
</script>
