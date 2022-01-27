<!-- slide image -->
<div class="page-banner home-banner mb-5">
      <div class="slider-wrapper">
        <div class="owl-carousel hero-carousel">
          <div class="hero-carousel-item">
            <img src="./assets/img/bg_image_1.jpg" alt="">
            <div class="img-caption">
              <div class="subhead">ພວກເຮົາຍິນດີຕ້ອນຮັບທ່ານເຂົ້າມາໃນີ້</div>
              <h1 class="mb-4">ສະບາຍດີ!</h1>
              <!-- <a href="#services" class="btn btn-outline-light">Get Started</a> -->
            </div>
          </div>
          <div class="hero-carousel-item">
            <?php 
              require_once('./adminecogrowth/db.php');
              $result4 = mysqli_query($mysql_db, "SELECT SUM(poit) AS value_sum FROM students;");
              $row = mysqli_fetch_array($result4);
              $count4 = $row['value_sum'];
              $kg = 1000;
              $pit = $count4 / $kg ?>
            <img src="./assets/img/bg_image_2.jpg" alt="">
            <div class="img-caption">
              <div class="subhead">ຕົວເລກຈຳນວນທີພວກເຮົາເກັບໄດ້ທັງໝົດມີ</div>
              <h1 class="mb-4">ຈຳນວນ <?php echo $pit; ?> kg</h1>
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
              <a href="#services" class="btn btn-success">ອ່ານເພີ່ມຕື່ມ</a>
            </div>
            <?php } ?>
          </div>
        </div>
    </div> <!-- .slider-wrapper -->
</div> <!-- .page-banner -->