<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>updata</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../../node_modules/layui-src/dist/css/layui.css" media="all">
    <link rel="stylesheet" href="../../css/theme1.css">
    <link rel="stylesheet" href="../../css/navagator.css">
    <?php
    include('../../../connet.php');
    $addtable = $_GET['addtable'];
    $addid = $_GET['addid'];
    $addvalue = $_GET['addvalue'];
    ?>
</head>

<body class="layui-layout-body">


    <div style="background-color: #ffffff; padding: 20px; width: 60%; margin: 0 auto;">
        <!-- 内容主体区域 -->

        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>为<?php echo $addtable ?>添加数据</legend>
        </fieldset>

        <form class="layui-form" action="./updata.php?addtable=<?php echo $addtable ?>&&addid=<?php echo $addid ?>&&addvalue=<?php echo $addvalue ?>" method="post" name="myform">

            <!-- 用php根据每个表的结构，动态加载表单填写的内容项 -->
            <?php
            $sql_addtable = "select * from tableName where `tablename` = '" . $addtable . "';";
            $query_addtable = mysqli_query($conn, $sql_addtable);
            $addtableStr = "";
            $addtableArr = array();
            $updata = array();
            $from = "";


            if ($query_addtable) {
                // 找出表头
                while ($row = mysqli_fetch_assoc($query_addtable)) {
                    $addtableStr = $row['struct'];
                }
                $addtableArr = explode(',', $addtableStr);

                // 找出要修改的那行全部的值
                $sql_updata = "select * from " . $addtable . " where `" . $addid . "` = '" . $addvalue . "';";
                $query_updata = mysqli_query($conn, $sql_updata);
                if ($query_updata) {

                    $row = mysqli_fetch_assoc($query_updata);
                    for ($j = 0; $j < count($addtableArr); $j++) {
                        $updata[$j] = $row[$addtableArr[$j]];
                        // echo $sql_updata;
                        // echo "<br>";
                        // print_r($updata);
                        // echo "<br>";
                    }

                } else {
                    echo "Error: " . $sql_updata . "<br>" . mysqli_error($query_updata);
                }



                // 动态渲染表单，把原来的值放在value
                for ($i = 0; $i < count($addtableArr); $i++) {
                    $from .= "<div class='layui-form-item'><label class='layui-form-label'>" . $addtableArr[$i] .
                        ":</label><div class='layui-input-block'> <input input type='text' name='" . $addtableArr[$i] . "' lay-verify='" . $addtableArr[$i] . "' class='layui-input' value='".$updata[$i]."'> </div> </div>";
                }
                echo $from;
            } else {
                echo "Error: " . $sql_addtable . "<br>" . mysqli_error($query_addtable);
            }


            ?>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <br>
                    <input class="layui-btn" type="button" name="quit" id="quit" value="取消" />

                    <input class="layui-btn" type="submit" name="submit" value="提交" />

                </div>
            </div>

        </form>


    </div>


    <script src="../../../node_modules/layui-src/dist/layui.js"></script>
    <script src="../../../node_modules/jquery/dist/jquery.min.js"></script>

    <script>
        layui.use('element', function() {
            var element = layui.element;

        });


        let quit = document.getElementById('quit');
        quit.onclick = () => {
            window.history.go(-1);
        }
    </script>
</body>

</html>