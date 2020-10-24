<?php
$sql = "SELECT * FROM $comp WHERE id = '$alter'";
$result = mysqli_query($conn, $sql);
if(!$result)
{
  die("error occured");
}
$row = mysqli_fetch_array($result);
 echo '<p>'. $row["flag"].'</p></br>
            <span class="countDown">'.$row["starting_time"].'</span><br><br>
            <div class="plate">'.$row["plate"].'</div>
      ';
exit();
?>
