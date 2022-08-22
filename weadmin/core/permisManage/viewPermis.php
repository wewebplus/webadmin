<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:perManage2"];
$valNav3=$langTxt["pr:viewpermis"];
	
 		$sql = "SELECT ".$core_tb_group."_id , ".$core_tb_group."_name, ".$core_tb_group."_lv  FROM ".$core_tb_group." WHERE ".$core_tb_group."_id='".$_POST["valEditID"]."'";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			$Row=wewebFetchArrayDB($coreLanguageSQL,$Query);
			$valId=$Row[0];
			$valName=$Row[1];
			$valLv=$Row[2];
			
			logs_access('4','View');
?>
<div>
<input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch'];?>" />
<input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh'];?>" />
<input name="execute" type="hidden" id="execute" value="update" />
<input name="PermissionAdmin" type="hidden" id="PermissionAdmin" value="" />
<input name="Permission" type="hidden" id="Permission" value="" />

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
					<a href="javascript:void(0)" onclick="btnBackPage('loadContact.php')" target="_self" class="link">
						<?php  echo $valNav2?>
					</a>
				</li>
				<li class="active">
					<?php  echo $valNav3?>
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
				<h2 class="title typo-lg fw-medium"><?php  echo $langTxt["pr:viewpermis"]?></h2>
			</div>
			<div class="col-auto">
				<div class="action">
					<a href="javascript:void(0)" class="btn p-0 btn-warning" data-title="<?php  echo $langTxt["btn:edit"]?>" onclick="btnBackPage('loadEditPermis.php');">
						<span class="feather icon-edit-1"></span>
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
				<?php echo $langTxt["pr:title"]?>
            </h3>
            <p class="desc color-mute">
				<?php echo $langTxt["pr:titleDe"]?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo $langTxt["pr:pretype"]?>
                    </label>
                </div>
                <div class="col">
                    <?php if($valLv=="admin"){ echo $langTxt["pr:select1"]; }else if($valLv=="staff"){ echo $langTxt["pr:select2"]; } ?>
                </div>
            </div>

			<div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo $langTxt["pr:pername"]?>
                    </label>
                </div>
                <div class="col">
					<?php  echo $valName?>
                </div>
            </div>
		</div>
	</div>

	<div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo $langTxt["pr:titlePer"]?>
            </h3>
            <p class="desc color-mute">
				<?php  echo $langTxt["pr:titlePerDe"]?>
            </p>
        </div>
		<div class="card-body p-0">
			<table class="table mb-0">
				<thead>
					<tr>
						<th><?php  echo $langTxt["mg:subject"]?></th>
						<th class="checkbox-menu">
							<span class="color-warning">
								<?php echo $langTxt["pr:all"]?>
							</span>
						</th>
						<th class="checkbox-menu">
							<span class="color-success">
								<?php echo $langTxt["pr:all"]?>
							</span>
						</th>
						<th class="checkbox-menu">
							<span class="color-danger">
								<?php echo $langTxt["pr:all"]?>
							</span>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						// Admin
						$Field=$core_tb_menu;
						$sqlTopic="SELECT * FROM ".$core_tb_menu." WHERE  ".$core_tb_menu."_parentID = '0' AND ".$core_tb_menu."_status = 'Enable'     ORDER BY ".$Field."_order";
						$QueryTopic=wewebQueryDB($coreLanguageSQL,$sqlTopic) ;

						if(wewebNumRowsDB($coreLanguageSQL,$QueryTopic)<=0){
						?>
						<tr >
							<td colspan="4" align="center"  valign="middle"  class="color-gray" style="padding-top:150px; padding-bottom:150px;" >
								<?php  echo $langTxt["mg:nodate"]?>
							</td>
						</tr>
						<?php  }else{
								$topicIndex=0;	
								while($topic1=wewebFetchArrayDB($coreLanguageSQL,$QueryTopic)){
								$dataArrAdmin[$topicIndex][0]=$topic1[$Field."_id"];
								$dataArrAdmin[$topicIndex][1]=$topic1[$Field."_id"];
								
								if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
									$row_namelv1=$topic1[$Field."_namethai"];
								}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
									$row_namelv1=$topic1[$Field."_nameeng"];
								}
						$topicIndex+=1;	
					?>
					<tr>
						<td>
							<?php  if($topic1[$Field."_icon"]){ ?><img src="<?php  echo $topic1[$Field."_icon"]?>" border="0" align="absmiddle"  hspace="10" /><?php  } else{ ?> - <?php  } ?><?php  echo $row_namelv1?>
						</td>
						<td>
							<div class="text-center">
								<img src="../img/btn/blank.gif" width="11" height="11" id="R<?php  echo $topic1[$Field."_id"]?>" name="R<?php  echo $topic1[$Field."_id"]?>" />
								<span><?php echo $langTxt["pr:read"]?></span>
							</div>
						</td>
						<td>
							<div class="text-center">
								<img src="../img/btn/blank.gif" width="11" height="11" id="RW<?php  echo $topic1[$Field."_id"]?>" name="RW<?php  echo $topic1[$Field."_id"]?>"/>
								<span><?php  echo $langTxt["pr:manage"]?></span>
							</div>
						</td>
						<td>
							<div class="text-center">
								<img src="../img/btn/blank.gif" width="11" height="11" id="NA<?php  echo $topic1[$Field."_id"]?>" name="NA<?php  echo $topic1[$Field."_id"]?>"/>
								<span><?php  echo $langTxt["pr:noaccess"]?></span>
							</div>   
						</td>
					</tr>
					<?php 
						$sqlSub="SELECT * FROM ".$core_tb_menu." WHERE   ".$core_tb_menu."_parentID = '".$topic1[$Field."_id"]."'   AND ".$core_tb_menu."_status = 'Enable'    ORDER BY ".$Field."_order";
						$QuerySub=wewebQueryDB($coreLanguageSQL,$sqlSub);
						if(wewebNumRowsDB($coreLanguageSQL,$QuerySub)>=1){
							while($subtopic1=wewebFetchArrayDB($coreLanguageSQL,$QuerySub)){
							$dataArrAdmin[$topicIndex][0]=$subtopic1[$Field."_id"];
							$dataArrAdmin[$topicIndex][1]=$subtopic1[$Field."_id"];
							
							if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
								$row_namelv2=$subtopic1[$Field."_namethai"];
							}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
								$row_namelv2=$subtopic1[$Field."_nameeng"];
							}
						$topicIndex+=1;
					?>
					<tr>
						<td>
							<?php  if($subtopic1[$Field."_icon"]){ ?><img src="<?php  echo $subtopic1[$Field."_icon"]?>" border="0" align="absmiddle"   hspace="10"/><?php  } else{ ?> - <?php  } ?><?php  echo $row_namelv2?>
						</td>
						<td>
							<div class="text-center">
								<img src="../img/btn/blank.gif" width="11" height="11" id="R<?php  echo $subtopic1[$Field."_id"]?>"  name="R<?php  echo $subtopic1[$Field."_id"]?>" />
								<span><?php  echo $langTxt["pr:read"]?></span>
							</div>
						</td>
						<td>
							<div class="text-center">
								<img src="../img/btn/blank.gif" width="11" height="11" id="RW<?php  echo $subtopic1[$Field."_id"]?>"  name="RW<?php  echo $subtopic1[$Field."_id"]?>" />
								<span><?php  echo $langTxt["pr:manage"]?></span>
							</div>
						</td>
						<td>
							<div class="text-center">
								<img src="../img/btn/blank.gif" width="11" height="11" id="NA<?php  echo $subtopic1[$Field."_id"]?>"  name="NA<?php  echo $subtopic1[$Field."_id"]?>" />
								<span><?php  echo $langTxt["pr:noaccess"]?></span>
							</div>
						</td>
					</tr>
					<?php 
					}
					} ?>
					<?php  
					}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tile-page-head').html('<?php echo $valNav3;?>'); 
    });
</script>
<?php  include("../../lib/disconnect.php");?>
