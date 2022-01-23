<?php
    // Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: Home.php');
		exit;
	}else{}
    // Include config file
    include('db.php');
    // insert data form tabel
    $upload_dir = './img/school/';
    if (isset($_POST['Submit'])) {
        $schoolname = $_POST['schoolname'];
        $detials = $_POST['details'];

        $imgName = $_FILES['image']['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];

        if(!($schoolname)){
            $nerrorMsg = 'inputnschoolsname';
        }elseif(!($detials)){
            $errorMsg = 'inputdetials';
        }else{

            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

            $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

            if(in_array($imgExt, $allowExt)){

                if($imgSize < 5000000){
                    move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                }else{
                    $errorMsg = 'ຮູບມີຂະໜາດໃຫຍ່ເກີນໄປ';
                }
            }else{
                $errorMsg = 'ກະລຸນາເລືອກຮູບພາບ';
            }
        }

        if(!isset($errorMsg)){
              $sql = "insert into schools(schoolname, detials, file)
                      values('".$schoolname."', '".$detials."', '".$userPic."')";
            // $sql = "update admin
            //         set username = '".$name."',
            //         phone = '".$contact."',
            //         detais = '".$email."',
            //         file = '".$userPic."'
            //         where id=".$sid;
            $result = mysqli_query($mysql_db, $sql);
            if($result){
                $_SESSION['message'] = 'ເພີ່ມຂໍ້ມູນແລ້ວ';
                $_SESSION['message_type'] = 'success';
                // header('Location: School.php');
            }else{
                $errorMsg = 'Error '.mysqli_error($mysql_db);
            }
        }
    }
// up dated data

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $fname = $_POST['schoolname'];
        $lname = $_POST['details'];
        
        $imgName = $_FILES['image']['name'];
        $imgTmp = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];

        if(!($fname)){
            $nerrorMsg = 'inputnschoolsname';
            // header("Location:School.php");
        }elseif(!($lname)){
            $errorMsg = 'inputdetials';
            // header("Location:School.php");
        }else{

            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

            $allowExt  = array('jpeg', 'jpg', 'png', 'gif');

            $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

            if(in_array($imgExt, $allowExt)){

                if($imgSize < 5000000){
                    move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                }else{
                    $errorMsg = 'ຮູບມີຂະໜາດໃຫຍ່ເກີນໄປ';
                    // header("Location:School.php");
                }
            }else{
                $errorMsg = 'ກະລຸນາເລືອກຮູບພາບ';
                // header("Location:School.php");
            }
        }

        if(!isset($errorMsg)){
            $query = "UPDATE schools SET schoolname='$fname', detials='$lname', file='$userPic' WHERE id='$id'  ";
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
    // deleted schools
    if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM schools WHERE id='$id'";
    $query_run = mysqli_query($mysql_db, $query);

    if($query_run)
    {
      $_SESSION['message'] = 'ແກ້ໄຂຂໍ້ມູນແລ້ວ';
      $_SESSION['message_type'] = 'success';
    //   header('Location: School.php');
    }
    else
    {
      $errorMsg = 'Error '.mysqli_error($mysql_db);
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
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h3 class="h3 mb-0 text-gray-800">ໂຮງຮຽນ</h3>
                            <?php if (isset($_SESSION['message'])) { ?>
                                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['message']?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            <?php unset($_SESSION); } ?>
                        </div>
                        <p class="mb-4">ເພີ່ມ ແລະ ແກ້ໄຂຂໍ້ມູນຕ່າງໆຂອງໂຮງຮຽນ</p>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">ຂໍ້ມູນທັງໝົດ <button class="btn btn-primary" data-toggle="modal" data-target="#schoolModal"><i class="fas fa-plus-circle"></i></button></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ລດ</th>
                                                <th>ຊື່ໂຮງຮຽນ</th>
                                                <th>ລາຍລະອຽດ</th>
                                                <th>ຮູບພາບ</th>
                                                <th>ສະຖານະ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                require_once('db.php');
                                                $query = "SELECT * FROM schools";
                                                $result_tasks = mysqli_query($mysql_db, $query); 
                                                $st =1;
                                                while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                                                <tr>
                                                    <td style="display: none;"><?php echo $row['id']; ?></td>
                                                    <td width="3"><?php echo $st++; ?></td>
                                                    <td><?php echo $row['schoolname']; ?></td>
                                                    <td><?php echo $row['detials']; ?></td>
                                                    <td><img width="30px" height="30px" src="<?= "./img/school/".$row['file']?>" alt=""></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm editbtn"><i class="fas fa-edit"></i></a>
                                                        &nbsp;
                                                        <a class="btn btn-primary btn-sm deletebtn" ><i class="fas fa-trash-restore"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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
                        <form role="form" method="POST" action="" enctype="multipart/form-data">
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
                                    <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control input-lg" name="image" placeholder="ຮູບພາບ">
                                </div>
                            </div><br> <hr>
                            <button type="submit" name="Submit" class="btn btn-primary">ບັນທຶກ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- school deted modal -->
        <div class="modal fade" id="editmodal">
            <!-- xl sm -->
            <div class="modal-dialog modal-lg"> 
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">ແກ້ໄຂໂຮງຮຽນ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form role="form" method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <div>
                                    <input type="hidden" name="update_id" id="update_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <input type="text" id="schoolname" class="form-control input-lg" name="schoolname" placeholder="ຊື່ໂຮງຮຽນ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <input type="text" id="detials" class="form-control input-lg" name="details" placeholder="ສະຖານທີ່ ແລະ ລາຍລະອຽງຕ່າງໆ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <input type="file" name="image" accept="image/png, image/gif, image/jpeg" class="form-control input-lg" name="image" placeholder="ຮູບພາບ">
                                </div>
                            </div><br> <hr>
                            <button type="submit" name="updatedata" class="btn btn-primary">ບັນທຶກ</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ຍົກເລີກ</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- deleted modal -->
        <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> ທ່ານແນ່ໃຈບໍ່! </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" method="POST">

                        <div class="modal-body">

                            <input type="hidden" name="delete_id" id="delete_id">

                            <div class="modal-body">ວ່າທ່ານຕ້ອງການລົບຂໍ້ມູນີ້?</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> ຍົກເລີກ </button>
                            <button type="submit" name="deletedata" class="btn btn-primary"> ຕົກລົງ </button>
                        </div>
                    </form>

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

        <!-- delete funtions -->
        <script>
            $(document).ready(function () {

                $('.deletebtn').on('click', function () {

                    $('#deletemodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#delete_id').val(data[0]);

                });
            });
        </script>
        <!-- edete data -->
        <script>
            $(document).ready(function () {

                $('.editbtn').on('click', function () {

                    $('#editmodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#update_id').val(data[0]);
                    $('#schoolname').val(data[2]);
                    $('#detials').val(data[3]);
                });
            });
        </script>
        

    </body>

</html>