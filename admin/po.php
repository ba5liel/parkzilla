<?php
    session_start();
    require "../connect_mysql.php";

    if(isset($_GET["yesAlter"]) || isset($_GET["alterType"]))
    { $comp = $_SESSION["company"];
      $alter = $_GET["alterId"];
      if($_GET["alterType"] == "calc"){
        $sql = "SELECT starting_time FROM $comp WHERE id = '$alter'";
        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        $newT = time() - $row["starting_time"];
        $vs=0;

        $s = getdate($newT)["seconds"];
        $m = getdate($newT)["minutes"];
        $h = getdate($newT)["hours"];

        echo "<h1>".$h.":".$m.":".$s."</h1>";
        $sql = "SELECT charge FROM parkzilla_admin WHERE company = '$comp'";
        $result = mysqli_query($conn,$sql);
        if(!$result) die("error");
        $row = mysqli_fetch_array($result);
        $chr = $row["charge"]/4;
        $totM = $chr*$s/60;
        $totM += ($chr*$m);
        $totM += ($chr*$h*60);
        echo "<h1 style='color:red'>".ceil($totM).".00$</h1>";
        /* header("Location: po.php"); */
        echo "<a href='po.php?yesAltr=1&alterId=$alter&alterType=unreserve'>Complete</a>";
            exit();
      }
      else if($_GET["alterType"] == "unreserve"){

          $sql = "UPDATE $comp SET flag= 'Avaliable', starting_time=0, plate= ' ' WHERE id = '$alter'";
          $result = mysqli_query($conn,$sql);
            if(!$result)
                {
                  echo "it doesn't works";
                  exit();
      }
            include("returnToN.php");
            exit();
      }

      else if($_GET["alterType"] == "occupy"){

      $t = time();
      $sql = "UPDATE $comp SET flag= 'Occupied', starting_time= '$t' WHERE id = '$alter'";
      $result = mysqli_query($conn,$sql);
      if(!$result)
      {
        echo "it doesn't works";
        exit();
      }
      include("returnToN.php");
      exit();
      }
      else if($_GET["alterType"] == 'broken')
      { $comp = $_SESSION["company"];
      $alter = $_GET["alterId"];
      $sql = "UPDATE $comp SET flag= 'Broken' WHERE id = '$alter'";
      $result = mysqli_query($conn,$sql);
      if(!$result)
      {
        echo "it doesn't works";
        exit();
      }
      include("returnToN.php");
      exit();
    }
      else if($_GET["alterType"] == 'handi')
      { $comp = $_SESSION["company"];
      $alter = $_GET["alterId"];
      $sql = "UPDATE $comp SET flag= 'Handicap' WHERE id = '$alter'";
      $result = mysqli_query($conn,$sql);
      if(!$result)
      {
        echo "it doesn't works";

      }
      include("returnToN.php");
      exit();
    }
    exit();
  }

    if(isset($_GET["alterId"]) && !isset($_GET["alterType"]))
    {
      $comp = $_SESSION["company"];
      $alter = $_GET["alterId"];
      $sql = "SELECT flag FROM $comp WHERE id= '$alter'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      $flag = $row['flag'];
      if($flag =="Broken"){
        echo "<span id='notification' >Do you want to <b>unbroke</b> this spot </span><a href='javascript: AJAX(\"po.php?yesAlter=1&alterId=$alter&alterType=unreserve\",returnToN)'>yes</a><a href='po.php'>no</a>";
        exit();
      }
      if($flag == "Occupied"){
        echo "<span id='notification' >Do you want to end service</span> <a href='javascript: AJAX(\"po.php?yesAlter=1&alterId=$alter&alterType=calc\",returnToN)'>yes</a><a href='po.php'>no</a>";
        exit();
      }
      if($flag == "Avaliable")
      {
      echo "<span id='notification' >Make this spot <b>broken</b> or handicap</span><a href='javascript: AJAX(\"po.php?yesAlter=1&alterId=$alter&alterType=broken\",returnToN)'>Broken</a><a style='width: 120px;' href='javascript: AJAX(\"po.php?yesAlter=1&alterId=$alter&alterType=handi\",returnToN)'>Handicap</a><a href='po.php'>cancle</a>";
      exit();
      }
      if($flag == "Handicap")
      {
      echo "<span id='notification' >Make this spot <b>broken</b> or Avaliable</span><a href='javascript: AJAX(\"po.php?yesAlter=1&alterId=$alter&alterType=broken\",returnToN)'>Broken</a><a style='width: 120px;' href='javascript: AJAX(\"po.php?yesAlter=1&alterId=$alter&alterType=unreserve\",returnToN)'>Avaliable</a><a href='po.php'>cancle</a>";
      exit();
      }
      else{
        echo "<span id='notification' >what do you want to do?</span><a href='po.php?yesAltr=1&alterId=$alter&alterType=occupy'>occupy</a><a style='width: 120px;' href='javascript: AJAX(\"po.php?yesAlter=1&alterId=$alter&alterType=unreserve\",returnToN)'>unreserve</a><a href='po.php'>cancle</a>";
      exit();
      }
    }
    $comp_name = $_SESSION["company"];
    $id = $_SESSION["comp_id"];
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
  <link rel = "stylesheet" type = "text/css" href = "po.css"/>
  <title>
    welcome <?php echo $comp_name;?>
  </title>
  <script>
  function returnToN(x){
    var tar = document.querySelector('[alter="'+g+'"]');
    var n = Number(tar.getAttribute('alter'));
    tar.classList.remove('tranRota');
    tar.classList.add('tranRotaB');
    tar.innerHTML = x;
    tar.onclick = function(){alter(this);};
    var clas = tar.querySelector('p').innerHTML;
    document.getElementsByClassName('slot')[n-1].setAttribute("class", "slot "+ clas);
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
  </script>
</head>
<body>
  <button id="inst" onclick="showInst()">instruction</button>
  <div class="bulding">

   <div class="floor">
    <ul class="pagination">
    <li style="margin-left: -45px;"><a href="#" style="text-align: left; color: white; background-color: #00ccff; border-radius: 2px;">Floors</a></li>
    <?php include_once "parkingSlots.php"; ?>
 </div>
 </div>
 <script>
  document.getElementsByClassName('ground')[0].style.display = "block";
  function AJAX(url,afterWard){
    var  img = document.createElement('img');
    var tar = document.querySelector('[alter="'+g+'"]');
    tar.innerHTML = ' ';
    img.src='../images/dots2.gif';
    img.style.width="30%";
    img.style.height="30%";
    img.style.marginTop="30%";
    tar.append(img);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(xhttp.status == 200 && xhttp.readyState == 4){
         tar.removeChild(img);
          afterWard(xhttp.responseText);
      }

    }

    xhttp.open("GET",url,true);
    xhttp.send();
  }
  var g;
  function alter(e){
    g = e.getAttribute("alter");
    AJAX("po.php?alterId="+g, function(x){
    e.classList.remove('tranRotaB');
    e.classList.add('tranRota');
    e.onclick = function(){};
    setTimeout(function(){e.innerHTML = x;}, 1000);});
  }
 </script>
</body>
</html>
