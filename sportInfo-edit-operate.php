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
                <?php
                $sId = trim($_POST['sId']);
                $name = trim($_POST['sname']);
                $value = trim($_POST['svalue']);
                $desc = trim($_POST['sdesc']);
                $detail = trim($_POST['sdetail']);
                $bmiType = trim($_POST['bmiType']);

                $path;
                $bmiArray = array(0, 18.5, 24, 27, 30, 100);
                /*根据数据库和用户输入的信息构建sql语句*/
                include "mysqlConfigure.php";

                /*查询数据库里面对应类型的bmi值*/
                $minBMI = $bmiArray[$bmiType-1];
                $maxBMI = $bmiArray[$bmiType];
                $sql7 = "select count(*) num from sports where minBMI = '$minBMI' and  sId = '$sId'";
                $result7 = mysqli_query($conn,$sql7);
                $row7 = mysqli_fetch_array($result7);

                $notice = "";
                /*是否输入的验证*/
                if ($name == "" && $value == "" && $desc == "" && $detail == "" && $_FILES['picture']['name'] == ""&& $row7['num'] == 1) {
                    $notice = $notice . "请至少更新一项信息<br/>";
                }
                if (!$_FILES["picture"]["error"]) {
                    $image = explode("/", $_FILES["picture"]["type"]);
                    if ($image[0] != 'image') {
                        $notice = $notice . "您未选择图片格式的文件,请重新上传<br/>";
                    }
                }
                if ($value != "" && !preg_match('/^[0-9]*$/',$value)) {
                    $notice = $notice . "请输入数字格式的悬赏值<br/>";
                }


                if ($notice != "") {
                    echo $notice;
                } else {
                    /*生成sql语句*/
                    $sql1 = "select * from sports where sId='$sId'";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_array($result1);
                    $sql2 = "";
                    if ($name != "" && $name != $row1['sName']) {
                        $sql2 = "update sports set sName='$name'";
                    }
                    if ($value != "" && $value != $row1['sValue']) {
                        if ($sql2 == "") {
                            $sql2 = "update sports set sValue='$value'";
                        } else
                            $sql2 = $sql2 . ",sValue='$value'";
                    }
                    if ($desc != "" && $desc != $row1['sDesc']) {
                        if ($sql2 == "")
                            $sql2 = "update sports set sDesc='$desc'";
                        else
                            $sql2 = $sql2 . ",sDesc='$desc'";
                    }
                    if ($detail != "" && $detail != $row1['sDetail']) {
                        if ($sql2 == "")
                            $sql2 = "update sports set sDetail='$detail'";
                        else
                            $sql2 = $sql2 . ",sDetail='$detail'";
                    }
                    if($row7['num'] != 1){
                        if($sql2 == "")
                            $sql2 = "update sports set maxBMI='$maxBMI',minBMI = '$minBMI'";
                        else
                            $sql2 = $sql2 . ",maxBMI='$maxBMI',minBMI = '$minBMI'";
                    }
                    /*关于图片是否改变的判断,已经相关sql语句的生成*/
                    if (!$_FILES['picture']['error']) {
                        $md5num = md5_file($_FILES["picture"]["tmp_name"]);
                        $sql3 = "select count(*) num from images_md5 where image_md5='$md5num'";
                        $result3 = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_array($result3);
                        if ($row3[0] == 0) {
                            $sql4 = "SELECT id+1 num FROM mengxiangshou.images_md5 WHERE id = (SELECT MAX(id) FROM images_md5)";
                            $result4 = mysqli_query($conn, $sql4);
                            if(mysqli_num_rows($result4) == 0){
                                $file_name = '0.' . $image[1];
                            }
                            else{
                                $row4 = mysqli_fetch_array($result4);
                                $file_name = $row4["num"] . '.' . $image[1];
                            }
                            $path = 'images/diet/' . $file_name;
                            move_uploaded_file($_FILES['picture']['tmp_name'], $path);
                            $sql5 = "insert into images_md5(image_md5,image_path)
                              VALUES ('$md5num','$path')";
                            $result5 = mysqli_query($conn, $sql5);
                            if (!$result5) {
                                echo "<br/>出错了,没有正确上传图片<br/>";
                                return;
                            }

                        } else {
                            $sql6 = "select * from images_md5 where image_md5 = '$md5num'";
                            $result6 = mysqli_query($conn, $sql6);
                            $row6 = mysqli_fetch_array($result6);
                            $path = $row6['image_path'];

                        }
                        if($sql2 == ""){
                            $sql2 = "update sports set sPath='$path'";
                        }else{
                            $sql2 = $sql2 . ",sPath = '$path'";
                        }
                    }
                    if ($sql2 != "") {
                        $sql2 = $sql2 . " where sId='$sId'";
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
