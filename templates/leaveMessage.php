<?php
  include(__DIR__."/../includes/config.php");
  include(__DIR__."/../includes/sqlConnection.class.php");
  include(__DIR__."/../includes/mirror.engine.class.php");

  $attendee_id = $_GET["attendee_id"];
  }
?>
<html>
  <head>
    <?php
      include("../includes/bootstrap.php");
    ?>
  </head>

  <body>


  
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
        <form method="POST"> 
          <input type="hidden" name="camp_id" value="<?=$camp_id?>">

                <div class="form-group col-12 col-md-9 mb-2 mb-md-0">
                <label>ชื่อเล่น *</label>
                <input type="text" name="display_name" class="form-control form-control-lg font" required>
                </div>
                  <br>
                <div class="form-group col-12 col-md-9 mb-2 mb-md-0">
                <label>คำอธิบาย</label>
                <input type="text" name="caption" class="form-control form-control-lg font">
                <small class="form-text text-muted">คำอธิบายเพิ่มเติมในกรณีที่ชื่อของคุณซ้ำกับคนอื่น เช่น โบสถ์สะพานเหลือง หรือ ม.เชียงใหม่</small>
                </div>
                <br>
                <div class="form-group col-12 col-md-9 mb-2 mb-md-0">
                <label>รหัสเปิดสมุด *</label>
                <input type="password" name="password" class="form-control form-control-lg font" required>
                <small class="form-text text-muted">รหัสนี้มีไว้สำหรับเปิดสมุดกระจกส่วนตัวของคุณ เพื่อป้องกันไม่ให้เพื่อนคนอื่นเข้ามาดูข้อความส่วนตัวในสมุดกระจกของคุณ</small>
                </div>
              <button type="submit" name="submit" value="submit" class="btn button font">เพิ่มสมุดกระจกเงา</button>

        </form>
      </div>

  </body>
</html>