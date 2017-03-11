<!DOCTYPE html>
<html lang="en">
<head>
    <title>饮食信息管理</title>
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
                饮食信息</a></div>
        <h1>饮食信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <?php
                $dId = trim($_POST['dId']);
                $name = trim($_POST['dname']);
                $value = trim($_POST['dvalue']);
                $desc = trim($_POST['ddesc']);
                $detail = trim($_POST['ddetail']);
                $path;

                /*根据数据库和用户输入的信息构建sql语句*/
                include "mysqlConfigure.php";
                $notice = "";
                /*是否输入的验证*/
                if ($name == "" && $value == "" && $desc == "" && $detail == "" && $_FILES['picture']['name'] == "") {
                    $notice = $notice . "请至少更新一项信息<br/>";
                }
                if (!$_FILES["picture"]["error"]) {
                    $image = explode("/", $_FILES["picture"]["type"]);
                    if ($image[0] != 'image') {
                        $notice = $notice . "您未选择图片格式的文件,请重新上传<br/>";
                    }
                }


                if ($notice != "") {
                    echo $notice;
                } else {
                    /*生成sql语句*/
                    $sql1 = "select * from diet where dId='$dId'";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_array($result1);
                    $sql2 = "";
                    if ($name != "" && $name != $row1['dName']) {
                        $sql2 = "update diet set dName='$name'";
                    }
                    if ($value != "" && $value != $row1['dValue']) {
                        if ($sql2 == "") {
                            $sql2 = "update diet set dValue='$value'";
                        } else
                            $sql2 = $sql2 . ",dValue='$value'";
                    }
                    if ($desc != "" && $desc != $row1['dDesc']) {
                        if ($sql2 == "")
                            $sql2 = "update diet set dDesc='$desc'";
                        else
                            $sql2 = $sql2 . ",dDesc='$desc'";
                    }
                    if ($detail != "" && $detail != $row1['dDetail']) {
                        if ($sql2 == "")
                            $sql2 = "update diet set dDetail='$detail'";
                        else
                            $sql2 = $sql2 . ",dDetail='$detail'";
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
                            $sql2 = "update diet set dPath='$path'";
                        }else{
                            $sql2 = $sql2 . ",dPath = '$path'";
                        }
                    }
                    if ($sql2 != "") {
                        $sql2 = $sql2 . " where dId='$dId'";
                        $result2 = mysqli_query($conn, $sql2);
                        if ($result2) {
                            echo "修改成功<br/>";
                        } else {
                            echo "修改失败<br/>";
                            echo mysqli_error($conn);
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
