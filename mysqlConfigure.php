<?php
error_reporting(E_ALL);
//phpinfo();
$serverName = "119.29.214.61";
$userName = "root";
$password = "feiyun45683995++";
$database = "mengxiangshou";

$conn = mysqli_connect($serverName, $userName, $password, $database);


if (!$conn) {
    die("连接数据库失败,请尝试重新连接");
    return;
} else {
//    echo "连接成功";
}
?>