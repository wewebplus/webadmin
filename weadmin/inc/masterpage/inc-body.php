<!DOCTYPE html>
<html lang="th">
    <head>
        <?php  include("../inc/".$valFolderAction_Inc."/inc-heard-meta.php"); ?>
        <?php  include("../inc/".$valFolderAction_Inc."/inc-heard-css.php"); ?>
    </head>
    <body>
        <div class="layout-page">
            <!-- #################### Head ###############  -->
            <?php  include("../inc/".$valFolderAction_Inc."/inc-heard-page.php"); ?>

            <!-- #################### Main ###############  -->
            <div class="layout-main">
            	<div  class="layout-left">
                <?php include("../inc/".$valFolderAction_Inc."/inc-body-left.php"); ?>
                </div>
                <div  class="layout-right">  

                    <form action="?" method="post" name="myFormHome" id="myFormHome" class="form-default" enctype="multipart/form-data">

                        <input name="actionFolder" type="hidden" id="actionFolder" value="<?php echo $valuPathRealFolder;?>" />
                        <input name="actionFolderFile" type="hidden" id="actionFolderFile" value="<?php echo $valuPathRealFile;?>" />
                        <input name="actionFile" type="hidden" id="actionFile" value="<?php echo $valuPathRealAction;?>" />
                        
                        <input name="valEditID" type="hidden" id="valEditID" value="<?php echo $valEditID;?>" />
                        
                        <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo $_REQUEST['masterkey']?>" />
                        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo $_REQUEST['menukeyid']?>" />
                        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo $module_pageshow?>" />
                        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo $module_pagesize?>" />
                        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo $module_orderby?>" />

                        <div class="mRightBackOffice" id="boxContantLoad">
                            
                        </div>
                    </form>
                </div>
                
            </div>

            <!-- #################### Footer ###############  -->
            <?php include("../inc/".$valFolderAction_Inc."/inc-footer-page.php");?>
        </div>
    </body>
    <?php include("../inc/".$valFolderAction_Inc."/inc-footer-js.php");?>
</html>