<!-- slide image -->
<div class="page-banner home-banner mb-5">
      <div class="slider-wrapper">
        <div class="owl-carousel hero-carousel">
          <div class="hero-carousel-item">
            <img src="./assets/img/bg_image_1.jpg" alt="">
            <div class="img-caption">
              <div class="subhead">ພວກເຮົາຍິນດີຕ້ອນຮັບທ່ານ</div>
              <h1 class="mb-4">ສະບາຍດີ!</h1>
              <!-- <a href="#services" class="btn btn-outline-light">Get Started</a> -->
            </div>
          </div>
          <div class="hero-carousel-item">
            <?php 
              require_once('./adminecogrowth/db.php');
              $result4 = mysqli_query($mysql_db, "SELECT SUM(poit1) AS value_sum1, SUM(poit2) AS value_sum2, SUM(poit3) AS value_sum3, SUM(poit4) AS value_sum4, SUM(poit5) AS value_sum5, SUM(poit6) AS value_sum6, SUM(poit7) AS value_sum7, SUM(poit8) AS value_sum8, SUM(poit9) AS value_sum9 FROM students;");
              $row = mysqli_fetch_array($result4);
              $count4 = $row['value_sum1'];
              $count5 = $row['value_sum2'];
              $count6 = $row['value_sum3'];
              $count7 = $row['value_sum4'];
              $count8 = $row['value_sum5'];
              $count9 = $row['value_sum6'];
              $count10 = $row['value_sum7'];
              $count11 = $row['value_sum8'];
              $count12 = $row['value_sum9'];
              $tagnrho = $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 +$count12;

              $kg = 1000;
              $pit = $tagnrho / $kg;
              $pitf = number_format($pit, 3, ',', '.');?>
            <img src="./assets/img/bg_image_2.jpg" alt="">
            <div class="img-caption">
              <div class="subhead">ຈຳນວນທີ່ພວກເຮົາເກັບໄດ້</div>
              <h1 class="mb-4">ທັງໝົດ <?php echo $pitf; ?> kg</h1>
              <!-- <a href="#services" class="btn btn-outline-light">Get Started</a>
              <a href="#services" class="btn btn-success">See Pricing</a> -->
            </div>
          </div>
          <div class="hero-carousel-item">
            <?php 
              $query = "SELECT  *  FROM blos ORDER BY id DESC limit 1";
              $result_tasks = mysqli_query($mysql_db, $query); 
              while($row = mysqli_fetch_assoc($result_tasks)) { ?>
            <img src="<?= "./adminecogrowth/img/blogs/".$row['file']?>" alt="">
            <div class="img-caption">
              <div class="subhead"><?php echo $row['title']; ?></div>
              <h1 class="mb-4">ກິດຈະກຳຂອງພວເຮົາ</h1>
              <a href="Conten" class="btn btn-success">ອ່ານເພີ່ມຕື່ມ</a>
            </div>
            <?php } ?>
          </div>
        </div>
    </div> <!-- .slider-wrapper -->
</div> <!-- .page-banner -->