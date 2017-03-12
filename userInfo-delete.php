<?php
$sqlData = $_POST['sql'];
$id = $_POST['id'];
$idType = $_POST['id_type'];
include_once "mysqlConfigure.php";
$sql1 = "delete from '$sqlData' where '$idType'='$id'";
/*如果是用户的话,删除需要去掉关联的各项信息*/
if($idType == "userId"){
    $sql1 = "delete from user where userId='$id'";
    $sql2 = "delete from userPet where userId = '$id'";
    $sql3 = "delete from userPetClo where userId = '$id'";
    $sql4 = "delete from userSportNow where userId = '$id'";
    $sql5 = "delete from userSportBef where userId = '$id'";
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);
    $result3=mysqli_query($conn,$sql3);
    $result4=mysqli_query($conn,$sql4);
    $result5=mysqli_query($conn,$sql5);
    if($result1 && $result2 && $result3 && $result4 && $result5){
        echo "1";
    }
    else{
        echo "0";
    }
}
/*宠物*/
if($idType == "pId"){
    $sql1 = "delete from pet where pId='$id'";
    $sql2 = "delete from petClo where pId='$id'";
    $sql3 = "delete from userPet where pId='$id'";
    $sql4 = "delete from userPetClo where pId='$id'";
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);
    $result3=mysqli_query($conn,$sql3);
    $result4=mysqli_query($conn,$sql4);
    if($result1 && $result2 && $result3 && $result4 ){
        echo "1";
    }
    else{
        echo "0";
    }
}
/*当时服装部分的删除时,需要没有用户购买时才能删除*/
if($idType == "cId"){
    $sql1 = "delete from clothing where cId='$id'";
    $sql2 = "delete from petClo where cId='$id'";
    $sql3 = "delete from userPetClo where cId='$id'";
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);
    $result3=mysqli_query($conn,$sql3);
    if($result1 && $result2 && $result3 ){
        echo "1";
    }
    else{
        echo "0";
    }
}
/*当是运动信息时*/
if($idType == "sId"){
    $sql1 = "delete from sports where sId='$id'";
    $sql2 = "delete from userSportNow where sId='$id'";
    $sql3 = "delete from userSportBef where sId='$id'";
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);
    $result3=mysqli_query($conn,$sql3);
    if($result1 && $result2 && $result3 ){
        echo "1";
    }
    else{
        echo "0";
    }
}
/*当是饮食信息时*/
if($idType == "dId"){
    $sql1 = "delete from diet where dId='$id'";
    $sql2 = "delete from dayDiet where dId='$id'";
    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);
    if($result1 && $result2){
        echo "1";
    }
    else{
        echo "0";
    }
}
/*当是读物信息时*/
if($idType == "bId"){
    $sql1 = "delete from book where bId='$id'";
    $result1=mysqli_query($conn,$sql1);
    if($result1){
        echo "1";
    }
    else{
        echo "0";
    }
}

?>