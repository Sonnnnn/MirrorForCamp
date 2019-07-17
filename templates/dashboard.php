<?php
 include(__DIR__."/../includes/config.php");
 include(__DIR__."/../includes/sqlConnection.class.php");

 $connect = new Connect();

 $camp_name = $_GET["camp_name"];

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Mirror for camp - เว็บเขียนกระจกเงาออนไลน์</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font from Google -->
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  </head>

  <style>
  /* CSS Start from Here */

  .logo {
max-width: 5em;
max-height: 5em;
margin-top: 15px;
margin-left: 15px;
}

h1 {
  text-align: center;
  font-family: 'Kanit', sans-serif;
}

.green {
  background-color: #25B344;
}

.button{
  color: white;
  margin-top: 20px;
  margin-left : 18px;
  margin-right: 18px;
  font-family: 'Kanit', sans-serif;
}

.instruction {
  margin-top: 2em;
  text-align: center;
  color: rgb(190, 190, 190);
  font-size: 1.2em;
  font-family: 'Kanit', sans-serif;
}


/* ต้องเขียนสำหรับ ซองจดหมาย ด้วย */

  </style>


  <body>
    <!-- HTML start from here -->
    
    <div class="img" >
      <a href="index.html">
      <img src="Mirror for Camp logo_White bg.png" alt="logo" class="logo rounded"> 
    </a>
    </div>

 <h1><strong>ค่าย <?=$camp_name?></strong></h1>

 <div align="center"> 
 <a class="btn btn-success green button" href="addbook.html" role="button">+ เพิ่มสมุดกระจก</a> <a class="btn btn-warning button" href="#" role="button">เปิดกระจกอ่าน</a> 
</div>

<p class="instruction">กดคลิกที่ซองจดหมายเพื่อเขียนข้อความ</p>



   <!-- ต้องเขียนให้มันดึงข้อมูลจาก table_attendee โดยดึง N จำนวนแถว, display_name, caption (if have) 
        จากนั้น เขียนให้มัน display รูป icon จดหมาย n ตัว และใส่ display_name ไว้ข้างล่าง และ check if caption ก่อน ถ้ามีก็ให้ใส่ไปด้วย -->




    <!-- เมื่อกดคลิก icon หรือ display_name จะต้องไป leaveMessage.php พร้อมเก็บตัวแปรของ display_name บรรทัดนั้นตามไปด้วย -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>