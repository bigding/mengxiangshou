<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>运动信息管理</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/uniform.css"/>
    <link rel="stylesheet" href="css/select2.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <link rel="stylesheet" href="css/common.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
require_once 'isLogin.php';
include "header.php";
?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="userInfo-view.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                运动信息</a></div>
        <h1>运动信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div class="btn-group">
                            <button class="btn">查看运动信息</button>
                            <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">查看运动信息</a></li>
                                <li><a href="sportInfo-add.php">添加运动信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>运动信息</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!--运动名称,运动悬赏价值,运动简介,操作:查看详情-->
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>运动悬赏价值</th>
                                <th>适用BMI区间</th>
                                <th>运动简介</th>
                                <th>运动详情</th>
                                <th>运动图片</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once("mysqlConfigure.php");
                            $result1 = mysqli_query($conn, "SELECT * FROM mengxiangshou.sports");
                            while ($row1 = mysqli_fetch_array($result1)) {
                                echo '
                                <tr class="gradeA">
                                <td>' . $row1['sName'] . '</td>
                                <td>' . $row1['sValue'] . '</td>
                                <td>' . $row1['minBMI'] . '-'. $row1['maxBMI'] .'</td>
                                <td>' . $row1['sDesc'] . '</td>
                                <td>' . $row1['sDetail'] . '</td>
                                <td class="span2"><image src = ' . $row1[sPath] . '></td>
                                <td>
                                    <a href="sportInfo-edit.php?sId=' . $row1['sId'] . '" class="btn btn-success btn-mini"  data-original-title="编辑信息">编辑</a>
                                    <a href="javascript:void(0);" class="btn btn-success btn-mini infoDelete"    data-id="'.$row1['sId'].'" data-type="sId" data-sql="sports"    data-original-title="删除信息">删除</a><!--删除做成ajax请求-->
                                </td>
                            </tr>
                                ';
                            }
                            ?>
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
<script src="js/info-view-operate.js"></script>
</body>
</html>
