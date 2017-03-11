<!DOCTYPE html>
<html lang="en">
<head>
    <title>宠物信息管理</title>
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
                宠物信息</a></div>
        <h1>宠物信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>信息录入框</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="petInfo-edit-operate.php" method="post" class="form-horizontal"
                              enctype="multipart/form-data">
                            <?php
                            $pId = $_GET['pId'];
                            $pType = ['类别一', '类别二', '类别三'];

                            include_once 'mysqlConfigure.php';
                            $sql1 = "select * from pet where pId = '$pId'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (!$result1) {
                                echo "查询数据库出错";
                            } else {
                                $row1 = mysqli_fetch_array($result1);

                                echo "
                                <div class='control-group'>
                                    <label class='control-label'>宠物名称 :</label>
                                    <div class='controls'>
                                        <input type='text' class='span11' name='pname' placeholder='" . $row1['pName'] . "'/>
                                    </div>
                                </div>
                               
                                <div class='control-group'>
                                    <label class='control-label'>宠物价值 :</label>
                                    <div class='controls'>
                                        <input type='text'  class='span11' name='pvalue' placeholder='" . $row1['pValue'] . "'/>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>宠物简介 :</label>
                                    <div class='controls'>
                                        <input type='text' class='span11' name='pdesc' placeholder='" . $row1['pDesc'] . "'/>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>宠物详情</label>
                                    <div class='controls'>
                                        <textarea class='span11' name='pdetail' placeholder='" . $row1['pDetail'] . "'></textarea>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>现存图片</label>
                                    <div class='controls span4'>
                                        <image src='" . $row1['pPath'] . "'/>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>更改图片</label>
                                    <div class='controls'>
                                        <input type='file' name='picture'/>
                                    </div>
                                </div>
                                  <input type='text'  name='sId' value='$pId' class='hidden'/>
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
