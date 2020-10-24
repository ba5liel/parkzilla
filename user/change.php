<?php
  if(isset($_POST["change"]))
  {
    require "../connect_mysql.php";
    $id = $_SESSION['id'];
    if(isset($_POST["chng_un"]) && !empty($_POST["chng_un"])){
      $un = $_POST["chng_un"];
      $sql = "UPDATE parkzilla_users SET user_name='$un' WHERE id=$id";
      $result = mysqli_query($conn, $sql);
      if(!$result) echo "<script>alert('error occured')</script>";
    }
    if(isset($_POST["chng_pw"]) && !empty($_POST["chng_pw"])){
      $pw = $_POST["chng_pw"];

      $sql = "UPDATE parkzilla_users SET password='$pw' WHERE id=$id";
      $result = mysqli_query($conn, $sql);
      if(!$result) echo "<script>alert('error occured')</script>";
    }
    if(isset($_POST["chng_plate"])&& !empty($_POST["chng_plate"])){
      $pt = $_POST["chng_plate"];

      $sql = "UPDATE parkzilla_users SET plate='$pt' WHERE id=$id";
      $result = mysqli_query($conn, $sql);
      if(!$result) echo "<script>alert('error occured')</script>";
    }
  }
?>
