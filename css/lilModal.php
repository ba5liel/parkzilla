<style>
  .lilModal{
    display: none;
    position: fixed;
    width: 400px;
    height: 210px;
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
  .mainContent button{
    border: none;
    padding: 5px;
    width: 300px;
    color: white;
    background-color: rgb(7, 163, 107);
    cursor: pointer;
  }
  .mainContent button:hover{
    background-color: rgb(0, 153, 100);
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
  <span class="top"><b class="fa fa-warning"></b>warning<i class="fa fa-close" onclick="closeLil()"></i></span>
  <div class="mainContent">
    <img src="../css/logo-tp.png" alt="logo" style="width: 80px; height: 80px;"/>
    <p>in order to change states you have to be loged as p man</p>
    <button type="button" onclick="closeLil(); openLogin()">login</button>
  </div>
</div>
