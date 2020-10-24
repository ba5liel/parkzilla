<?php
  require "../connect_mysql.php";
  $user = $_POST["username"];
  $pass = $_POST["pass"];
  $repass = $_POST["repass"];
  if($pass == $repass){
  $po = "po_".$_POST["comp_n"];
  $sql = "INSERT INTO $po (pman, password)
          VALUES ('$user','$pass')";
  $result = mysqli_query($conn, $sql);
    if(!$result){
      echo "error entering data ". mysqli_error($conn);
      exit();
    }
    header("Location: po.php");
        }
    else $error="password confirmation failed";
?>
