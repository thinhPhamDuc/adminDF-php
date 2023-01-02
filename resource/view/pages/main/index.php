<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user'])) {
    header('Location:  ../auth/login.php');
}

include '../../../../database/database.php';
include '../../../../function/function.php';
$sql = "SELECT * FROM users WHERE status = '1' ";

$result = $conn->query($sql);
$sql1 = "SELECT *, COUNT(*) as count FROM orders
GROUP BY DATE( created_at ) ";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    while ($rows1 = $result1->fetch_all()) {
        // print_r($rows1);
            $dataPoints = array(
                array("x" => -50, "y" => 6.285), 
                array("x" => -40, "y" => 4.656),
                array("x" => -30, "y" => 3.530),
                array("x" => -20, "y" => 2.731),
                array("x" => -15, "y" => 2.419),
                array("x" => -10, "y" => 2.151),
                array("x" => -5, "y" => 1.920),
                array("x" => 0, "y" => 1.720),
                array("x" => 5, "y" => 1.546),
                array("x" => 10, "y" => 1.394),
                array("x" => 15, "y" => 1.261),
                array("x" => 20, "y" => 1.144),
                array("x" => 25, "y" => 1.040),
                array("x" => 30, "y" => 0.948),
                array("x" => 40, "y" => 0.794),
                array("x" => 50, "y" => 0.670),
                array("x" => 60, "y" => 0.570),
                array("x" => 70, "y" => 0.487),
                array("x" => 75, "y" => 0.45)
            );
    }
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AdminDF_php|| Trang chủ</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="icon" href="../../../../public/backend/assets/images/icon.png">
    <link href="../../../../public/backend/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include '../../partial/sideBar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../partial/topBar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="manage-employees.php">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Totals Accout (Monthly) </div>
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                require '../../../../database/database.php';
                                                $sql = mysqli_query($conn, "SELECT * FROM users");
                                                $nrows = mysqli_num_rows($sql);
                                                echo $nrows;
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="manage-products.php">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Products (Monthly)</div>
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                require '../../../../database/database.php';
                                                                                                $sql = mysqli_query($conn, "SELECT * FROM products");
                                                                                                $nrows = mysqli_num_rows($sql);
                                                                                                echo $nrows;
                                                                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="manage-inventory.php">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Inventory (Monthly)</div>
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                require '../../../../database/database.php';
                                                                                                $sql = mysqli_query($conn, "SELECT * FROM inventory");
                                                                                                $nrows = mysqli_num_rows($sql);
                                                                                                echo $nrows;
                                                                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="manage-orders.php">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Orders (Monthly)</div>
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                require '../../../../database/database.php';
                                                                                                $sql = mysqli_query($conn, "SELECT * FROM orders");
                                                                                                $nrows = mysqli_num_rows($sql);
                                                                                                echo $nrows;
                                                                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <script>
                            window.onload = function() {

                                var chart = new CanvasJS.Chart("chartContainer", {
                                    title: {
                                        text: "Viscosity of Ethanol at Different Temperatures"
                                    },
                                    axisX: {
                                        title: "Temperature",
                                        suffix: " °C"
                                    },
                                    axisY: {
                                        title: "Viscosity (in mPa·s)",
                                        suffix: " mPa·s"
                                    },
                                    data: [{
                                        type: "area",
                                        markerSize: 0,
                                        xValueFormatString: "#,##0 °C",
                                        yValueFormatString: "#,##0.000 mPa·s",
                                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                    }]
                                });
                                chart.render();

                            }
                        </script>
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include '../../partial/footer.php'; ?>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Bootstrap core JavaScript-->
    <script src="../../../../public/backend/assets/js/jquery.min.js"></script>
    <script src="../../../../public/backend/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../../public/backend/assets/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../../public/backend/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../../../public/backend/assets/js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../../../public/backend/assets/js/chart-area-demo.js"></script>
    <script src="../../../../public/backend/assets/js/chart-pie-demo.js"></script>
    <script src="../../../../public/backend/assets/js/main.js"></script>
</body>

</html>