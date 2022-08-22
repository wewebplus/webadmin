<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-super-config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:setting"];

$sqlCheck = "SELECT " . $core_tb_setting . "_id   FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_id>=1 ";
$queryCheck = wewebQueryDB($coreLanguageSQL, $sqlCheck);
$countNumCheck = wewebNumRowsDB($coreLanguageSQL, $queryCheck);
if ($countNumCheck <= 0) {

    $insert = array();
    $insert[$core_tb_setting . "_lang"] = "'Thai'";
    $insert[$core_tb_setting . "_type"] = "'2'";
    $insert[$core_tb_setting . "_credate"] = "" . wewebNow($coreLanguageSQL) . "";
    $insert[$core_tb_setting . "_lastdate"] = "" . wewebNow($coreLanguageSQL) . "";
    $sqlInsert = "INSERT INTO " . $core_tb_setting . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
    $queryInsert = wewebQueryDB($coreLanguageSQL, $sqlInsert);
}



$sql = "SELECT 
		" . $core_tb_setting . "_id , 
		" . $core_tb_setting . "_lang, 
		" . $core_tb_setting . "_type, 
		" . $core_tb_setting . "_subject, 
		" . $core_tb_setting . "_title , 
		" . $core_tb_setting . "_titleB   , 
        " . $core_tb_setting . "_pic  ,
        " . $core_tb_setting . "_header  ,
        " . $core_tb_setting . "_bg  
		FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_id>=1 ";
$query = wewebQueryDB($coreLanguageSQL, $sql);
$row = wewebFetchArrayDB($coreLanguageSQL, $query);
$valId = $row[0];
$valLang = $row[1];
$valType = $row[2];
$valSubject = rechangeQuot($row[3]);
$valTitle = rechangeQuot($row[4]);
$valTitleB = rechangeQuot($row[5]);
$valPicName = $row[6];
$valPic = $core_pathname_crupload . "/" . $row[6];
$valHeaderName = $row[7];
$valHeader = $core_pathname_crupload . "/" . $row[7];
$valBgName = $row[8];
$valBg = $core_pathname_crupload . "/" . $row[8];

?>
<div>
<input name="execute" type="hidden" id="execute" value="update" />
<input name="myParentID" type="hidden" id="myParentID" value="<?php  echo  $_REQUEST['myParentID'] ?>" />

<div class="layout-topbar">
	<div class="row align-items-center">
		<div class="col">
			<ol class="breadcrumb">
				<li>
					<a href="<?php  echo $valLinkNav1?>" class="link">
						<?php  echo $valNav1?>
					</a>
				</li>
				<li class="active">
					<?php  echo $valNav2?>
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
				<h2 class="title typo-lg fw-medium"><?php  echo  $valNav2 ?></h2>
			</div>
			<div class="col-auto">
				<div class="action">
					<a href="javascript:void(0)" class="btn p-0 btn-warning" data-title="<?php  echo $langTxt["btn:edit"]?>" onclick="btnBackPage('loadEditSetting.php');">
						<span class="feather icon-edit-1"></span>
					</a>
				</div>
			</div>
		</div>
	</div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["st:title"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["st:titleDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo  $langTxt["st:lang"] ?>
                    </label>
                </div>
                <div class="col">
                    <?php  echo  $valLang ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo  $langTxt["st:type"] ?>
                    </label>
                </div>
                <div class="col">
                    <?php  echo  $valType ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["txt:about"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["txt:aboutDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo  $langTxt["ab:subject"] ?>
                    </label>
                </div>
                <div class="col">
                    <?php  echo  $valSubject ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo  $langTxt["ab:title"] ?>
                    </label>
                </div>
                <div class="col">
                    <?php  echo  $valTitle ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo  $langTxt["ab:titleback"] ?>
                    </label>
                </div>
                <div class="col">
                    <?php  echo  $valTitleB ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["txt:pic"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["txt:picDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo  $langTxt["txt:pic"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="thumb-sm">
                        <img src="<?php  echo  $valPic ?>" onerror="this.src='<?php  echo  "../img/btn/nopic.jpg" ?>'"  />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["txt:pic2"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["txt:pic2De"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo  $langTxt["txt:pic2"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="thumb-md">
                        <img src="<?php  echo  $valHeader ?>" onerror="this.src='<?php  echo  "../img/btn/nopic.jpg" ?>'" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["txt:pic3"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["txt:pic3De"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-label color-gray">
						<?php  echo  $langTxt["txt:pic3"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="thumb-md">
                        <img src="<?php echo $valBg ?>" onerror="this.src='<?php  echo  "../img/btn/nopic.jpg" ?>'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#tile-page-head').html('<?php echo $valNav2;?>');
		  
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
