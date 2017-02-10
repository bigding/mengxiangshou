<!DOCTYPE html>
<html lang="en">
<head>
    <title>管理系统概括</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link rel="stylesheet" href="css/common.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
    include "header.php";
?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            用户信息</a></div>
        <h1>用户信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Data table</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <!--姓名,密码,电话号码,邮件地址,身高,体重,性别,生日,拥有宠物,金币数量,操作:查看具体的宠物和拥有的服装类型,签名还有具体运动完成情况,历史体重,日常记录-->
                            <thead>
                            <tr>
                                <th>姓名</th>
                                <th>密码</th>
                                <th>电话号码</th>
                                <th>邮件地址</th>
                                <th>身高</th>
                                <th>体重</th>
                                <th>性别</th>
                                <th>生日</th>
                                <th>拥有宠物数量</th>
                                <th>拥有金币数量</th>
                                <th>相关操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeA">
                                <td>**</td>
                                <td>**</td>
                                <td>***</td>
                                <td>*****</td>
                                <td>***</td>
                                <td>**</td>
                                <td>**</td>
                                <td>***</td>
                                <td>***</td>
                                <td>******</td>
                                <td>******</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include "footer.php";
?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>
</body>
</html>
