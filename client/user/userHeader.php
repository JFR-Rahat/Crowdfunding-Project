<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../pages/index.php"><b>Crowdfunding</b></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-2">
        <li class="nav-item">
            <a class="nav-link text-black-50" aria-current="page" href="../pages/start_project.php"><b>Start A Project</b></a>
        </li>
    </ul>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <!-- <button>
                <a class="nav-link px-3" href="#">Sign out</a>
            </button> -->

            <ul class="navbar-nav px-2">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" id="connectWalletBtn" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        <?php
                            if($_SESSION["user"]){
                                extract($_SESSION["user"]);
                                echo substr($userAddress, 0, 5) . "......" . substr($userAddress, strlen($userAddress)-6, 5);
                            }
                            else{
                                echo "Login";
                            }
                        ?>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</header>