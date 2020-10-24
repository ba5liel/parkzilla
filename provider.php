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
   <link rel="stylesheet" type="text/css" href="css/provider.css"/>
   <link rel="stylesheet" type="text/css" href="css/Font-Awesome/css/font-awesome.min.css"/>
   <title>
     service provider
   </title>
   <script src="js/track.js"type="text/javascript"></script>
   <script type="text/javascript">
    function disappear(){
        document.getElementsByClassName('letThemKnow')[0].classList.add('disappear');
    }
   </script>
 </head>
 <body>
   <div class="letThemKnow disappear">
      <h1>Welcome parking service provider</h1>
      <p style="margin-top: 150px;">parkzilla provide you the chance for your company to be accesable for users by implimenting smart system of reserving and schduling parking spots online without any fee(for now) this will acclerate the bussiness you are runing
      </p>
      <p> parkzilla offers special service for parking buliding which is by fatening your process and creating friendly interface for users and for your employees </p>
      <span onclick="disappear()">Next</span>
   </div>
 <div id="loginForm" class="loginForm">
   <div class="form-bg">
     <img src="images/user.png">
     <form action = "admin/login.php" method="POST">
       <div class="form-icon">
       <input type="text" name="company" placeholder="Enter Company name"/> </br>
     </div>
     <div class="form-icon2">
       <input type="password" name="password" placeholder="Enter password"/></br>
     </div>
       <input class = "btn-login" type="submit" value="Login" /></br>
       <a class="forget" href="#"> Forget Password? </a>
     </form>
   </div>
<!-- Sign up form -->
   <div class="form-bg form-bg2">
     <img src="images/user.png">
     <form action = "admin/sign_up.php" enctype="multipart/form-data" method="POST">
       <center>
     <table>
     <tr>
       <td>*campany name</td><td><input type="text" name="name" placeholder="Enter company name"/></td>
     </tr>
     <tr>
       <td>*contact</td><td><input type="tel" name="phone" placeholder="Enter phone"/></td>
     </tr>
     <tr>
       <td>*Email</td><td><input type="email" name="email" placeholder="Enter email"/></td>
     </tr>
     <tr>
       <td>*password</td><td><input type="password" name="password" placeholder="Enter password"/></td>
     </tr>
     <tr>
     <td>*confirm</td><td><input type="password" name="confirm" placeholder="ReEnter password"/></td>
     </tr>
     <tr>
       <td>*number of floors</td><td><input type="number" name="floor" min="1" max="10" placeholder="Number of floors"></td>
     </tr>
     <tr>
       <td>*number of spot per floor</td><td><input type="number" name="slot" min="1" max="50" placeholder="Parking spot/floor"/></td>
     </tr>
     <tr>
       <td>*charge per hour ETB</td><td><input type="number" name="charge" min="0" placeholder="charge/min"/></td>
     </tr>
     <tr>
       <td>*address-GPS coordinate</td><td><input type="text" name="address" placeholder="GPS coordinate"/></td><td><input type="button" value="track" onclick="track()"></td>
     </tr>
     <tr>
      <td></td>
    <td>
     <p style="color: #fe5454"id="result"></p>
    </td>
    </tr>
     <tr>
       <td>*Logo(optional)</td><td><input type="file" name="logo" placeholder="logo"/></td>
     </tr>
     <tr>
       <td></td><td><input class = "btn-login" type="submit" name="submit" value="Submit" /></td>
     </tr>
     </table>
   </center>
     </form>
   </div>
 </div>
 <div class='info'>
   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 </div>
</body>
 </html>
