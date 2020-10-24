<?php
  session_start();
  require "../connect_mysql.php";
  $user_name = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $plate = $_POST['plate'];
  $phone = $_POST['phone'];
  $vehicle_type = $_POST['vehicle_type'];

  $sql = "INSERT INTO parkzilla_users (user_name, password, email, phone, plate, vehicle_type, reg_date)
                    VALUES ('$user_name', '$password', '$email', '$phone','$plate','$vehicle_type', NOW());";
  $result=mysqli_query($conn, $sql);
  if($result){
    echo "SUCCESSFULL ADDED <a href='index.php'>click here</a>";
    $id = mysqli_insert_id($conn);
    $_SESSION['id'] = $id;
    $_SESSION['user'] = $user_name;
    $_SESSION['password'] = $passsword;
    header("location: index.php?id=$id");
    exit();
  }
  else{
    echo "error" .mysqli_error($conn);
  }
?>
