

<?php
$userName = $_POST['userName'];
$passWord = $_POST['password'];

include("../../../connet.php");

// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$loginSQL = "select * from user where userName='$userName' and password='$passWord'";
// echo $loginSQL;
$resultLogin = mysqli_query($conn, $loginSQL);
if (!$resultLogin) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

if (mysqli_num_rows($resultLogin) > 0) {

    $url = "./databaseList.php?tablename=customers";
    echo "<script>";
    // echo  "alert('登录成功');";
    echo "window.location.href='$url';";
    echo "</script>";
} else {
    $url = "../../../index.html";
    echo "<script>";
    echo  "alert('登录失败');";
    echo "window.location.href='$url';";
    echo "</script>";
}

mysqli_close($conn);
