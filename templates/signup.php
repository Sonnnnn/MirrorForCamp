<?php

$camp_code = mt_rand(1000,9999);

/* if $camp_code ไม่ซ้ำกับ database MYSQL ก็ไปต่อ ถ้าซ้ำก็วนลูป */

/* save $camp_code ลง database MYSQL ใน row เดียวกับ camp_name ที่ได้มา */

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
  <h1>ยินดีด้วย "<?php echo $_GET["camp_name"]; ?>" ได้เปิดใช้งานแล้ว</h1><br>
    <p>รหัสค่ายของคุณคือ <strong><?php echo $camp_code; ?><strong></p>
</div>


</body>
</html>
