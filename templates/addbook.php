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

    <!-- HTML start from here -->
   
    <div class="card font"> 
      <div class="card-header">
        <div>
            <a href="dashboard.php"><p>x</p></a> </div>
        <div class="bold" align="center">
          <h1>เพิ่มสมุดกระจกเงา</h1>
        </div>
        </div>

    <div class="card-body font">
    <form>
        <div class="form-group">
          <label for="exampleInputEmail1">ชื่อเล่น</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">คำอธิบาย</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          <small id="emailHelp" class="form-text text-muted">คำอธิบายเพิ่มเติมในกรณีที่ชื่อของคุณซ้ำกับคนอื่น เช่น โบสถ์สะพานเหลือง หรือ ม.เชียงใหม่</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">รหัสเปิดสมุด</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
          <small id="emailHelp" class="form-text text-muted">รหัสนี้มีไว้สำหรับเปิดสมุดกระจกส่วนตัวของคุณ เพื่อป้องกันไม่ให้เพื่อนคนอื่นเข้ามาดูข้อความส่วนตัวในสมุดกระจกของคุณ</small>
        </div>
        <div class="form-check">
        </div>
        <button type="submit" class="btn button">เพิ่มสมุดกระจก</button>
      </form>
      </div>



      <form action="templates/dashboard.php" method="POST"> <!-- ต้องทำให้มันกลับไป dashboard แบบเก็บ camp code อันเก่าไว้ด้วย -->
            <div class="form-group">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
              <label>ชื่อเล่น</label>
                <input type="text" name="display_name" class="form-control form-control-lg font">
              </div>
              


        
                <button type="submit" class="btn button font">เพิ่มสมุดกระจกเงา</button>
          
            </div>
          </form>


  </body>
</html>
