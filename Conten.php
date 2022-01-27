<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="Mr Jack Sainther, https://www.facebook.com/nousua.sainther">

  <title>EcogrowthLao - ການເຄື່ອນໄຫວຂອງໂຄງການ</title>
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
                <li class="breadcrumb-item active" aria-current="page">ຂ່າວສານ</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">ຂ່າວສານຕ່າງໆຂອງພວກເຮົາ</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="row">
            <?php 
              include('./adminecogrowth/db.php');
              $query = "SELECT  id, title, file, detials1 FROM blos group BY id DESC";

              $result_tasks = mysqli_query($mysql_db, $query); 
              while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <div class="col-md-6 col-lg-4 py-3">
                  <div class="blog">
                    <div class="header">
                      <img id="image" width="100%" height="300" src="<?= "./adminecogrowth/img/blogs/".$row['file']?>" alt="">
                    </div>
                    <div class="body">
                      <div class="post-title">
                        <?php 
                        echo '<a href="ContenDedials?title='.$row['title'].'">'.$row['title'].'</a>';
                        ?>
                      </div>
                      <div class="post-excerpt"><?php echo $row['detials1']; ?>
                    </div>
                    </div>
                    <div class="footer">
                      
                      <?php
                        echo '<a class="btn btn-success" href="ContenDedials?title='. $row['title'] .'" title="ອ່ານເພີ່ມຕື່ມ" data-toggle="tooltip">ອ່ານເພີ່ມຕື່ມ<span class="fa fa-trash"></span><span class="mai-chevron-forward text-sm"></span></a>';
                      ?>
                    </div>
                  </div>
                </div>
              <?php } ?>

              <!-- next page -->
              <!-- <div class="col-12 my-5">
                <nav aria-label="Page Navigation">
                  <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                      <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
              </div> -->
              <!-- end next page -->
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