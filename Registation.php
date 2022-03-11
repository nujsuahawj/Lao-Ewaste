<?php 
  // Include config file
  include('./adminecogrowth/db.php');

  // edited
  if (isset($_POST['add'])) {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
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
          $query_run = mysqli_query($mysql_db, $sql);

          if($query_run)
          {
              $_SESSION['message'] = 'ເພີ່ມຂໍ້ມູນແລ້ວ';
              $_SESSION['message_type'] = 'success';
              header('Location: Score.php');
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="Mr Jack Sainther, https://www.facebook.com/nousua.sainther">

  <title>EcogrowthLao - ລົງທະບຽນຝາກຖິ້ມກັບໂຄງການ</title>
  <link rel="icon" type="image/x-icon" href="./assets/img/icons.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="./assets/css/style.css">

  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  
  <link rel="stylesheet" href="./assets/css/maicons.css">

  <link rel="stylesheet" href="./assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="./assets/vendor/fancybox/css/jquery.fancybox.css">

  <link rel="stylesheet" href="./assets/css/theme.css">
  <!-- notosans -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100;400&display=swap" rel="stylesheet">

</head>
<body>

  <div id="laoding"></div>

  <header>
    <?php include 'Header.php';?>

    <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url(./assets/img/bg_image_3.jpg);">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="Home">ໜ້າລັກ</a></li>
                <li class="breadcrumb-item active" aria-current="page">ລົງທະບຽນ</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">ລົງທະບຽນຝາກຖິ້ມ</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                      <p>
                                        <?php if (isset($_SESSION['message'])) { ?>
                                          <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                              <?= $_SESSION['message']?>
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                        <?php unset($_SESSION['message']); } ?>
                                      </p>
                                      <h1 class="h4 text-gray-900 mb-4"><span class="fg-success">ຟອມລົງທະບຽນ</span></h1>
                                    </div>
                                    <form class="user" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="name" aria-describedby="emailHelp"
                                                placeholder="ຊື່ແລະນາມສະກຸນ...">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                name="phone" placeholder="ເບີໂທ...">
                                        </div>
                                        <div class="form-group">
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
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col-lg-2">
                                              <select class="form-control form-control-user" name="sc">
                                                <option value="">ເລືອກ...</option>
                                                <option value="SBH">SBH</option>
                                                <option value="VRV">VRV</option>
                                                <option value="CMN">CMN</option>
                                              </select>
                                            </div>
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control form-control-user"
                                                name="sid" placeholder="ID 6 ໂຕທີ່ທ່ານມັກທີສຸດແລະຈື່ງ່າຍທີ່ສຸດ...">
                                            </div>
                                          </div>
                                        </div>
                                        
                                        <button type="submit" name="add" class="btn btn-success btn-user btn-block">
                                            ບັນທຶກ
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="Score">ເບິ່ງຄະແນນສະສົນຂອງທ່ານ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>


  <footer class="page-footer">
    <?php include 'Footer.php';?>
  </footer>

  
<script src="./assets/js/jquery-3.5.1.min.js"></script>

<script src="./assets/js/bootstrap.bundle.min.js"></script>

<script src="./assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="./assets/vendor/wow/wow.min.js"></script>

<script src="./assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

<script src="./assets/vendor/isotope/isotope.pkgd.min.js"></script>

<script src="./assets/js/google-maps.js"></script>

<script src="./assets/js/theme.js"></script>

<script>
  jQuery(document).ready(function(){
    jQuery('#laoding').fadeOut(1000);
  });
</script>

</body>
</html>