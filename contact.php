<?php
  if(isset($_POST['submitContact']))
  {
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $to = "parkzilla@gmail.com";

    $retrive = mail($to, "Quick contact" ,$msg);
    if(!$retrive){
      echo "message not sent";
    }
    else echo 'message sent!!';
  }
 ?>
