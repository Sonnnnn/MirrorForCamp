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
      include("../includes/header.php");

      $connect = new Connect();
      $mirror = new Mirror($camp_code);

      $camp_id = $mirror->getCampID();
    ?>

    <!-- HTML start from here -->

    <div class="card font">
      <div class="card-header">
        <div>
            <a href="dashboard.php?camp_code=<?=$camp_code?>"><p>กลับหน้าหลักค่าย</p></a> </div> <!-- ต้องทำให้มันกลับไป dashboard แบบเก็บ camp_code อันเก่าไว้ด้วย -->
        <div class="bold" align="center">
          <h1>เพิ่มสมุดกระจกเงา</h1>
        </div>
        </div>


      <div class="card-body">
        <form method="POST"> <!-- ต้องทำให้มันกลับไป dashboard แบบเก็บ camp_code อันเก่าไว้ด้วย -->
          <input type="hidden" name="camp_id" value="<?=$camp_id?>">

                <div class="form-group col-12 col-md-9 mb-2 mb-md-0">
                <label>ชื่อเล่น</label>
                <input type="text" name="display_name" class="form-control form-control-lg font">
                </div>
                  <br>
                <div class="form-group col-12 col-md-9 mb-2 mb-md-0">
                <label>คำอธิบาย</label>
                <input type="text" name="caption" class="form-control form-control-lg font">
                <small class="form-text text-muted">คำอธิบายเพิ่มเติมในกรณีที่ชื่อของคุณซ้ำกับคนอื่น เช่น โบสถ์สะพานเหลือง หรือ ม.เชียงใหม่</small>
                </div>
                <br>
                <div class="form-group col-12 col-md-9 mb-2 mb-md-0">
                <label>รหัสเปิดสมุด</label>
                <input type="password" name="password" class="form-control form-control-lg font">
                <small class="form-text text-muted">รหัสนี้มีไว้สำหรับเปิดสมุดกระจกส่วนตัวของคุณ เพื่อป้องกันไม่ให้เพื่อนคนอื่นเข้ามาดูข้อความส่วนตัวในสมุดกระจกของคุณ</small>
                </div>
              <button type="submit" name="submit" value="submit" class="btn button font">เพิ่มสมุดกระจกเงา</button>

        </form>
      </div>

  </body>
</html>

<?php
  function createBook ($data, $camp_code) { // <!-- บันทึกข้อมูล แต่ยังไม่รู้วิธีในการบันทึกให้ตรงกับ camp_code ที่เขาเข้ามา -->
    $connect = new Connect();
    $mirror = new Mirror($camp_code);

    $display_name = $data["display_name"];
    $caption = $data["caption"];
    $password = $data["password"];

    /* Should have validation rule here */

    $query = "INSERT INTO `table_attendee` (`camp_id`, `display_name`, `caption`, `password`) VALUE ('{$mirror->getCampID()}', '{$display_name}', '{$caption}', '{$password}')";
    $connect->query($query);

    /* Should have cross check here */

    header("location: ".APP_PATH."/templates/dashboard.php?camp_code={$camp_code}");
  }
?>