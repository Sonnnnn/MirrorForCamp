<?php

$camp_code = mt_rand(1000,9999);

/* if $camp_code ไม่ซ้ำกับ database MYSQL ก็ไปต่อ ถ้าซ้ำก็วนลูป */

$isCodeExist = true;
while ($isCodeExist) {
    $query = ""; /* Will Write SQL command to get camp that has same code*/
    if (true) /* Will write condition to check SQL get anything or not, for now ALWAYS set as true to prevent infinite loop */
      $isCodeExist = false;
}

/* save $camp_code ลง database MYSQL ใน row เดียวกับ camp_name ที่ได้มา */
$query = ""; /* Will write SQL command to write camp name and code to database */
$result = true; /* Will write validator if record insert successfully */
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
    if ($result) {
  ?>
  <h1>ยินดีด้วย "<?php echo $_GET["camp_name"]; ?>" ได้เปิดใช้งานแล้ว</h1><br>
    <p>รหัสค่ายของคุณคือ <strong><?php echo $camp_code; ?><strong></p>
  <?php
    }
    else {
  ?>
  <h1>ระบบไม่สามารถสร้างค่ายได้ กรุณาลองใหม่อีกครั้ง</h1>
  <?php
    }
  ?>
</div>


</body>
</html>
