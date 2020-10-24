<?php
  require "connect_mysql.php";
  $sql = "SELECT company FROM parkzilla_admin";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result))
  {
    $a[] = $row['company'];
  }
  $hint = "";
  $v = $_GET['v'];
  $len = strlen($v);
  if($v !== "")
  {
      foreach($a as $val)
        {
            if(stristr(substr($val, 0, $len), $v))
            {
              $hint .= '<span onclick="cVOSF(this)">'.$val.'</span>';
              $hint .= "</br>";
            }
        }
  }
  echo $hint == ""? "No result": $hint;
?>
