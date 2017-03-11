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
                <?php
                $name = trim($_POST['cname']);
                $value = trim($_POST['cvalue']);
                $belong = trim($_POST['belong']);
                $desc = trim($_POST['cdesc']);
                $detail = trim($_POST['cdetail']);
                $path;
                $file_name;

                include_once "mysqlConfigure.php";
                $notice = "";
                if ($name == "" || $value == "" || $desc == "" || $detail == "") {
                    $notice += "请您填写完成所有的输入框再提交<br/>";
                }

                if ($_FILES["picture"]["error"] > 0) {
                    $notice += "上传图片发生错误,请重新上传<br/>";
                }

                $image = explode("/", $_FILES["picture"]["type"]);
                //              print_r($image);
                if ($image[0] != 'image') {
                    $notice += "您为选择图片,请重新上传<br/>";
                }

                /*验证图片的MD5值是否存在*/
                $md5num = md5_file($_FILES["picture"]["tmp_name"]);
                $file_exist;
                $sql1 = "select * from images_md5 where image_md5='$md5num'";
                $result1 = mysqli_query($conn, $sql1);
                if (!$result1) {
                    echo "查询出错";
                } else {
                    $row_num = mysqli_num_rows($result1);
                    if ($row_num == 1) {
                        $file_exist = true;
                        $row1 = mysqli_fetch_array($result1);
                        $path = $row1["image_path"];
                    } elseif ($row_num == 0) {
                        $file_exist = false;
                    } else {
                        $notice += "查询数据库出错,请再次尝试<br/>";
                    }
                }

                /*验证部分的处理完成后判断是否存在错误*/
                if ($notice != "") {
                    echo $notice;
                } else {
                    $sql5 = "SELECT count(*) num FROM mengxiangshou.clothing where cName='$name'";
                    $result5 = mysqli_query($conn, $sql5);
                    $row5 = mysqli_fetch_row($result5);
                    if ($row5[0] > 0) {
                        echo '存在同名的服装,请重新输入信息<br/>';
                    } else {

                        /*验证图片的MD5,如果已经存在同样的图片,直接写入路径,如果不存在,就存储了再写入*/
                        if (!$file_exist) {  // 当图片不存在时,重新命名图片并存入磁盘,再将路径写入数据库

                            $sql4 = "SELECT id+1 num FROM mengxiangshou.images_md5 WHERE id = (SELECT MAX(id) FROM images_md5)";
                            $result4 = mysqli_query($conn, $sql4);
                            $row4 = mysqli_fetch_array($result4);
                            $file_name = $row4["num"] . '.' . $image[1];
                            $path = 'images/cloth/' . $file_name;

                            echo $_FILES["picture"]["tmp_name"]."<br/>";
                            if(move_uploaded_file($_FILES["picture"]["tmp_name"],$path)){
                                echo "上传图片成功";
                            }
                            else{
                                echo "上传图片失败";
                                return;
                            }
                            /*将MD5值写入数据库*/
                            $sql3 = "insert into images_md5 (image_md5,image_path)
                              VALUES ('$md5num','$path')";
                            $result3 = mysqli_query($conn, $sql3);

                        }


                        $sql2 = "insert into clothing (cName,cValue,cDesc,cDetail,cPath)
                          values ('$name','$value','$desc','$detail','$path')";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_affected_rows($conn) == 1) {
                            $sql6 = "select cId from clothing where cName='$name'";
                            $result6 = mysqli_query($conn, $sql6);
                            $row6 = mysqli_fetch_row($result6);
                            $cId = $row6[0];
                            $sql7 = "insert into petClo (pId,cId)
                              VALUES ('$belong','$cId')";
                            $result7 = mysqli_query($conn,$sql7);
                            if($result7){
                                echo "操作成功";
                            }
                            else{
                                $sql8 = "delete from clothing where cId='$cId'";
                                mysqli_query($conn,$sql8);
                                echo "所属宠物出错,请重新输入信息";
                            }
                        } else {
                            echo '操作出错';
//                            echo mysqli_error($conn);
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
</body>
</html>
