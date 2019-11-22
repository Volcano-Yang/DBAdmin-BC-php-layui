<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>databaseAdmin</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../../node_modules/layui-src/dist/css/layui.css" media="all">
    <link rel="stylesheet" href="../../css/theme1.css">
    <link rel="stylesheet" href="../../css/navagator.css">
    <?php
    include("../../../connet.php");
    ?>
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">

            <div class="logo" style="color:rgb(222, 226, 230);font-size: 1.2em;">
                <img src="../../../img/database1.png" class="logo_image">
                DataBaseAdmin
            </div>

            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item"><a href="<?php echo $_SERVER['PHP_SELF']  ?>?tablename=logs">查看日志</a></li>
                <li class="layui-nav-item"><a href="../../html/countDay.html">查看倒计时</a></li>
            </ul>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="../../../img/database2.png" class="layui-nav-img">
                        想要拿A的杨火山
                    </a>
                </li>
            </ul>
        </div>


        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">数据库表</a>
                        <dl class="layui-nav-child">

                            <!-- 动态渲染nav -->
                            <?php
                            include("./navagator.php");
                            ?>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

        <span class="layui-body" style="background-color: #ffffff; padding: 20px; ">
            <!-- 内容主体区域 -->
            <!-- 动态渲染表格 -->
            <?php
               include("../table/tables.php")
            ?>
           
        </span>



    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © 数据库实验三.杨志发
    </div>



    <script src="../../../node_modules/layui-src/dist/layui.js"></script>
    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>

    <script>
        //JavaScript代码区域
        layui.use('element', function() {
            var element = layui.element;

        });
    </script>


    </div>
</body>

</html>