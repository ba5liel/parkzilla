<?php
  session_start();
  require "../connect_mysql.php";
  $id_u = $_SESSION['user_id'];
  $id = $_SESSION['comp_id'];
  $cpn = $_SESSION['company_user'];
  $v = $_POST["comValue"];
  $comp = $cpn.'_com';
  $sql = "SELECT email, user_name FROM parkzilla_users where id = $id_u";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $email = $row["email"];
  $user_name = $row["user_name"];

  $sql = "SELECT customer FROM $comp where customer = $email";
  $result = mysqli_query($conn,$sql);

  if($result){
    $sql = "INSERT INTO $comp (comment)
            VALUES ('$v')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      echo "Doesn't work ". mysqli_error($conn) ;

    }
    else{
      header("Location: index.php?comp_name=$cpn&&comp_id=$id&&id=$id_u");
    }
  }
  else{
  $sql = "INSERT INTO $comp (customer,comment,com_date)
          VALUES ('$email','$v', NOW())";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo "Doesn't work ". mysqli_error($conn) ;

  }
  else{
    header("Location: index.php?comp_name=$cpn&&comp_id=$id&&id=$id_u");
  }
}
?>
