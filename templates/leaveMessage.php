<?php
  include(__DIR__."/../includes/config.php");
  include(__DIR__."/../includes/sqlConnection.class.php");
  include(__DIR__."/../includes/mirror.engine.class.php");

  $connect = new Connect();
  $attendee_id = $_GET["attendee_id"];
  $camp_code = $_GET["camp_code"];

  if (isset($_POST["submit"]) && $_POST["submit"] == "submit") {
    createMessage($_POST, $attendee_id, $camp_code);
  }

  $query = "SELECT `display_name`, `caption` FROM `table_attendee` WHERE `id` = '{$attendee_id}'";
  $connect->query($query);
  if ($connect->num_rows() > 0) {
    while($connect->next_record()) {
      $attendee_name = $connect->getValue("display_name");
      $attendee_caption = $connect->getValue("caption");
    }
  }
  else
    die("Error:: Not found data. <a href=\"".APP_PATH."/index.php\">Back to homepage</a>");
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
          <h1>เขียนกระจกเงาให้ <?=$attendee_name?> <small><?=$attendee_caption?></small></h1>
        </div>
        </div>


      <div class="card-body">
        <form method="POST">
              <div class="form-group col-12 col-md-9 mb-2 mb-md-0">
                  <label for="sender_name">ชื่อเล่น *</label>
                  <input type="text" name="sender_name" id="sender_name" class="form-control form-control-lg font" required>

                  <br>

                  <label for="caption">ข้อความ</label>
                  <textarea name="message" id="message" class="form-control form-control-lg font" required=""></textarea>

              </div>
            <button type="submit" name="submit" value="submit" class="btn button font">ส่งข้อความ</button>
        </form>
      </div>

  </body>
</html>

<?php
  function createMessage ($data, $attendee_id, $camp_code) {
    $connect = new Connect();
    $mirror = new Mirror($camp_code);

    $sender_name = $data["sender_name"];
    $message = $data["message"];

    /* Should have validation rule here */

    $query = "INSERT INTO `table_message` (`attendee_id`, `message`, `sender`) VALUE ('{$attendee_id}', '{$sender_name}', '{$message}')";
    $connect->query($query);

    /* Should have cross check here */

    header("location: ".APP_PATH."/templates/dashboard.php?camp_code={$camp_code}");
  }
?>