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
                <!--运动名称,运动悬赏价值,运动简介,操作:查看详情-->
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>信息录入框</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="sportInfo-edit-operate.php" method="post" class="form-horizontal">
                            <?php
                            $sId = $_GET['sId'];

                            include_once 'mysqlConfigure.php';
                            $sql1 = "select * from sports where sId='$sId'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (!$result1) {
                                echo "查询数据库出错";
                                echo mysqli_error($conn);
                            } else {
                                $row1 = mysqli_fetch_array($result1);
                                echo "
                                    <div class='control-group'>
                                        <label class='control-label'>运动名称 </label>
                                        <div class='controls'>
                                            <input type='text' class='span11' name='sname' placeholder='".$row1['sName']."'/>
                                        </div>
                                    </div>
                                    <div class='control-group'>
                                        <label class='control-label'>运动悬赏价值 </label>
                                        <div class='controls'>
                                            <input type='text'  class='span11' name='svalue' placeholder='".$row1['sValue']."'/>
                                        </div>
                                    </div>
                                    <div class='control-group'>
                                        <label class='control-label'>运动简介 </label>
                                        <div class='controls'>
                                            <input type='text' class='span11' name='sdesc'  placeholder='".$row1['sDesc']."'/>
                                        </div>
                                    </div>
                                    <div class='control-group'>
                                        <label class='control-label'>运动详情</label>
                                        <div class='controls'>
                                            <textarea class='span11' name='sdetail'  placeholder='".$row1['sDetail']."'></textarea>
                                        </div>
                                    </div>
                                    <div class='control-group'>
                                        <label class='control-label'>现存图片</label>
                                        <div class='controls span4'>
                                            <image src='".$row1['sPath']."'/>
                                        </div>
                                    </div>
                                    <div class='control-group'>
                                        <label class='control-label'>更改图片</label>
                                        <div class='controls'>
                                            <input type='file' name='picture'/>
                                        </div>
                                    </div>
                                      <input type='text'  name='sId' value='$sId' class='hidden'/>
                                    <div class='form-actions'>
                                        <button type='submit' class='btn btn-success'>提交</button>
                                    </div>
                                ";
                            }
                            ?>
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
