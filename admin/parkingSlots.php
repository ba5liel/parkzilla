<?php
for($i = 0; $i < $floor; $i++)
{
  $fl = $i + 1;
echo '<li><a onclick="toggle2(this)">'.$fl.'</a></li>';
}
?>
</ul>
<?php
for($j = 0; $j < $floor; $j++)
{
//check weather the solt is handle able or not
if($slot < 7){
echo '
<div class="ground" style="display: none"> ';
$s = (100/($slot/2))+1;
$t=0; $l=0;
for($i=0;$i<$slot; $i++)
{
  if($i == $slot/2)
  {
    $t=55;
    $l=0;
  }
$sql = "SELECT * FROM $comp_name WHERE slot = 'f$j-s$i'";
$result = mysqli_query($conn, $sql);
if(!$result)
{
  header("Location: www.google.com");
}
$row = mysqli_fetch_array($result);
 echo '<div onclick="alter(this)" alter="'.$row["id"].'" style="top:'.$t.'%; left:'.$l.'%;" class="slot '.$row["flag"].'">
            <p>'. $row["flag"].'</p></br>
            <span class="countDown">'.$row["starting_time"].'</span><br><br>
            <div class="plate">'.$row["plate"].'</div>
      </div>';
 $l= $l+$s;
}
echo '</div>';
}
else{
echo '
<div class="ground ground2" style="display: none"> ';
for($i=0;$i<$slot; $i++)
{
$sql = "SELECT * FROM $comp_name WHERE slot = 'f$j-s$i'";
$result = mysqli_query($conn, $sql);
if(!$result)
{
  header("Location: www.google.com");
}
$row = mysqli_fetch_array($result);
 echo '<div onclick="alter(this)" alter="'.$row["id"].'" class="slot '.$row["flag"].'">
            <p>'. $row["flag"].'</p></br>
            <span class="countDown">'.$row["starting_time"].'</span><br><br>
            <div class="plate">'.$row["plate"].'</div>
      </div>';
    }
echo '</div>';
}
}
?>
