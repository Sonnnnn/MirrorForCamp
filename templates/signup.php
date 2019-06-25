
<html>
<head>
	<title>Mirror for Camp - เว็บเขียนกระจกเงาออนไลน์</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>

    <?php if (isset($_POST['form_submitted'])): ?> 

        <h2>Thank You <?php echo $_POST['camp_name']; ?> </h2>

        <p>You have been registered as
            <?php echo $_POST['camp_name'] . ' ' . $_POST['camp_name']; ?>
        </p>

        <p>Go <a href="index.html">back</a> to the main page</p>

        <?php else: ?>

        <h2>เปิดใช้งานกระจกเงาออนไลน์ สำหรับค่ายของคุณ</h2>
        
        <form action="signup.php" method="POST">
                <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
        ชื่อค่าย <input type="text" class="form-control form-control-lg font" name="camp_name"><br>
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" value="Submit">
        </form>

      <?php endif; ? > 

</body> 
</html>


/*

<html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mirror for Camp - เว็บเขียนกระจกเงาออนไลน์</title>
</head>
<body>

<h1>ยินดีด้วย <?php echo $_GET["camp_name"]; ?></h1><br>
<p>รหัสค่ายของคุณคือ xxxx</p>

</body>
</html>

*/


