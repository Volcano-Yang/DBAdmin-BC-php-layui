<?php

$tablename = "customers";
$tablename = $_GET['tablename'];
echo '<span class="layui-body-header">';
echo '<span style="border-left: 4px solid #00a4ff; padding-left: 6px; font-size:16px;">' . strtoupper($tablename) .     ' 表最新数据 </span>';
echo '</span>';
?>


<table align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef" class="layui-table" lay-skin="line" lay-even>
    <thead>
        <tr>
            <!-- 动态渲染表头 -->
            <?php include('tableHeader.php') ?>
        </tr>
    </thead>
    <tbody>
        <!-- 动态渲染表格内容 -->
        <?php include('tableBody.php') ?>
    </tbody>
</table>

<?php include('addbutton.php') ?>