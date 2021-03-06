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
                                        $result4 = mysqli_query($mysql_db, "SELECT SUM(poit1) AS value_sum1, SUM(poit2) AS value_sum2, SUM(poit3) AS value_sum3, SUM(poit4) AS value_sum4, SUM(poit5) AS value_sum5, SUM(poit6) AS value_sum6, SUM(poit7) AS value_sum7, SUM(poit8) AS value_sum8, SUM(poit9) AS value_sum9 FROM students;");
                                        $row = mysqli_fetch_array($result4);
                                        $count4 = $row['value_sum1'];
                                        $count5 = $row['value_sum2'];
                                        $count6 = $row['value_sum3'];
                                        $count7 = $row['value_sum4'];
                                        $count8 = $row['value_sum5'];
                                        $count9 = $row['value_sum6'];
                                        $count10 = $row['value_sum7'];
                                        $count11 = $row['value_sum8'];
                                        $count12 = $row['value_sum9'];
                                        $tagnrho = $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 +$count12;

                                        $kg = 1000;
                                        $pit = $tagnrho / $kg;
                                        $pitf = number_format($pit, 3, ',', '.');?>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                ????????????????????????????????????????????????????????????</div>
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
                                                ???????????????????????????????????????????????????</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count1; ?> ??????????????????</div>
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
                                                ???????????????????????????????????????????????????</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2; ?> ?????????</div>
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
                                                ???????????????????????????????????????????????????</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count3; ?> ??????????????????</div>
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
                                    <h6 class="m-0 font-weight-bold text-primary">5 ????????????????????????????????????????????????????????????</h6>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        require_once('db.php');

                                        $resultm1 = mysqli_query($mysql_db, "SELECT name, schoolname, poit1 + poit2 + poit3 + poit4 + poit5 + poit6 + poit7 + poit8 + poit9 AS sump1 FROM students ORDER BY sump1 DESC LIMIT 1;");
                                        $row = mysqli_fetch_array($resultm1);
                                        $snp1 = $row['sump1'];
                                        $snn1 = $row['name'];
                                        $snsn1 = $row['schoolname'];
                                        $snpkg1 = $snp1/1000;

                                        $resultm2 = mysqli_query($mysql_db, "SELECT name, schoolname, poit1 + poit2 + poit3 + poit4 + poit5 + poit6 + poit7 + poit8 + poit9 AS sump2 FROM students ORDER BY sump2 DESC LIMIT 1,1;");
                                        $row = mysqli_fetch_array($resultm2);
                                        $snp2 = $row['sump2'];
                                        $snn2 = $row['name'];
                                        $snsn2 = $row['schoolname'];
                                        $snpkg2 = $snp2/1000;

                                        $resultm3 = mysqli_query($mysql_db, "SELECT name, schoolname, poit1 + poit2 + poit3 + poit4 + poit5 + poit6 + poit7 + poit8 + poit9 AS sump3 FROM students ORDER BY sump3 DESC LIMIT 2,1;");
                                        $row = mysqli_fetch_array($resultm3);
                                        $snp3 = $row['sump3'];
                                        $snn3 = $row['name'];
                                        $snsn3 = $row['schoolname'];
                                        $snpkg3 = $snp3/1000;

                                        $resultm4 = mysqli_query($mysql_db, "SELECT name, schoolname, poit1 + poit2 + poit3 + poit4 + poit5 + poit6 + poit7 + poit8 + poit9 AS sump4 FROM students ORDER BY sump4 DESC LIMIT 3,1;");
                                        $row = mysqli_fetch_array($resultm4);
                                        $snp4 = $row['sump4'];
                                        $snn4 = $row['name'];
                                        $snsn4 = $row['schoolname'];
                                        $snpkg4 = $snp4/1000;

                                        $resultm5 = mysqli_query($mysql_db, "SELECT name, schoolname, poit1 + poit2 + poit3 + poit4 + poit5 + poit6 + poit7 + poit8 + poit9 AS sump5 FROM students ORDER BY sump5 DESC LIMIT 4,1;");
                                        $row = mysqli_fetch_array($resultm5);
                                        $snp5 = $row['sump5'];
                                        $snn5 = $row['name'];
                                        $snsn5 = $row['schoolname'];
                                        $snpkg5 = $snp5/1000;

                                        $snppersent = $snp1 + $snp2 + $snp3 + $snp4 + $snp5;
                                        $snppersent1 = $snp1*100/$snppersent;
                                        $snppersent2 = $snp2*100/$snppersent;
                                        $snppersent3 = $snp3*100/$snppersent;
                                        $snppersent4 = $snp4*100/$snppersent;
                                        $snppersent5 = $snp5*100/$snppersent;

                                    ?>

                                        <h4 class="small font-weight-bold"> <?php echo $snn1; ?> &nbsp; <?php echo $snsn1 ?>
                                            <span class="float-right">?????????????????? <?php echo number_format($snpkg1, 3, ',', '.') ?> Kg</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $snppersent1; ?>%;" aria-valuenow="<?php echo $snppersent1; ?>" aria-valuemin="0" aria-valuemax="100"> </div>
                                        </div>

                                        <h4 class="small font-weight-bold"><?php echo $snn2; ?> &nbsp; <?php echo $snsn2 ?> 
                                            <span class="float-right">?????????????????? <?php echo number_format($snpkg2, 3, ',', '.') ?> Kg</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $snppersent2; ?>%;"  aria-valuenow="<?php echo $snppersent2; ?>" aria-valuemin="0" aria-valuemax="100"> </div>
                                        </div>

                                        <h4 class="small font-weight-bold"><?php echo $snn3; ?> &nbsp; <?php echo $snsn3 ?>  
                                            <span class="float-right">?????????????????? <?php echo number_format($snpkg3, 3, ',', '.') ?> Kg</span>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $snppersent3; ?>%;"  aria-valuenow="<?php echo $snppersent3; ?>" aria-valuemin="0" aria-valuemax="100"> </div>
                                        </div><br>

                                        <h4 class="small font-weight-bold"><?php echo $snn4; ?> &nbsp; <?php echo $snsn4 ?>
                                            <span class="float-right">?????????????????? <?php echo number_format($snpkg4, 3, ',', '.') ?> Kg</span>
                                        </h4>
                                         <div class="progress mb-4">
                                            <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $snppersent4; ?>%;"     aria-valuenow="<?php echo $snppersent4; ?>" aria-valuemin="0" aria-valuemax="100"> </div>
                                        </div>

                                        <h4 class="small font-weight-bold"><?php echo $snn5; ?> &nbsp; <?php echo $snsn5 ?>
                                            <span class="float-right">?????????????????? <?php echo number_format($snpkg5, 3, ',', '.') ?> Kg</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $snppersent5; ?>%;"   aria-valuenow="<?php echo $snppersent5; ?>" aria-valuemin="0" aria-valuemax="100"> </div>
                                        </div> 
                                </div>
                            </div>

                            <!-- Color System -->
                            <?php 
                                        require_once('db.php');
                                        $results1 = mysqli_query($mysql_db, "SELECT SUM(poit1) AS value_sum1, SUM(poit2) AS value_sum2, SUM(poit3) AS value_sum3, SUM(poit4) AS value_sum4, SUM(poit5) AS value_sum5, SUM(poit6) AS value_sum6, SUM(poit7) AS value_sum7, SUM(poit8) AS value_sum8, SUM(poit9) AS value_sum9 FROM students ");
                                        $row = mysqli_fetch_array($results1);
                                        $ss1 = $row['value_sum1'];
                                        $ss2 = $row['value_sum2'];
                                        $ss3 = $row['value_sum3'];
                                        $ss4 = $row['value_sum4'];
                                        $ss5 = $row['value_sum5'];
                                        $ss6 = $row['value_sum6'];
                                        $ss7 = $row['value_sum7'];
                                        $ss8 = $row['value_sum8'];
                                        $ss9 = $row['value_sum9'];

                                        $ssfm1 = number_format($ss1,3, ',', '.');
                                        $ssfm2 = number_format($ss2,3, ',', '.');
                                        $ssfm3 = number_format($ss3,3, ',', '.');
                                        $ssfm4 = number_format($ss4,3, ',', '.');
                                        $ssfm5 = number_format($ss5,3, ',', '.');
                                        $ssfm6 = number_format($ss6,3, ',', '.');
                                        $ssfm7 = number_format($ss7,3, ',', '.');
                                        $ssfm8 = number_format($ss8,3, ',', '.');
                                        $ssfm9 = number_format($ss9,3, ',', '.');
                                        $kilog= "Kg";
                            ?>
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            ??????????????? aluminium
                                            <div class="text-white-50 small"><?php echo $ssfm1.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            ??????????????? ???????????? A4 ????????? ????????????
                                            <div class="text-white-50 small"><?php echo $ssfm2.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                         ??????????????? ?????????????????????????????????????????????
                                            <div class="text-white-50 small"><?php echo $ssfm3.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            ??????????????? metal
                                            <div class="text-black-50 small"><?php echo $ssfm7.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            ??????????????? ????????????????????????????????????
                                            <div class="text-white-50 small"><?php echo $ssfm5.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            ??????????????? ?????????????????????
                                            <div class="text-white-50 small"><?php echo $ssfm6.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                             ???????????????   ????????????????????????
                                            <div class="text-white-50 small"><?php echo $ssfm4.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            ??????????????? ?????????????????????
                                            <div class="text-white-50 small"><?php echo $ssfm8.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success dark text-white shadow">
                                        <div class="card-body">
                                            ??????????????? ???????????????????????????
                                            <div class="text-white-50 small"><?php echo $ssfm9.$kilog; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">???????????????????????????????????????????????????</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> ???????????????
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> ??????????????????
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> ???????????????
                                        </span>
                                    </div> -->

                                    <?php 
                                        require_once('db.php');
                                        $results1 = mysqli_query($mysql_db, "SELECT schoolname, SUM(poit1) AS value_sum11, SUM(poit2) AS value_sum12, SUM(poit3) AS value_sum13, SUM(poit4) AS value_sum14, SUM(poit5) AS value_sum15, SUM(poit6) AS value_sum16, SUM(poit7) AS value_sum17, SUM(poit8) AS value_sum18, SUM(poit9) AS value_sum19 FROM students WHERE schoolname = '?????????????????? ?????????????????? ??????????????????????????????' ");
                                        $row = mysqli_fetch_array($results1);
                                        $ss11 = $row['value_sum11'];
                                        $ss12 = $row['value_sum12'];
                                        $ss13 = $row['value_sum13'];
                                        $ss14 = $row['value_sum14'];
                                        $ss15 = $row['value_sum15'];
                                        $ss16 = $row['value_sum16'];
                                        $ss17 = $row['value_sum17'];
                                        $ss18 = $row['value_sum18'];
                                        $ss19 = $row['value_sum19'];
                                        $ssk1 = $ss11 + $ss12 + $ss13 + $ss14 + $ss15 + $ss16 + $ss17 + $ss18 +$ss19;
                                        $ssn1 = $row['schoolname'];

                                        $results2 = mysqli_query($mysql_db, "SELECT schoolname, SUM(poit1) AS value_sum21, SUM(poit2) AS value_sum22, SUM(poit3) AS value_sum23, SUM(poit4) AS value_sum24, SUM(poit5) AS value_sum25, SUM(poit6) AS value_sum26, SUM(poit7) AS value_sum27, SUM(poit8) AS value_sum28, SUM(poit9) AS value_sum29 FROM students WHERE schoolname = '?????????????????? ???????????????????????????' ");
                                        $row = mysqli_fetch_array($results2);
                                        $ss21 = $row['value_sum21'];
                                        $ss22 = $row['value_sum22'];
                                        $ss23 = $row['value_sum23'];
                                        $ss24 = $row['value_sum24'];
                                        $ss25 = $row['value_sum25'];
                                        $ss26 = $row['value_sum26'];
                                        $ss27 = $row['value_sum27'];
                                        $ss28 = $row['value_sum28'];
                                        $ss29 = $row['value_sum29'];
                                        $ssk2 = $ss21 + $ss22 + $ss23 + $ss24 + $ss25 + $ss26 + $ss27 + $ss28 +$ss29;
                                        $ssn2 = $row['schoolname'];

                                        $results3 = mysqli_query($mysql_db, "SELECT schoolname, SUM(poit1) AS value_sum31, SUM(poit2) AS value_sum32, SUM(poit3) AS value_sum33, SUM(poit4) AS value_sum34, SUM(poit5) AS value_sum35, SUM(poit6) AS value_sum36, SUM(poit7) AS value_sum37, SUM(poit8) AS value_sum38, SUM(poit9) AS value_sum39 FROM students WHERE schoolname = '?????????????????? ?????????????????? ?????????????????????' ");
                                        $row = mysqli_fetch_array($results3);
                                        $ss31 = $row['value_sum31'];
                                        $ss32 = $row['value_sum32'];
                                        $ss33 = $row['value_sum33'];
                                        $ss34 = $row['value_sum34'];
                                        $ss35 = $row['value_sum35'];
                                        $ss36 = $row['value_sum36'];
                                        $ss37 = $row['value_sum37'];
                                        $ss38 = $row['value_sum38'];
                                        $ss39 = $row['value_sum39'];
                                        $ssk3 = $ss31 + $ss32 + $ss33 + $ss34 + $ss35 + $ss36 + $ss37 + $ss38 +$ss39;
                                        $ssn3 = $row['schoolname'];
                                        
                                        $resum = $ssk1 + $ssk2 + $ssk3;
                                        $ss1per1 = $ssk1*100/$resum;
                                        $kg1 = 1000;
                                        $ss1per1k = $ssk1 / $kg1;
                                        $ss1per1kf = number_format($ss1per1k,3, ',', '.');
                                        $ss1per1f = number_format($ss1per1,2);

                                        $ss1per2 = $ssk2*100/$resum;
                                        $ss1per2k = $ssk2 / $kg1;
                                        $ss1per2kf = number_format($ss1per2k,3, ',', '.');
                                        $ss1per2f = number_format($ss1per2,2);

                                        $ss1per3 = $ssk3*100/$resum;
                                        $ss1per3k = $ssk3 / $kg1;
                                        $ss1per3kf = number_format($ss1per3k,3, ',', '.');
                                        $ss1per3f = number_format($ss1per3,2);
                                    ?>

                                    <div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?php echo $ssn1 ?> ???????????????????????????????????? <?php echo $ss1per1kf ?> kg</div>
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
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $ssn2 ?> ???????????????????????????????????? <?php echo $ss1per2kf ?> kg </div>
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
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo $ssn3 ?> ???????????????????????????????????? <?php echo $ss1per3kf ?> kg   </div>
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