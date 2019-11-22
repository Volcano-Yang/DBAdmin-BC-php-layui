<?php
$deltable = "deltable";
$deltable = $_GET['deltable'];
$delid = "delid";
$delid = $_GET['delid'];
$delidvalue = "delidvalue";
$delidvalue = $_GET['delidvalue'];

include('../../../connet.php');
$sqlDel="delete from ".$deltable." where `". $delid."` = '".$delidvalue."';";
$query_del=mysqli_query($conn,$sqlDel);

if ($query_del){
    echo "<script>";    
    echo  "alert('删除成功');";
    echo "window.location.href='./databaseList.php?tablename=".$deltable."';";
    echo "</script>"; 
}
else{
    echo "<script>";    
    echo  "alert('删除失败');";
    echo "window.location.href='./databaseList.php?tablename=".$deltable."';";
    echo "</script>"; 
}

?>

   