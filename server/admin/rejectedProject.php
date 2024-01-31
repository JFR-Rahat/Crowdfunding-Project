<?php

  session_start();

  if(!isset($_SESSION["admin"])){
    header("location: index.php");
  }

  include_once("databaseConnect.php");
  extract($_SESSION["admin"]);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Crowdfunding Admin</title>

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

    <header class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../../client/pages/index.php"><b>Crowdfunding</b></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <!-- <button>
                    <a class="nav-link px-3" href="#">Sign out</a>
                </button> -->
                <ul class="navbar-nav px-2">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" id="adminSignOut" data-bs-toggle="modal"
                            data-bs-target="#exampleModalCenter">
                            Sign Out
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
                    <h5 class="modal-title mx-auto" id="exampleModalLongTitle">Do you want to sign out?</h5>
                </div>
                <div class="modal-body">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="adminSignOutConf"
                            onclick=adminSignOut()>Sign Out</button>
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
                            <a class="nav-link" aria-current="page" href="adminDashboard.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pendingProject.php">
                                <span data-feather="loader"></span>
                                Pending Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="rejectedProject.php">
                                <span data-feather="trash-2"></span>
                                Rejected Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="approvedProject.php">
                                <span data-feather="thumbs-up"></span>
                                Approved Projects
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Rejected Projects</h1>
                </div>
                <div class="align-items-center flex-md-nowrap pt-3 pb-2 mx-auto">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="container text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Project Photo</th>
                                    <th scope="col">Owner Name</th>
                                    <th scope="col">Owner Address</th>
                                    <th scope="col">Project Title</th>
                                    <th scope="col">Project Category</th>
                                    <th scope="col">Project Story</th>
                                    <th scope="col">Funding Goal</th>
                                    <th scope="col">Campaign Duration</th>
                                    <th scope="col" colspan=3>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $fetch = "SELECT * FROM `projectLaunchRequest` WHERE projectLaunchPending=-1";
                                    $query = mysqli_query($conn, $fetch);

                                    while($row = mysqli_fetch_assoc($query)){

                                        extract($row);

                                        ?>

                                <tr class="container text-center align-middle">
                                    <th scope="row"><?php echo $id;?></th>
                                    <td><img src="<?php echo "../".$projectPhotoDir; ?>" alt="" class = "img-fluid rounded-circle" width=100 height=auto></td>
                                    <td><?php echo $ownerName;?></td>
                                    <td scope="col"><?php echo substr($ownerAddress, 0, 5) . "......" . substr($ownerAddress, strlen($ownerAddress)-6, 5); ?></td>
                                    <td><?php echo $projectTitle;?></td>
                                    <td><?php echo $projectCategory;?></td>
                                    <td><?php echo $projectStory;?></td>
                                    <td><?php echo $fundingGoal;?> Finney</td>
                                    <td><?php echo $campaignDuration;?> minutes</td>
                                    <td><button type="button" class="btn btn-outline-info" onclick=viewProject(<?php echo $id;?>)>View</button></td>
                                    <td><button type="button" class="btn btn-outline-danger" disabled onclick=rejectProject(<?php echo $id;?>)>Rejected</button></td>
                                </tr>

                                <?php
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function adminSignOut() {
            window.location = "destroySession.php";
        }
        function rejectProject(id){
            window.location = "rejectProject.php?id="+id;
        }
        function viewProject(id){
            window.location = "viewProjectSQL.php?id="+id;
        }
    </script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>