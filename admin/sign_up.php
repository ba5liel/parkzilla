<?php
  session_start();
  require "../connect_mysql.php";
  $comp_name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = ''.$_POST['address'].'';
  $password = $_POST['password'];
  $floor = $_POST['floor'];
  $slot = $_POST['slot'];
  $charge = $_POST['charge'];
  $sql = "INSERT INTO parkzilla_admin (company, password, email, address, phone, charge, floor, slot, reg_date)
                              VALUES ('$comp_name', '$password', '$email', $address, '$phone', $charge, $floor, $slot, NOW());";
  $result=mysqli_query($conn, $sql);
  $id = mysqli_insert_id($conn);
  if($result){
    $sql = "CREATE TABLE parkzilla.$comp_name ( id INT NOT NULL AUTO_INCREMENT,
                                        slot VARCHAR(20) NOT NULL,
                                        flag VARCHAR(10) NOT NULL,
                                        plate VARCHAR(225) NOT NULL,
                                        starting_time VARCHAR(225) NOT NULL,
                                        PRIMARY KEY (id,slot));";
    $result = mysqli_query($conn, $sql);

    if($result){

      for($i = 0; $i < $floor; $i++)
      {
        for($j = 0; $j < $slot; $j++)
        {
          $x = "f$i-s$j";
          $sql = "INSERT INTO $comp_name (slot, flag)
                        VALUES('$x', 'Avaliable');";
          $result=mysqli_query($conn, $sql);
          if(!$result){
            echo "error occured when inserting data into the table that was created ".mysqli_error($conn)."<br>";
            exit();
          }
        }
      }
      $comment = $comp_name."_com";
      $sql = "CREATE TABLE $comment ( id INT(11) NOT NULL AUTO_INCREMENT,
                                          customer VARCHAR(255) NOT NULL,
                                          comment VARCHAR(255) NOT NULL,
                                          rate VARCHAR(16) NOT NULL,
                                          com_date DATETIME NOT NULL,
                                          PRIMARY KEY (id));";
      $result = mysqli_query($conn, $sql);
        if(!$result){
          echo "error creating a comment table ". mysqli_error($conn);
          exit();
        }
        $po = "po_".$comp_name;
        $sql = "CREATE TABLE $po ( id INT(11) NOT NULL AUTO_INCREMENT,
                                            pman VARCHAR(255) NOT NULL,
                                            password VARCHAR(255) NOT NULL,
                                            PRIMARY KEY (id));";
        $result = mysqli_query($conn, $sql);
        if(!$result){
          echo "error creating a pman table ". mysqli_error($conn);
          exit();
        }
        $_SESSION['comp_id'] = $id;
        $_SESSION['company'] = $comp_name;
        $_SESSION['comp_password'] = $password;
        //upload the logo
        $picture = "$id.png";
        if(isset($_POST['submit']))
        {
          move_uploaded_file($_FILES["logo"]["tmp_name"], "uploads/$picture");
          $check = file_exists("uploads/$picture");
          if(!$check){
            copy("default.png", "uploads/$id.png");
            $check = file_exists("uploads/$picture");
            if(!$check){
              echo "$picture doesn't exist!";
              exit();
            }
          }
        }
        header("location: index.php?id=$id");
        exit();
      }
      else{
        echo "error creating table". mysqli_error($conn);
      }
  }
  else{
    echo "error registering to database" .mysqli_error($conn);
  }
?>
