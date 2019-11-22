<?php


$sql_tableBody = "select * from " . $tablename . ";";
$query_tableBody = mysqli_query($conn, $sql_tableBody);
$tableBody = "";

if ($query_tableBody) {

    $tableHeaderArr2 = explode(',', $tableHeaderStr);

    while ($row2 = mysqli_fetch_assoc($query_tableBody)) {
        $tableBody .= '<tr>';
        for ($j = 0; $j < count($tableHeaderArr2); $j++) {
            $tableBody .= "<td style='text-align:center;vertical-align: middle!important;'>" . $row2[$tableHeaderArr2[$j]] . "</td>";
        }
        $tableBody .= "<td style='text-align:center;vertical-align: middle!important;'> <a href='../pages/del.php?deltable=" . $tablename . "&delid=" . $tableHeaderArr2[0] . "&delidvalue=" . $row2[$tableHeaderArr2[0]] . "'><img src='../../../img/delete.png' style='width:1.0rem;'></a> </td>";
        $tableBody .= "<td style='text-align:center;vertical-align: middle!important;'> <a href='../pages/updata.php?deltable=" . $tablename . "&delid=" . $tableHeaderArr2[0] . "&delidvalue=" . $row2[$tableHeaderArr2[0]] . "'><img src='../../../img/updata.png' style='width:1.0rem;'></a> </td>";
        $tableBody .= '</tr>';
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
echo $tableBody;
