<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>服装信息管理</title>
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
require_once 'isLogin.php';
include "header.php";
?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="userInfo-view.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                服装信息</a></div>
        <h1>服装信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div class="btn-group">
                            <button class="btn">添加服装信息</button>
                            <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="clothInfo-View.php">查看服装信息</a></li>
                                <li><a href="#">添加服装信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--服装名称,服装价值,服装简介,所属宠物,操作:查看详情,查看图片-->
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>信息录入框</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="clothInfo-add-operate.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">服装名称 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="cname" placeholder="名称:##"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">服装价值 :</label>
                                <div class="controls">
                                    <input type="text"  class="span11" name="cvalue" placeholder="服装价值:###"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">所属宠物</label>
                                <div class="controls">
                                    <select name="belong">
                                        <?php
                                        include_once "mysqlConfigure.php";
                                        $sql1 = "select pId,pName from pet";
                                        $result1 = mysqli_query($conn,$sql1);
                                        while($row1 = mysqli_fetch_array($result1)){
                                            echo '<option value="'.$row1[pId].'">'.$row1[pName].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">服装简介 :</label>
                                <div class="controls">
                                    <input type="text" name="cdesc" class="span11"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">服装详情</label>
                                <div class="controls">
                                    <textarea class="span11" name="cdetail"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">描述图片</label>
                                <div class="controls">
                                    <input type="file" name="picture"/>
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
