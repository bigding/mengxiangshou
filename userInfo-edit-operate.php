<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>用户信息管理</title>
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
                用户信息</a></div>
        <h1>用户信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <?php
                $name = trim($_POST['name']);
                /*password为变量名是,会存在问题,目测是php的保留字*/
                $passwd = trim($_POST['password']);
                $tell = trim($_POST['tell']);
                $mail = trim($_POST['mail']);
                $height = trim($_POST['height']);
                $weight = trim($_POST['weight']);
                $sex = trim($_POST['sex']);
                $birthday = trim($_POST['birthday']);
                $money = trim($_POST['money']);
                $userId = trim($_POST['userId']);


                /*对用户输入信息的验证部分*/
                $notice = "";
                if ($tell != "" && !preg_match('/^1[34578]\d{9}$/', $tell)) {
                    $notice = $notice . "请输入正确格式的电话号码<br/>";
                }
                if ($mail != "" && !preg_match('/^[a-z_0-9.-]{1,64}@([a-z0-9-]{1,200}.){1,5}[a-z]{1,6}$/', $mail)) {
                    $notice = $notice . "请输入正确格式的邮件地址<br/>";
                }
                if ($birthday != "" && !preg_match('/^((((19|20)\d{2})-(0?(1|[3-9])|1[012])-(0?[1-9]|[12]\d|30))|(((19|20)\d{2})-(0?[13578]|1[02])-31)|(((19|20)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|((((19|20)([13579][26]|[2468][048]|0[48]))|(2000))-0?2-29))$/', $birthday)) {
                    $notice = $notice . "请输入正确格式的生日日期<br/>";
                }
                if ($height != "") {
                    if (!preg_match('/^[0-9]*$/', $height)) {
                        $notice = $notice . "请输入数字格式(单位cm)的身高<br/>";
                    } else {
                        if (($height > 220 || $height < 40)) {
                            $notice = $notice . "请输入正常的身高值<br/>";
                        }
                    }
                }
                if ($width != "") {
                    if (!preg_match('/^[0-9]*$/',$width)) {
                        $notice = $notice . "请输入数字格式(单位kg)的体重<br/>";
                    } else {
                        if (($width > 300 || $width < 40)) {
                            $notice = $notice . "请输入正常的体重值<br/>";
                        }
                    }
                }
                if ($money != "" && !preg_match('/^[0-9]*$/',$money)) {
                    $notice = $notice . "请输入数字格式的金币值<br/>";
                }

                if ($notice != "") {
                    echo $notice;
                } else {
                    /*根据数据库和用户输入的信息构建sql语句*/
                    include "mysqlConfigure.php";
                    $sql1 = "select * from user where userId='$userId'";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_array($result1);

                    if ($name == "" && $passwd == "" && $tell == "" && $mail == "" && $height == ""
                        && $weight == "" && $sex == $row1['sex'] && $birthday == "" && $money == ""
                    ) {
                        echo "请至少更新一项信息";
                    } else {
                        $sql2 = "";
                        if ($name != "" && $name != $row1['name']) {
                            $sql2 = "update user set name='$name'";
                        }
                        if ($passwd != "" && $passwd != $row1['password']) {
                            if ($sql2 == "") {
                                $sql2 = "update user set password='$passwd'";
                            } else
                                $sql2 = $sql2 . ",password='$passwd'";
                        }
                        if ($tell != "" && $tell != $row1['tell']) {
                            if ($sql2 == "")
                                $sql2 = "update user set tell='$tell'";
                            else
                                $sql2 = $sql2 . ",tell='$tell'";
                        }
                        if ($mail != "" && $mail != $row1['mail']) {
                            if ($sql2 == "")
                                $sql2 = "update user set mail='$mail'";
                            else
                                $sql2 = $sql2 . ",mail='$mail'";
                        }
                        if ($height != "" && $height != $row1['height']) {
                            if ($sql2 == "")
                                $sql2 = "update user set height='$height'";
                            else
                                $sql2 = $sql2 . ",height='$height'";
                        }
                        if ($weight != "" && $weight != $row1['weight']) {
                            if ($sql2 == "")
                                $sql2 = "update user set weight='$weight'";
                            else
                                $sql2 = $sql2 . ",weight='$weight'";
                        }
                        if ($sex != $row1['sex']) {
                            if ($sql2 == "")
                                $sql2 = "update user set sex='$sex'";
                            else
                                $sql2 = $sql2 . ",sex='$sex'";
                        }
                        if ($birthday != "" && $birthday != $row1['birthday']) {
                            if ($sql2 == "")
                                $sql2 = "update user set birthday='$birthday'";
                            else
                                $sql2 = $sql2 . ",birthday='$birthday'";
                        }
                        if ($money != "" && $money != $row1['money']) {
                            if ($sql2 == "")
                                $sql2 = "update user set money='$money'";
                            else
                                $sql2 = $sql2 . ",money='$money'";
                        }
                        if ($sql2 != "") {
                            $sql2 = $sql2 . " where userId='$userId'";
                            $result2 = mysqli_query($conn, $sql2);
                            if ($result2) {
                                echo "修改成功<br/>";
                            } else {
                                echo "修改失败<br/>";
                            }
                        } else {
                            echo "请至少更新一项信息";
                        }
                    }
                }
                ?>
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
