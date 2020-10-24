<style>
  .lilModal{
    display: none;
    position: fixed;
    width: 400px;
    height: 410px;
    margin: auto;
    left: 35%;
    top: 150px;
    background-color: rgba(25,196,135,1);
    color: white;
    border: none;
    z-index: 7;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.6);
  }
  .lilModal .top{
    display: block;
    width: 100%;
    text-align: center;
    border-bottom: 1px solid #ccc;
    padding: 8px;
    font-size: 17px;
    font-weight: bolder;
    text-transform: capitalize;
  }
  span i{
    float: right;
    cursor: pointer;
    padding: 4px;
  }
  span i:hover{
    background-color: rgba(255,255,255,0.3);
  }
  span b{
    color: #ffe433;
    margin-right: 5px;
  }
  .mainContent{
    padding: 10px;
    text-align: center;
    font-size: 14px;
    color: #f7f7f7;
  }
  .mainContent .btn-info{
    border: none;
    padding: 5px;
    width: 300px;
    margin-top: 10px;
    color: white;
    background-color: rgb(7, 163, 107);
    cursor: pointer;
  }
  .mainContent .btn-info:hover{
    background-color: rgb(0, 153, 100);
  }
  .lilModal textarea{
    padding: 20px;
    color: #444;
  }
  .lilModal input{
    padding: 4px;
    padding-left: 50px;
    font-size: 15px;
  }
  .lilModal input, .lilModal textarea{
    border: none;
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
  }
</style>
<script type="text/javascript">
  function closeLil(){
    var modal = document.getElementById('lilModal');
    modal.style.display = "none";
  }
  function openLil(){
    var modal = document.getElementById('lilModal');
    modal.style.display = "block";
  }
</script>

<div class="lilModal" id="lilModal">
  <span class="top"><b class="fa fa-mail-forward"></b>quick contant<i class="fa fa-close" onclick="closeLil()"></i></span>
  <div class="mainContent">
    <img src="css/logo-tp.png" alt="logo" style="width: 80px; height: 80px;"/>
    <form action="contact.php" method="POST">
      <div class="form-icon3">
      <input type="email" name="email" placeholder="Email Address "/> </br>
    </div>
      <textarea name="msg" style="width: 300px; height: 120px;">message goes here</textarea>
      <input class = "btn btn-info btn-lg" type="submit" value="submit" name="submitContact"/></br>
    </form>
  </div>
</div>
