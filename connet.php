<?php
      $servername = "cdb-6rvglvmw.bj.tencentcdb.com";
      $username = "root";
      $password = "ballballyou88";
      $dbname = "databaseAdmin";
      $port = 10164;
    
      $conn = new mysqli($servername, $username, $password, $dbname, $port);
    
      mysqli_set_charset($conn, "utf8");
    
      if ($conn->connect_error) {
          die("连接失败: " . $conn->connect_error);
      }
?>

