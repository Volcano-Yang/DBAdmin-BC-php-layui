<?php
        $sql_tables = "select * from tableName;";
        $query_tables = mysqli_query($conn, $sql_tables);
        $page_banner = "";

        if ($query_tables)
        {
            while ($row = mysqli_fetch_assoc($query_tables)) {
                $page_banner .= "<dd><a href='" . $_SERVER['PHP_SELF'] . " ?tablename=" . $row['tableName'] . " '>" . $row['tableName'] . "</a></dd>";
                }
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        echo $page_banner;
   ?>