<!DOCTYPE html>
<html lang="zh">
<head>
    <meta name="view-port" content="width-device-width,initial-scale=1, maximum-scale=1">
    <meta charset="UTF-8">
    <title>菜单</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <div class="span12 container">
        <?php
        $menuId = $_GET['menuId'];

        include_once 'mysqlConfigure.php';
        $sql1 = "select * from menu where menuId = '$menuId'";
        $sql2 = "select * from diet where dId = (select dId from menu where menuId = '$menuId')";
        $result1 = mysqli_query($conn,$sql1);
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
        ?>
        <div class="span12 top_image">
            <img src="<?php echo $row2['dPath']?>">
        </div>
        <div class="common_box top_name">
            <p>
                <?php echo $row2['dName']?>
            </p>
        </div>
        <div class="feature common_box">
            <div class="feature_top common_top">
                <span>推荐理由</span>
            </div>
            <div class="feature_content common_content">
                <p>
                    <?php echo $row2['dDesc']?>
                </p>
            </div>
        </div>
        <div class="meterial common_box">
            <div class="meterial_top common_top">
                <span>食材</span>
            </div>
            <div class="meterial_content common_content">
                <img src="images/yuanyuan.png">
            </div>
        </div>
        <div class="step common_box">
            <div class="common_top">
                <span>步骤</span>
            </div>
            <div class="step_content common_content">
                <?php
                $row1 = mysqli_fetch_assoc($result1);
                $step = $row1['stepNum'];
                for($i = 1; $i <= $step; $i++){
                    echo '
                        <div class="step_list">
                            <p>-'.$i.'-</p>
                            <img src="'.$row1["stepImg".$i].'">
                            <p>'.$row1["stepDesc".$i].'</p>
                        </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>