<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valClassNav=2;
$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:menuManage2"];
$valNav3 = $langTxt["mg:crepermis"];
 if ($_REQUEST["myParentID"] >= 1) { $valNav3 .= "(".$valName.")"; }
	

?>
<div>
<input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch'];?>" />
<input name="execute" type="hidden" id="execute" value="insert" />
<input name="myParentID" type="hidden" id="myParentID" value="<?php  echo  $_REQUEST['myParentID'] ?>" />

<div class="layout-topbar">
                    <div class="row align-items-center">
                        <div class="col">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="<?php  echo $valLinkNav1?>" class="link">
                                        <?php  echo $valNav1;?>
                                    </a>
                                </li>
                                <li >
                                	<a href="javascript:void(0)"  onclick="btnBackPage('loadContact.php')"  class="link">
                                    	<?php  echo $valNav2;?>
                                    </a>
                                </li>
                                <li class="active">
                                    <?php  echo $valNav3;?>
                                </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
<div class="layout-content">
    
    <div class="layout-old">
    

                        
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $langTxt["mg:crepermis"] ?><?php  if ($_REQUEST["myParentID"] >= 1) { ?> (<?php  echo  $valName ?>)<?php  } ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <div  class="btnSave" title="<?php  echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"><?php  echo  $langTxt["btn:save"] ?></div>
                                                    <div  class="btnBack" title="<?php  echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('loadContact.php')"><?php  echo  $langTxt["btn:back"] ?></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightMain" >
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["mg:title"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["mg:titleDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="right"  valign="top"   height="15" ></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:inpnthai"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputmenuname" id="inputmenuname" type="text"  class="formInputContantTb"/></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:inpneng"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputmenunameen" id="inputmenunameen" type="text"  class="formInputContantTb"/></td>
                                </tr>
                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">

                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["mg:titleset"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["mg:titlesetDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:inptype"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <label>
                                            <div class="formDivRadioL"><input name="inputMenu_LinkType" id="inputMenu_LinkType" type="radio" class="formRadioContantTb" checked="checked" value="1" onclick="
                                                    jQuery('#rowModule').show();
                                                    jQuery('#rowModuleKey').show();
                                                    jQuery('#rowURL').hide();
                                                    jQuery('#rowTarget').show();
                                                                              " /></div>
                                            <div class="formDivRadioR">Application</div>
                                        </label>

                                        <label>
                                            <div class="formDivRadioL"><input name="inputMenu_LinkType" id="inputMenu_LinkType" type="radio" class="formRadioContantTb"  value="0"  onclick="
                                                    jQuery('#rowModule').hide();
                                                    jQuery('#rowModuleKey').hide();
                                                    jQuery('#rowURL').show();
                                                    jQuery('#rowTarget').show();
                                                                              " /></div>
                                            <div class="formDivRadioR">Link</div>
                                        </label>
                                        <?php  if ($_REQUEST["myParentID"] <= 0) { ?>
                                            <label>
                                                <div class="formDivRadioL"><input name="inputMenu_LinkType" id="inputMenu_LinkType" type="radio" class="formRadioContantTb" value="2" onclick="
                                                        jQuery('#rowModule').hide();
                                                        jQuery('#rowModuleKey').hide();
                                                        jQuery('#rowURL').hide();
                                                        jQuery('#rowTarget').hide();
                                                                                  " /></div>
                                                <div class="formDivRadioR">Group</div>
                                            </label>
                                        <?php  } ?>  </td>
                                </tr>
                                <tr id="rowModule">
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:inpfile"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <table width="91%"  border="0" cellspacing="0" cellpadding="0">
                                            <tr> 
                                                <td  align="left">
                                                    <input name="inputlinkpath" style="width:100%;" id="inputlinkpath" type="text"  class="formInputContantTb"/></td>
                                                <td width="180" align="center" valign="top" style=" background-color:#f9f9f9; border-top:#c8c7cc solid 1px; border-right:#c8c7cc solid 1px; border-bottom:#c8c7cc solid 1px;padding-top:8px;padding-bottom:10px;padding-left:10px; 

                                                    ">
                                                    <a   href="javascript:void(0)"   onclick="popup('popupIconWindow', '<?php echo $valuPathRealFile;?>/actionfile.php', 500, 300, 1)"  ><?php  echo  $langTxt["mg:inpfileAd"] ?></a>                     </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr id="rowURL" style="display:none">
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:inpurl"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputmenuurl" id="inputmenuurl" type="text"  class="formInputContantTb"/></td>
                                </tr>
                                <tr id="rowModuleKey" >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:inpkey"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputmasterkey" id="inputmasterkey" type="text"  class="formInputContantTb"/></td>
                                </tr>
                                <tr id="rowTarget">
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:inpshow"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <label>
                                            <div class="formDivRadioL"><input name="inputmenutarget" id="inputmenutarget" type="radio" class="formRadioContantTb" checked="checked" value="_parent" /></div>
                                            <div class="formDivRadioR"><?php  echo  $langTxt["mg:inpwindows"] ?></div>
                                        </label>

                                        <label>
                                            <div class="formDivRadioL"><input name="inputmenutarget" id="inputmenutarget" type="radio" class="formRadioContantTb"  value="_blank" /></div>
                                            <div class="formDivRadioR"><?php  echo  $langTxt["mg:inpwindowsnew"] ?></div>
                                        </label>    </td>
                                </tr>
                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">

                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["mg:titleicon"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["mg:titleiconDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="right"  valign="top"   height="15" ></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["mg:inpicon"] ?></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <table width="39%"  border="0" cellspacing="0" cellpadding="1"  style="background-color:#fefefe;
                                               border:#c8c7cc solid 1px;
                                               height:35px;
                                               ">
                                            <tr> 
                                                <td align="center"><img src="../img/btn/blank.gif" name="LibraryIconSample" id="LibraryIconSample" /> 
                                                    <input name="inputIconName" type="hidden" id="inputIconName" /></td>
                                                <td width="180" align="center" valign="top" style="padding-top:10px;padding-bottom:10px;padding-left:10px; background-color:#f9f9f9; border-left:#c8c7cc solid 1px;  ">
                                                    <a   href="javascript:void(0)"   onclick="popup('popupIconWindow', '<?php echo $valuPathRealFile;?>/icon.php', 500, 210, 1)"  ><?php  echo  $langTxt["mg:inpiconAd"] ?></a>                     </td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                                <tr >
                                    <td colspan="7" align="right"  valign="top" height="20"></td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo  $langTxt["btn:gototop"] ?>"><?php  echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                </tr>
                            </table>
                        </div>
                   
    </div>
</div>
</div>
<script type="text/javascript">
		function executeSubmit() {
			with (document.myFormHome) {
				if (isBlank(inputmenuname)) {
					inputmenuname.focus();
					jQuery("#inputmenuname").addClass("formInputContantTbAlertY");
					return false;
				} else {
					jQuery("#inputmenuname").removeClass("formInputContantTbAlertY");
				}
	
				if (isBlank(inputmenunameen)) {
					inputmenunameen.focus();
					jQuery("#inputmenunameen").addClass("formInputContantTbAlertY");
					return false;
				} else {
					jQuery("#inputmenunameen").removeClass("formInputContantTbAlertY");
				}
	
				if (inputMenu_LinkType[0].checked) {
					if (isBlank(inputlinkpath)) {
						inputlinkpath.focus();
						jQuery("#inputlinkpath").addClass("formInputContantTbAlertY");
						return false;
					} else {
						jQuery("#inputlinkpath").removeClass("formInputContantTbAlertY");
					}
	
					if (isBlank(inputmasterkey)) {
						inputmasterkey.focus();
						jQuery("#inputmasterkey").addClass("formInputContantTbAlertY");
						return false;
					} else {
						jQuery("#inputmasterkey").removeClass("formInputContantTbAlertY");
					}
	
				}
	
				if (inputMenu_LinkType[1].checked) {
	
					if (isBlank(inputmenuurl)) {
						inputmenuurl.focus();
						jQuery("#inputmenuurl").addClass("formInputContantTbAlertY");
						return false;
					} else {
						jQuery("#inputmenuurl").removeClass("formInputContantTbAlertY");
					}
	
					if (inputmenuurl.value == 'http://') {
						inputmenuurl.focus();
						jQuery("#inputmenuurl").addClass("formInputContantTbAlertY");
						return false;
					} else {
						jQuery("#inputmenuurl").removeClass("formInputContantTbAlertY");
					}
	
				}
	
			}
	
			//insertContactNew('../core/insertMg.php');
					  alert('GOOOO!!');
					  return false;
		}
	

       $(document).ready(function() {
			jQuery('#myFormHome').keypress(function (e) {
				if (e.which == 13) {
				  alert('GOOOO ready !!');
				  executeSubmit();
				  return false;
				}
			});
	   
		  $('#tile-page-head').html('<?php echo $valNav3;?>');
		  
    });
  </script>
<?php  include("../../lib/disconnect.php");?>
