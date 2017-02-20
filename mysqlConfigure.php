<?php
$serverName = "119.29.214.61";
$userName = "root";
$password = "feiyun45683995++";

$conn = mysqli_connect($serverName,$userName,$password);

//$conn = mysqli_connect("localhost","root","hbdiu");

if(!$conn){
    echo mysqli_error($conn);
    die("连接数据库失败,请尝试重新连接");
    return;
}
else{
    echo "连接成功";
}
?>