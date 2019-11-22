<?php
$tablename = "customers";
$tablename = $_GET['tablename'];
echo '<span class="layui-body-header">';
echo '<span style="border-left: 4px solid #00a4ff; padding-left: 6px; font-size:16px;">' . strtoupper($tablename) .     ' 表最新数据 </span>';
echo '</span>';
?>