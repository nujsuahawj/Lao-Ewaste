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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h3 mb-2 text-gray-800">ໂຮງຮຽນ</h1>
                    <p class="mb-4">ເພີ່ມ ແລະ ແກ້ໄຂຂໍ້ມູນຕ່າງໆຂອງໂຮງຮຽນ</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ຂໍ້ມູນທັງໝົດ <button class="btn btn-primary" data-toggle="modal" data-target="#schoolModal"><i class="fas fa-plus-circle"></i></button></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ລດ</th>
                                            <th>ຊື່ໂຮງຮຽນ</th>
                                            <th>ສະຖານທີແລະລາຍລະອຽດ</th>
                                            <th>ຮູບພາບ</th>
                                            <th>ສະຖານະ</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <tr>
                                            <td width="3">1</td>
                                            <td>ມສ ທົງກາບ</td>
                                            <td>ດົງໂດກ, ມຊ</td>
                                            <td><img width="30px" height="30px" src="./img/icons/icons.png" alt=""></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-primary btn-sm" onclick="return confirm('ທ່ານແນ່ໃຈວ່າຕ້ອງການລົບຂໍ້ມູນນີ້ບໍ?');"><i class="fas fa-trash-restore"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="3">2</td>
                                            <td>ມສ ນາປົງ</td>
                                            <td>ດົງໂດກ, ມຊ</td>
                                            <td><img width="30px" height="30px" src="./img/icons/icons.png" alt=""></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-primary btn-sm" ><i class="fas fa-trash-restore"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="3">3</td>
                                            <td>ມສ ນາແລ</td>
                                            <td>ດົງໂດກ, ມຊ</td>
                                            <td><img width="30px" height="30px" src="./img/icons/icons.png" alt=""></td>
                                            <td>
                                                <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-primary btn-sm" ><i class="fas fa-trash-restore"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <!-- school Modal-->
    <div class="modal fade" id="schoolModal">
        <!-- xl sm -->
        <div class="modal-dialog modal-lg"> 
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">ເພີ່ມໂຮງຮຽນ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" method="POST" action="">
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control input-lg" name="schoolname" placeholder="ຊື່ໂຮງຮຽນ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control input-lg" name="details" placeholder="ສະຖານທີ່ ແລະ ລາຍລະອຽງຕ່າງໆ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="file" class="form-control input-lg" name="details" placeholder="ຮູບພາບ">
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ບັນທຶກ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>