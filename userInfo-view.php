<!DOCTYPE html>
<html lang="en">
<head>
    <title>用户信息管理</title>
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
            用户信息</a></div>
        <h1>用户信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>用户信息</h5>
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
                                <th>拥有金币数量</th>
                                <th>拥有宠物数量</th>
                                <th>相关操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            require_once ("mysqlConfigure.php");
                            /*第一层查询基本信息*/
                            $result1 = mysqli_query($conn,"SELECT * FROM mengxiangshou.user");
                            while($row1 = mysqli_fetch_array($result1)){
                                echo '
                                <tr class="gradeA">
                                    <td>'.$row1['name'].'</td>
                                    <td>'.$row1['password'].'</td>
                                    <td>'.$row1['tell'].'</td>
                                    <td>'.$row1['mail'].'</td>
                                    <td>'.$row1['height'].'</td>
                                    <td>'.$row1['weight'].'</td>
                                    <td>'.$row1['sex'].'</td>
                                    <td>'.$row1['birthday'].'</td>
                                    <td>'.$row1['money'].'</td>';
                                    /*第二层,查询用户宠物数量,后面做*/
                                    echo '
                                    <td>2//后面完善</td>
                                    <td>
                                        <a href="userInfo-detail.php?userId='.$row1['userId'].'" class="btn btn-success btn-mini" data-original-title="查看详情">查看</a>
                                        <a href="userInfo-edit.php?userId='.$row1['userId'].'" class="btn btn-success btn-mini" data-original-title="编辑信息">编辑</a>
                                        <a href="javascript:void(0);" class="btn btn-success btn-mini infoDelete"  data-id="'.$row1['userId'].'" data-type="userId" data-sql="user"  data-original-title="删除信息">删除</a><!--删除做成ajax请求-->
                                    </td>
                                </tr>
                                ';
                            }
                            echo mysqli_error($conn);
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
