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
                <!--服装名称,服装价值,服装简介,所属宠物,操作:查看详情,查看图片-->
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>信息录入框</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="clothInfo-edit-operate.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <?php
                            $cId=$_GET['cId'];
                            $cType = ['类别一', '类别二', '类别三'];

                            include_once 'mysqlConfigure.php';
                            $sql1 = "select * from clothing where cId = '$cId'";
                            $result1 = mysqli_query($conn,$sql1);
                            if(!$result1){
                                echo '数据库查询出错';
                            }
                            else{
                                $row1 = mysqli_fetch_array($result1);

                                echo "
                                <div class='control-group'>
                                    <label class='control-label'>名称 :</label>
                                    <div class='controls'>
                                        <input type='text' class='span11' name='cname' placeholder='".$row1['cName']."'/>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>服装价值 :</label>
                                    <div class='controls'>
                                        <input type='text'  class='span11' name='cvalue' placeholder='".$row1['cValue']."'/>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>所属宠物</label>
                                    <div class='controls'>
                                        <select  name='belong'>";

                                for($i = 0;$i < count($cType);$i++){
                                    if($i == $row1['pType']){
                                        echo "<option selected>".$cType[$i]."</option>";
                                    }
                                    else{
                                        echo "<option >".$cType[$i]."</option>";
                                    }
                                }

                                echo "
                                        </select>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>服装简介 :</label>
                                    <div class='controls'>
                                        <input type='text' class='span11' name='cdesc' placeholder='".$row1['cDesc']."'/>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>服装详情</label>
                                    <div class='controls'>
                                        <textarea class='span11' name='cdetail' placeholder='".$row1['cDetail']."'></textarea>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>现存图片</label>
                                    <div class='controls span4'>
                                        <image src='" . $row1['cPath'] . "'/>
                                    </div>
                                </div>
                                <div class='control-group'>
                                    <label class='control-label'>更改图片</label>
                                    <div class='controls'>
                                        <input type='file' name='picture'/>
                                    </div>
                                </div>
                                  <input type='text'  name='cId' value='$cId' class='hidden'/>
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
