<?php

session_start();

if(isset($_GET["userAddress"])){

    $_SESSION["user"] = array("userAddress"=>$_GET["userAddress"]);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Crowdfunding User</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../client/pages/index.php"><b>Crowdfunding</b></a>
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
                                if(isset($_SESSION["user"])){
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLongTitle">Crowdfunding</h5>
                </div>
                <div class="modal-body">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary" id="connectWalletCnfBtn">Connect Wallet</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="adminDashboard.php">
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
                            <a class="nav-link" href="successfulProject.php">
                                <span data-feather="award"></span>
                                Successful Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="failedProject.php">
                                <span data-feather="thumbs-down"></span>
                                Failed Projects
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <div class="align-items-center pt-3 pb-2 mx-auto">
                    <?php

                        if(isset($_SESSION["user"])){
                            extract($_SESSION["user"]);
                            echo "<h3>Welcome User ".$userAddress."</h3>";
                        }
                        else{
                            echo "<h3>Conect Using Wallet</h3>";
                        }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
    <script src="../js/user.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>