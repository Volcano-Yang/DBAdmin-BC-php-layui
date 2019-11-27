
<?php
include("../../conn.php");
?>

<?php

if (isset($_POST['submit'])) {
    $platform = $_POST['platform'];
    $title = $_POST['title'];
    $url = $_POST['url'];
    $sendtime = $_POST['sendtime'];
    $sql = "INSERT INTO article_detail (platform,title,url,sendtime,type) VALUES('$platform','$title','$url','$sendtime','文章')";

    if (mysqli_query($conn, $sql)) {
        //页面跳转，实现方式为javascript
        $url = "../../components/add_article.html";
        echo "<script>";
        echo  "alert('添加成功');";
        echo "window.location.href='$url';";
        echo "</script>";
    } else {
        echo "<script>";
        echo  "alert('添加失败');";
        echo "</script>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
?>