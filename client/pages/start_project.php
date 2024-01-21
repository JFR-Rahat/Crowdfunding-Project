<link href="../client/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../client/assets/dist/js/bootstrap.bundle.min.js"></script>

<?php

session_start();

if(isset($_GET["userAddress"])){

    $_SESSION["user"] = array("userAddress"=>$_GET["userAddress"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crowdfunding</title>

    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow sticky-top" id="navbar">
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
                        <a class="nav-link active" aria-current="page" href="">Start A Project</a>
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
                    if(isset($_SESSION["user"])){
                        // header("location: start_project.php");
                        extract($_SESSION["user"]);
                        // echo substr($userAddress, 0, 5) . "......" . substr($userAddress, strlen($userAddress)-6, 5);

                        ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-primary" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo substr($userAddress, 0, 5) . "......" . substr($userAddress, strlen($userAddress)-6, 5); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../user/userDashboard.php">User Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="userLogOut.php">Logout</a></li>
                    </ul>
                </li>

                <?php

                        // unset($_SESSION["user"]);
                    }
                    else{
                        // echo "Login";
                        ?>
                <ul class="navbar-nav px-2">
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

    <?php

        if(!isset($_SESSION["user"])){
            ?>
            <script>
            $(document).ready(function() {
                $("#exampleModalCenter").modal('show');
            });
    </script>
    <?php
        }
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

    <div class="container-fluid py-3">
        <header class="text-center">
            <h1>Start A Project</h1>
        </header>
    </div>

    <section class="container my-2 w-50 p-2">
        <form class="row g-3 shadow p-4" action="../../server/projectLaunchForm.php" method="post"
            enctype="multipart/form-data">
            <div class="col-md-12">
                <label for="ownerName" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="ownerName" name="ownerName" required>
            </div>
            <div class="col-md-6">
                <label for="projectTitle" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="projectTitle" name="projectTitle" required>
            </div>
            <div class="col-md-6">
                <label for="projectCategory" class="form-label">Project Category</label>
                <select id="projectCategory" class="form-select" name="projectCategory" required>
                    <option selected value="">Select</option>
                    <option value="art">Art</option>
                    <option value="comics">Comics</option>
                    <option value="design">Design</option>
                    <option value="food">Food</option>
                    <option value="photography">Photography</option>
                    <option value="film&video">Film & Video</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="projectStory">Project Story</label>
                <textarea class="form-control" placeholder="Write the story of your project" id="projectStory"
                    name="projectStory" required></textarea>
            </div>
            <div class="col-12">
                <label for="projectPhoto" class="form-label">Project Photo</label>
                <input type="file" class="form-control" id="projectPhoto" name="projectPhoto" required>
            </div>
            <div class="col-md-6">
                <label for="fundingGoal" class="form-label">Funding Goal</label>
                <input type="text" class="form-control" id="fundingGoal" name="fundingGoal"
                    placeholder="Fenney (1-1000)" required>
            </div>
            <div class="col-md-6">
                <label for="campaignDuration" class="form-label">Campaign Duration</label>
                <input type="text" class="form-control" id="campaignDuration" name="campaignDuration"
                    placeholder="Number of days(1-60)" required>
            </div>
            <?php

                if(isset($_SESSION["user"])){

                    ?>

                <div class="col-12">
                <label for="ownerAddress" class="form-label">Project Owner Address</label>
                <input type="text" class="form-control" id="ownerAddress" name="ownerAddress"
                    value="<?php echo $_SESSION["user"]["userAddress"];?>" readonly="readonly">
            </div>
                    <?php
                }
            ?>
            <div class="col-12 d-grid">
                <button type="submit" class="btn btn-primary" name="launchProject" value="launchProject">Launch
                    Project</button>
            </div>
        </form>
    </section>

    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="../js/form.js"></script>
</body>

</html>