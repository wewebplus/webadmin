<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:userManage2"];
$valNav3=$langTxt["us:viewpermis"];
	
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
		".$core_tb_staff."_password , 
		".$core_tb_staff."_credate, 
		".$core_tb_staff."_lastdate , 
		".$core_tb_staff."_crebyid, 
		".$core_tb_staff."_status , 
		".$core_tb_staff."_storeid ,
		".$core_tb_staff."_unitid, 
		".$core_tb_staff."_position, 
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
			
			$valCredate=DateFormat($Row[16]);
			$valLastdate=DateFormat($Row[17]);
			$valCreby=$Row[18];
			$valStatus=$Row[19];
			$valStoreID=$Row[20];
			$valUnitID=$Row[21];
			$valPositionUser=$Row[22];
		    $valUsertype=$Row[23];
		    $valUnitIDSub=$Row[24];
			/*$valUserCar=$Row[20];
			$valUnitID=$Row[21];
			$valTypeUser=$Row[22];
			$valTypeUserShow=$coreTxtTypeProplemUser[$Row[22]];
			$valTypeApprove=$Row[23];
			$valTypeApproveShow=$coreTxtTypeApprove[$Row[23]];
			$valPart=$Row[24];
			$valPositionUser=$Row[25];*/
			 logs_access('2','View');
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
					<a href="<?php  echo $valLinkNav1?>" class="link">
						<?php  echo $valNav1?>
					</a>
				</li>
				<li>
                    <a href="javascript:void(0)" class="link" onclick="btnBackPage('loadContact.php')" target="_self">
					    <?php  echo $valNav2?>
                    </a>
				</li>
                <li class="active">
                    <?php echo $langTxt["us:viewpermis"]?>
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
                <h2 class="title typo-lg fw-medium"><?php echo $langTxt["us:viewpermis"]?></h2>
            </div>
            <div class="col-auto">
                <div class="action">
                    <a href="javascript:void(0)" class="btn p-0 btn-warning" data-title="<?php echo $langTxt["btn:edit"]?>" onclick="btnBackPage('loadEditUser.php');">
                        <span class="feather icon-edit-1"></span>
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
        <div class="card-body">
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:permission"]?>
                    </label>
                </div>
                <div class="col">
                    <?php 
                        $sql_group = "SELECT ".$core_tb_group."_id,".$core_tb_group."_name  FROM ".$core_tb_group." WHERE ".$core_tb_group."_id='".$valGroupid."'   ORDER BY ".$core_tb_group."_order DESC ";
                        $query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
                        $row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group);
                        $row_groupid=$row_group[0];
                        $row_groupname=$row_group[1];
                        echo $row_groupname;
                    ?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["txt:typeuser"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $arrTypeUser[$valUsertype]; ?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:nameuser"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valUsername?>
                </div>
            </div>
            <div class="row gutters-20">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:pass"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valPassword?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
                <?php echo $langTxt["us:titlepic"]?>
            </h3>
            <p class="desc color-mute">
                <?php echo $langTxt["us:titlepicDe"]?>
            </p>
        </div>
        <div class="card-body">
            <div class="row gutters-20">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:titlepic"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="thumb-sm" name="imgShow" id="imgShow">
                        <img src="../../upload/core/50/<?php echo $valPic?>" onerror="this.src='<?php echo "../img/btn/nouser.jpg"?>'" />
                        <input name="picnameProfile" type="hidden" id="picnameProfile" value="<?php echo $valPic?>" />
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
        <div class="card-body">
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:unitMain"]?>
                    </label>
                </div>
                <div class="col">
                    -
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:unitSub"]?>
                    </label>
                </div>
                <div class="col">
                    -
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:antecedent"]?>
                    </label>
                </div>
                <div class="col">
                    <?php if ($valPrefix=="Mr."){ echo $langTxt["us:mr"]; }else if ($valPrefix=="Miss"){ echo $langTxt["us:miss"]; }else if ($valPrefix=="Mrs."){ echo $langTxt["us:mrs"]; } ?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:sex"]?>
                    </label>
                </div>
                <div class="col">
                    <?php if ($valGender=="Male"){ echo $langTxt["us:male"]; }else if ($valGender=="Female"){ echo $langTxt["us:female"]; } ?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:firstnamet"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valFnamethai?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:lastnamet"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valLnamethai?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:firstnamete"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valFnameeng?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:lastnamee"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valLnameeng?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["set:position"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valPositionUser?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:email"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valEmail?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:address"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valAddress?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:tel"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valTelephone?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:mobile"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valMobile?>
                </div>
            </div>
            <div class="row gutters-20">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:other"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valOther?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
                <?php echo $langTxt["us:titleinfo"]?>
            </h3>
            <p class="desc color-mute">
                <?php echo $langTxt["us:titleinfoDe"]?>
            </p>
        </div>
        <div class="card-body">
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:credate"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valCredate?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:lastdate"]?>
                    </label>
                </div>
                <div class="col">
                    <?php echo $valLastdate?>
                </div>
            </div>
            <div class="row gutters-20 mb-3">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["us:creby"]?>
                    </label>
                </div>
                <div class="col">
                    <?php
                        if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
                            echo getUserThai($valCreby);
                        }else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
                            echo getUserEng($valCreby);
                        }
                    ?>
                </div>
            </div>
            <div class="row gutters-20 align-items-center">
                <div class="col-auto">
                    <label class="control-label color-gray">
                        <?php echo $langTxt["mg:status"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="btn btn-xs btn-light-success">
                        <?php echo $valStatus?>
                    </div>
                    <!-- <div class="btn btn-xs btn-light-info">
                        Home
                    </div>
                    <div class="btn btn-xs btn-light-danger">
                        Disable
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tile-page-head').html('<?php echo $valNav3;?>');
    });
  </script>
<?php  include("../../lib/disconnect.php");?>
