<?php
$deltable = "deltable";
$deltable = $_GET['deltable'];
$delid = $_GET['delid'];
$delidvalue = $_GET['delidvalue'];

include('../../../connet.php');
$sqlDel="delete from ".$deltable." where `". $delid."` = '".$delidvalue."';";
$query_del=mysqli_query($conn,$sqlDel);

if ($query_del){
    $showtime=date("Y-m-d H:i:s");
    $sql_log = "INSERT INTO logs (`who`,`time`,`table_name`,`operation`,`key_value`) VALUES('root','".$showtime."','".$deltable."','del','".$delidvalue."');";
    mysqli_query($conn, $sql_log);
            
    echo "<script>";    
    // echo  "alert('删除成功');";
    echo "window.location.href='./databaseList.php?tablename=".$deltable."';";
    echo "</script>"; 
}
else{
    echo "Error: " . $sqlDel . "<br>" . mysqli_error($query_del);
    echo "<a href='./databaseList.php?tablename=".$deltable."'>返回</a>";
}
