<?php
      $servername = "数据库访问地址";
      $username = "数据库用户名";
      $password = "数据库用户密码";
      $dbname = "使用数据库名";
      $port = 端口号;
    
      $conn = new mysqli($servername, $username, $password, $dbname, $port);
    
      mysqli_set_charset($conn, "utf8");
    
      if ($conn->connect_error) {
          die("连接失败: " . $conn->connect_error);
      }
?>