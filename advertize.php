<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel = "icon" href = "icon.png">
   <meta name = "robots" content = "follow, index" />
   <meta name = "keywords" content = "parking, car parking, parking place, parking in ethiopia, best parking app" />
   <meta name = "description" content = "a systematic parking website" />
   <meta name = "refresh" content = "60" />
   <meta name= "viewport" content = "width = device-width, initial-scale = 1.0"/>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
   <link rel="stylesheet" type="text/css" href="css/main.css"/>
   <link rel="stylesheet" type="text/css" href="css/Font-Awesome/css/font-awesome.min.css"/>
   <title>
     Advertize with parkzilla...
   </title>
   <style>
   .dropdown{
       display: inline;
       cursor:pointer;
   }
   .content{
     display:none;
     position:absolute;
     text-align:left;
     min-width: 160px;
     box-shadow: 2px 1px 60px;
     background-color: #f2f2f2;
   }
   .dropdown:hover .content{
     display:block;
   }
   .content a{

     padding:16px;
   }
   .content a:hover{
     background-color:#000;
   }
   </style>
   <nav>
     <div class="logo">
       <h1 style="color:rga(106, 106, 106)"> Parkzilla </h1>
       <img width="100px" height="100px" style='cursor: pointer; margin-top: -8px;filter: grayscale(10%);' src="css/logo.png"/>
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
        <li><a href="#">Service</a></li>
        <li class="dropdown"><a class="dropbtn" style="color:#fed136;">Account</a>
        <div class="content">
          <a href="javascript:void(0)" onclick="openLogin()">login</a>
          <a href="javascript:void(0)" onclick="openSignup()">sign up</a>
        </div>
        </li>
        <li><a href="provider.php" target="_blank" >Provider</a></li>
        <li><a href="how.html">How</a></li>
        <li style="float:right;"><a href="http://localhost/graphic/">About us</a></li>
      </ul>
    </div>
   <div class="strips" style="background-image:url('images/strip2.png');">
   </div>
   </nav>
