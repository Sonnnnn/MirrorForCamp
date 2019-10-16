<?php
  include(__DIR__."/../includes/config.php");
  include(__DIR__."/../includes/sqlConnection.class.php");
  include(__DIR__."/../includes/mirror.engine.class.php");
  include (__DIR__."/../includes/aws/aws-autoloader.php");

  use Aws\Exception\AwsException;
  use Aws\S3\S3Client;

  $connect = new Connect();
  $attendee_id = $_GET["attendee_id"];
  $camp_code = $_GET["camp_code"];

  if (isset($_POST["submit"]) && $_POST["submit"] == "submit") {
    createMessage($_POST, $_FILES, $attendee_id, $camp_code);
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
        <form action="<?=$_SERVER["PHP_SELF"]?>?attendee_id=<?=$attendee_id?>&camp_code=<?=$camp_code?>" method="POST" enctype="multipart/form-data">
              <div class="form-group col-12 col-md-9 mb-2 mb-md-0">
                  <label for="sender_name">ชื่อเล่น</label>
                  <input type="text" name="sender_name" id="sender_name" class="form-control form-control-lg font">

                  <br>

                  <label for="caption">ข้อความ *</label>
                  <textarea name="message" id="message" class="form-control form-control-lg font" required=""></textarea>

                  <br>

                  <label for="photo_upload">รูปแห่งความทรงจำ</label>
                  <br>
                  <input type="file" name="photo_upload" id="photo_upload" accept="image/jpeg">

              </div>
            <button type="submit" name="submit" value="submit" class="btn button font">ส่งข้อความ</button>
        </form>
      </div>

  </body>
</html>

<?php


// Upload photo to AWS S3
// AWS Info
$bucketName = 'mirrorforcamp';
$IAM_KEY = 'AKIATUF67ALFBMJ3SP3J';
$IAM_SECRET = '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';
// Connect to AWS
try {
  // You may need to change the region. It will say in the URL when the bucket is open
  // and on creation.
  $s3 = S3Client::factory(
    array(
      'credentials' => array(
        'key' => $IAM_KEY,
        'secret' => $IAM_SECRET
      ),
      'version' => 'latest',
      'region'  => 'Asia Pacific (Singapore)'
    )
  );
} catch (Exception $e) {
  // We use a die, so if this fails. It stops here. Typically this is a REST call so this would
  // return a json object.
  die("Error: " . $e->getMessage());
}

// For this, I would generate a unqiue random string for the key name. But you can do whatever.
$keyName = 'photoupload/' . basename($_FILES["photo_upload"]['tmp_name']);
// ต้องแก้ไหมอันข้างล่างนี่
$pathInS3 = 'https://s3.amazonaws.com/' . $bucketName . '/' . $keyName;
// Add it to S3
try {
  // Uploaded:
  $file = $_FILES["photo_upload"]['tmp_name'];
  $s3->putObject(
    array(
      'Bucket'=>$bucketName,
      'Key' =>  $keyName,
      'SourceFile' => $file,
      'StorageClass' => 'REDUCED_REDUNDANCY'
    )
  );
} catch (S3Exception $e) {
  die('Error:' . $e->getMessage());
} catch (Exception $e) {
  die('Error:' . $e->getMessage());
}
echo 'Done';




// Insert Answer into our database

  function createMessage ($data, $attendee_id, $camp_code) {
    $connect = new Connect();
    $mirror = new Mirror($camp_code);

    $sender_name = $data["sender_name"];
    $message = $data["message"];

    /* Should have validation rule here */

    $query = "INSERT INTO `table_message` (`attendee_id`, `message`, `sender`) VALUE ('{$attendee_id}', '{$message}', '{$sender_name}')";
    $connect->query($query);

    $messageID = $connect->insertID();

    $bucketName = "mirrorforcamp";
    $region = "ap-southeast-1";
    $s3 = new Aws\S3\S3Client(array(
      "region" => $region,
      "version" => "latest",
      "credentials" => array(
        "key" => "AKIAJNLW6S6VPSISSU5A",
        "secret" => "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"
      )
    ));

    try {
      $s3->putObject(array(
        "Bucket"  => $bucketName,
        "Key"   => "{$camp_code}/{$messageID}.jpg",
        "Body"    => file_get_contents($files["photo_upload"]["tmp_name"])
      ));
    }
    catch (Aws\S3\Exception\S3Exception $e) {
      echo "Can't upload image to S3";
    }

    $query = "UPDATE `table_message` SET `picture` = 'https://{$bucketName}.s3-{$region}.amazonaws.com/{$camp_code}/{$messageID}.jpg' WHERE `id` = '{$messageID}'";
    $connect->query($query);

    /* Should have cross check here */

    header("location: ".APP_PATH."/templates/dashboard.php?camp_code={$camp_code}");
  }
?>