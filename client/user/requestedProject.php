<?php

    session_start();

    if(!isset($_SESSION["user"])){

        header("location:userdashboard.php?userLogin=false");
    }

    include_once("databaseConnect.php");
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

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <?php include_once("userHeader.php"); ?>
    <!-- Header End -->

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
            <!-- Sidebar -->
        <?php include_once("userSidebar.php") ?>
        <!-- Sidebar End -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Requested Projects</h1>
                </div>
                <div class="align-items-center pt-3 pb-2 mx-auto">
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

                                    $fetch = "SELECT * FROM `projectLaunchRequest` WHERE projectLaunchPending=1";
                                    $query = mysqli_query($conn, $fetch);

                                    while($row = mysqli_fetch_assoc($query)){

                                        extract($row);

                                        ?>

                                <tr class="container text-center align-middle">
                                    <th scope="row"><?php echo $id;?></th>
                                    <td><img src="<?php echo "../../server/".$projectPhotoDir; ?>" alt="" class = "img-fluid rounded-circle" width=100 height=auto></td>
                                    <td><?php echo $ownerName;?></td>
                                    <td scope="col"><?php echo substr($ownerAddress, 0, 5) . "......" . substr($ownerAddress, strlen($ownerAddress)-6, 5); ?></td>
                                    <td><?php echo $projectTitle;?></td>
                                    <td><?php echo $projectCategory;?></td>
                                    <td><?php echo $projectStory;?></td>
                                    <td><?php echo $fundingGoal;?></td>
                                    <td><?php echo $campaignDuration;?></td>
                                    <td><button type="button" class="btn btn-outline-info" onclick=viewProject(<?php echo $id;?>)>View</button></td>
                                    <td><button type="button" class="btn btn-outline-success" onclick=editProject(<?php echo $id;?>)>Edit</button></td>
                                    <td><button type="button" class="btn btn-outline-danger" onclick=deleteProject(<?php echo $id;?>)>Delete</button></td>
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
        function userLogOut() {
            window.location = "destroySession.php";
        }
        function editProject(id){
            window.location = "editProject.php?id="+id;
        }
        function deleteProject(id){
            window.location = "deleteProject.php?id="+id;
        }
        function viewProject(id){
            window.location = "viewProject.php?id="+id;
        }
    </script>

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