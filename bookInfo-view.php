<!DOCTYPE html>
<html lang="en">
<head>
    <title>读物信息管理</title>
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
        <div id="breadcrumb"><a href="userInfo-view.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                读物信息</a></div>
        <h1>读物信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div class="btn-group">
                            <button class="btn">查看读物信息</button>
                            <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">查看读物信息</a></li>
                                <li><a href="bookInfo-add.php">添加读物信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>读物信息</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!--读物名称,读物描述,读物悬赏金额,读物简介,操作:查看详情,查看图片-->
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>读物名称</th>
                                <th>读物悬赏金额</th>
                                <th>读物描述</th>
                                <th>读物详情</th>
                                <th>图片</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeA">
                                <td>**</td>
                                <td>**</td>
                                <td>**</td>
                                <td>***</td>
                                <td>***</td>
                                <td>
                                    <a href="clothInfo-edit.php" class="btn btn-success btn-mini" data-original-title="编辑信息">编辑</a>
                                    <a href="#" class="btn btn-success btn-mini"  data-original-title="删除信息">删除</a><!--删除做成ajax请求-->
                                </td>
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
