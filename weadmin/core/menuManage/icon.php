<?php 
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php 
include("../../inc/".$valFolderAction_Inc."/inc-heard-meta.php");
include("../../inc/".$valFolderAction_Inc."/inc-heard-css.php");
?>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="viewIconMenu">
    <tr>
        <td valign="top" class="bg_centerhome" align="center"><table width="450"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top">
                        <table border="0" cellpadding="0" cellspacing="1">
                            <tr> 
                                <td > 
                                    <table border="0" cellpadding="2" cellspacing="0" class="table_border">
                                        <form action="/?" method="post" name="myForm" id="myForm">
                                            <tr align="center"> 
                                                <?php  for ($i = 1; $i <= $core_icon_columnsize; $i++) { ?>
                                                    <td height="22" class="table_header">&nbsp;</td>
                                                <?php  } ?>
                                            </tr>
                                            <?php 
                                            // Get Files
                                            $colCount = 0;
                                            $handle = opendir($core_icon_librarypath_popup);
                                            while (false !== ($file = readdir($handle))) {
                                                if ($file != "." && $file != "..") {
                                                    if (is_file($core_icon_librarypath_popup . "/" . $file)) {
                                                        $size = GetImageSize($core_icon_librarypath_popup . "/" . $file);
                                                        // check type file
                                                        $svg = false; // set false
                                                        $typefile = explode('.',$file);
                                                        if ($typefile[1] == 'svg' || $typefile[1] == 'SVG') {
                                                            $svg = true; // if svg file not empty setter true
                                                        }
                                                        if ($size != NULL || $svg) {
                                                            $ImgWidth = $size[0];
                                                            $ImgHeight = $size[1];
                                                            if ($ImgWidth <= $core_icon_maxsize && $ImgHeight <= $core_icon_maxsize) {
                                                                if ($colCount == 0) {
                                                                    ?>
                                                                    <tr> 
                                                                        <?php 
                                                                    }
                                                                    if ($myClassName == "table_row1") {
                                                                        $myClassName = "table_row2";
                                                                    } else {
                                                                        $myClassName = "table_row1";
                                                                    }
                                                                    $colCount++;
                                                                    ?>
                                                                    <td width="34" height="34" align="center" class="<?php  echo  $myClassName ?>">
                                                                        <div class="icon">
                                                                            <img src="<?php  echo  $core_icon_librarypath_popup ?>/<?php  echo  $file ?>" onMouseOver="this.style.cursor = 'hand'" onClick="setImageSelected('<?php  echo  $core_icon_librarypath . "/" . $file ?>')">
                                                                        </div>
                                                                    </td>
                                                                <?php 
                                                                if ($colCount == $core_icon_columnsize) {
                                                                    $colCount = 0;
                                                                    ?>
                                                                    </tr>
                                                                    <?php 
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            closedir($handle);

                                            if ($colCount < $core_icon_columnsize) {
                                                for ($i = $colCount; $i < $core_icon_columnsize; $i++) {
                                                    if ($myClassName == "mytable_row1") {
                                                        $myClassName = "mytable_row2";
                                                    } else {
                                                        $myClassName = "mytable_row1";
                                                    }
                                                    ?>
                                                </form>
                                                <td width="34" height="34" align="center" class="table_row2">&nbsp;</td>
                                        <?php 
                                        }
                                        }
                                        ?>
                                    </table>                </td>
                            </tr>
                        </table>    </td>
                </tr>
            </table></td>
    </tr>

                        <tr>
                            <td  class="bg_footerbarhome" ></td>
                        </tr>  

                    </table>
<?php 
include("../../inc/".$valFolderAction_Inc."/inc-footer-js.php");
?>
</body>
</html>
