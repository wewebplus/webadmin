<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:perManage2"];
$valNav3=$langTxt["pr:crepermis"];	

?>
<div>
<input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch'];?>" />
<input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh'];?>" />
<input name="execute" type="hidden" id="execute" value="insert" />
<input name="PermissionAdmin" type="hidden" id="PermissionAdmin" value="" />
<input name="Permission" type="hidden" id="Permission" value="" />

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
				<h2 class="title typo-lg fw-medium"><?php  echo $langTxt["pr:crepermis"]?></h2>
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
				<?php  echo $langTxt["pr:title"]?>
            </h3>
            <p class="desc color-mute">
				<?php  echo $langTxt["pr:titleDe"]?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
						<?php  echo $langTxt["pr:pretype"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<select name="inputaccess" id="inputaccess" class="select-control">
							<option value="0"><?php  echo $langTxt["pr:select"]?></option>
							<option value="admin" <?php  if($_request['inputgh']=="admin"){ ?>selected="selected" <?php  } ?>><?php  echo $langTxt["pr:select1"]?></option>
							<option value="staff" <?php  if($_request['inputgh']=="staff"){ ?>selected="selected" <?php  } ?>><?php  echo $langTxt["pr:select2"]?></option>
						</select>
                    </div>
                </div>
            </div>

			<div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
                        <?php  echo $langTxt["pr:pername"]?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
                        <input name="inputnamegroup" id="inputnamegroup" type="text"  class="form-control"/>
                    </div>
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
			<table class="table m-0">
				<thead>
					<tr>
						<th><?php  echo $langTxt["mg:subject"]?></th>
						<th class="checkbox-menu">
							<span onclick="checkAllAdmin('AdminR');" class="color-warning">
								<?php echo $langTxt["pr:all"]?>
							</span>
						</th>
						<th class="checkbox-menu">
							<span onclick="checkAllAdmin('AdminRW');" class="color-success">
								<?php echo $langTxt["pr:all"]?>
							</span>
						</th>
						<th class="checkbox-menu">
							<span onclick="checkAllAdmin('AdminNA');" class="color-danger">
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
						<td colspan="4" align="center" valign="middle" class="color-gray" style="padding-top:150px; padding-bottom:150px;" >
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
							<?php  if($topic1[$Field."_icon"]){ ?>
								<img src="<?php  echo $topic1[$Field."_icon"]?>" />
							<?php  } else { ?> 
								- 
							<?php  } ?>
							<?php  echo $row_namelv1?>
						</td>
						<td>
							<label class="radio-control">
								<input name="Admin<?php  echo $topic1[$Field."_id"]?>" id="AdminR<?php  echo $topic1[$Field."_id"]?>" type="radio" class="" value="R" onclick="checkInSubAdmin('AdminR',<?php  echo $topic1[$Field."_id"]?>)" />
								<div class="icon"></div>
								<div class="title"><?php  echo $langTxt["pr:read"]?></div>
							</label>
						</td>
						<td>
							<label class="radio-control">
								<input name="Admin<?php  echo $topic1[$Field."_id"]?>"  id="AdminRW<?php  echo $topic1[$Field."_id"]?>"type="radio" class=""  value="RW" onclick="checkInSubAdmin('AdminRW',<?php  echo $topic1[$Field."_id"]?>)" />
								<div class="icon"></div>
								<div class="title"><?php  echo $langTxt["pr:manage"]?></div>
							</label>
						</td>
						<td>
							<label class="radio-control">
								<input name="Admin<?php  echo $topic1[$Field."_id"]?>" id="AdminNA<?php  echo $topic1[$Field."_id"]?>" type="radio" class="" value="NA" onclick="checkInSubAdmin('AdminNA',<?php  echo $topic1[$Field."_id"]?>)" />
								<div class="icon"></div>
								<div class="title"><?php  echo $langTxt["pr:noaccess"]?></div>
							</label>
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
					<tr class="sub">
						<td>
							<?php  if($subtopic1[$Field."_icon"]){ ?>
								<img src="<?php  echo $subtopic1[$Field."_icon"]?>" />
							<?php  } else{ ?> 
								- 
							<?php  } ?>
							<?php  echo $row_namelv2?>
						</td>
						<td>
							<label class="radio-control">
								<input name="Admin<?php  echo $subtopic1[$Field."_id"]?>" id="AdminR<?php  echo $subtopic1[$Field."_id"]?>" type="radio" class="" value="R" onclick="checkInSub('R',<?php  echo $subtopic1[$Field."_id"]?>)" />
								<div class="icon"></div>
								<div class="title">
									<span for="R<?php  echo $subtopic1[$Field."_id"]?>">
										<?php  echo $langTxt["pr:read"]?>
									</span>
								</div>
							</label>
						</td>
						<td>
							<label class="radio-control">
								<input name="Admin<?php  echo $subtopic1[$Field."_id"]?>"  id="AdminRW<?php  echo $subtopic1[$Field."_id"]?>"type="radio" class=""  value="RW" onclick="checkInSub('RW',<?php  echo $subtopic1[$Field."_id"]?>)" />
								<div class="icon"></div>
								<div class="title">
									<span for="RW<?php  echo $subtopic[$Field."_id"]?>">
										<?php  echo $langTxt["pr:manage"]?>
									</span>
								</div>
							</label>
						</td>
						<td>
							<label class="radio-control">
								<input name="Admin<?php  echo $subtopic1[$Field."_id"]?>" id="AdminNA<?php  echo $subtopic1[$Field."_id"]?>" type="radio" class="" value="NA" onclick="checkInSub('NA',<?php  echo $subtopic1[$Field."_id"]?>)" />
								<div class="icon"></div>
								<div class="title">
									<span for="NA<?php  echo $subtopic1[$Field."_id"]?>">
										<?php  echo $langTxt["pr:noaccess"]?>
									</span>
								</div>
							</label>
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