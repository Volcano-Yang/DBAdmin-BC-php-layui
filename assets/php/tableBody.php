<?php


    $sql_tableBody = "select * from " . $tablename . ";";
    $query_tableBody = mysqli_query($conn, $sql_tableBody);
    $tableBody = "";

    if ($query_tableBody) {
    
        $tableHeaderArr2 = explode(',',$tableHeaderStr);

        while ($row2 = mysqli_fetch_assoc($query_tableBody)) {
            $tableBody .='<tr bgcolor="#eff3ff">';
            for($j=0 ; $j<count($tableHeaderArr2) ; $j++)
            {
                $tableBody .="<td>" . $row2[$tableHeaderArr2[$j]] . "</td>";
            }
            $tableBody .='</tr>';
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo $tableBody;
?>
