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
        <div class="col-auto"></div>
    </div>
</div>

<div class="layout-content">
    <div class="layout-content-topbar">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="title typo-lg fw-medium"><?php  echo $valNav2?></h2>
			</div>
			<div class="col-auto">
				<div class="action">
					<a href="javascript:void(0)" class="btn p-0 btn-success" data-title="<?php  echo $langTxt["btn:save"]?>" onclick="executeSubmit();">
						<span class="feather icon-save"></span>
					</a>
					<a href="javascript:void(0)" class="btn p-0 btn-mute" data-title="<?php  echo $langTxt["btn:back"]?>" onclick="btnBackPage('loadContact.php')">
						<span class="feather icon-arrow-left"></span>
					</a>
				</div>
			</div>
		</div>
	</div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
                <?php  echo  $langTxt["mg:title"] ?>
            </h3>
            <p class="desc color-mute">
                <?php  echo  $langTxt["mg:titleDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php  echo  $langTxt["mg:inpnthai"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputmenuname" id="inputmenuname" type="text"  class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php  echo  $langTxt["mg:inpneng"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputmenunameen" id="inputmenunameen" type="text"  class="form-control"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
                <?php  echo  $langTxt["mg:titleset"] ?>
            </h3>
            <p class="desc color-mute">
                <?php  echo  $langTxt["mg:titlesetDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php  echo  $langTxt["mg:inptype"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <div class="row">
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputMenu_LinkType" id="inputMenu_LinkType" type="radio" class="" checked="checked" value="1" onclick="
                                            jQuery('#rowModule').show();
                                            jQuery('#rowModuleKey').show();
                                            jQuery('#rowURL').hide();
                                            jQuery('#rowTarget').show();
                                                                        " />
                                    <div class="icon"></div>
                                    <div class="title">Application</div>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputMenu_LinkType" id="inputMenu_LinkType" type="radio" class=""  value="0"  onclick="
                                            jQuery('#rowModule').hide();
                                            jQuery('#rowModuleKey').hide();
                                            jQuery('#rowURL').show();
                                            jQuery('#rowTarget').show();
                                                                        " />
                                    <div class="icon"></div>
                                    <div class="title">Link</div>
                                </label>
                            </div>
                            <?php  if ($_REQUEST["myParentID"] <= 0) { ?>
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputMenu_LinkType" id="inputMenu_LinkType" type="radio" class="" value="2" onclick="
                                            jQuery('#rowModule').hide();
                                            jQuery('#rowModuleKey').hide();
                                            jQuery('#rowURL').hide();
                                            jQuery('#rowTarget').hide();
                                                                        " />
                                    <div class="icon"></div>
                                    <div class="title">Group</div>
                                </label>
                            </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="rowModule" class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php  echo  $langTxt["mg:inpfile"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <div class="row gutters-10">
                            <div class="col">
                                <input name="inputlinkpath" style="width:100%;" id="inputlinkpath" type="text"  class="form-control" />
                            </div>
                            <div class="col-auto">
                                <a href="javascript:void(0)" class="btn btn-default" onclick="popup('popupIconWindow', '<?php echo $valuPathRealFile;?>/actionfile.php', 500, 300, 1)"  >
                                    <?php  echo  $langTxt["mg:inpfileAd"] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="rowURL" style="display:none" class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php  echo  $langTxt["mg:inpurl"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputmenuurl" id="inputmenuurl" type="text"  class="form-control" />
                    </div>
                </div>
            </div>

            <div id="rowModuleKey" class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php  echo  $langTxt["mg:inpkey"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputmasterkey" id="inputmasterkey" type="text"  class="form-control" />
                    </div>
                </div>
            </div>

            <div id="rowTarget" class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php  echo  $langTxt["mg:inpshow"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <div class="row">
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputmenutarget" id="inputmenutarget" type="radio" class="" checked="checked" value="_parent" />
                                    <div class="icon"></div>
                                    <div class="title"><?php  echo  $langTxt["mg:inpwindows"] ?></div>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputmenutarget" id="inputmenutarget" type="radio" class=""  value="_blank" />
                                    <div class="icon"></div>
                                    <div class="title"><?php  echo  $langTxt["mg:inpwindowsnew"] ?></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
                <?php  echo  $langTxt["mg:titleicon"] ?>
            </h3>
            <p class="desc color-mute">
                <?php  echo  $langTxt["mg:titleiconDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php  echo  $langTxt["mg:inpicon"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <div class="row gutters-10">
                            <div class="col">
                                <div class="form-control d-flex align-items-center justify-content-center">
                                    <img src="../img/btn/blank.gif" name="LibraryIconSample" id="LibraryIconSample" /> 
                                </div>
                            </div>
                            <div class="col-auto">
                                <input name="inputIconName" type="hidden" id="inputIconName" />
                                <a href="javascript:void(0)" class="btn btn-default" onclick="popup('popupIconWindow', '<?php echo $valuPathRealFile;?>/icon.php', 500, 210, 1)"  >
                                    <?php  echo  $langTxt["mg:inpiconAd"] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
