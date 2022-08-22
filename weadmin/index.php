<?php 
$valFolderAction_Inc = "login-page";
include("./inc/".$valFolderAction_Inc."/inc-heard-config.php");
?>
<!DOCTYPE html>
<html lang="th">
    <head>
        <?php include("./inc/".$valFolderAction_Inc."/inc-heard-meta.php"); ?>
        <?php include("./inc/".$valFolderAction_Inc."/inc-heard-css.php"); ?> 
        <style type="text/css">
            :root {
                --color-primary: #0F4C81;
            }
        </style>
    </head>
    
    <body>
        <div class="auth-block">
            <div class="row no-gutters align-items-center">
                <div class="col-md">
                    <figure class="cover cover-lg">
                        <img class="img-cover" src="img/bg-admin.png" alt="">
                        <!-- <img class="img-cover" src="../upload/core/<?php  echo $valPicBgSystem?><?php echo $core_cache_browser;?>" alt=""> -->
                    </figure>
                </div>
                <div class="col-md-auto">
                    <form class="form-default" action="index.php" method="post" name="myFormLogin" id="myFormLogin">
                        <div class="brand">
                            <img src="../upload/core/<?php  echo $valPicSystem?><?php echo $core_cache_browser;?>" alt="">
                        </div>
                        <h3 class="title text-center typo-xl color-light mb-4">ยินดีต้อนรับเข้าสู่ระบบ</h3>
                        <input id="inputUrl" name="inputUrl" type="hidden" value="<?php echo $uID ?>">
                        <div class="form-group">
                            <div class="block-control">
                                <span class="feather icon-user color-light"></span>
                                <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="ชื่อผู้ใช้">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="block-control">
                                <span class="feather icon-lock color-light"></span>
                                <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="รหัสผ่าน">
                            </div>
                        </div>
                        <div class="form-group pt-3 mb-0">
                            <input class="btn fluid btn-primary" name="input" type="submit" value="<?php  echo  $langTxt["login:btn"] ?>"/>
                        </div>
                    </form>
                    <div class="copy">
                        Copyright © Wewebplus All rights reserved.
                    </div>
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
