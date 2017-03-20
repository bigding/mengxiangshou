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
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>信息录入框</h5>
                    </div>
                    <!--姓名,密码,电话号码,邮件地址,身高,体重,性别,生日,拥有宠物,金币数量,操作:查看具体的宠物和拥有的服装类型,签名还有具体运动完成情况,历史体重,日常记录-->
                    <div class="widget-content nopadding">
                        <form action="userInfo-edit-operate.php" method="post" class="form-horizontal">
                        <?php
                        $userId = trim($_GET['userId']);

                        include 'mysqlConfigure.php';
                        $sql1 = "select * from user where userId='$userId'";
                        $result1 = mysqli_query($conn,$sql1);
                        if(!$result1){
                            echo "查询数据库出错";
                            echo mysqli_error($conn);
                        }
                        else{
                            $row1 = mysqli_fetch_array($result1);
                            echo "
                             <div class='control-group'>
                                <label class='control-label'>姓名 :</label>
                                <div class='controls'>
                                    <input type='text' class='span11' name='name' placeholder='".$row1['name']."'/>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>密码 :</label>
                                <div class='controls'>
                                    <input type='text' class='span11' name='password' placeholder='".$row1['password']."'/>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>电话号码 :</label>
                                <div class='controls'>
                                    <input type='text'  class='span11' name='tell' placeholder='".$row1['tell']."'/>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>邮件地址 :</label>
                                <div class='controls'>
                                    <input type='text' class='span11' name='mail' placeholder='".$row1['mail']."'/>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>身高 :</label>
                                <div class='controls'>
                                    <input type='text' class='span11' name='height' placeholder='".$row1['height']."cm'/>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>体重 :</label>
                                <div class='controls'>
                                    <input type='text' class='span11' name='weight' placeholder='".$row1['weight']."kg'/>
                                </div>
                            </div>                           <!--0为女生 1为男生*/-->
                            <div class='control-group'>
                                <label class='control-label'>性别 :</label>
                                <div class='controls'>
                                    <select name='sex' >
                            ";

                            if($row1[sex] == 0){
                                echo "  
                                        <option value='0' selected='selected'>女</option>
                                        <option value='1'>男</option>
                            ";
                            }
                            else{
                                echo "  
                                        <option value='0'>女</option>
                                        <option value='1'selected='selected'>男</option>
                            ";
                            }

                            echo "  
                                    </select>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>生日 :</label>
                                <div class='controls'>
                                    <input type='text' class='span11' name='birthday' placeholder='".$row1['birthday']."'/>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>金币数量 :</label>
                                <div class='controls'>
                                    <input type='text' class='span11' name='money' placeholder='".$row1['money']."'/>
                                </div>
                            </div>
                              <input type='text'  name='userId' value='$userId' class='hidden'/>
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
