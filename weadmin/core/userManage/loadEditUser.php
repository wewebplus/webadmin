<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:userManage2"];
$valNav3=$langTxt["us:editpermis"];
	
	$sql = "SELECT 
	".$core_tb_staff."_id , 
	".$core_tb_staff."_picture , 
	".$core_tb_staff."_groupid , 
	".$core_tb_staff."_username , 
	".$core_tb_staff."_prefix , 
	".$core_tb_staff."_gender , 
	".$core_tb_staff."_fnamethai , 
	".$core_tb_staff."_lnamethai , 
	".$core_tb_staff."_fnameeng , 
	".$core_tb_staff."_lnameeng , 
	".$core_tb_staff."_email , 
	".$core_tb_staff."_address , 
	".$core_tb_staff."_telephone , 
	".$core_tb_staff."_mobile , 
	".$core_tb_staff."_other , 
	".$core_tb_staff."_password   , 
	".$core_tb_staff."_storeid ,
	".$core_tb_staff."_unitid , 
	".$core_tb_staff."_position  , 
	".$core_tb_staff."_usertype,
	".$core_tb_staff."_unitid_sub
	FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id='".$_POST["valEditID"]."'";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
		$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
		$valId=$Row[0];
		$valPic=$Row[1];
		$valGroupid=$Row[2];
		$valUsername=$Row[3];
		$valPrefix=$Row[4];
		$valGender=$Row[5];
		$valFnamethai=$Row[6];
		$valLnamethai=$Row[7];
		$valFnameeng=$Row[8];
		$valLnameeng=$Row[9];
		$valEmail=$Row[10];
		$valAddress=$Row[11];
		$valTelephone=$Row[12];
		$valMobile=$Row[13];
		$valOther=$Row[14];
		
		$valPassword=decodeStr($Row[15]);
		$valStoreID=$Row[16];
		$valUnitID=$Row[17];
		$valPositionUser=$Row[18];
	
		$valUsertype=$Row[19];
		$valUnitIDSub=$Row[20];

?>
<div>
<input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch'];?>" />
<input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh'];?>" />
<input name="inputUT" type="hidden" id="inputUT" value="<?php  echo $_REQUEST['inputUT'];?>" />
<?php 
// Check to set default value #########################
$module_default_pagesize = $core_default_pagesize;
$module_default_maxpage = $core_default_maxpage;
$module_default_reduce = $core_default_reduce;
$module_default_pageshow = 1;
$module_sort_number = $core_sort_number;

if($_REQUEST['module_pagesize']=="") { 
	$module_pagesize = $module_default_pagesize; 
}else{ 
	$module_pagesize =$_REQUEST['module_pagesize']; 
}

if($_REQUEST['module_pageshow']=="") { 
	$module_pageshow = $module_default_pageshow; 
}else{ 
	$module_pageshow =$_REQUEST['module_pageshow']; 
}

if($_REQUEST['module_adesc']=="") { 
	$module_adesc = $module_sort_number;  
}else{ 
	$module_adesc =$_REQUEST['module_adesc']; 
}

if($_REQUEST['module_orderby']=="")  { 
	$module_orderby = $core_tb_staff."_order";  
}else{ 
	$module_orderby =$_REQUEST['module_orderby'];
}
 
if($_REQUEST['inputSearch']!="") { 
	$inputSearch=trim($_REQUEST['inputSearch']);  
}else{ 
	$inputSearch =$_REQUEST['inputSearch'];
}


$sqlSearch = "";

if($_REQUEST['inputGh']>=1){
	$sqlSearch = $sqlSearch."  AND    ".$core_tb_staff."_groupid='".$_REQUEST['inputGh']."'  ";
}

if($_REQUEST['inputUT']>=1){
  $sqlSearch = $sqlSearch."  AND    ".$core_tb_staff."_usertype='".$_REQUEST['inputUT']."'  ";
}

if($inputSearch<>"") {
		$sqlSearch = $sqlSearch."  AND  ( ".
		$core_tb_staff."_fnamethai LIKE '%$inputSearch%' OR ".
		$core_tb_staff."_lnamethai LIKE '%$inputSearch%' OR ".
		$core_tb_staff."_fnameeng LIKE '%$inputSearch%' OR ".
		$core_tb_staff."_lnameeng LIKE '%$inputSearch%' OR ".
		$core_tb_staff."_email LIKE '%$inputSearch%'  ) ";
}


?>
<div class="layout-topbar">
    <div class="row align-items-center">
        <div class="col">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $valLinkNav1?>" class="link">
                        <?php echo $valNav1?>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="link" onclick="btnBackPage('loadContact.php')" target="_self">
                        <?php echo $valNav2?>
                    </a>
                </li>
                <li class="active">
                    <?php echo $langTxt["us:editpermis"]?>
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
                <h2 class="title typo-lg fw-medium"><?php echo $langTxt["us:editpermis"]?></h2>
            </div>
            <div class="col-auto">
                <div class="action">
                    <a href="javascript:void(0)" class="btn p-0 btn-success" data-title="<?php echo $langTxt["btn:save"]?>" onclick="executeSubmit();">
                        <span class="feather icon-save"></span>
                    </a>
                    <a href="javascript:void(0)" class="btn p-0 btn-mute" data-title="<?php echo $langTxt["btn:back"]?>" onclick="btnBackPage('loadContact.php');">
                        <span class="feather icon-arrow-left"></span>
                    </a> 
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
                <?php echo $langTxt["us:titleuser"]?>
            </h3>
            <p class="desc color-mute">
                <?php echo $langTxt["us:titleuserDe"]?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:unitMain"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control" id="showFixID" data-id="<?php  echo $valUnitID; ?>">
                        <select name="inputFixid"  id="inputFixid" class="select-control">
                            <option value="0"><?php echo $langTxt["us:selectUnitMain"]?> </option>
                            <?php
                             // $sql_fix = "SELECT ";
                             // $sql_fix .= "  " . $core_tb_fix . "_id," . $core_tb_fix . "_subject";
                             // $sql_fix .= "  FROM " . $core_tb_fix . " WHERE  " . $core_tb_fix . "_masterkey ='" . $core_tb_fix_masterkey . "'    AND  ".$core_tb_fix."_status !='Disable'   ORDER BY " . $core_tb_fix . "_order DESC ";
                             // $query_fix = wewebQueryDB($coreLanguageSQL,$sql_fix);
                             //  while ($row_fix = wewebFetchArrayDB($coreLanguageSQL,$query_fix)) {
                             //      $row_fixid = $row_fix[0];
                             //      $row_fixname = $row_fix[1];
                                  ?>
                                  <!-- <option value="<?php echo  $row_fixid ?>" <?php if ($valUnitID == $row_fixid) { ?> selected="selected" <?php } ?>><?php echo  $row_fixname ?></option> -->
                              <?php //} ?>
                        </select>                    
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["txt:typeuser"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <div class="row">
                            <?php 
                            foreach ($arrTypeUser as $key => $value) {
                            ?>
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputTypeUser" id="inputTypeUser" type="radio" class="" <?php  if($valUsertype==$key || $key == 1){ ?> checked="checked" <?php  } ?> value="<?php echo $key?>" />
                                    <div class="icon"></div>
                                    <div class="title"><?php echo $value?></div>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:nameuser"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputUserName" id="inputUserName" type="text"  class="form-control" onblur="loadCheckUser()"  value="<?php echo $valUsername?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?>>
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:pass"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputPassword" id="inputPassword" type="password"  class="form-control" value="<?php echo $valPassword?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?>>
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:repass"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputPassword1" id="inputPassword1" type="password"  class="form-control" value="<?php echo $valPassword?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?>>
        <div class="card-header">
            <h3 class="title typo-md color-primary">
                <?php echo $langTxt["us:titlepic"]?>
            </h3>
            <p class="desc color-mute">
                <?php echo $langTxt["us:titlepicDe"]?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:inputpic"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <div name="imgShow" id="imgShow">
                            <figure class="thumb-sm">
                                <img src="../../upload/core/50/<?php echo $valPic?>" onerror="this.src='<?php echo "../img/btn/blank_s.gif"?>'" />
                            </figure>
                            <input name="picnameProfile" type="hidden" id="picnameProfile" value="<?php echo $valPic?>" />
                        </div>   
                        <div class="row">
                            <div class="col-auto">
                                <div class="file-input-wrapper">
                                    <button type="button" class="btn btn-default">
                                        <span class="feather icon-upload-cloud typo-xs mr-2"></span>
                                        <?php echo $langTxt["us:inputpicselect"]?>
                                    </button>
                                    <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxUploadProfile();" />
                                </div> 
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
                <?php echo $langTxt["us:titlesystem"]?>
            </h3>
            <p class="desc color-mute">
                <?php echo $langTxt["us:titlesystemDe"]?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:unitMain"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control" id="showFixID" data-id="<?php  echo $valUnitID; ?>">
                        <select name="inputFixid"  id="inputFixid" class="select-control">
                            <option value="0"><?php echo $langTxt["us:selectUnitMain"]?> </option>
                            <?php
                             // $sql_fix = "SELECT ";
                             // $sql_fix .= "  " . $core_tb_fix . "_id," . $core_tb_fix . "_subject";
                             // $sql_fix .= "  FROM " . $core_tb_fix . " WHERE  " . $core_tb_fix . "_masterkey ='" . $core_tb_fix_masterkey . "'    AND  ".$core_tb_fix."_status !='Disable'   ORDER BY " . $core_tb_fix . "_order DESC ";
                             // $query_fix = wewebQueryDB($coreLanguageSQL,$sql_fix);
                             //  while ($row_fix = wewebFetchArrayDB($coreLanguageSQL,$query_fix)) {
                             //      $row_fixid = $row_fix[0];
                             //      $row_fixname = $row_fix[1];
                                  ?>
                                  <!-- <option value="<?php echo  $row_fixid ?>" <?php if ($valUnitID == $row_fixid) { ?> selected="selected" <?php } ?>><?php echo  $row_fixname ?></option> -->
                              <?php //} ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:unitSub"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control" id="showFixIDSub" data-id="<?php  echo $valUnitIDSub; ?>">
                        <select name="inputFixSubid" id="inputFixSubid" class="select-control" >
                            <option value="0"><?php echo $langTxt["us:selectUnitSub"]?> </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:antecedent"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <div class="row">
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputPrefix" id="inputPrefix" type="radio" class="" <?php if ($valPrefix=="Mr.") echo "checked"; ?>  value="Mr." onclick="
                                    document.myForm.inputGender[0].checked=true
                                    " />
                                    <div class="icon"></div>
                                    <div class="title"><?php echo $langTxt["us:mr"]?></div>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputPrefix" id="inputPrefix" type="radio" class=""  <?php if ($valPrefix=="Miss") echo "checked"; ?> value="Miss"  onclick="
                                    document.myForm.inputGender[1].checked=true " />
                                    <div class="icon"></div>
                                    <div class="title"><?php echo $langTxt["us:miss"]?></div>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputPrefix" id="inputPrefix" type="radio" class="" <?php if ($valPrefix=="Mrs.") echo "checked"; ?>  value="Mrs." onclick="
                                    document.myForm.inputGender[1].checked=true    " />
                                    <div class="icon"></div>
                                    <div class="title"><?php echo $langTxt["us:mrs"]?></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:sex"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <div class="row">
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputGender" id="inputGender" type="radio" class="" checked="checked" 
                                    onclick="document.myForm.inputPrefix[0].checked=true"  <?php if ($valGender=="Male") echo "checked"; ?> value="Male"  />
                                    <div class="icon"></div>
                                    <div class="title"><?php echo $langTxt["us:male"]?></div>
                                </label>
                            </div>
                            <div class="col-auto">
                                <label class="radio-control">
                                    <input name="inputGender" id="inputGender" type="radio" class=""  onclick="document.myForm.inputPrefix[1].checked=true"  <?php if ($valGender=="Female") echo "checked"; ?> value="Female"  />
                                    <div class="icon"></div>
                                    <div class="title"><?php echo $langTxt["us:female"]?></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:firstnamet"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputfnamethai" id="inputfnamethai" type="text"  class="form-control" value="<?php echo $valFnamethai?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:lastnamet"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputlnamethai" id="inputlnamethai" type="text"  class="form-control" value="<?php echo $valLnamethai?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:firstnamete"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputfnameeng" id="inputfnameeng" type="text"  class="form-control" value="<?php echo $valFnameeng?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php echo $langTxt["us:lastnamee"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputlnameeng" id="inputlnameeng" type="text"  class="form-control" value="<?php echo $valLnameeng?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["set:position"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputPosirionUser" id="inputPosirionUser" type="text"  class="form-control" value="<?php echo $valPositionUser?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:email"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputemail" id="inputemail" type="text"  class="form-control" value="<?php echo $valEmail?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:address"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <textarea name="inputlocation"  id="inputlocation" rows="4" class="form-control"><?php echo $valAddress?></textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:tel"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputtelephone" id="inputtelephone" type="text"  class="form-control" value="<?php echo $valTelephone?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:mobile"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputmobile" id="inputmobile" type="text"  class="form-control" value="<?php echo $valMobile?>"/>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
                        <?php echo $langTxt["us:other"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputother" id="inputother" type="text"  class="form-control" value="<?php echo $valOther?>"/>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myFormHome').keypress(function(e) {
			if (e.which == 13) {
				submitSearchForm('loadContact.php');
				 return false;
			}
        });
		  
        $('#tile-page-head').html('<?php echo $valNav3;?>');  

        $('.select-control').select2({
            minimumResultsForSearch: Infinity,
            placeholder: "Select"
        });

        $('.select-control.has-search').select2({
            placeholder: "Select"
        });
    });
</script>
<?php  include("../../lib/disconnect.php");?>
