<?php
session_start();
if(isset($_GET['destroy']))
{
  unset($_SESSION['id']);
  unset($_SESSION["user"]);
  unset($_SESSION["password"]);
  header("Location: ../index.php");
  exit();
}
if(isset($_GET["id"]))
{$id_u = $_GET["id"];
$_SESSION["user_id"] = $id_u;
}
include_once "change.php";
require "../connect_mysql.php";
if(isset($_GET["alterId"]))
{ $comp = $_SESSION["company_user"];
  $plate = $_SESSION["plate"];
  $alter = $_GET["alterId"];
  $sql = "SELECT plate FROM $comp";
  $result = mysqli_query($conn,$sql);
  $ok = 1;
  while($row = mysqli_fetch_array($result))
  {
    if($plate == $row['plate'])
    {
      $ok = 0;
    }
  }
if($ok){
  $_SESSION['altered'] = $alter;
  $sql = "UPDATE $comp SET flag= 'Reserved' WHERE id = $alter";
  $result = mysqli_query($conn,$sql);
  if(!$result)
  {
    echo "it doesn't works ".mysqli_error($conn);
    exit();
  }
  $sql = "UPDATE $comp SET plate= '$plate' WHERE id = $alter";
  $result = mysqli_query($conn,$sql);
  if(!$result)
  {
    echo "it doesn't works" .mysqli_error($conn);
    exit();
  }
  $d = $_GET["hour"];
  $d .= ":";
  $d .= $_GET["min"];
  $sql = "UPDATE $comp SET starting_time= '$d' WHERE id = $alter";
  $result = mysqli_query($conn,$sql);
  if(!$result)
  {
    echo "it starting't works" .mysqli_error($conn);
    exit();
  }
  $id = $_SESSION["user_id"];
  $id_c = $_SESSION["comp_id"];
  echo "<h1>SUCCESS</h1>";
  echo "<script type='text/javascript'>
            setInterval('RE()',5000);
        function RE(){window.location.assign('index.php?comp_id=$id_c&id=$id&comp_name=$comp');}
      </script>";
    exit();
}
else{
  $id = $_SESSION["user_id"];
  $id_c = $_SESSION["comp_id"];
  $comp_name = $_SESSION["company_user"];

  echo "<h1>you already reserved a spot from this company</h1>";
  echo "<script type='text/javascript'>
            setInterval('RE()',5000);
        function RE(){window.location.assign('index.php?comp_id=$id_c&id=$id&comp_name=$comp_name');}
      </script>";
    exit();
}
}
?>
<?php
    if(!isset($_SESSION['user'])){
      echo "your not correctly loged in <a href='../index.php'>click here</a> to try agian!";
      exit();
    }

?>
<?php
  $id = $_GET['id'];
  $sql = "SELECT * FROM parkzilla_users WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){
    $user_name = $row["user_name"];
    $password = $row["password"];
    $plate = $row["plate"];
    $_SESSION["plate"] = $plate;
    $vehicle_type = $row["vehicle_type"];
    $reg_date = $row["reg_date"];
  }}
  else{
    echo "error occured". mysqli_error($conn);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name= "viewport" content = "width = device-width, initial-scale = 1.0"/>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css"/>
  <link rel = "stylesheet" type = "text/css" href = "style.css"/>
  <link rel = "stylesheet" type = "text/css" href = "bulding.css"/>
  <link rel = "stylesheet" type = "text/css" href = "alert.css"/>
  <link rel="stylesheet" type="text/css" href="../css/Font-Awesome/css/font-awesome.min.css"/>
  <title>
    welcome <?php echo $user_name;?>
  </title>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYiKo-ZOvgZ28VXOLUrc6GScmJEJ0vnMk"
  type="text/javascript"></script>
  <script src="../js/close.js"></script>
  <script src="../js/rate.js"></script>

  <script>
    var Reserved = document.getElementsByClassName('Reserved');
    for(var i = 0; i < Reserved.length; i++)
    {
      Reserved[i].onclick = "alert('already reserved')";
    }
    function toggle(x){
      x.classList.toggle("change");
    }
  </script>
</head>
<body>
  <nav>
    <div class="logo">
      <h1 style="color:rga(106, 106, 106); float: right;"> <?php echo "welcome $user_name";?> </h1>
   </div>
   <div style="background-attachment: fixed;" class="menu">
     <ul>
       <li style="float:left;">
         <div class="anime-x" onclick="toggle(this)">
             <div class="bar-1"></div>
             <div class="bar-2"></div>
             <div class="bar-3"></div>
         </div>
       </li>
       <li><a href="index.php?destroy=1">Sign off</a></li>
       <li><a href="javascript: openSetting()">Setting</a></li>
       <li><a href="#">How</a></li>
       <li style="float:right;"><a href="http://localhost/graphic/">About us</a></li>
     </ul>
   </div>
 <div class="strips" style="background-image:url('../images/strip2.png');">
</div>
 </nav>
 <div id="setting" class="setting">
  <div class="left-panel">
    <a href="javascript:void(0)" class="closeX" onclick="closeX()">
      <div class="bar-1"></div>
      <div class="bar-1"></div>
      <div class="bar-1"></div>
    </a>
    <i class="fa fa-user" style="font-size: 21px; margin-right: 5px; bottom: 170px;"></i>
    <i class="fa fa-lock" style="font-size: 21px; margin-right: 5px; bottom: 130px;"></i>
    <i class="fa fa-support" style="font-size: 21px; bottom: 90px;"></i>
    <i class="fa fa-automobile" style="font-size: 21px; bottom: 50px;"></i>
    <i class="fa fa-fax" style="font-size: 21px; bottom: 10px;"></i>
  </div>
  <div class="main-panel">
  <a href="#"><img src='../images/user.png' style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;"> <?php echo " ".$user_name; ?></a>
   <div class="acc">
  <a href="#"><i class="fa fa-user" style="font-size: 19px; margin-right: 5px;"></i> Account</a>
  <ul>
  <li><span class='descri'>change personal info</span>
  </div>
  <div class="section">
    <ul>
      <form action="<?php.
       echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <li><a href="#">Change username</a></li>
    <input class="input-ctrl" type="text" name="chng_un" placeholder='new username'/>
    <li><a href="#">Change password</a></li>
    <input type="password" class="input-ctrl" name="chng_pw" placeholder='new password'/>
    <li><a href="#">Change plate</a></li>
    <input type="text" class="input-ctrl" name="chng_plate" placeholder='new plate number'/>
    <input name="change" type="submit" value="submit" style="display: none;"/>
    <li><a href="destroy.php">Destroy account</a></li>
  </form>
  </ul>
 </div>
 </li>
  </ul>
  <div class="acc">
  <a href="#"><i class="fa fa-lock" style="font-size: 19px; margin-right: 5px;"></i> Security</a>
<ul>
<li>
  <span class='descri'>choose what you want others to see</span>
</div>
  <div class="section">
    <ul>
  <li><a href="#">Hide phone number</a></li>
  <li><a href="#">Hide email address</a></li>
  <li><a href="#">Hide portion of plate number</a></li>
  <li><a href="#">privcy policy</a></li>
    </ul>
 </div>
 </li>
 </ul>
 <div class="acc">
  <a href="#"><i class="fa fa-support" style="font-size: 19px; margin-right: 5px;"></i> Support</a>
  <ul>
  <li>
  <span class='descri'>choose what you want others to see</span> </div>
  <div class="section">
  <ul>
  <li><a href="#">Donate to parkzilla</a></li>
  <li><a href="#">Credit</a></li>
  <li><a href="#">Help</a></li>
  </ul>
 </div>
 </li>
 </ul>
  <a class="acc" href="#"><i class="fa fa-car" style="font-size: 19px; margin-right: 5px;"></i> Parkzilla car utils</a>
  <a class="acc" href="#"><i class="fa fa-fax" style="font-size: 19px; margin-right: 5px;"></i> Contact</a>
</div>
</div>
<script src="../js/setting.js"></script>
 <?php
 /*SELECTED PARKING PROVIDER*/
 if(isset($_GET['comp_id'])){
   echo '<img id="company_logo" src="../admin/uploads/'.$_GET['comp_id'].'.png" alt="logo" width="70px" height="70px"><h2 id="company_name">'.$_GET['comp_name'].'</h2>';
   include("selComp.php");
   $at = "'already reserved'";
   if(!isset($_SESSION['altered'])){ $_SESSION['altered'] = -1;}
   $g = $_SESSION['altered'];
   echo '  <script>
       var Reserved = document.getElementsByClassName("Reserved");
       for(var i = 0; i < Reserved.length; i++)
       {
         Reserved[i].onclick = "alert('.$at.')";
       }
       var own = document.querySelectorAll("[alter=\''.$g.'\']");
       own[0].setAttribute("class", "slot Reserved own");
      document.querySelectorAll(".own span")[0].innerHTML = "Your spot";
     </script>';
     //comment and like

     echo "
     <div class='likeCom'>
     <div class='com'>
      <form action='comment.php' method='POST' name='comment'>
        <textarea name='comValue' cols='40' rows='2.5'>add a comment right here</textarea>
        <input type='submit' value='Submit'/>
        <div class='like'>
         <span rate='up' onclick='rate(this)' class='fa fa-thumbs-o-up'> <p>like</p></span>
         <span rate='down' onclick='rate(this)' class='fa fa-thumbs-o-down'> <p>dislike</p></span>
         <p style='font-size: 15px; margin-top: 5px;' id='logPost'></p>
         <div class='social-media'>
           <a href='www.facebook.com/parkzilla' target='_blank'><i style='font-size:20px;'class='fa fa-facebook'></i></a>
           <a href='www.twitter.com/parkzilla' target='_blank'><i style='font-size:20px;'class='fa fa-twitter'></i></a>
           <a href='www.linkedin.com/parkzilla' target='_blank'><i style='font-size:20px;'class='fa fa-linkedin'></i></a>
           <a href='www.youtube.com/parkzilla' target='_blank'><i style='font-size:20px;'class='fa fa-youtube'></i></a>
         </div>
        </div>
     </div>
     </div>";
   exit();
 }
 ?>
 <div id='googleMap' width="100%" height="300px">&nbsp</div>
 <script type="text/javascript">
 var Lat, Lng;
 var mapCanavus = document.getElementById('googleMap');
  window.onload = function(){
    if(navigator.geolocation)
    {
      navigator.geolocation.getCurrentPosition(showP,showE);
    }
    else{
      alert('your browser wet the bed');
    }
  }
  function showP(position)
  {
    Lat = position.coords.latitude;
    Lng = position.coords.longitude;
    initMap(Lat,Lng);
  }
  function showE(error)
  {
    var p = document.createElement("p");
    p.id = "error";
    switch(error.code)
    {
      case error.PERMISSION_DENIED: p.innerHTML = "PERMISSION_DENIED.<br>you have to allow your browser to get your location."
      break;
      case error.TIMEOUT: p.innerHTML="TIMEOUT"
      break;
      case error.POSITION_UNAVAILABLE: p.innerHTML="You are currently offline, network unavaliable!!!"
      break;
      case error.UNKNOWN_ERROR: p.innerHTML="UNKNOWN ERROR"
      break;
    }
    document.body.appendChild(p);
  }
 </script>
<!-- lists of parking services -->
  <?php
  $sql = "SELECT * FROM parkzilla_admin";
  $result = mysqli_query($conn, $sql);

  echo "
  <script>
  function initMap(x,y){
    var mapCanavus = document.getElementById('googleMap');

    var mapPro = {
      center: new google.maps.LatLng(x, y),
      zoom: 10,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map1 = new google.maps.Map(mapCanavus, mapPro);
var marker = new google.maps.Marker({
  position: {lat: x, lng: y},
  map: map1,
  title : 'you'
});
var info = new google.maps.InfoWindow({content: 'hello world'});

marker.addListener('click', function(){
  info.open(map1, marker);
});";
  while($row = mysqli_fetch_array($result)){
    $comp_name = $row['company'];
    $email = $row['email'];
    $n = strpos($row['address'],"-");
    $address = str_split($row['address'],$n);
    $lat = $address[0];
    $phone = $row['phone'];
    $lng = $address[1]*-1;
    $charge = $row['charge'];
    $id_c = $row['id'];
    $rate = $row['rate'];
    echo "var $comp_name = new google.maps.Marker({
          position: new google.maps.LatLng($lat,$lng),
          map: map1,
          title: '$comp_name'
    });
      var info$id_c = new google.maps.InfoWindow({
        content: '$comp_name, $email, $phone'
      });
      $comp_name.addListener('click',function(){info$id_c.open(map1, $comp_name);});
    ";
  }
  echo "}</script>";
  /*list of company*/
  echo "<div class='jumbotron'><h1>Parking companies</h1> </div>";
  $sql = "SELECT * FROM parkzilla_admin";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    echo "<div class='body-con'>";
    while($row = mysqli_fetch_array($result))
    {
      $comp_name = $row['company'];
      $email = $row['email'];
      $address = $row['address'];
      $charge = $row['charge'];
      $id_c = $row['id'];
      $rate = $row['rate'];
    echo "<div class='lists'>
          <img onclick='urlRe()' src='../admin/uploads/$id_c.png' width='200px' height='200px'>
          <div class='detail'>
            <p><b>Company name</b>: <a href='index.php?comp_name=$comp_name&comp_id=$id_c&id=$id'>$comp_name</a></p>
            <p>address: <span>addis abeba</span></p>
            <p>Email: <a href='#'>$email</a></p>
            <p>Charge: $charge</p>
            <img width='150px' height='25px' src='Rate$rate.png'>
          </div>
    </div>";
    }
    echo "</div>
    <script>
    function urlRe(){
     window.location.assign('index.php?comp_name=$comp_name&comp_id=$id_c&id=$id');
    }
    </script>
    ";
  }
  ?>
</body>
</html>
