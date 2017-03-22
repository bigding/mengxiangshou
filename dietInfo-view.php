<!DOCTYPE html>
<html lang="en">
<head>
    <title>饮食信息管理</title>
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
include "header.php";
?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="userInfo-view.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                饮食信息</a></div>
        <h1>饮食信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div class="btn-group">
                            <button class="btn">查看饮食信息</button>
                            <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">查看饮食信息</a></li>
                                <li><a href="dietInfo-add.php">添加饮食信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>饮食信息</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <!--饮食名称,饮食悬赏金额,饮食简介,操作:查看详情,查看图片-->
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>饮食悬赏金额</th>
                                <th>适用BMI区间</th>
                                <th>饮食简介</th>
                                <th>饮食详情</th>
                                <th>图片</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once("mysqlConfigure.php");
                            $result1 = mysqli_query($conn, "select * from diet");
                            while ($row1 = mysqli_fetch_array($result1)) {
                                echo '
                                <tr class="gradeA">
                                    <td>' . $row1['dName'] . '</td>
                                    <td>' . $row1['dValue'] . '</td>
                                    <td>' . $row1['minBMI'] . '-'. $row1['maxBMI'] .'</td>
                                    <td>' . $row1['dDesc'] . '</td>
                                    <td>' . $row1['dDetail'] . '</td>
                                    <td class="span2"><image src = ' . $row1[dPath] . '></td>
                                    <td>
                                        <a href="dietInfo-edit.php?dId=' . $row1['dId'] . '" class="btn btn-success btn-mini"  data-original-title="编辑信息">编辑</a>
                                        <a href="javascript:void(0);" class="btn btn-success btn-mini infoDelete"   data-id="'.$row1['dId'].'" data-type="dId" data-sql="diet"  data-original-title="删除信息">删除</a><!--删除做成ajax请求-->
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
