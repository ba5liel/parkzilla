
<?php
  $id = $_GET['comp_id'];
  $id_u = $_GET["id"];
  $_SESSION["user_id"] = $id_u;
  $_SESSION["comp_id"] = $id;
  $_SESSION["company_user"] = $_GET["comp_name"];

  $sql = "SELECT * FROM parkzilla_admin WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){
    $comp_name = $row["company"];
    $password = $row["password"];
    $charge = $row["charge"];
    $phone = $row["phone"];
    $email = $row["email"];
    $address = $row["address"];
    $charge = $row["charge"];
    $floor = $row["floor"];
    $slot = $row["slot"];
    $reg_date = $row["reg_date"];
  }}
  else{
    echo "error occured". mysqli_error($conn);
  }
?>

<?php
    echo '<script>
    function toggle(x){
      x.classList.toggle("change");
    }
    function toggle2(e)
    {
      for(var i = 0; i < document.querySelectorAll("ul.pagination li a").length; i++)
      {
      var j = document.querySelectorAll("ul.pagination li a")[i];
      j.setAttribute("class", "");
      }
      for(var c = 0; c < document.getElementsByClassName("ground").length; c++)
      {
        document.getElementsByClassName("ground")[c].style.display = "none";
      }
      e.setAttribute("class", "active");
      var j;
      for(var r=0; r < document.querySelectorAll("ul.pagination li a").length; r++)
      {
       j = document.querySelectorAll("ul.pagination li a")[r];
        if(j.getAttribute("class") == "active")
        {
          j =r;
          break;
        }
      }
      document.getElementsByClassName("ground")[j-1].style.display = "block";
    }
    </script>';
?>
<?php echo '


  <div class="floor">
   <ul class="pagination">
   <li style="margin-left: -45px;"><a href="#" style="text-align: left; color: white; background-color: #00ccff; border-radius: 2px;">Floors</a></li>
   ';
   for($i = 0; $i < $floor; $i++)
   {
     $fl = $i + 1;
   echo '<li><a onclick="toggle2(this)">'.$fl.'</a></li>';
  }
  echo '</ul>';
 for($j = 0; $j < $floor; $j++)
 {
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
     echo '<script type="text/javascript">
     alert("'.mysqli_error($conn).'");
       console.log();
     </script>';
     #die("Error:".$sql);
     #header("Location: www.google.com");
   }
   $row = mysqli_fetch_array($result);
    echo '<div onclick="alter(this)" alter="'.$row["id"].'" style="top:'.$t.'%; left:'.$l.'%;" class="slot '.$row["flag"].'"><p>'. $row["flag"].'</p></br>
                           <span class="countDown"style="color: #ffffcc">Beta</span><br><br>
                           <div class="plate">'.$row["plate"].'</div></div>';
    $l=$l+$s;
  }
 echo '</div>';
}
echo "
</div>

<script>
  var g;
 document.getElementsByClassName('ground')[0].style.display = 'block';
 function alter(e){
   g = e.getAttribute('alter');
   document.getElementById('moda').style.display = 'block';
 }
</script>";
/*action weather to reserve tit ro to cancel*/
  echo '<div id="moda" class="modal" style="z-index: 3;display: none;">
  <div class="container">
  <div class="head">Do you want to resever this spot<span class="clsbtn" onclick="clos()">x</span></div>
  <div class="policy">
     policy: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Sed tincidunt, telluique, massa velit suscipit mauris, non sagittis diam tellus in dui. Morbi ultrices turpis nec ipsum ultrices in scelerisque sapien tempor. Sed aliquet sollicitudin lacus sed dignissim. Maecenas convallis consectetur enim, id lobortis mauris rhoncus at. Phasellus malesuada porttitor lorem, ac facilisis ligula tincidunt sed. Fusce adipiscing, nunc nec luctus lacinia, quam odio malesuada velit, ut placerat augue elit et nisl. Sed aliquam pharetra libero, id lobortis velit faucibus a. Duis at fringilla ipsum.
Pellentesque habitant morbi tristique senectus et netus et
    </br><b>At what time will you arrive (In militery time)</b>
    <form name="arrivalTime">
      <input onkeyup="checkTime(this)" type="text" placeholder="12:15" autofocus tabindex="1" name="timeValue">
      <p id="errorT"></p>
    </form>
    for more info contact '.$email.' or phone: '.$phone.'
 </div>
 <div class="content"><a href="javascript: yesA()">yes</a><a href="javascript: clos()">No</a></div>
 </div>
 </div>';
?>
