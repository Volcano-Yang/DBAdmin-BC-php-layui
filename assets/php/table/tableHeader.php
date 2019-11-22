<?php

$sql_tableHeader = "select * from tableName where `tablename` = '" . $tablename ."';";
$query_tableHeader = mysqli_query($conn, $sql_tableHeader);
$tableHeaderStr = "";
$tableHeaderArr = array();
$Header = "";
        

if ($query_tableHeader)
{
    while ($row = mysqli_fetch_assoc($query_tableHeader)) {
        $tableHeaderStr =$row['struct'];
    }
    $tableHeaderArr=explode(',',$tableHeaderStr);

    for($i=0;$i<count($tableHeaderArr); $i++)
    {
        $Header .="<th style='text-align: center;vertical-align: middle!important;'>" . $tableHeaderArr[$i] ."</th>";
    }
    $Header .="<th style='text-align: center;vertical-align: middle!important;'>delete</th>";
    $Header .="<th style='text-align: center;vertical-align: middle!important;'>updata</th>";
    echo $Header;
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
