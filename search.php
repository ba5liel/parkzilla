<?php
  require "connect_mysql.php";
  if(isset($_GET['searchVal'])){
    $valueToSearch = $_GET['searchVal'];
    $sql = "SELECT * FROM parkzilla_admin WHERE company LIKE '%".$valueToSearch."%'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num > 0){
      echo "<p id='resultP'>(<span id='num'>$num</span>) results found for '<span id='num'>$valueToSearch</span>'</p>";
      while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $comp_name = $row['company'];
        $rate = $row['rate'];
        echo "<div class='result'>
                  <img width= '75px' height='75px' src='admin/uploads/$id.png'/>
                  <div class='infoC'>
                    <p><b>$comp_name</b></p>
                    <img width='150px' height='25px' src='user/Rate$rate.png'>
                    <a href='javascript: openLogin()'>checkout</a> <a href='#'><i class='fa fa-map-marker'></i> show on map <i class='fa fa-map-marker'></i></a>
                  </div>
                  </div>";
      }
      echo "<a id='clear'  href='index.php'>clear<i class='fa fa-remove'></i></a>";
    }
    else{
      echo "<h4 id='no_result'>No such parking company found!!</h4>";
    }
  }
?>
