<?php
require "../connect_mysql.php";
$name = $_POST['user'];
$password = $_POST['password'];
$po = "po_".$_POST["comp_n"];
$sql = "SELECT * FROM $po WHERE pman = '$name' AND password = '$password' LIMIT 1";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0)
{
    echo "password and username don't match <a href='index.php'>click here</a> to try agian".mysqli_error($conn);
}
else{
  header("Location: po.php");
}
?>
