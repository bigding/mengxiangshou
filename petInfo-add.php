<!DOCTYPE html>
<html lang="en">
<head>
    <title>宠物信息管理</title>
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
            宠物信息</a></div>
        <h1>宠物信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div class="btn-group">
                            <button class="btn">添加宠物信息</button>
                            <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="petInfo-view.php">查看宠物信息</a></li>
                                <li><a href="#">添加宠物信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--宠物名称,宠物类别,宠物价值,宠物简介.操作:宠物详情,查看图片-->
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>信息录入框</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="get" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">名称 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="名称:##"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">宠物类别</label>
                                <div class="controls">
                                    <select >
                                        <option>类别一</option>
                                        <option>类别二</option>
                                        <option>类别三</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">宠物价值 :</label>
                                <div class="controls">
                                    <input type="password"  class="span11" placeholder="电宠物:###"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">宠物简介 :</label>
                                <div class="controls">
                                    <input type="text" class="span11"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">宠物详情</label>
                                <div class="controls">
                                    <textarea class="span11"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">描述图片</label>
                                <div class="controls">
                                    <input type="file" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">提交</button>
                            </div>
                        </form>
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
