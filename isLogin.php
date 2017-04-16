<?php
session_start();
if(!isset($_SESSION) || $_SESSION['userName'] == ""){
    echo "<span style='color: white;position: relative;top:30px; font-size: 22px'>您未登陆,请先<a href='index.html'style='color: green;'>登陆</a></span>";
    die();
}
else{
}
?>