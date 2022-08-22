<?php 
$valFolderAction_Inc = "login-page";
include("./inc/".$valFolderAction_Inc."/inc-heard-config.php");
?>
<!DOCTYPE html>
<html lang="th">
    <head>
        <?php include("./inc/".$valFolderAction_Inc."/inc-heard-meta.php"); ?>
        <?php include("./inc/".$valFolderAction_Inc."/inc-heard-css.php"); ?> 
    </head>

    <!-- <body>
        <div class="".$valFolderAction_Inc."" style="background-image: url('../upload/core/<?php  echo $valPicBgSystem?><?php echo $core_cache_browser;?>');">
            <div class="login-wrapper">
                <div class="header" style="background: url('../upload/core/<?php  echo $valPicHeaderSystem?><?php echo $core_cache_browser;?>');">

                </div>
                <div class="body">

                </div>
            </div>
        </div>
    </body> -->

    <body class="new_login" style="background: url('../upload/core/<?php  echo $valPicBgSystem?><?php echo $core_cache_browser;?>') center;background-size: cover;">
        <div class="loginBack">
            <div class="login-form">
                <div class="header" style="background: url('../upload/core/<?php  echo $valPicHeaderSystem?><?php echo $core_cache_browser;?>') center;">
                    <div class="brand">
                        <img src="../upload/core/<?php  echo $valPicSystem?><?php echo $core_cache_browser;?>" alt="">
                    </div>
                </div>
                <div class="body">
                    <div class="title">
                        ยินดีต้อนรับเข้าสู่ระบบ
                        <small><?php  echo $valNameSystem?></small>
                    </div>
                    <form class="form-default" action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                        <input id="inputUrl" name="inputUrl" type="hidden" value="<?php  echo  $uID ?>">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <label class="control-label">ชื่อผู้ใช้</label>
                                </span>
                                <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <label class="control-label">รหัสผ่าน</label>
                                </span>
                                <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="">
                            </div>
                        </div>
                        <div class="form-btn">
                            <input class="btn btn-primary" name="input" type="submit" value="<?php  echo  $langTxt["login:btn"] ?>"/>
                        </div>
                    </form>
                    <div style="display:none;" id="loadAlertLogin">
                        <img src="img/btn/error.png" align="absmiddle" hspace="10" /><?php  echo  $langTxt["login:alert"] ?>
                    </div>  
                </div>
            </div>
            <div id="loadCheckComplete"></div>
        </div>
        <div class="loginBack" style="display: none;"></div>
        <?php  include("./inc/".$valFolderAction_Inc."/inc-footer-page.php"); ?>                
    </body>
    <?php include("./inc/".$valFolderAction_Inc."/inc-footer-js.php"); ?>
</html>
