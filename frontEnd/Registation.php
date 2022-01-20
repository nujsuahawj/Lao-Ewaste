<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>laos ewaste</title>
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

</head>
<body>

  <header>
    <?php include 'Header.php';?>

    <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url(./assets/img/bg_image_3.jpg);">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="Home.php">ໜ້າລັກ</a></li>
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
                                        <h1 class="h4 text-gray-900 mb-4">ຟອມລົງທະບຽນ</h1>
                                    </div>
                                    <form class="user" action="#">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="ຊື່ແລະນາມສະກຸນ...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="ເບີໂທ...">
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control">
                                            <option selected>ໂຮງຮຽນ...</option>
                                            <option value="1">1 school name</option>
                                            <option value="2">2 school name</option>
                                            <option value="3">3 school name</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="ID 6 ໂຕທີ່ທ່ານມັກທີສຸດແລະຈື່ງ່າຍທີ່ສຸດ...">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            ບັນທຶກ
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="Score.php">ເບິ່ງຄະແນນສະສົນຂອງທ່ານ</a>
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

    <div class="page-section">
      <div class="container-fluid">
        <div class="row row-cols-md-3 row-cols-lg-5 justify-content-center text-center">
          <div class="py-3 px-5">
            <img src="./assets/img/clients/airbnb.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="./assets/img/clients/google.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="./assets/img/clients/mailchimp.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="./assets/img/clients/paypal.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="./assets/img/clients/stripe.png" alt="">
          </div>
        </div>
      </div> <!-- .container-fluid -->
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

</body>
</html>