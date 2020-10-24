<?php
  session_start();
  require "../connect_mysql.php";
  $id = $_SESSION["comp_id"];
  $id_u = $_SESSION["user_id"];
  $cpn = $_SESSION['company_user'];
  $comp = $cpn.'_com';

  $sql = "SELECT email FROM parkzilla_users where id = $id_u";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $email = $row["email"];
  $sql = "SELECT customer FROM $comp where customer = '$email'";
  $result = mysqli_query($conn,$sql);
  if($result){
    $sql = "SELECT rate FROM $comp
                  where customer = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($_GET['g'] == 'up')
    $v = $row["rate"] + 1;
    else if($_GET['g'] == 'down') $v = $row["rate"] - 1;
    $sql = "UPDATE $comp SET rate = $v
            WHERE customer='$email' LIMIT 1";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      echo "Doesn't work ". mysqli_error($conn);

    }
    else{
      echo "Update Rated";
    }
  }
  else{
    echo mysqli_error($conn);
    exit();
    $sql = "INSERT INTO $comp (customer,rate,com_date)
            VALUES ('$email',1,, NOW())";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      echo "Doesn't work ". mysqli_error($conn);

    }
    else{
      echo "Rated";
    }
  }
?>
