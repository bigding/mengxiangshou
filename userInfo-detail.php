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
            <!--查看具体的宠物和拥有的服装类型,签名还有具体运动完成情况,历史体重,日常记录-->
            <!--姓名,密码,电话号码,邮件地址,身高,体重,性别,生日,拥有宠物,金币数量-->
            <!--宠物名称,宠物类别,宠物价值,宠物简介.操作:宠物详情,查看图片-->
            <div class="span12">
                <div class="span9">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
                            <h5>基本信息</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>项目</th>
                                    <th>属性</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>姓名</td>
                                    <td>12444</td>
                                </tr>
                                <tr>
                                    <td>密码</td>
                                    <td>10455</td>
                                </tr>
                                <tr>
                                    <td>电话号码</td>
                                    <td>8455</td>
                                </tr>
                                <tr>
                                    <td>邮件地址</td>
                                    <td>4456</td>
                                </tr>
                                <tr>
                                    <td>身高</td>
                                    <td>2210</td>
                                </tr>
                                <tr>
                                    <td>体重</td>
                                    <td>2210</td>
                                </tr>
                                <tr>
                                    <td>性别</td>
                                    <td>2210</td>
                                </tr>
                                <tr>
                                    <td>生日</td>
                                    <td>2210</td>
                                </tr>
                                <tr>
                                    <td>拥有宠物</td>
                                    <td>2210</td>
                                </tr>
                                <tr>
                                    <td>金币数量</td>
                                    <td>2210</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                            <h5>签名</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <ul class="recent-posts">
                                <li>
                                    <div class="article-post">
                                        <span class="user-info">  </span>
                                        <p>珊妹你好珊妹你好珊妹你好珊妹你好珊妹你好珊妹你好珊妹你好珊妹你好珊妹你好珊妹你好珊妹你好</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>历史体重</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>日期</th>
                                <th>体重</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeA">
                                <td>****</td>
                                <td>****</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>历史运动</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                 <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>运动项目</th>
                                    <th>悬赏金额</th>
                                    <th>完成情况</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeA">
                                    <td>**</td>
                                    <td>**</td>
                                    <td>***</td>
                                    <td>*****</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>宠物信息</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                 <thead>
                                <tr>
                                    <th>宠物名称</th>
                                    <th>宠物类别</th>
                                    <th>宠物价值</th>
                                    <th>宠物简介</th>
                                    <th>宠物图片</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeA">
                                    <td>**</td>
                                    <td>**</td>
                                    <td>***</td>
                                    <td>*****</td>
                                    <td>*****</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>宠物服装信息</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                 <thead>
                                <tr>
                                    <th>服装名称</th>
                                    <th>服装类别</th>
                                    <th>服装价值</th>
                                    <th>服装简介</th>
                                    <th>服装图片</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeA">
                                    <td>**</td>
                                    <td>**</td>
                                    <td>***</td>
                                    <td>*****</td>
                                    <td>*****</td>
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
