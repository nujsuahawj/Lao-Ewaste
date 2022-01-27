<?php 
    $title = $_GET['title'];
    $db = 'blos';
    require('./adminecogrowth/db.php');
    $sql = "SELECT * FROM $db WHERE title = '$title' ";
    $result_tasks = mysqli_query($mysql_db, $sql); 
    while($row = mysqli_fetch_assoc($result_tasks)) {
      $titles = $row['title'];
      $detials1 = $row['detials1'];
      $detials = $row['detials'];
      $file = $row['file'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="Mr Jack Sainther, https://www.facebook.com/nousua.sainther">

  <title>EcogrowthLao - <?php echo $titles; ?> </title>
  <link rel="icon" type="image/x-icon" href="./adminecogrowth/img/blogs/<?php echo $file; ?>">
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
  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <?php include 'Header.php';?>
  </header>

  <main>
    <div class="page-section pt-4">
      <div class="container">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb bg-transparent mb-4">
            <li class="breadcrumb-item"><a href="Home">ໜ້າລັກ</a></li>
            <li class="breadcrumb-item"><a href="Conten">ຂ່າວສານ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $titles; ?></li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-8">
            <div class="blog-single-wrap">
              <div class="post-thumbnail">
                <img src="./adminecogrowth/img/blogs/<?php echo $file; ?>" alt="">
              </div>
              <h1 class="post-title"><?php echo $titles; ?></h1>
              <div class="post-content"> 
                <p><?php echo $detials1; ?></p>
                <p><?php echo $detials; ?></p>
              </div>
            </div> <!-- .blog-single-wrap -->
          </div>
          
          <div class="col-lg-4">
            <div class="widget">
  
              <div class="widget-box">
                <h3 class="widget-title">ຂ່າວສານຫຼ້າສຸດ</h3>
                <div class="blog-item">
                  <div class="content">
                    <?php 
                      $query = "SELECT * FROM blos ORDER BY id DESC limit 15";
                      $result_tasks = mysqli_query($mysql_db, $query); 
                      while($row = mysqli_fetch_assoc($result_tasks)) { echo '
                      <h6 class="post-title"><a href="ContenDedials?title='.$row['title'].'">'.$row['title'].'</a></h6>
                      <div class="meta">
                        <a href="ContenDedials?title='.$row['title'].'"><span class="mai-chatbubbles"></span> ອ່ານເພີ່ມຕື່ມ</a>
                      </div>';
                    } ?>
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