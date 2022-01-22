<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>laos ewaste</title>
    <link rel="icon" type="image/x-icon" href="./img/icons/icons.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="page-top">

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
                        <h3 class="h3 mb-0 text-gray-800">ແກ້ໄຂ Profile</h3>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://scontent.fvte2-2.fna.fbcdn.net/v/t39.30808-6/s600x600/269949285_642442473735194_8951946166013674743_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeHY-EPgd_6S1l7cxiGncLuiygRjNJCqflnKBGM0kKp-WbVXbbD9QnMp2Yy0-zFsbBiZBbO4PwfjmPKUwmfW7sqK&_nc_ohc=eHzk0BPa2gcAX9ZD3f0&_nc_ht=scontent.fvte2-2.fna&oh=00_AT8_zfQtmQmy9qBo-dEBpYC_clGncFKymANdU4UsYM151g&oe=61F007E7" width="90"><span class="font-weight-bold">Mr. Jack Sainther</span><span class="text-black-50">nousainther@gmail.com</span><span>Laos PDR</span></div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <form role="form" method="POST" action="">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" class="form-control input-lg" name="schoolname" placeholder="ຊື່ແລະນາມສະກຸນ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <input type="number" class="form-control input-lg" name="details" placeholder="ເບີໂທ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <input type="details" class="form-control input-lg" name="details" placeholder="ລາຍລະອຽດ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <input type="file" class="form-control form-control-user" id="exampleInputPassword" placeholder="logo">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">ບັນທຶກ</button>
                                    <button type="reset" class="btn btn-secondary">ຍົກເລີກ</button>
                                </form>
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

</body>

</html>