<?php
  session_start();
  
  require "../connect_mysql.php";
  echo "hello";
  $user_name = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM `parkzilla_users` WHERE user_name = '$user_name' AND password = '$password' LIMIT 1";
  $result = mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($result) == 0)
  {
      $error_login = "password and username don't match <a href='../index.html'>click here</a> to try agian";
      echo $error_login;
  }
  else{
      while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
      }
      $_SESSION["id"] = $id;
  		$_SESSION["user"] = $user_name;
  		$_SESSION["password"] = $password;
      header("location: index.php?id=$id");
  }

?>
