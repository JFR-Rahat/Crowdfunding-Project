<?php

session_start();

if(isset($_GET["userAddress"])){

    $_SESSION["user"] = array("userAddress"=>$_GET["userAddress"]);
}

if(isset($_SESSION["user"])){
    $user = $_SESSION['user'];
    session_unset();
    $_SESSION['user'] = $user;
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