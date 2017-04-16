<?php
session_start();
?>
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
require_once 'isLogin.php';
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
                $name = trim($_POST['name']);
                $value = trim($_POST['value']);
                $bmiType = trim($_POST['bmiType']);
                $desc = trim($_POST['desc']);
                $detail = trim($_POST['detail']);
                $stepNum = trim($_POST['step']);
                /*$step二维数组用于存储步骤信息,$step[0][0]用于存储步骤数量*/
                $step = array(
                    array($stepNum,0),
                    array(trim($_POST['step-desc1']),""),
                    array(trim($_POST['step-desc2']),""),
                    array(trim($_POST['step-desc3']),""),
                    array(trim($_POST['step-desc4']),""),
                    array(trim($_POST['step-desc5']),""),
                    array(trim($_POST['step-desc6']),""),
                    array(trim($_POST['step-desc7']),""),
                    array(trim($_POST['step-desc8']),""),
                    array(trim($_POST['step-desc9']),""),
                    array(trim($_POST['step-desc10']),"")
                );

                $bmiArray = array(0, 18.5, 24, 27, 30, 100);
                $path;
                $file_name;

                include_once "mysqlConfigure.php";
                $notice = "";
                $stepInputStatus = true; //表示全部的值都输入了
                $stepImgError = true;   //true表示上传的文件没有错误
                $stepImgStatus = true;   //true表示上传的全部为图片
                $meterialPath = "";
                /*判断是不是所有的步骤都输入了*/
                for($i = 0; $i <= $stepNum; $i++){
                    if($i == 0){
                        $md5num = md5_file($_FILES["meterial"]["tmp_name"]);
                        $sql6 = "select * from images_md5 where image_md5='$md5num'";
                        $result6 = mysqli_query($conn, $sql6);
                        if (!$result6) {
                            echo mysqli_error($conn);
                        } else {
                            $row_num = mysqli_num_rows($result6);
                            if ($row_num == 1) {
                                $row1 = mysqli_fetch_array($result6);
                                $meterialPath = $row1["image_path"];
                            } elseif ($row_num == 0) {
                                /*存储图片并且生成图片名称*/
                                $image = explode("/", $_FILES["meterial"]["type"]);
                                $sql4 = "SELECT id+1 num FROM mengxiangshou.images_md5 WHERE id = (SELECT MAX(id) FROM images_md5)";
                                $result4 = mysqli_query($conn, $sql4);
                                if (mysqli_num_rows($result4) == 0) {
                                    $file_name = '0.' . $image[1];
                                } else {
                                    $row4 = mysqli_fetch_array($result4);
                                    $file_name = $row4["num"] . '.' . $image[1];
                                }
                                $path = 'images/diet/' . $file_name;
                                $meterialPath = $path;

                                if (move_uploaded_file($_FILES["meterial"]["tmp_name"], $path)) {

                                } else {
                                    echo "上传图片失败";
                                    return;
                                }

                                /*将MD5值写入数据库*/
                                $sql3 = "insert into images_md5 (image_md5,image_path)
                              VALUES ('$md5num','$path')";
                                $result3 = mysqli_query($conn, $sql3);
                            } else {
                                echo "查询数据库出错,请再次尝试<br/>";
                                return;
                            }
                        }
                    }
                    else {
                        if ($stepInputStatus && $step[$i][0] == "")
                            $stepInputStatus = false;
                        if ($stepImgStatus && $_FILES["stepPicture" . $i]["error"] > 0)
                            $stepImgError = false;
                        $image = explode("/", $_FILES["stepPicture" . $i]["type"]);
                        if ($stepImgStatus && $image[0] != 'image')
                            $stepImgStatus = false;

                        /*判断对应图片是否存在,以及生成对应的图片存储位置*/
                        $md5num = md5_file($_FILES["stepPicture" . $i]["tmp_name"]);
                        $sql6 = "select * from images_md5 where image_md5='$md5num'";
                        $result6 = mysqli_query($conn, $sql6);
                        if (!$result6) {
                            echo mysqli_error($conn);
                        } else {
                            $row_num = mysqli_num_rows($result6);
                            if ($row_num == 1) {
                                $row1 = mysqli_fetch_array($result6);
                                $step[$i][1] = $row1["image_path"];
                            } elseif ($row_num == 0) {
                                /*存储图片并且生成图片名称*/
                                $sql4 = "SELECT id+1 num FROM mengxiangshou.images_md5 WHERE id = (SELECT MAX(id) FROM images_md5)";
                                $result4 = mysqli_query($conn, $sql4);
                                if (mysqli_num_rows($result4) == 0) {
                                    $file_name = '0.' . $image[1];
                                } else {
                                    $row4 = mysqli_fetch_array($result4);
                                    $file_name = $row4["num"] . '.' . $image[1];
                                }
                                $path = 'images/diet/' . $file_name;
                                $step[$i][1] = $path;

                                if (move_uploaded_file($_FILES["stepPicture" . $i]["tmp_name"], $path)) {

                                } else {
                                    echo "上传图片失败";
                                    return;
                                }

                                /*将MD5值写入数据库*/
                                $sql3 = "insert into images_md5 (image_md5,image_path)
                              VALUES ('$md5num','$path')";
                                $result3 = mysqli_query($conn, $sql3);
                            } else {
                                echo "查询数据库出错,请再次尝试<br/>";
                                return;
                            }
                        }
                    }
                }
                if ($name == "" || $value == "" || $desc == "" || $detail == "" || $bmiType == 0 || !$stepInputStatus) {
                    $notice .= "请您填写完成所有的输入框再提交<br/>";
                } else {
                    if ($_FILES["picture"]["error"] > 0 || !$stepImgError) {
                        $notice .= "上传图片发生错误,请重新上传<br/>";
                    } else {
                        $image = explode("/", $_FILES["picture"]["type"]);
                        if ($image[0] != 'image' || !$stepImgStatus) {
                            $notice .= "您未全部选择图片,请重新上传<br/>";
                        }
                    }
                }

                /*验证部分的处理完成后判断是否存在错误*/
                if ($notice != "") {
                    echo $notice;
                } else {
                    /*处理描述图片和除菜单步骤信息的部分*/
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
                            echo "查询数据库出错,请再次尝试<br/>";
                            return;
                        }
                    }

                    $sql5 = "SELECT count(*) FROM mengxiangshou.diet where dName='$name'";
                     $result5 = mysqli_query($conn, $sql5);
                    $row5 = mysqli_fetch_row($result5);
                    if ($row5[0] > 0) {
                        echo '存在同名的饮食信息,请重新输入信息';
                    } else {
                        /*验证图片的MD5,如果已经存在同样的图片,直接写入路径,如果不存在,就存储了再写入*/
                        if (!$file_exist) {  // 当图片不存在时,重新命名图片并存入磁盘,再将路径写入数据库
                            $sql4 = "SELECT id+1 num FROM mengxiangshou.images_md5 WHERE id = (SELECT MAX(id) FROM images_md5)";
                            $result4 = mysqli_query($conn, $sql4);
                            if (mysqli_num_rows($result4) == 0) {
                                $file_name = '0.' . $image[1];
                            } else {
                                $row4 = mysqli_fetch_array($result4);
                                $file_name = $row4["num"] . '.' . $image[1];
                            }
                            $path = 'images/diet/' . $file_name;

                            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $path)) {

                            } else {
                                echo "上传图片失败";
                                return;
                            }

                            /*将MD5值写入数据库*/
                            $sql3 = "insert into images_md5 (image_md5,image_path)
                              VALUES ('$md5num','$path')";
                            $result3 = mysqli_query($conn, $sql3);

                        }

                        $minBMI = $bmiArray[$bmiType-1];
                        $maxBMI = $bmiArray[$bmiType];
                        $menuId = 1;
                        $dLink = "";
                        $sql8 = "SELECT menuId+1 num FROM mengxiangshou.menu WHERE menuId = (SELECT MAX(menuId) FROM menu);";
                        $result8 = mysqli_query($conn, $sql8);
                        if (mysqli_num_rows($result8) != 0) {
                            $row8 = mysqli_fetch_array($result8);
                            $menuId = $row8["num"];
                        }
                        $dLink = "menu.php?menuId=".$menuId;

                        $sql2 = "insert into diet (dName,dValue,minBMI,maxBMI,dDesc,dDetail,dLink,dPath)
                      values ('$name','$value','$minBMI','$maxBMI','$desc','$detail','$dLink','$path')";
//                        $result2 = mysqli_query($conn, $sql2);
//                        /*处理描述图片和除菜单步骤信息的部分完*/
//                        /*处理菜单步骤的部分*/
//                        /*获取对应的饮食Id*/
//                        $sql9 = "select dId from diet where dId = (select MAX(dId) from diet)";
//                        $result9 = mysqli_query($conn,$sql9);
//                        $row9 = mysqli_fetch_array($result9);
//                        $dId = $row9[0];
//
//
//                        $sql7 = "insert into menu (menuId,dId,meterialPath,stepNum,stepImg1,stepDesc1,stepImg2,stepDesc2,stepImg3,stepDesc3,stepImg4,stepDesc4,stepImg5,stepDesc5,stepImg6,stepDesc6,stepImg7,stepDesc7,stepImg8,stepDesc8,stepImg9,stepDesc9,stepImg10,stepDesc10)
//                      VALUES ('$menuId','$dId','$meterialPath','{$step[0][0]}','{$step[1][1]}','{$step[1][0]}','{$step[2][1]}','{$step[2][0]}','{$step[3][1]}','{$step[3][0]}','{$step[4][1]}','{$step[4][0]}','{$step[5][1]}','{$step[5][0]}','{$step[6][1]}','{$step[6][0]}','{$step[7][1]}','{$step[7][0]}','{$step[8][1]}','{$step[8][0]}','{$step[9][1]}','{$step[9][0]}','{$step[10][1]}','{$step[10][0]}')";
//                        /*处理菜单步骤的部分完*/
//
//                        $result7 = mysqli_query($conn, $sql7);
//                        if ($result7 && $result6) {
//                            echo "操作成功";
//                        } else {
//                            echo mysqli_error($conn);
//                        }
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
