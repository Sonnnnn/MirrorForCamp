<?php
  include(__DIR__."/../includes/config.php");
  include(__DIR__."/../includes/sqlConnection.class.php");

  $connect = new Connect();

  $camp_name = $_GET["camp_name"];

  /* if $camp_code ไม่ซ้ำกับ database MYSQL ก็ไปต่อ ถ้าซ้ำก็วนลูป */

  $isCodeExist = true;
  while ($isCodeExist) {
    $camp_code = mt_rand(1000,9999);

    /* SQL command to get camp that has same code*/
    $query = "SELECT `id` FROM `table_camp` WHERE `camp_code` = '{$camp_code}'";
    $connect->query($query);

    /* Will write condition to check SQL get anything or not */
    if ($connect->num_rows() == 0)
      $isCodeExist = false;
  }

  /* save $camp_code ลง database MYSQL ใน row เดียวกับ camp_name ที่ได้มา */
  $query = "INSERT INTO `table_camp` (`camp_name`, `camp_code`) VALUES ('{$camp_name}', '{$camp_code}')";
  $connect->query($query);
  $isCreated = $connect->aff_rows() == 1; /* Will write validator if record insert successfully */
?>

<html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mirror for Camp - เว็บเขียนกระจกเงาออนไลน์</title>
</head>

<style>
.font {
  font-family: 'Kanit', sans-serif;
}

</style>


<body>

<div class="font">
  <?php
    if ($isCreated) {
  ?>
  <h1>ยินดีด้วย "<?=$camp_name?>" ได้เปิดใช้งานแล้ว</h1><br>
    <p>รหัสค่ายของคุณคือ <strong><?=$camp_code?><strong></p>
  <?php
    }
    else {
  ?>
  <h1>ระบบไม่สามารถสร้างรหัสสำหรับค่ายของคุณได้ กรุณาลองใหม่อีกครั้ง</h1>
  <?php
    }
  ?>
</div>


</body>
</html>
