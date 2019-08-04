<?php
  include(__DIR__."/includes/config.php");
?>
<html>
  <head>
    <?php
      include("includes/bootstrap.php");
    ?>
  </head>
  <body>
    <?php
      include("includes/header.php");
    ?>
  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5 headline font">ความทรงจำในค่าย  ควรค่าแก่การเก็บตลอดไป</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form action="templates/dashboard.php" method="GET">
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="text" name="camp_code" class="form-control form-control-lg font" placeholder="กรอกรหัสค่าย..">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg button font">ยืนยัน</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center font">
      <h1 class="subheadline">เว็บเขียนสมุดกระจกออนไลน์สำหรับค่าย</h1>
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <i class="m-auto color"><span class="iconify" data-icon="simple-line-icons:shield"></span></i>
                </div>
                <h3>ความทรงจำไม่เลือนหาย</h3>
                <p class="lead mb-0">คุณสามารถเรียกดูข้อความในสมุดกระจกออนไลน์นี้ได้ตลอดเวลาและตลอดไป</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <i class="m-auto color"><span class="iconify" data-icon="simple-line-icons:picture"></span></i>
                </div>
                <h3>เก็บได้มากกว่าข้อความ</h3>
                <p class="lead mb-0">รูปถ่ายเซลฟี่ อิโมจิ สติ๊กเกอร์น่ารัก ก็เก็บเป็นความทรงจำได้</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <i class="m-auto color"><span class="iconify" data-icon="simple-line-icons:badge"></span></i>
                </div>
                <h3>ช่วยคุณประหยัด</h3>
                <p class="lead mb-0">ไม่เปลืองกระดาษ ไม่เสียเวลาเตรียม ไม่มีค่าใช้จ่าย</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php
      include("includes/footer.php");
    ?>
  </body>
</html>
<body>