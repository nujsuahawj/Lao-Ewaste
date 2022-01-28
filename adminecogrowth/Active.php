<?php 
    session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: Home.php');
		exit;
	}
    // Include config file
    include('db.php');

    // edited
    if (isset($_POST['add'])) {
        $studentname = $_POST['studentname'];
        $schoolname = $_POST['schoolname'];
        $siction = $_POST['siction'];
        $detials = $_SESSION['username'];

        if(!($studentname)){
            $errorMsg = 'inputname';
            $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
            $_SESSION['message_type'] = 'danger';
        }elseif(!($schoolname)){
            $errorMsg = 'inputphone';
            $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
            $_SESSION['message_type'] = 'danger';
        }elseif(!($siction)){
            $errorMsg = 'inputschoolname';
            $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
            $_SESSION['message_type'] = 'danger';
        }elseif(!($detials)){
            $errorMsg = 'inputsid';
            $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
            $_SESSION['message_type'] = 'danger';
        }

        if(!isset($errorMsg)){
            $query = "insert into transictions(studentname, schoolname, siction, detials)
            values('".$studentname."', '".$schoolname."', '".$siction."', '".$detials."')";
            $query_run = mysqli_query($mysql_db, $query);

            if($query_run)
            {
                $_SESSION['message'] = 'ເພີ່ມຂໍ້ມູນແລ້ວ';
                $_SESSION['message_type'] = 'success';
                // header('Location: School.php');
            }
            else
            {
                $errorMsg = 'Error '.mysqli_error($mysql_db);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ecogrowthlao">
    <meta name="author" content="Mr Jack Sainther">

    <title>EcogrowLao - ຈັດການກັບການເຄື່ອນໄຫວຕ່າງໆ</title>
    <link rel="icon" type="image/x-icon" href="./img/icons/icons.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100;400&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- select 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                            <h3 class="h3 mb-0 text-gray-800">ທຸລະກຳ</h3>
                            <?php if (isset($_SESSION['message'])) { ?>
                                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['message']?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            <?php unset($_SESSION['message']); } ?>
                    </div>
                    <p class="mb-4">ການເຄື່ອນໄຫວທຸລະກຳຕ່າງໆ</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">ຂໍ້ມູນທັງໝົດ <button class="btn btn-success" data-toggle="modal" data-target="#ewasteModal"><i class="fas fa-plus-circle"></i></button></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ຊື່ນັກຮຽນ</th>
                                            <th>ຊື່ໂຮງຮຽນ</th>
                                            <th>ແລກຫຍັງ</th>
                                            <th>ເຄືອນໄຫວໂດຍ</th>
                                            <th>ເວລາ</th>
                                        </tr>
                                    </thead>
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
    <div class="modal fade" id="ewasteModal">
        <!-- xl sm -->
        <div class="modal-dialog modal-lg"> 
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">ເພີ່ມລາຍການທຸລະກຳ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <div>
                                <select class="form-control" name="studentname" id="single" style="width:100%">
                                    <option >ນັກຮຽນ...</option>
                                    <?php 
                                        $query = "SELECT * FROM students";
                                        $result_tasks = mysqli_query($mysql_db, $query); 
                                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                            <option value="<?php echo $row['schoolname']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                            <select class="form-control " name="schoolname">
                                <option >ໂຮງຮຽນ...</option>
                                    <?php 
                                    $query = "SELECT * FROM schools";
                                    $result_tasks = mysqli_query($mysql_db, $query); 
                                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                        <option value="<?php echo $row['schoolname']; ?>"><?php echo $row['schoolname']; ?></option>
                                    <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <select class="form-control" name="siction" id="single2" style="width:100%">
                                    <option >ຊອກຫາ ຂອງແລກ...</option>
                                    <option value="ເເປັກຊີ">ເເປັກຊີ</option>
                                    <option value="ກາເເຟ">ກາເເຟ</option>
                                    <option value="ນໍ້ານົມ">ນໍ້ານົມ</option>
                                </select>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="add" class="btn btn-success">ບັນທຶກ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                        </div>
                    </form>
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
    
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $("#single").select2({
        //   placeholder: "ຊື່ນັກຮຽນ",
          allowClear: true
      });
      $("#single2").select2({
        //   placeholder: "ຊື່ນັກຮຽນ",
          allowClear: true
      });
    </script>

    <!-- select datatable -->
    <script>
			$(document).ready(function() {
				
				//คำสั่ง Javascript สำหรับเรียกใช้งาน Datatable
				$('#example').DataTable( {
					"processing": true,
					"serverSide": true,
					'serverMethod': 'post',
					"ajax": "dbActive.php",
					'columns': [
                            { data: 'studentname' },
                            { data: 'schoolname' },
                            { data: 'siction' },
                            { data: 'detials' },
                            { data: 'updated' },
						],
				} );
			} );
	</script>
        <script>
      jQuery(document).ready(function(){
        jQuery('#laoding').fadeOut(1000);
      });
    </script>
    
</body>

</html>