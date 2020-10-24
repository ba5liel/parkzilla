<?php
$id=15;
$picture = "$id.png";
if(!isset($_POST['submit']))
{
  move_uploaded_file($_FILES["logo"]["tmp_name"], "uploads/$picture");
  $check = file_exists("uploads/$picture");
  if(!$check){
    copy("default.png", "uploads/$id.png");
    $check = file_exists("uploads/$picture");
    if(!$check){
      echo "$picture doesn't exist!";
      exit();
    }
  }
}
?>
<html>
<body>
  <form action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST">
    <input type="file" name="logo"/>
    <input type="submit" value="upload"/>
  </form>
</body>
</html>
