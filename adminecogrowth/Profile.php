<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: Home.php');
		exit;
	}
// Include config file
include('db.php');
// select data form tabel
    $sid = $_SESSION['id'];
    if($sid = !0){
        $sql = "select * from admin where id=".$sid;
        $result = mysqli_query($mysql_db, $sql);
        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        }else {
        $errorMsg = 'Could not Find Any Record';
        }
    }

    // update data
    $sid = $_SESSION['id'];
// insert data form tabel
    $upload_dir = './img/admin/';
    if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $contact = $_POST['phone'];
    $email = $_POST['details'];

    $imgName = $_FILES['image']['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];

    if(!($name)){
            $errorMsg = 'inputname';
            $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
            $_SESSION['message_type'] = 'danger';
        }elseif(!($contact)){
            $errorMsg = 'inputcontact';
            $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
            $_SESSION['message_type'] = 'danger';
        }elseif(!($email)){
            $errorMsg = 'email';
            $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
            $_SESSION['message_type'] = 'danger';
        }else{

            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

            $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

            if(in_array($imgExt, $allowExt)){

                if($imgSize < 5000000){
                    move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                }else{
                    $errorMsg = 'ຮູບມີຂະໜາດໃຫຍ່ເກີນໄປ';
                    $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                    $_SESSION['message_type'] = 'danger';
                }
            }else{
                $errorMsg = 'ກະລຸນາເລືອກຮູບພາບ';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }
        }


        if(!isset($errorMsg)){
            $sql = "update admin
                    set username = '".$name."',
                    phone = '".$contact."',
                    detais = '".$email."',
                    file = '".$userPic."'
                    where id=".$sid;
            $result = mysqli_query($mysql_db, $sql);
            if($result){
                $_SESSION['message'] = 'ແກ້ໄຂຂໍ້ມູນແລ້ວ';
                $_SESSION['message_type'] = 'success';
                header('Location: Profile.php');
            }else{
                $errorMsg = 'Error '.mysqli_error($mysql_db);
            }
        }
    }

?>
<!-- html -->
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
                        <h3 class="h3 mb-0 text-gray-800">ໂຮງຮຽນ Profile</h3>
                        <div class="d-sm-flex align-items-center justify-content-between mb-8">
                            <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['message']?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($_SESSION['message']); }?>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img id="adminlogo" width="200" class="rounded-circle mt-5" src="<?= "./img/admin/".$row['file']?>">
                                <span class="font-weight-bold"><b>ຊື່:</b> <?php echo $row['username'] ?></span>
                                <span class="text-black-50"><b>ເບີໂທ:</b> <?php echo $row['phone'] ?></span>
                                <span><b>ຂໍ້ມູນ:</b> <?php echo $row['detais'] ?></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" id="name" class="form-control input-lg" name="name" placeholder="ຊື່ແລະນາມສະກຸນ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <input type="number" id="phone" class="form-control input-lg" name="phone" placeholder="ເບີໂທ...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <input type="text" id="detials" class="form-control input-lg" name="details" placeholder="ລາຍລະອຽດ..">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <input type="file" id="logo" accept="image/png, image/gif, image/jpeg" name="image"  class="form-control form-control-user" id="exampleInputPassword" placeholder="logo">
                                        </div>
                                    </div>
                                    <button type="submit" name="add" class="btn btn-primary">ບັນທຶກ</button>
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
    <!-- fomr -->
    <script src="js/form.js"></script>

</body>

</html>