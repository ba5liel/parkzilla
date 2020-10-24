<?php
session_start();
require "../connect_mysql.php";
$error = " ";
if(!isset($_SESSION['company'])){
  echo "you are not rigistered correctly";
  exit();
}
if(isset($_GET['destroy']))
{
  unset($_SESSION['comp_id']);
  unset($_SESSION["company"]);
  unset($_SESSION["comp_password"]);
  header("Location: ../index.php");
  exit();
}
$id = $_SESSION["comp_id"];
?>
<?php
if(isset($_GET["unreserveA"]))
{ $comp = $_SESSION["company"];
  $i = 0;
  $sql = "SELECT * FROM  $comp";
  $result = mysqli_query($conn, $sql);
  $MAX = mysqli_num_rows($result);
  while($i < $MAX){
  $sql = "UPDATE $comp SET flag= 'Avaliable', starting_time=0, plate= ' ' WHERE id = '$i'";
  $result = mysqli_query($conn,$sql);
  if(!$result)
  {
    echo "error occured!!";
    exit();
  }
  header("Location: index.php?id=$id");
  $i++;
}
}
if(isset($_GET["yesAlter"]))
{ $comp = $_SESSION["company"];
  $alter = $_GET["alterId"];
  if($_GET['alterType'] == 'broken'){
  echo "<script> alert('asdsd'); </script>";
  $sql = "UPDATE $comp SET flag= 'Broken', starting_time=0, plate= ' ' WHERE id = '$alter'";
  }
  else if($_GET['alterType'] == 'handi'){
    $sql = "UPDATE $comp SET flag= 'Handicap', starting_time=0, plate= ' ' WHERE id = '$alter'";
  }
  $result = mysqli_query($conn,$sql);
  if(!$result)
  {
    echo "it doesn't works";
    exit();
  }
  echo "<script> alert($sql); </script>";
  header("Location: index.php?id=$id");
  exit();
}
  if(isset($_GET["alterId"])&&!isset($_GET["yesAlter"]))
  {
    $comp = $_SESSION["company"];
    $alter = $_GET["alterId"];
    $sql = "SELECT flag FROM $comp WHERE id= '$alter'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
    $flag = $row['flag'];
    }
    if($flag == "Avaliable")
    {
    echo "make this spot accessable for only <b>disabled person</b> <a href='index.php?yesAlter=1&alterId=$alter&alterType=handi'>handicap</a>|<br>make this spot <b>closed maintenance</b> <a href='index.php?yesAlter=1&alterType=broken&alterId=$alter'>broken</a>|<a href='index.php?id=$id'>No</a>";
    exit();
    }
    else header("Location: index.php?id=$id");
  }
?>
<?php
  require "../connect_mysql.php";
  $id = $_GET['id'];
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
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name= "viewport" content = "width = device-width, initial-scale = 1.0"/>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css"/>
  <link rel = "stylesheet" type = "text/css" href = "style.css"/>
  <link rel="stylesheet" type="text/css" href="../css/Font-Awesome/css/font-awesome.min.css"/>
  <title>
    welcome <?php echo $comp_name;?>
  </title>
<script>
function toggle(x){
  x.classList.toggle("change");
}
function toggle2(e)
{
  for(var i = 0; i < document.querySelectorAll('ul.pagination li a').length; i++)
  {
  var j = document.querySelectorAll('ul.pagination li a')[i];
  j.setAttribute("class", "");
  }
  for(var c = 0; c < document.getElementsByClassName('ground').length; c++)
  {
    document.getElementsByClassName('ground')[c].style.display = "none";
  }
  e.setAttribute("class", "active");
  var j;
  for(var r=0; r < document.querySelectorAll('ul.pagination li a').length; r++)
  {
   j = document.querySelectorAll('ul.pagination li a')[r];
    if(j.getAttribute("class") == "active")
    {
      j =r;
      break;
    }
  }
  document.getElementsByClassName('ground')[j-1].style.display = "block";
}

function openLogin(){
  document.getElementById("loginForm").style.height = "100%";
  document.getElementById("closebtn").style.visibility ="visible";
  document.getElementsByClassName("loginForm")[0].style.display ="block";
}
function openSignup(){
  document.getElementById("signUpForm").style.height = "100%";
  document.getElementById("closebtn").style.visibility ="visible";
  document.getElementById("signUpForm").style.display ="block";
}
function closeSignUp(){
  document.getElementById("signUpForm").style.height = "0";
  document.getElementById("signUpForm").style.display ="none";
}
function closeLogin(){
  document.getElementById("loginForm").style.height = "0";
  document.getElementsByClassName("loginForm")[0].style.display ="none";
}
</script>
</head>
<body>
  <nav>
    <div class="logo">
      <?php
      echo "<img width='100px' height='100px' style='position: absolute; border-radius: 50%; left: 2px; top: 4px; filter: grayscale(50%);' src='uploads/$id.png'/>";
      ?>
      <h1 style="color:rga(106, 106, 106)"> <?php echo "welcome $comp_name";?> </h1>
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
       <li><a href="#">Policy</a></li>
       <li><a href="index.php?destroy=1" style="color:#fed136;cursor: pointer;">Sign off</a></li>
       <li><a href="javascript:void(0)" onclick="openSetting()" >Setting</a></li>
       <li><a href="#">How</a></li>
       <li class="dropdown"><a class="dropbtn" style="color:#fed136;">P.man</a>
       <div class="content">
         <a  href="javascript:void(0)" onclick="openLogin()">login P.man</a>
         <a  href="javascript:void(0)" onclick="openSignup()">Create P.man</a>
     </div>
     </li>
       <li style="float:right;"><a href="http://localhost/graphic/">About us</a></li>
     </ul>
   </div>
 <div class="strips" style="background-image:url('../images/strip2.png');">
</div>
 </nav>
 <!-- end of nav -->
 <?php include 'lilModal.php'; ?>
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
  <a href="#"><img src='uploads/<?php echo $id.'.png'; ?>' style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;"> <?php echo " ".$_SESSION['company']; ?></a>
   <div class="acc">
  <a href="#"><i class="fa fa-user" style="font-size: 19px; margin-right: 5px;"></i> Account</a>
  <ul>
  <li><span class='descri'>change company's account settings</span>
  </div>
  <div class="section">
    <ul>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <li><a href="#">Change Campany name</a></li>
    <input class="input-ctrl" type="text" name="chng_cn" placeholder='new campany name'/>
    <li><a href="#">Change password</a></li>
    <input type="password" class="input-ctrl" name="chng_pw" placeholder='new password'/>
    <li><a href="#">Change policy</a></li>
    <textarea class="input-ctrl" name="policy"></textarea>
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
 <!-- end of settings -->

   <a style="font-size: 20px; color: #ef4545;"href="index.php?unreserveA=1">UNRESEVE ALL</a>
  <div class="bulding">
   <div class="floor">
    <ul class="pagination">
    <li style="margin-left: -45px;"><a href="#" style="text-align: left; color: white; background-color: #00ccff; border-radius: 2px;">Floors</a></li>
    <?php include_once 'parkingSlots.php'; ?>
 </div>
 </div>
 <!-- forms -->
 <div id="loginForm" class="loginForm">
   <a id="closebtn" onclick="closeLogin()">×</a>
   <div class="form-bg">
     <img src="../images/user.png">
     <form action = "PLogin.php" method="POST">
       <div class="form-icon">
       <input type="text" name="user" placeholder="Enter username"/> </br>
     </div>
     <div class="form-icon2">
       <input type="password" name="password" placeholder="Enter password"/></br>
     </div>
        <input type="hidden" name="comp_n" value="<?php echo $comp_name ?>">
       <input class = "btn-login" type="submit" value="Login" /></br>
       <a class="forget" href="#"> Forget Password? </a>
     </form>
   </div>
 </div>
 <div id="signUpForm" class="loginForm">
   <a class="closeSignUp" onclick="closeSignUp()">x</a>
   <div class="form-bg">
     <img src="../images/user.png">
       <form action = "PSign.php" method="POST">
         <div class="form-icon">
         <input type="text" name="username" placeholder="Enter username"/> </br>
       </div>
       <div class="form-icon2">
         <input type="password" name="pass" placeholder="Enter password"/></br>
       </div>
       <div class="form-icon2">
         <input type="password" name="repass" placeholder="ReEnter password"/></br>
       </div>
         <p><?php echo $error; ?> </p>
         <input type="hidden" name="comp_n" value="<?php echo $comp_name ?>">
         <input class = "btn-login" type="submit" value="Submit" /></br>
     </form>
   </div>
 </div>
 <!-- comments -->
 <div class="cAL">
 <?php
  $table = $comp_name."_com";
  $sql = "SELECT * FROM $table";
  $result = mysqli_query($conn, $sql);
  if(!$result){echo "can't selecting comments table";exit();}
  $n = mysqli_num_rows($result);
    echo '<p id="sumCom">All comments('.$n.')</p>';
  while($row = mysqli_fetch_array($result)){
    echo '
    <a href="#">'.$row["customer"].'</a>
    <p id="timeS">'.$row["com_date"].'</p>
    <div class="comment">
      <p>'.$row["comment"].'</p>
    <span class="fa fa-thumbs-up"> '.$row["rate"].'+</span>
    </div>';
  }
  ?>
 </div>
 <script>
  document.getElementsByClassName('ground')[0].style.display = "block";
  function alter(e){
      openLil();
  }
 </script>
</body>
</html>
