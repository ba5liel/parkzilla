<?php
  session_start();
  if(isset($_SESSION['user'])){
    $id = $_SESSION['id'];
    header("location: user/index.php?id=$id");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel = "icon" href = "icon.png">
   <meta name = "robots" content = "follow, index" />
   <meta name = "keywords" content = "parking, car parking, parking place, parking in ethiopia, best parking app" />
   <meta name = "description" content = "a systematic parking website" />
   <meta name = "refresh" content = "60" />
   <meta name= "viewport" content = "width = device-width, initial-scale = 1.0"/>
   <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@parkzilla">
    <meta name="twitter:title" content="Ethiopians parking service">
    <meta name="twitter:image" content="http://localhost/new_project/logo.png">
    <meta name="twitter:image:alt" content="The parkzilla Logo">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
   <link rel="stylesheet" type="text/css" href="css/main.css"/>
   <link rel="stylesheet" type="text/css" href="css/Font-Awesome/css/font-awesome.min.css"/>
   <title>
     Parkzilla
   </title>
   <script>
    function cVOSF(e){
      document.getElementById('search').value = e.innerHTML;
    }
      window.onclick = function(e){
        if(e.target == document.getElementById('intro'))
        closeCurSlide();
      }

      var i=0;

      function showResult(){
        var re = document.getElementsByClassName('result');
        if(i <= re.length){
          re[i].classList.add('fadeIn');
          i++;
          setTimeout(showResult, 200);
        }
      }
      function autoplayS(){
        showSlide(indexSlide);
        indexSlide++;
      }
      function showSlide(n){
        var slide = document.getElementsByClassName('slides');
        var dot = document.getElementsByClassName('dot');

        for(var i=0; i < slide.length; i++){
          slide[i].style.display = "none";
        }
        for(var j=0; j<dot.length; j++){
          dot[j].classList.remove('activeD');
        }
        if(n < 0){
          n = slide.length - 1;
        }
        if(n > slide.length-1){
          n = 0;
        }

        slide[n].style.display = "inline-block";
        dot[n].classList.add('activeD');
        indexSlide = n;
      }
      function slide(x){
        showSlide(indexSlide += x);
      }
      function changeSlide(x){
        showSlide(x);
      }
      var countTurn = 0;
      function toggle(x){
        countTurn++;
        x.classList.toggle("change");
        document.getElementById('side-bar').classList.toggle("hide");
        var buld = document.getElementsByClassName('bulding')[0];
        var extra = document.getElementsByClassName('extra-utilse')[0];
        if(countTurn%2 != 0)
        {
          buld.style.width = "87%";
          extra.style.marginLeft='190px';

        }
        else  {buld.style.width = "70%"; extra.style.marginLeft='40px';}

      }
      function openLogin(){
        document.getElementById("loginForm").style.height = "100%";
        document.getElementById("closebtn").style.visibility ="visible";
        document.getElementsByClassName("loginForm")[0].style.display ="block";
        document.getElementById("body").style.filter="blur(1px)";
        document.getElementById("body2").style.filter="blur(1px)";
        document.getElementById("body3").style.filter="blur(1px)";
      }
      function openSignup(){
        document.getElementById("signUpForm").style.height = "100%";
        document.getElementById("closebtn").style.visibility ="visible";
        document.getElementById("signUpForm").style.display ="block";
        document.getElementById("body").style.filter="blur(1px)";
        document.getElementById("body2").style.filter="blur(1px)";
        document.getElementById("body3").style.filter="blur(1px)";
      }
      function closeSignUp(){
        document.getElementById("signUpForm").style.height = "0";
        document.getElementById("signUpForm").style.display ="none";
        document.getElementById("body").style.filter="blur(0px)";
        document.getElementById("body2").style.filter="blur(0px)";
        document.getElementById("body3").style.filter="blur(0px)";
      }
      function closeLogin(){
        document.getElementById("loginForm").style.height = "0";
        document.getElementsByClassName("loginForm")[0].style.display ="none";
        document.getElementById("body").style.filter="blur(0px)";
        document.getElementById("body2").style.filter="blur(0px)";
        document.getElementById("body3").style.filter="blur(0px)";
      }
      var imgIndex = 0;
      function openIntro(e){
        var val = e.innerHTML;
        if(val.toLowerCase() == 'megenagna'){
          var srcFolder = 'images/megenagna/';
        }
        if(val.toLowerCase() == 'kasachies'){
          var srcFolder = 'images/kasachies';
        }
        for(var i=0; i < 5; i++){
          var imgi = document.createElement('img');
          imgi.src = srcFolder+(i+1)+'.jpg';
          document.getElementsByClassName('preview')[0].appendChild(imgi);
        }

        slidePreview();
        document.getElementById('intro').style.display = "block";
        document.getElementById('intro').style.height = "100%";

      }
      setInterval(slidePreview, 3000);
      function slidePreview(){
        if(imgIndex > 4) imgIndex = 0;
        var x = document.querySelectorAll('.preview img');
        for(var i=0; i < x.length; i++){
          x[i].style.display = "none";
        }
        x[imgIndex].style.display = "block";
        imgIndex++;
      }
      function closeCurSlide(){
        var parent = document.querySelectorAll('.preview')[0];
        var x = document.querySelectorAll('.preview img');
        for(var i=0; i < x.length; i++){
          parent.removeChild(x[i]);
        }
        document.getElementById('intro').style.display = "none";
      }
      /* AJAX */
      function suggest(e){
        var target = document.getElementById('suggest');
        var  img = document.createElement('img');
        target.innerHTML = "";
        img.src='images/loading-cg.gif';
        target.append(img);
        if(window.XMLHttpRequest){
          var xhttp = new XMLHttpRequest();
        }
        else{
          var xhttp = new ActiveXObject(Microsoft.XMLHTTP);
        }
        var v = e.value;

        xhttp.onreadystatechange = function (){
          if(xhttp.status == 200 && xhttp.readyState == 4){
            target.removeChild(img);
            target.innerHTML = xhttp.responseText;
          }
        }
        xhttp.open("GET",'ajaxSearch.php?v='+v, true);
        xhttp.send();
      }
   </script>
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
 </head>
 <body style='overflow-x: hidden' >
   <!-- navigation -->
   <div id="body">
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
</div>
<!-- login form -->
  <div id="loginForm" class="loginForm">
    <a id="closebtn" onclick="closeLogin()">×</a>
    <div class="form-bg">
      <img src="images/user.png">
      <form action = "user/login.php" method="POST">
        <div class="form-icon">
        <input type="text" name="username" placeholder="Enter username"/> </br>
      </div>
      <div class="form-icon2">
        <input type="password" name="password" placeholder="Enter password"/></br>
      </div>
        <input class = "btn-login" type="submit" value="Login" /></br>
        <a class="forget" href="javascript: closeLogin(); openSignup()">Create Account</a>
        <a class="forget" href="#"> Forget Password? </a>
      </form>
    </div>
  </div>
<!-- Sign up form -->
  <div id="signUpForm" class="loginForm">
    <a class="closeSignUp" onclick="closeSignUp()">x</a>
    <div class="form-bg form-bg2">
      <img src="images/user.png">
      <form action = "user/sign_up.php" method="POST">
        <center>
      <table>
      <tr>
        <td>*user name</td><td><input type="text" name="username" placeholder="Enter username"/></td><td>*phone</td><td><input type="tel" name="phone" placeholder="Enter phone"/></td>
      </tr>
      <tr>
        <td>*password</td><td><input type="password" name="password" placeholder="Enter password"/></td><td>*type of vehicel</td><td><select name="vehicle_type">
          <option value="motercycle">motercycle</option>
          <option value="4WD">4WD</option>
          <option value="van">van</option>
          <option value="heavy">heavy car</option>
        </select></td>
      </tr>
      <tr>
      <td>*confirm</td><td><input type="password" name="confirm" placeholder="ReEnter password"/></td><td>*email</td><td><input type="email" name="email" placeholder="Enter email"/></td>
      </tr>
      <tr>
        <td>*vehicel plate num</td><td><input type="text" name="plate" placeholder="Enter plate number"/></td><td></td><td><input class = "btn-login" type="submit" value="Submit" /></td>
      </tr>
      </table>
    </center>
      </form>
    </div>
  </div>
  <!-- Intro page -->
  <div id="intro">
    <div class='preview'>
      <div class="preLog">
        <h4 style="color: #555;">You need to signin inorder to to continue</h4>
        <form action = "user/login.php" method="POST">
          <div class="form-icon">
          <input type="text" name="username" placeholder="Enter username"/> </br>
        </div>
        <div class="form-icon2">
          <input type="password" name="password" placeholder="Enter password"/></br>
        </div>
          <input class = "btn-login" type="submit" value="Login" /></br>
          <a class="forget" href="javascript: openSignup()">Create Account</a>
          <a class="forget" href="#"> Forget Password? </a>
        </form>
      </div>
    </div>
  </div>
 <div id="body2">
  <aside id="side-bar" class="side-bar">
        <section>
          <div class="search-image" id = "search-image"style="  background-image: url('css/search-image.png');">
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
            <input onkeyup="suggest(this)" name="searchVal"type="search" id="search" style="background-image: url('css/search.png');" placeholder="search"/>
          </form>
          <p id='suggest'></p>
        </div>
          <hgroup>
            <h2>places<h2>
            </hgroup>
            <p onclick='openIntro(this)'>Megenagna</p>
            <p onclick='openIntro(this)'>kasachies</p>
            <p onclick='openIntro(this)'>mexico</p>
            <p onclick='openIntro(this)'>bole</p>
            <p onclick='openIntro(this)'>bethel</p>
            <p onclick='openIntro(this)'>piassa</p>
        </section>
        <section>
          <h2>ADs</h2>
          <img src='images/ads/img_1.jpg' style="width: 100%;">
          <img src='images/ads/img_2.jpg' style="width: 100%;">
        </section>
  </aside>
  <div class="bulding">
    <?php
      include "search.php";
    ?>
    <div class="slidesContainer">
      <div class="slides">
        <span class="pageNum">1/5</span>
        <img src='images/1.jpg' style="width:100%;">
        <div class='text'>Fast and Easy</div>
      </div>
      <div class="slides">
        <span class="pageNum">2/5</span>
        <img src='images/2.jpg' style="width:100%;">
        <div class='text'>More than 100K users</div>
      </div>
      <div class="slides">
        <span class="pageNum">3/5</span>
        <img src='images/3.jpg' style="width:100%;">
        <div class='text'>One click use</div>
      </div>
      <div class="slides">
        <span class="pageNum">4/5</span>
        <img src='images/4.jpg' style="width:100%;">
        <div class='text'>Create job oppurtunities</div>
      </div>
      <div class="slides">
        <span class="pageNum">5/5</span>
        <img src='images/5.jpg' style="width:100%;">
        <div class='text'>Free and Securied</div>
      </div>
      <a class="prev" style="color: white;" onclick="slide(-1)"> &#10094</a>
      <a class="next" style="color: white;" onclick="slide(1)"> &#10095</a>
      <div class="currentS">
        <span class="dot" onclick="changeSlide(0)"></span>
        <span class="dot" onclick="changeSlide(1)"></span>
        <span class="dot" onclick="changeSlide(2)"></span>
        <span class="dot" onclick="changeSlide(3)"></span>
        <span class="dot" onclick="changeSlide(4)"></span>
    </div>
    </div>
    <script type="text/javascript">
    // window.onload = function(){
        var indexSlide =  0;
        showSlide(indexSlide);
        if(document.getElementsByClassName('result').length >0){

          showResult();
        }
        setInterval(autoplayS, 3000);
    // }
    </script>
    <div onclick="location.href = 'advertize.php'"class="extra-utilse">
      <h3>Advertize with parkilla</h3>
      <img style="width: 100px; height: 100px; border-radius: 50%;" src="images/adv.jpg">
      <p>plase  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Pellentesque sit amet lorem ligula.</p>
    </div>
    <?php include 'lilModal.php'; ?>
    <div onclick="openLil()" class="extra-utilse">
      <h3>Contact parkzilla</h3>
      <img style="width: 100px; height: 100px; border-radius: 50%;" src="images/p.jpg">
      <p>plase  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Pellentesque sit amet lorem ligula.</p>
    </div>
    <div onclick="location.href='how.html'" class="extra-utilse">
      <h3>How to use parkilla</h3>
      <img style="width: 100px; height: 100px; border-radius: 50%;" src="images/adv.jpg">
      <p> sit amet, consectetur adipiscing elit.
          Pellentesque sit amet lorem ligula.</p>
    </div>
    <div class="clearfix"></div>
  </div>
  <div onclick="window.open('app/index.php')" target="_blank" class="download">
    Download <i class='fa fa-download'></i>
 <span class="tooltip">Download app </span>
  </div>
  <div class="clearfix"></div>
</div>
</body>
<div id="body3">
<footer>
  <div class="info">
    <h3>About us</h3>
  <p> new parking system in ethipia!! reseve your parking spot now !!<p>
  <p> for any service provider who want in in-this awsome technology <a href="#" target="_blank">click-here</a> and get started</p>
  plase  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Pellentesque sit amet lorem ligula.
</div>
<center>
  <div class="contact">
  <h3>contact us </h3>
  <p> <i class="fa fa-phone"></i>  phone: 217+ 091214155<p>
  <p> <i class="fa fa-envelope"></i> email: parkzilla@gmail.com</p>
</div>
</center>
<div class="social-media">
  <a href="www.facebook.com/parkzilla" target="_blank"><i style="font-size:20px;"class="fa fa-facebook"></i></a>
  <a href="www.twitter.com/parkzilla" target="_blank"><i style="font-size:20px;"class="fa fa-twitter"></i></a>
  <a href="www.linkedin.com/parkzilla" target="_blank"><i style="font-size:20px;"class="fa fa-linkedin"></i></a>
  <a href="www.youtube.com/parkzilla" target="_blank"><i style="font-size:20px;"class="fa fa-youtube"></i></a>
</div>
<center>  <p class="copy-right">Copyright &copy; 2018 Parkzilla, Ethiopia, Addis Abeba Inc., Ltd., Phd. </p>
</center>
</div>
</footer>
</html>
