<?php

session_start();

if (!isset($_SESSION["allProjects"])) {

    header("location:../../contracts/getAllProjects.php");
}

if (!isset($_SESSION["user"]) and isset($_GET["userAddress"])) {

    $_SESSION["user"] = array("userAddress" => $_GET["userAddress"]);
}

if(isset($_SESSION["user"])){
    $user = $_SESSION['user'];
    $allProjects = $_SESSION["allProjects"];
    session_unset();
    $_SESSION['user'] = $user;
    $_SESSION["allProjects"] = $allProjects;
}

// print_r($_SESSION["allProjects"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crowdfunding</title>

    <!-- <link rel="stylesheet" href="../css/index.css"> -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="mx-auto">
                <a class="navbar-brand" href="index.php"><b>Crowdfunding</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="start_project.php">Start A Project</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto my-3 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <?php
            if (isset($_SESSION["user"])) {
                extract($_SESSION["user"]);
                ?>
                <ul class="navbar-nav ms-2 ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-primary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo substr($userAddress, 0, 5) . "......" . substr($userAddress, -6); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../user/userDashboard.php">User Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="userLogOut.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
            } else {
            ?>
                <ul class="navbar-nav ms-2">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" id="connectWalletBtn" data-bs-toggle="modal"
                            data-bs-target="#exampleModalCenter">Login
                        </button>
                    </li>
                </ul>
                <?php
            }
            ?>
            </div>
        </div>
    </nav>

    <main>

        <!--about-->
        <section id="about" class="mt-5 pt-5">
            <div class="container">
                <div class="row gx-5 align-item-center">
                    <div class="col-lg-5">
                        <img src="../Photos/crowdfundingLogo.jpg" alt="Error">
                    </div>
                    <div class="col-lg-7">
                        <h1>Create your project using our Site</h1>
                        <div class="divider my-3"></div>
                        <div>
                            <ul>
                                <li class="fs-3">Login with your <a href="https://metamask.io/download/">Metamask</a>
                                    account.</li>
                                <li class="fs-3">You can <a
                                        href="start_project.php">create</a>
                                    your project and raise funds for it.</li>
                                <li class="fs-3">You can claim the fundings if the project reaches the target goal
                                    before deadline.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container alert alert-info m-5">
            The site owner will receive 5% of the funding amount when the project creator claims the funding.
        </div>


        <!--Ongoing Projects-->
        <section class="mt-5 pt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 intro-text">
                        <h1>Ongoing Projects</h1>
                    </div>
                </div>

                <div class="row gy-4 ms-auto">
                    <?php
                    $projects = $_SESSION["allProjects"];

                    foreach ($projects as $projectOb) {
                        $project = (array) $projectOb;
                        extract($project);
                        $currentTime = time();
                        if ($currentTime < $projectEndTime && $projectAmountRaised < $projectFundingGoal) {
                            ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card shadow-on-hover h-100">
                            <img src="<?php echo "../../server/" . $projectPhotoDir; ?>" class="card-img-top" alt="..."
                                width=500px height=400px>
                            <div class="card-body" style="max-height: 150px; overflow: hidden;">
                                <h5 class="card-title">
                                    <?php echo $projectTitle; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $projectStory; ?>
                                </p>
                            </div>
                            <div class="m-2">
                                <a href="../user/viewProject.php?id=<?php echo $projectId; ?>"
                                    class="btn btn-primary">Read more..</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!--Ongoing Successful Projects-->
        <section class="mt-5 pt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 intro-text">
                        <h1>Ongoing Successful Projects</h1>
                    </div>
                </div>

                <div class="row gy-4 ms-auto">
                    <?php
                    $projects = $_SESSION["allProjects"];

                    foreach ($projects as $projectOb) {
                        $project = (array) $projectOb;
                        extract($project);
                        $currentTime = time();
                        if ($currentTime < $projectEndTime && $projectAmountRaised >= $projectFundingGoal) {
                            ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card shadow-on-hover h-100">
                            <img src="<?php echo "../../server/" . $projectPhotoDir; ?>" class="card-img-top" alt="..."
                                width=500px height=400px>
                            <div class="card-body" style="max-height: 150px; overflow: hidden;">
                                <h5 class="card-title">
                                    <?php echo $projectTitle; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $projectStory; ?>
                                </p>
                            </div>
                            <div class="m-2">
                                <a href="../user/viewProject.php?id=<?php echo $projectId; ?>"
                                    class="btn btn-primary">Read more..</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!--Successful Projects-->
        <section class="mt-5 pt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 intro-text">
                        <h1>Successful Projects</h1>
                    </div>
                </div>

                <div class="row gy-4 ms-auto">
                    <?php
                    $projects = $_SESSION["allProjects"];

                    foreach ($projects as $projectOb) {
                        $project = (array) $projectOb;
                        extract($project);
                        $currentTime = time();
                        if ($currentTime >= $projectEndTime && $projectAmountRaised >= $projectFundingGoal) {
                            ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card shadow-on-hover h-100">
                            <img src="<?php echo "../../server/" . $projectPhotoDir; ?>" class="card-img-top" alt="..."
                                width=500px height=400px>
                            <div class="card-body" style="max-height: 150px; overflow: hidden;">
                                <h5 class="card-title">
                                    <?php echo $projectTitle; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $projectStory; ?>
                                </p>
                            </div>
                            <div class="m-2">
                                <a href="../user/viewProject.php?id=<?php echo $projectId; ?>"
                                    class="btn btn-primary">Read more..</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!--Failed Projects-->
        <section class="mt-5 pt-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 intro-text">
                        <h1>Failed Projects</h1>
                    </div>
                </div>

                <div class="row gy-4 ms-auto">
                    <?php
                    $projects = $_SESSION["allProjects"];

                    foreach ($projects as $projectOb) {
                        $project = (array) $projectOb;
                        extract($project);
                        $currentTime = time();
                        if ($currentTime > $projectEndTime && $projectAmountRaised < $projectFundingGoal) {
                            ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card shadow-on-hover h-100">
                            <img src="<?php echo "../../server/" . $projectPhotoDir; ?>" class="card-img-top" alt="..."
                                width=500px height=400px>
                            <div class="card-body" style="max-height: 150px; overflow: hidden;">
                                <h5 class="card-title">
                                    <?php echo $projectTitle; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $projectStory; ?>
                                </p>
                            </div>
                            <div class="m-2">
                                <a href="../user/viewProject.php?id=<?php echo $projectId; ?>"
                                    class="btn btn-primary">Read more..</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

    </main>

    <?php

    unset($_SESSION["allProjects"]);

    ?>

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

    <!--Footer-->
    <footer>
        <div class="footer-top">
            <div class="container">
                <hr>
                <h5 class="text-center pt-3">CONTACT US</h5>
                <div class="row">
                    <div class="col-lg-1">
                        <img src="../Photos/crowdfundingLogo.jpg" alt="" style="height: 100px; width: 100px;">
                    </div>
                    <div class="col-lg-7 pt-4">
                        <h6>Crowdfunding</h6>
                        <h6>A Secure Solution to Project Funding</h6>
                    </div>
                    <div class="col-lg-4">
                        <h6 class="mb-2">PABX Telephone: 09032-56212, 56214, 56217, 56245, 56247, 56248, 56271</h6>
                        <h6>Fax : 09032-56270</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="text-lead text-center">
                            © Copyright 2023, Crowdfunding. All rights reserved
                        </p>
                    </div>
                    <!-- <div class="col-lg-4"></div> -->
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
    <!-- <script src="../js/index.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="../js/home.js"></script>

</body>

</html>