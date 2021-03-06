<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="Mr Jack Sainther, https://www.facebook.com/nousua.sainther">

  <title>EcogrowthLao - ກວດເບີ່ງຄະແນນທີ່ຝາກຖິ້ມກັບໂຄງການ</title>
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
                <li class="breadcrumb-item active" aria-current="page">ເບິ່ງຄະແນນ</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">ຈຳນວນຄະແນນທີ່ສະສົນໄດ້</h1>
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
                                        <h1 class="h4 text-gray-900 mb-4"><span class="fg-success">ກວດເບິ່ງຄະແນນຂອງທ່ານ</span></h1>
                                    </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-user text-center" autocomplete="off" placeholder="ID 6 ໂຕ..." />
                                        <hr>
                                        <div class="result text-center"></div>
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


<!-- atuto search -->

<script>
$(document).ready(function(){
    $('.form-group input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("autosearch.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".form-group").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

<script>
  jQuery(document).ready(function(){
    jQuery('#laoding').fadeOut(1000);
  });
</script>

</body>
</html>