<?php
    session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: Login');
		exit;
	}
    // Include config file
    include('db.php');
        // insert data form tabel
        if (isset($_POST['Submit'])) {
            $name = $_POST['studentname'];
            $phone = $_POST['numberphone'];
            $schoolname = $_POST['schoolname'];
            $sid = $_POST['sid'];
            $sc = $_POST['sc'];
            $studentid = $sc.$sid;

            $poit1 = 0;
            $poit2 = 0;
            $poit3 = 0;
            $poit4 = 0;
            $poit5 = 0;
            $poit6 = 0;
            $poit7 = 0;
            $poit8 = 0;
            $poit9 = 0;
    
            if(!($name)){
                $errorMsg = 'inputname';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }elseif(!($phone)){
                $errorMsg = 'inputphone';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }elseif(!($schoolname)){
                $errorMsg = 'inputschoolname';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }elseif(!($sid)){
                $errorMsg = 'inputsid';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }elseif(!($sc)){
                $errorMsg = 'inputsid';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }
    
            if(!isset($errorMsg)){
                  $sql = "insert into students(name, phone, schoolname, sid, poit1, poit2, poit3, poit4, poit5, poit6, poit7, poit8, poit9)
                          values('".$name."', '".$phone."', '".$schoolname."', '".$studentid."', '".$poit1."', '".$poit2."', '".$poit3."', '".$poit4."', '".$poit5."', '".$poit6."', '".$poit7."', '".$poit8."', '".$poit9."')";
                $result = mysqli_query($mysql_db, $sql);
                if($result){
                    $_SESSION['message'] = 'ເພີ່ມຂໍ້ມູນແລ້ວ';
                    $_SESSION['message_type'] = 'success';
                }else{
                    $errorMsg = 'Error '.mysqli_error($mysql_db);
                }
            }
        }

        // deleted
        if (isset($_POST['deleted'])) {
            $studentid = $_POST['studentid'];
    
            if(!($studentid)){
                $errorMsg = 'inputstudentid';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }
    
            if(!isset($errorMsg)){
                $query = "DELETE FROM students WHERE id='$studentid'";
                $query_run = mysqli_query($mysql_db, $query);
            
                if($query_run)
                {
                  $_SESSION['message'] = 'ລົບຂໍ້ມູນແລ້ວ';
                  $_SESSION['message_type'] = 'success';
                }
                else
                {
                  $errorMsg = 'Error '.mysqli_error($mysql_db);
                }
            }
        }

        // edited
        if (isset($_POST['edited'])) {
            $name = $_POST['studentname'];
            $phone = $_POST['numberphone'];
            $schoolname = $_POST['schoolname'];
            $sid = $_POST['sid'];
            $esc = $_POST['esc'];
            $studentide = $esc.$sid;
    
            if(!($name)){
                $errorMsg = 'inputname';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }elseif(!($phone)){
                $errorMsg = 'inputphone';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }elseif(!($schoolname)){
                $errorMsg = 'inputschoolname';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }elseif(!($sid)){
                $errorMsg = 'inputsid';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }elseif(!($esc)){
                $errorMsg = 'inputsid';
                $_SESSION['message'] = 'ປ້ອນຂໍ້ມູນໃຫ້ຄົບ';
                $_SESSION['message_type'] = 'danger';
            }
    
            if(!isset($errorMsg)){
                $query = "UPDATE students SET name='$name', phone='$phone', schoolname='$schoolname', sid='$studentide' WHERE phone='$phone'  ";
                $query_run = mysqli_query($mysql_db, $query);

                if($query_run)
                {
                    $_SESSION['message'] = 'ອັບແດບຂໍ້ມູນແລ້ວ';
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

    <title>EcogrowLao - ຈັດການກັບນັກຮຽນ</title>
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
                            <h3 class="h3 mb-0 text-gray-800">ນັກຮຽນ</h3>
                            <?php if (isset($_SESSION['message'])) { ?>
                                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['message']?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            <?php unset($_SESSION['message']); } ?>
                    </div>
                    <p class="mb-4">ເພີ່ມ ແລະ ແກ້ໄຂຂໍ້ມູນຕ່າງໆຂອງນັກຮຽນ</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">ຂໍ້ມູນທັງໝົດ 
                                <button class="btn btn-success" data-toggle="modal" data-target="#studentModal"><i class="fas fa-plus-circle"></i></button>
                                &nbsp;
                                <button class="btn btn-success" data-toggle="modal" data-target="#studenteditedModal"><i class="fas fa-edit"></i></button>
                                &nbsp;
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#studentdeletedModal" ><i class="fas fa-trash-restore"></i></button>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ຊື່</th>
                                            <th>ເບີໂທ</th>
                                            <th>ໂຮງຮຽນ</th>
                                            <th>ID</th>
                                            <th>ຄະແນນ</th>
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
    <div class="modal fade" id="studentModal">
        <!-- xl sm -->
        <div class="modal-dialog modal-lg"> 
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">ເພີ່ມນັກຮຽນ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control input-lg" name="studentname" placeholder="ຊື່ແລະນາມສະກຸນ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="number" class="form-control input-lg" name="numberphone" placeholder="ເບີໂທ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <select class="form-control" name="schoolname">
                                    <option value="">ເລືອກໂຮງຮຽນ...</option>
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
                            <div class="row">
                                <div class="col-lg-2">
                                    <select class="form-control form-control-user" name="sc">
                                        <option value="">ເລືອກ...</option>
                                        <option value="NRD">NRD</option>
                                        <option value="VRV">VRV</option>
                                        <option value="LFIV">LFIV</option>
                                    </select>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control form-control-user" name="sid" placeholder="ID 6 ໂຕ...">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="Submit" class="btn btn-success">ບັນທຶກ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="studentdeletedModal">
        <!-- xl sm -->
        <div class="modal-dialog modal-lg"> 
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">ລົບຂໍ້ມູນີ້!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <div>
                                <select class="form-control" name="studentid" id="single" style="width:100%">
                                    <option >ຊອກຫາເບີໂທ...</option>
                                    <?php 
                                    $query = "SELECT * FROM students";
                                    $result_tasks = mysqli_query($mysql_db, $query); 
                                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['phone']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="deleted" class="btn btn-success">ບັນທຶກ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="studenteditedModal">
        <!-- xl sm -->
        <div class="modal-dialog modal-lg"> 
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">ແກ້ໄຂເພີ່ມນັກຮຽນ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <div>
                                <select class="form-control" name="numberphone" id="single2" style="width:100%">
                                    <option value="">ເລືອກເບີໂທ...</option>
                                    <?php 
                                    $query = "SELECT * FROM students";
                                    $result_tasks = mysqli_query($mysql_db, $query); 
                                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                        <option value="<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <select class="form-control" name="schoolname">
                                    <option value="">ເລືອກໂຮງຮຽນ...</option>
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
                                <input type="text" class="form-control input-lg" name="studentname" placeholder="ຊື່ແລະນາມສະກຸນ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                    <select class="form-control form-control-user" name="esc">
                                        <option value="">ເລືອກ...</option>
                                        <option value="NRD">NRD</option>
                                        <option value="VRV">VRV</option>
                                        <option value="LFIV">LFIV</option>
                                    </select>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control form-control-user" name="sid" placeholder="ID 6 ໂຕ...">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="edited" class="btn btn-success">ບັນທຶກ</button>
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
    <!-- select datatable -->
    <script>
			$(document).ready(function() {
				
				//คำสั่ง Javascript สำหรับเรียกใช้งาน Datatable
				$('#example').DataTable( {
					"processing": true,
					"serverSide": true,
					'serverMethod': 'post',
					"ajax": "dbStudents.php",
					'columns': [
                            { data: 'name' },
                            { data: 'phone' },
                            { data: 'schoolname' },
                            { data: 'sid' },
                            { data: 'poit' },
						],
				} );
			} );
	</script>

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $("#single").select2({
          allowClear: true
      });
      $("#single2").select2({
          allowClear: true
      });
    </script>

    <script>
      jQuery(document).ready(function(){
        jQuery('#laoding').fadeOut(1000);
      });
    </script>

</body>

</html>