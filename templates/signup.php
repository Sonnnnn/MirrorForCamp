<?php
  include(__DIR__."/../includes/config.php");
?>
<html>
  <head>
    <?php
      include(__DIR__."/../includes/bootstrap.php");
    ?>
  </head>
  <body>
    <?php
      include(__DIR__."/../includes/header.php");
    ?>

      <div class="font">
        <h1>เปิดใช้งานกระจกเงาออนไลน์ สำหรับค่ายของคุณ</h1><br>

          <form action="signupSucess.php" method="POST">
                <div class="form-row">
                 <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <h4 class="topic">ชื่อค่าย</h4>
                      <input type="text" class="form-control form-control-lg font" name="camp_name" placeholder="เช่น ค่ายอนุชนคริสตจักรน้ำหนึ่งใจเดียวกัน">
                      (กรุณาตรวจสอบให้แน่ใจว่าสะกดถูกต้อง เพราะแก้ไขภายหลังไม่ได้) <br><br>

                      <input type="submit" value="Submit" class="btn button">
          </form>
      </div>
</body>
</html>