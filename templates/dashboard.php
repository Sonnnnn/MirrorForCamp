<?php
  include(__DIR__."/../includes/config.php");
?>
<html>
  <head>
    <?php
      include("../includes/bootstrap.php");
    ?>
  </head>
  <body>
    <?php
      include("../includes/header.php");
    ?>
    <!-- HTML start from here -->
    <div class="container">
      <?php
        include(__DIR__."/../includes/sqlConnection.class.php");
        include(__DIR__."/../includes/mirror.engine.class.php");


        $camp_code = $_GET["camp_code"];

        $connect = new Connect();
        $mirror = new Mirror($camp_code);

        if ($mirror->isCampExist($camp_code)) {
          $camp_name = $mirror->getCampName();
          $camp_id = $mirror->getCampID();
      ?>
          <h1><strong><?=$camp_name?></strong></h1>

          <div align="center">
            <a class="btn btn-success green button" href="addbook.php?camp_code=<?=$camp_code?>" role="button">+ เพิ่มสมุดกระจก</a>
            <a class="btn btn-warning button" href="#" role="button">เปิดกระจกอ่าน</a>
          </div>


          <div class="row">
            <!-- ต้องเขียนให้มันดึงข้อมูลจาก table_attendee โดยดึง N จำนวนแถว, display_name, caption (if have)
            จากนั้น เขียนให้มัน display รูป icon จดหมาย n ตัว และใส่ display_name ไว้ข้างล่าง และ check if caption ก่อน ถ้ามีก็ให้ใส่ไปด้วย
            เมื่อกดคลิก icon หรือ display_name จะต้องไป  พร้อมเก็บตัวแปรของ display_name บรรทัดนั้นตามไปด้วย -->

            <?php
              $query = "SELECT `id`, `display_name`, `caption` FROM `table_attendee` WHERE `camp_id` = '{$camp_id}'";
              $connect->query($query);

              while ($connect->next_record()) {
                ?>
                  <div class="envelope-container col-lg-3 col-sm-4 col-6 text-center margin">
                    <a href="leaveMessage.php?attendee_id=<?=$connect->getValue("id")?>&camp_code=<?=$camp_code?>">

                      <div class="envelope-icon">
                        <div class="features-icons-icon d-flex">
                        <i class="m-auto color envelope-size"> <span class="iconify" data-icon="fa-regular:envelope-open" data-inline="false"></span> </i>
                        </div>
                      </div>
                      <div id="attendee-name"> <h5> <?=$connect->getValue("display_name")?> </h5> </div>
                      <div id="attendee-caption"><?=$connect->getValue("caption")?></div>

                    </a>
                  </div>
                <?php
              }
            ?>
          </div>


      <?php
        }
        else {
        ?>
          <h1><strong>ไม่พบค่าย กรุณากรอกรหัสค่ายให้ถูกต้อง</strong></h1>
          <div class="text-center">
            <a href="../index.php">กลับหน้าแรก</a>
          </div>
        <?php
        }
      ?>
    </div>
    <?php
      include("../includes/footer.php");
    ?>
  </body>
</html>