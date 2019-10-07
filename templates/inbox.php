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


        $attendee_id = $_GET["attendee_id"];

        $connect = new Connect();
      //  $mirror = new Mirror($attendee_id);

      //  if ($mirror->isCampExist($attendee_id)) {
      //    $camp_name = $mirror->getCampName();
      //    $camp_id = $mirror->getCampID();
      ?>


            <!-- สร้างตาราง เหมือน inbox email ให้คนคลิก แล้วมี pop-up box เด้งขึ้นมาให้อ่านข้อความ โดยดึงข้อมูลจาก db_message เทียบตาม row ตามชื่อผู้เขียน -->
            <h1><strong>Inbox กล่องข้อความของคุณ</strong></h1>

            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
 
  <?php
              $query = "SELECT `sender`, `message`, `picture` FROM `table_message` WHERE `attendee_id` = '{$attendee_id}'";
              $connect->query($query);

              while ($connect->next_record()) {
                ?>


                <?php
              }
            ?>


</table>



      <?php
        }
        else {
        ?>
          <h1><strong>รหัสผ่านไม่ถูกต้อง ลองอีกครั้งซิ</strong></h1>
          <div class="text-center">
          <a href="dashboard.php?camp_code=<?=$camp_code?>">กลับหน้าหลัก</a>
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