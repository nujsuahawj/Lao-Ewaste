<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: Home.php');
		exit;
	}
?>
<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ecogrowthlao">
    <meta name="author" content="Mr Jack Sainther">

    <title>EcogrowLao - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="./img/icons/icons.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100;400&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>
      /* laoding */
        #laoding{
          position: fixed;
          width: 100%;
          height: 100vh;
          background: #fff url("css/loading_large.gif") no-repeat center center;
          z-index: 999;
        }
    </style>

</head>

<body id="page-top">

    <div id="laoding"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'Slidebar.php';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'Topbar.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3 class="h3 mb-0 text-gray-800">Dashboard</h3>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php 
                                        require_once('db.php');
                                        $result4 = mysqli_query($mysql_db, "SELECT SUM(poit) AS value_sum FROM students;");
                                        $row = mysqli_fetch_array($result4);
                                        $count4 = $row['value_sum'];
                                        $kg = 1000;
                                        $pit = $count4 / $kg ;
                                        $pitf = number_format($pit, 3, ',', '.');?>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                ຈຳນວນຂີ້ເຫຍື້ອທັງໝົດ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  $pitf; ?> kg</div>
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
                            <div class="card border-bottom-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php 
                                        require_once('db.php');
                                        $result1 = mysqli_query($mysql_db, "SELECT COUNT(*) AS `count` FROM `schools`");
                                        $row = mysqli_fetch_array($result1);
                                        $count1 = $row['count'];?>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                ຈຳນວນໂຮງຮຽນທັງໝົດ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count1; ?> ໂຮງຮຽນ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-school fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php 
                                        require_once('db.php');
                                        $result2 = mysqli_query($mysql_db, "SELECT COUNT(*) AS `count` FROM `students`");
                                        $row = mysqli_fetch_array($result2);
                                        $count2 = $row['count'];?>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                ຈຳນວນນັກຮຽນທັງໝົດ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2; ?> ຄົນ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                    <?php 
                                        require_once('db.php');
                                        $result3 = mysqli_query($mysql_db, "SELECT COUNT(*) AS `count` FROM `blos`");
                                        $row = mysqli_fetch_array($result3);
                                        $count3 = $row['count'];?>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                ຈຳນວນບົດຄວນທັງໝົດ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count3; ?> ບົດຄວນ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fab fa-blogger fa-2x text-gray-300"></i>
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
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">5 ຄົນທີ່ໄດ້ຄະແນນສູງສຸດ</h6>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        require_once('db.php');

                                        $resultm = mysqli_query($mysql_db, "SELECT Max(poit) as 'maxpoit' FROM students");
                                        $row = mysqli_fetch_array($resultm);
                                        $poitbys = $row['maxpoit'];
                                        $poitm = $row['maxpoit'];

                                        $resultm2 = mysqli_query($mysql_db, "SELECT poit FROM students ORDER BY poit DESC LIMIT 1,1;");
                                        $row = mysqli_fetch_array($resultm2);
                                        $poitm2 = $row['poit'];

                                        $resultm3 = mysqli_query($mysql_db, "SELECT poit FROM students ORDER BY poit DESC LIMIT 2,1;");
                                        $row = mysqli_fetch_array($resultm3);
                                        $poitm3 = $row['poit'];
                                        
                                        $resultm4 = mysqli_query($mysql_db, "SELECT poit FROM students ORDER BY poit DESC LIMIT 3,1;");
                                        $row = mysqli_fetch_array($resultm4);
                                        $poitm4 = $row['poit'];

                                        $resultm5 = mysqli_query($mysql_db, "SELECT poit FROM students ORDER BY poit DESC LIMIT 4,1;");
                                        $row = mysqli_fetch_array($resultm5);
                                        $poitm5 = $row['poit'];


                                            $query = "SELECT * FROM students order by poit desc limit 5";
                                            $result_tasks = mysqli_query($mysql_db, $query); 
                                            while($row = mysqli_fetch_assoc($result_tasks)) { 
                                                $snames = $row['name'];
                                                $sschoolname = $row['schoolname'];
                                                $spoit = $row['poit'];?>
                                    <?php if($spoit >= $poitm) {?>
                                    <h4 class="small font-weight-bold"> <?php echo $snames; ?> &nbsp;ມາຈາກ <?php echo $sschoolname ?>
                                        <span class="float-right">ອັນດັບ 1</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">ຈຳນວນທັງໝົດ <?php echo number_format($poitm, 3, ',', '.') ?> g</div>
                                    </div>
                                    <?php } elseif($spoit >= $poitm2){ ?>
                                    <h4 class="small font-weight-bold"><?php echo $snames ?> &nbsp;ມາຈາກ <?php echo $sschoolname ?><span
                                            class="float-right">ອັນດັບ 2</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">ຈຳນວນທັງໝົດ <?php echo number_format($poitm2, 3, ',', '.') ?> g</div>
                                    </div>
                                    
                                    <?php }elseif($spoit >= $poitm3){?>
                                    <h4 class="small font-weight-bold"><?php echo $snames ?> &nbsp;ມາຈາກ <?php echo $sschoolname ?> <span
                                            class="float-right">ອັນດັບ 3</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">ຈຳນວນທັງໝົດ <?php echo number_format($poitm3, 3, ',', '.') ?> g</div>
                                    </div><br>
                                    <?php } elseif($spoit >= $poitm4){?>
                                    <h4 class="small font-weight-bold"><?php echo $snames ?> &nbsp;ມາຈາກ <?php echo $sschoolname ?><span
                                            class="float-right">ອັນດັບ 4</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">ຈຳນວນທັງໝົດ <?php echo number_format($poitm4, 3, ',', '.') ?> g</div>
                                    </div>
                                    <?php }else{ ?>
                                    <h4 class="small font-weight-bold"><?php echo $snames ?> &nbsp;ມາຈາກ <?php echo $sschoolname ?><span
                                            class="float-right">ອັນດັບ 5</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">ຈຳນວນທັງໝົດ <?php echo number_format($poitm5, 3, ',', '.') ?> g</div>
                                    </div>
                                    <?php }}?>
                                </div>
                            </div>

                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">ປຽບທຽບແຕ່ລະໂຮງຮຽນ</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> ນາທອງ
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> ທົງກາບ
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> ເຊໂປນ
                                        </span>
                                    </div> -->

                                    <?php 
                                        require_once('db.php');
                                        $results1 = mysqli_query($mysql_db, "SELECT schoolname, SUM(poit) AS value_sum1 FROM students WHERE schoolname = 'ມສ ວຽນຈັນ' ");
                                        $row = mysqli_fetch_array($results1);
                                        $ss1 = $row['value_sum1'];
                                        $ssn1 = $row['schoolname'];

                                        $results2 = mysqli_query($mysql_db, "SELECT schoolname, SUM(poit) AS value_sum2 FROM students WHERE schoolname = 'ໂຮງຮຽນນາທ້າວ' ");
                                        $row = mysqli_fetch_array($results2);
                                        $ss2 = $row['value_sum2'];
                                        $ssn2 = $row['schoolname'];

                                        $results3 = mysqli_query($mysql_db, "SELECT schoolname, SUM(poit) AS value_sum3 FROM students WHERE schoolname = 'ລາວ ແທ້ ອັບແແດບ' ");
                                        $row = mysqli_fetch_array($results3);
                                        $ss3 = $row['value_sum3'];
                                        $ssn3 = $row['schoolname'];
                                        
                                        $resum = $ss1 + $ss2 + $ss3;
                                        $ss1per1 = $ss1*100/$resum;
                                        $kg1 = 1000;
                                        $ss1per1k = $ss1 / $kg1;
                                        $ss1per1kf = number_format($ss1per1k,3, ',', '.');
                                        $ss1per1f = number_format($ss1per1,2);

                                        $ss1per2 = $ss2*100/$resum;
                                        $ss1per2k = $ss2 / $kg1;
                                        $ss1per2kf = number_format($ss1per2k,3, ',', '.');
                                        $ss1per2f = number_format($ss1per2,2);

                                        $ss1per3 = $ss3*100/$resum;
                                        $ss1per3k = $ss3 / $kg1;
                                        $ss1per3kf = number_format($ss1per3k,3, ',', '.');
                                        $ss1per3f = number_format($ss1per3,2);
                                    ?>

                                    <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?php echo $ssn1 ?> ຈຳນວນທັງໝົດ <?php echo $ss1per1kf ?> kg</div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ss1per1f; ?>%</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-warning" role="progressbar"
                                                                    style="width: <?php echo $ss1per1f; ?>%" aria-valuenow="<?php echo $ss1per1f; ?>" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $ssn2 ?> ຈຳນວນທັງໝົດ <?php echo $ss1per2kf ?> kg </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ss1per2f; ?>%</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-primary" role="progressbar"
                                                                    style="width: <?php echo $ss1per2f; ?>%" aria-valuenow="<?php echo $ss1per2f; ?>" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="card border-left-danger border-bottom-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo $ssn3 ?> ຈຳນວນທັງໝົດ <?php echo $ss1per3kf ?> kg   </div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ss1per3f; ?>%</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm mr-2">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: <?php echo $ss1per3f; ?>%" aria-valuenow="<?php echo $ss1per3f; ?>" aria-valuemin="0"
                                                                    aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <?php include 'Footer.php';?>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php include 'ModalLogout.php';?>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
      jQuery(document).ready(function(){
        jQuery('#laoding').fadeOut(1000);
      });
    </script>

</body>

</html>