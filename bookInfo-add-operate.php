<!DOCTYPE html>
<html lang="en">
<head>
    <title>读物信息管理</title>
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
                读物信息</a></div>
        <h1>读物信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <?php
                $name = trim($_POST['name']);
                $value = trim($_POST['value']);
                $desc = trim($_POST['desc']);
                $detail = trim($_POST['detail']);
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
                //                print_r($image);
                if ($image[0] != 'image') {
                    $notice += "您为选择图片,请重新上传<br/>";
                }

                /*验证图片的MD5值是否存在*/
                $md5num = md5_file($_FILES["picture"]["tmp_name"]);
                $file_exist;
                $sql1 = "select * from images_md5 where image_md5='$md5num'";
                $result1 = mysqli_query($conn, $sql1);
                if (!$result1) {
                    echo mysqli_error($conn);
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
                    $sql5 = "SELECT count(*) FROM mengxiangshou.book where bName='$name'";
                    $result5 = mysqli_query($conn, $sql5);
                    $row5 = mysqli_fetch_row($result5);
                    if ($row5[0] > 0) {
                        echo '存在同名的读物,请重新输入信息';
                    } else {
                        /*验证图片的MD5,如果已经存在同样的图片,直接写入路径,如果不存在,就存储了再写入*/
                        if (!$file_exist) {  // 当图片不存在时,重新命名图片并存入磁盘,再将路径写入数据库
                            $sql4 = "SELECT id+1 num FROM mengxiangshou.images_md5 WHERE id = (SELECT MAX(id) FROM images_md5)";
                            if(mysqli_num_rows($result4) == 0){
                                $file_name = '0.' . $image[1];
                            }
                            else{
                                $row4 = mysqli_fetch_array($result4);
                                $file_name = $row4["num"] . '.' . $image[1];
                            }
                            $path = 'images/book/' . $file_name;

                            if(move_uploaded_file($_FILES["picture"]["tmp_name"],$path)){

                            }else{
                                echo "上传图片失败";
                                return;
                            }

                            /*将MD5值写入数据库*/
                            $sql3 = "insert into images_md5 (image_md5,image_path)
                              VALUES ('$md5num','$path')";
                            $result3 = mysqli_query($conn, $sql3);

                        }


                        $sql2 = "insert into book (bName,bValue,bDesc,bDetail,bPath)
                      values ('$name','$value','$desc','$detail','$path')";
//                    echo $sql2."<br/>";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_affected_rows($conn) == 1) {
                            echo "操作成功";
                        } else {
                            echo mysqli_error($conn);
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
