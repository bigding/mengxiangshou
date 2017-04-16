<?php
session_start();
unset($_SESSION['userName']);
session_destroy();

echo "已成功退出,您可以<a href='index.html'>再次登陆</a>";
?>