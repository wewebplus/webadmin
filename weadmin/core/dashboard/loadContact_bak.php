<?php
    $valFolderAction_Inc = "member";
    include("../../inc/".$valFolderAction_Inc."/inc-heard-action-config.php");
?>
<div class="layout-topbar">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="title">
                <?php  echo  $langTxt["nav:home1"] ?>
            </h2>
        </div>
        <div class="col-auto">
            <?php  echo  DateFormat(date('Y-m-d H:i:s')) ?>
        </div>
    </div>
</div>
<div class="layout-content">
    <div class="layout-old">
        <div class="divRightHome" >
            <div class="divRightInnerHome">
                <?php  if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") {
                ?>
                <div class="divRightInnerTopBoxHome">
                    <?php 
                    $sql_pic = "SELECT " . $core_tb_staff . "_picture, " . $core_tb_staff . "_logdate, " . $core_tb_staff . "_email, " . $core_tb_staff . "_groupid   FROM " . $core_tb_staff . " WHERE   " . $core_tb_staff . "_id 	='" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
                    $query_pic = wewebQueryDB($coreLanguageSQL, $sql_pic);
                    $row_pic = wewebFetchArrayDB($coreLanguageSQL, $query_pic);
                    $txt_pic_funtion = "../../upload/core/50/" . $row_pic[0];
                    
                    $valPicProfileTop = $txt_pic_funtion;
                    if (is_file($valPicProfileTop)) {
                    $valPicProfileTop = $valPicProfileTop;
                    } else {
                    $valPicProfileTop = "../img/btn/nouserHome.jpg";
                    }
                    
                    $valLoginProfileTop = DateFormat($row_pic[1]);
                    $valEmail = $row_pic[2];
                    $valGroupid = $row_pic[3];
                    ?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="16%" align="left">
                                <div style="width:52px; height:52px;  background:url(<?php  echo  $valPicProfileTop ?>) center no-repeat; border:#ffffff solid 1px;  background-size: cover;background-repeat: no-repeat;   "><img src="../img/home/cycle.png" /></div>
                            </td>
                            <td width="84%" style="padding-left:10px;" align="left">
                                <?php 
                                if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                                $valLinkViewUser = "#";
                                } else {
                                $valLinkViewUser = "../core/userView.php";
                                }
                                ?>
                                <a href="<?php  echo  $valLinkViewUser ?>"><span class="fontTitlTbHome"><?php  echo  $_SESSION[$valSiteManage . "core_session_name"] ?></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" height="15"></td>
                        </tr>
                        <tr>
                            <td height="20" colspan="2" align="left" >
                                <?php  if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
                                <span class="fontContantTbHome"><?php  echo  $langTxt["us:permission"] ?>:&nbsp;-</span><br />
                                <span class="fontContantTbHome"><?php  echo  $langTxt["us:email"] ?>:&nbsp;-</span><br />
                                <span class="fontContantTbHome"><?php  echo  $langTxt["home:login"] ?>:&nbsp;-</span>
                                <?php  } else { ?>
                                <span class="fontContantTbHome"><?php  echo  $langTxt["us:permission"] ?>:&nbsp;<?php 
                                $sql_group = "SELECT " . $core_tb_group . "_id," . $core_tb_group . "_name  FROM " . $core_tb_group . " WHERE " . $core_tb_group . "_id='" . $valGroupid . "'   ORDER BY " . $core_tb_group . "_order DESC ";
                                $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                                $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
                                $row_groupid = $row_group[0];
                                $row_groupname = $row_group[1];
                                echo $row_groupname;
                                ?></span><br />
                                <span class="fontContantTbHome"><?php  echo  $langTxt["us:email"] ?>:&nbsp;<?php  echo  $valEmail ?></span><br />
                                <span class="fontContantTbHome"><?php  echo  $langTxt["home:login"] ?>:&nbsp;<?php  echo  $valLoginProfileTop ?></span>
                                <?php  } ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <?php } ?>
    
                <?php  if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") {
                ?>
                <div  class="divRightInnerTopBoxHome">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="16%" align="left"><div class="cycle1Login"></div></td>
                            <td width="84%" style="padding-left:10px;" align="left"><a href="../core/userManage.php" title="<?php  echo  $langTxt["nav:userManage2"] ?>"><span class="fontTitlTbHome"><?php  echo  $langTxt["nav:userManage2"] ?></span></a></td>
                        </tr>
                        <tr>
                            <td colspan="2" height="15"></td>
                        </tr>
                        <tr>
                            <td height="20" colspan="2" align="left" ><span class="fontContantTbHome"><?php  echo  $langTxt["home:userDe"] ?></span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
            
                <div class="divRightInnerTopBoxHome">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="16%" align="left"><div class="cycle4Login"></div></td>
                            <td width="84%" style="padding-left:10px;" align="left"><a href="../core/permisManage.php" title="<?php  echo  $langTxt["nav:perManage2"] ?>"><span class="fontTitlTbHome"><?php  echo  $langTxt["nav:perManage2"] ?></span></a></td>
                        </tr>
                        <tr>
                            <td colspan="2" height="15"></td>
                        </tr>
                        <tr>
                            <td height="20" colspan="2" align="left" ><span class="fontContantTbHome"><?php  echo  $langTxt["home:premisDe"] ?></span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div class="clearAll"></div>
                <?php  } ?>
            
                <!--########## Start Box Big ##########-->
                <div  class="divRightInnerBigBoxHome">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"   class="divRightTitleHomeBoxAll"  >
                        <tr >
                            <td width="3%"  class="divRightTitleHome"  valign="middle" align="left" >
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                    <tr>
                                        <td align="left"><span class="fontTitlTbHome">&nbsp;&nbsp;<?php  echo  $langTxt["home:used"] ?></span></td>
                                        <td align="right"><a href="../core/dashboard/exportLog.php" title="<?php  echo  $langTxt["btn:export"] ?>"><img src="../img/iconfile/3.png" style="padding-right:3px;" width="25" border="0" /></a></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr >
                            <td class="divRightTrHome" id="loadContantLogHome" align="center" valign="top">
                            <img src="../img/loader/ajax-loaderHome.gif" style="padding-top:40px;"  />
                            <script language="JavaScript"  type="text/javascript">
                            jQuery(function () {
                                loadContantLogHome('../core/loadLog.php');
                            });
                            
                            $(document).ready(function() {
                            loadContantLogHome('./dashboard/loadLog.php');
                            });
                            </script>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- ########## End Box Big ##########-->
                <div class="clearAll"></div>
                <div class="clearAll"></div>
            </div>
            <?php 
            if ($RecordCount >= 1) { ?>
            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr >
                    <td align="right"  valign="middle" class="formEndContantTb">
                        <a href="#defTop" title="<?php  echo  $langTxt["btn:gototop"] ?>"><?php  echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a>
                    </td>
                </tr>
            </table>
            <?php  } ?>
        </div>
	</div>                       
<div>
      

<!-- </div> -->
<!-- </div> -->


<script language="JavaScript"  type="text/javascript">
	var countArrSort = '';
	jQuery(function () {
		jQuery("#boxHomeSort").sortable({
			update: function () {
				var order = jQuery('#boxHomeSort').sortable('serialize');
				countArrSort = order;
				jQuery("#inputSort").val(countArrSort);
				sortingContactHome('../core/dashboard/sortingHome.php')
			}
		});
		jQuery("#boxHomeSort").disableSelection();
	});
    $(document).ready(function() {
        $('#tile-page-head').html('<?php  echo  $langTxt["nav:home2"] ?>');
    });
</script>
<?php  include("../../lib/disconnect.php");?>