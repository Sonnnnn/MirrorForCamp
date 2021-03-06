<?php
  include(__DIR__."/../includes/config.php");
  include(__DIR__."/../includes/sqlConnection.class.php");
  include(__DIR__."/../includes/mirror.engine.class.php");

  $camp_code = $_GET["camp_code"];

  if (isset($_POST["submit"]) && $_POST["submit"] == "submit") {
    createBook($_POST, $camp_code);
  }
?>
<html>
  <head>
    <?php
      include("../includes/bootstrap.php");
    ?>
  </head>
  <body>
    <?php

      $connect = new Connect();
      $mirror = new Mirror($camp_code);

      $camp_id = $mirror->getCampID();
    ?>

    <!-- HTML start from here -->
    <div class="card font">
      <div class="card-header">
        <div>
            <a href="dashboard.html"><p>x</p></a> </div>
        <div class="bold" align="center">
          เปิดสมุดกระจกอ่าน
        </div>
        </div>


    <!-- ต้องทำให้มันดึงรายชื่อใน db_attendee ที่ตรงกับ camp_id นั้นออกมาให้หมด -->
    <?php
              $query = "SELECT `id`, `display_name`, `caption` FROM `table_attendee` WHERE `camp_id` = '{$camp_id}' ORDER BY `display_name` ASC";
              $connect->query($query);
                ?>


    <div class="card-body font">
    <form action="inbox.php?attendee_id=<?=$connect->getValue("id")?>">
        <label>ชื่อเล่น *</label>
        <div class="form-group">
          <select name="attendee" id="attendee" class="form-control form-control-lg font">
            <option value="">กรุณาเลือกชื่อ</option>
            <?php
            while ($connect->next_record()) {
            ?>
              <option value="<?=$connect->getValue("id")?>"><?=$connect->getValue("display_name")?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">รหัสเปิดสมุด</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="form-check">
        </div>
        <button type="submit" class="btn button">เปิดอ่าน</button>

        <!-- validate password ของ display_name นั้นๆ ถ้าไม่ตรงกัน ต้องไม่ให้ทำ action-->


      </form>
      </div>





  </body>
</html>