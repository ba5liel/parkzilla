<?php
session_start();
require "../connect_mysql.php";
$comp_name = $_POST['company'];
$password = $_POST['password'];
$sql = "SELECT * FROM parkzilla_admin WHERE company = '$comp_name' AND password = '$password' LIMIT 1";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0)
{
    echo "password and username don't match <a href='../provider.php'>click here</a> to try agian";
}
else{
    while($row = mysqli_fetch_array($result)){
      $id = $row['id'];
    }
    $_SESSION["comp_id"] = $id;
    $_SESSION["company"] = $comp_name;
    $_SESSION["comp_password"] = $password;
    header("location: index.php?id=$id");
}
?>
