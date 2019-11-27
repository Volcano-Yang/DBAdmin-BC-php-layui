
<?php

include('../../../connet.php');
$addtable = $_GET['addtable'];
$addid = $_GET['addid'];
$addvalue = $_GET['addvalue'];
$sql_addtable = "select * from tableName where `tablename` = '" . $addtable . "';";
$query_addtable = mysqli_query($conn, $sql_addtable);
$addtableStr = "";
$addtableArr = array();
$formvalues = array();

if ($query_addtable) {
    while ($row = mysqli_fetch_assoc($query_addtable)) {
        $addtableStr = $row['struct'];
    }
    $addtableArr = explode(',', $addtableStr);

    $length = count($addtableArr);

    if (isset($_POST['submit'])) {

        for ($i = 0; $i < $length; $i++) {
            $formvalues[$i] = $_POST[$addtableArr[$i]];
        }

        // UPDATE table_name SET field1=new-value1, field2=new-value2 [WHERE Clause]

        //循环拼接字符串
        $sql_insert = "UPDATE ";
        $sql_insert .= $addtable;
        $sql_insert .= " SET ";
        for ($j = 0; $j < ($length - 1); $j++) {
            $sql_insert .="`" . $addtableArr[$j] . "`='".$formvalues[$j]."', ";
        }
        $sql_insert .= "`" . $addtableArr[($length - 1)] . "`='".$formvalues[($length - 1)]."' WHERE `".$addid."` ='".$addvalue."';";

        echo $sql_insert;
        echo "<br>";
        
        $query_insert = mysqli_query($conn, $sql_insert);
        if ($query_insert) {
            // echo "success: " . $sql_insert . "<br>" ;
            echo "<script>";    
            echo  "alert('修改成功');";
            echo "window.location.href='./databaseList.php?tablename=".$addtable."';";
            echo "</script>"; 
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($query_insert);
            echo "<a href='./databaseList.php?tablename=".$addtable."'>返回</a>";
        }
    }
} else {
    echo "Error: " . $sql_addtable . "<br>" . mysqli_error($query_addtable);
}

?>

