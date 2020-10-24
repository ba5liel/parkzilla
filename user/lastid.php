<?php
  session_start();
  require "../connect_mysql.php";
  echo mysqli_insert_id($conn);

  $sql = "SELECT * FROM parkzilla_users";
  $result = mysqli_query($conn, $sql);
  echo mysqli_insert_id($conn);

?>
