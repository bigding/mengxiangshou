<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>饮食信息管理</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link rel="stylesheet" href="css/common.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
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
                <div class="widget-box">
                    <div class="widget-content">
                        <div class="btn-group">
                            <button class="btn">添加饮食信息</button>
                            <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="dietInfo-View.php">查看饮食信息</a></li>
                                <li><a href="#">添加饮食信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--饮食名称,饮食悬赏金额,饮食简介,操作:查看详情,查看图片-->
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>信息录入框</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="dietInfo-add-operate.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">饮食名称 :</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="name" placeholder="名称:##"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">饮食悬赏金额 :</label>
                                <div class="controls">
                                    <input type="text"  class="span11" name="value" placeholder="服装价值:###"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">适用BMI区间</label>
                                <div class="controls">
                                    <select name="bmiType"  class="span3">
                                        <option value="0">无</option>'
                                        <option value="1">0-18.5</option>'
                                        <option value="2">18.5-24</option>'
                                        <option value="3">24-27</option>'
                                        <option value="4">27-30</option>'
                                        <option value="5">30-100</option>'
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">饮食简介 :</label>
                                <div class="controls">
                                    <input type="text" name="desc" class="span11"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">饮食详情</label>
                                <div class="controls">
                                    <textarea class="span11" name="detail"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">描述图片</label>
                                <div class="controls">
                                    <input type="file" name="picture"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">推荐理由</label>
                                <div class="controls">
                                    <textarea class="span11" name="detail"></textarea>
                                </div>
                            </div>
                            <div class="control-group step-num-1">
                                <label class="control-label">食材</label>
                                <div class="controls">
                                    <input type="file" name="meterial"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">步骤数量</label>
                                <div class="controls">
                                    <select name="step" class="span3" id="step-num">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3" selected>3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group step-num-1">
                                <label class="control-label">步骤一</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture1"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc1"/>
                                </div>
                            </div>
                            <div class="control-group step-num-2">
                                <label class="control-label">步骤二</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture2"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc2"/>
                                </div>
                            </div>
                            <div class="control-group step-num-3">
                                <label class="control-label">步骤三</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture3"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc3"/>
                                </div>
                            </div>
                            <div class="control-group step-num-4">
                                <label class="control-label">步骤四</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture4"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc4"/>
                                </div>
                            </div>
                            <div class="control-group step-num-5">
                                <label class="control-label">步骤五</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture5"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc5"/>
                                </div>
                            </div>
                            <div class="control-group step-num-6">
                                <label class="control-label">步骤六</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture6"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc6"/>
                                </div>
                            </div>
                            <div class="control-group step-num-7">
                                <label class="control-label">步骤七</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture7"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc7"/>
                                </div>
                            </div>
                            <div class="control-group step-num-8">
                                <label class="control-label">步骤八</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture8"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc8"/>
                                </div>
                            </div>
                            <div class="control-group step-num-9">
                                <label class="control-label">步骤九</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture9"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc9"/>
                                </div>
                            </div>
                            <div class="control-group step-num-10">
                                <label class="control-label">步骤十</label>
                                <div class="controls">
                                    <input type="file" name="stepPicture10"/>
                                </div>
                                <label class="control-label">说明</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="step-desc10"/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include "footer.php";
?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>
<script src="js/dietInfo-add.js"></script>
</body>
</html>
