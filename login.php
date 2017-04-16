<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>管理员登陆</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<?php
$serverName = "119.29.214.61";
$database = "mengxiangshou";

$name = $_POST['name'];
$password = $_POST['password'];

$conn = mysqli_connect($serverName, $name, $password, $database);

if(!$conn){
    echo "登陆失败,请重新<a href='index.html'>登陆</a>"; //跳回登陆页面
    session_destroy();
    die();
}
else{
    /*设置session */
    $_SESSION['userName'] = $name;
    /*跳转页面*/
    echo '
    <script>
        window.location.href="userInfo-view.php";
    </script>
    ';
}
?>
<script src="js/jquery.min.js"></script>
</body>

</html>

