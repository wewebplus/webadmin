<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:logs"];


?>
<div>
<?php 
// Check to set default value #########################
	$module_default_pagesize = $core_default_pagesize;
	$module_default_maxpage = $core_default_maxpage;
	$module_default_reduce = $core_default_reduce;
	$module_default_pageshow = 1;
	$module_sort_number = $core_sort_number;

	if ($_REQUEST['module_pagesize'] == "") {
		$module_pagesize = $module_default_pagesize;
	} else {
		$module_pagesize = $_REQUEST['module_pagesize'];
	}

	if ($_REQUEST['module_pageshow'] == "") {
		$module_pageshow = $module_default_pageshow;
	} else {
		$module_pageshow = $_REQUEST['module_pageshow'];
	}

	if ($_REQUEST['module_adesc'] == "") {
		$module_adesc = $module_sort_number;
	} else {
		$module_adesc = $_REQUEST['module_adesc'];
	}

	if ($_REQUEST['module_orderby'] == "") {
		$module_orderby = $core_tb_log . "_time";
	} else {
		$module_orderby = $_REQUEST['module_orderby'];
	}

	if ($_REQUEST['inputSearch'] != "") {
		$inputSearch = trim($_REQUEST['inputSearch']);
	} else {
		$inputSearch = $_REQUEST['inputSearch'];
	}
	
	$sqlSelect ="
	".$core_tb_log."_action, 
	".$core_tb_log."_sessid, 
	".$core_tb_log."_sid, 
	".$core_tb_log."_sname, 
	".$core_tb_log."_ip, 
	".$core_tb_log."_time, 
	".$core_tb_log."_type, 
	".$core_tb_log."_actiontype 	, 
	".$core_tb_log."_url, 
	".$core_tb_log."_key, 
	".$core_tb_log."_menuid
	";
	$sqlWhere =" WHERE 1=1";
	$sqlSearch ="";
	
	if($_SESSION[$valSiteManage."core_session_level"]=="admin"){
		$sqlSearch ="";
	}else{
		$sqlSearch =" AND " . $core_tb_log . "_actiontype ='" . $_REQUEST['inputGh'] . "'  ";
	}
	
	if ($inputSearch <> "") {
		$sqlSearch = $sqlSearch . "  AND   ( " . $core_tb_log . "_url LIKE '%$inputSearch%'  OR  " . $core_tb_log . "_action LIKE '%$inputSearch%'OR " . $core_tb_log . "_sname LIKE '%$inputSearch%' OR " . $core_tb_log . "_ip LIKE '%$inputSearch%'   ) ";
	}
	
	if($_REQUEST['sdateInput']<>"" && $_REQUEST['edateInput']<>"" ) {
		$valSdate =DateFormatInsertNoTime($_REQUEST['sdateInput']);
		$valEdate =DateFormatInsertNoTime($_REQUEST['edateInput']);
		
		$sqlSearch = $sqlSearch."  AND  (".$core_tb_log."_time BETWEEN '".$valSdate." 00:00:00' AND '".$valEdate." 23:59:59')  ";
	
	}
		
	if ($_REQUEST['inputGh'] >= 1) {
		$sqlSearch = $sqlSearch . "  AND " . $core_tb_log . "_actiontype ='" . $_REQUEST['inputGh'] . "'   ";
	}
			

	$sql_export = "SELECT  ".$sqlSelect."  FROM " . $core_tb_log;
	$sql_export .= $sqlWhere;
	$sql_export .=$sqlSearch ;
	$sql_export .= " ORDER BY $module_orderby  DESC ";
	/*################ Replace SQL To Export ##############*/
	
	$sql_export = str_replaceExport($sql_export,"1");
	

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
				<h2 class="title typo-lg fw-medium"><?php  echo $valNav2?></h2>
			</div>
			<div class="col-auto"></div>
		</div>
	</div>

    <div class="filter">
        <div class="card">
			<div class="card-body">
				<div class="row gutters-10">
                    <div class="col">
                        <div class="block-control has-icon">
                            <span class="icon feather icon-calendar"></span>
                            <input type="text" class="form-control datepicker" name="sdateInput"  id="sdateInput"  placeholder="<?php echo $langTxt["tit:sSedate"]?>" autocomplete="off"  value="<?php echo trim($_REQUEST['sdateInput'])?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="block-control has-icon">
                            <span class="icon feather icon-calendar"></span>
                            <input type="text" class="form-control datepicker" name="edateInput"  id="edateInput"  placeholder="<?php echo $langTxt["tit:eSedate"]?>" autocomplete="off" value="<?php echo trim($_REQUEST['edateInput'])?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="block-control">
                            <select name="inputGh"  id="inputGh" class="select-control" onchange="submitSearchForm('loadContact.php');" >
                                <option value="0"><?php echo  $langTxt["tit:typeAccessSle"] ?> </option>
                                    <?php 
                                    $countTypeAccessArray=count($coreTxtTypeAccess);
                                    for($iType=1;$iType<$countTypeAccessArray;$iType++){
                                    ?>
                                    <option value="<?php echo $iType?>" <?php  if ($_REQUEST['inputGh'] == $iType) { ?> selected="selected" <?php  } ?> >
                                        <?php echo $coreTxtTypeAccess[$iType]?>
                                    </option>
                                    <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="block-control">
                            <input name="inputSearch" type="text"  id="inputSearch" value="<?php  echo trim($_REQUEST['inputSearch'])?>" class="form-control"  placeholder="<?php echo $langTxt["sch:keyword"];?>"/>
                        </div>
                    </div>
                    <div class="col-auto">
						<button type="button" class="btn btn-primary" onclick="submitSearchForm('loadContact.php');">
							<span class="feather icon-search"></span>
						</button>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
				<div class="col">
					<h3 class="title typo-sm color-primary"><?php  echo $valNav2?></h3>
				</div>
				<div class="col-auto">
					<div class="action">
						<a class="btn btn-gray p-0" href="#" data-title="Export PDF">
                            <img src="../img/iconfile/1.png">
                        </a>
                        <a class="btn btn-gray p-0" href="#" data-title="Export Excel">
                            <img src="../img/iconfile/3.png">
                        </a>
					</div>
				</div>
			</div>
        </div>
        <div class="card-body p-0">
			<table class="table m-0">
                <thead>
                    <tr>
                        <th><?php echo $langTxt["mg:subject"]?></th>
                        <th><?php echo $langTxt["us:creby"]?></th>
                        <th>IP</th>
                        <th><?php echo $langMod["tit:typeAccess"]?></th>
                        <th><?php echo $langTxt["home:access"]?></th>
                        <th><?php echo $langTxt["home:date"]?></th>
                    </tr>
                </thead>
                <tbody>
                <?php 			
                    // SQL SELECT #########################
                    $sql = "SELECT ".$sqlSelect."  FROM " . $core_tb_log;
                    $sql .= $sqlWhere;
                    $sql .=$sqlSearch ;

                    $query = wewebQueryDB($coreLanguageSQL,$sql);
                    $count_totalrecord = wewebNumRowsDB($coreLanguageSQL,$query);

                    // Find max page size #########################
                    if ($count_totalrecord > $module_pagesize) {
                        $numberofpage = ceil($count_totalrecord / $module_pagesize);
                    } else {
                        $numberofpage = 1;
                    }

                    // Recover page show into range #########################
                    if ($module_pageshow > $numberofpage) {
                        $module_pageshow = $numberofpage;
                    }

                    // Select only paging range #########################
                    $recordstart = ($module_pageshow - 1) * $module_pagesize;

                    $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";

                    $query = wewebQueryDB($coreLanguageSQL,$sql);
                    $count_record = wewebNumRowsDB($coreLanguageSQL,$query);
                    $index = 1;
                    $valDivTr = "divSubOverTb";
                    if ($count_record > 0) {
                        while ($index < $count_record + 1) {
                            $row = wewebFetchArrayDB($coreLanguageSQL,$query);
                            $valStatus = $row[0];
                            
                            $valSid = rechangeQuot($row[2]);
                            if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
                                $valName= getUserThai($valSid);
                            }else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
                                $valName= getUserEng($valSid);
                            }
                            
                            if($valName==""){
                                $valName = rechangeQuot($row[4]);
                            }
                            
                            $valIP = rechangeQuot($row[4]);
                            $valDateCredate = dateFormatReal($row[5]);
                            $valTimeCredate = timeFormatReal($row[5]);
                            
                            $valActiontype=$row[7];
                            $valUrl=$row[8];
                            $valMenuid=$row[10];
                            
                            if($valActiontype==1){
                                $valSubject=$langTxt["home:login"];
                            }else if($valActiontype==2){
                                $valSubject=$langTxt["nav:userManage2"];
                            }else if($valActiontype==3){
                                $valSubject=getNameMenu($valMenuid);
                            }else if($valActiontype==4){
                                $valSubject=$langTxt["nav:perManage2"];
                            }else{
                                $valSubject=$valUrl;
                            }

                            if ($valDivTr == "divSubOverTb") {
                                $valDivTr = "divOverTb";
                            } else {
                                $valDivTr = "divSubOverTb";
                            }
                    ?>
                    <tr>
                        <td><?php echo  $valSubject ?></td>
                        <td><?php echo  $valName ?></td>
                        <td><?php echo  $valIP ?></td>
                        <td><?php echo $modTxtTypeAccess[$valActiontype]?></td>
                        <td><?php echo  $valStatus ?></td>
                        <td>
                            <?php echo  $valDateCredate ?>
                            <div class="typo-xs color-mute"><?php echo  $valTimeCredate ?></div>
                        </td>
                    </tr>
                    <?php 
                    $index++;
                    }
                    } else {
                    ?>
                    <tr >
                        <td colspan="6" align="center"  valign="middle"  class="color-gray" style="padding-top:150px; padding-bottom:150px;" >
                            <?php echo  $langTxt["mg:nodate"] ?>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer p-0">
            <div class="pagination">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <?php  echo $langTxt["pr:All"]?> 
                        <span class="fw-medium"><?php  echo number_format($count_totalrecord)?></span> 
                        <?php  echo $langTxt["pr:record"]?>
                    </div>
                    <div class="col-auto">
                        <div class="jumpto">
                            <div class="row gutters-10 align-items-center">
                                <div class="col-auto">
                                    ไปหน้า
                                </div>
                                <div class="col">
                                    <div class="select-wrapper">
                                        <select name="" id="" class="select-control has-search" style="width: 100%;">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="1">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="pagination-list">
                            <ul class="nav-list">
                                <li>
                                    <a href="#" class="link">
                                        <span class="feather icon-chevrons-left"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="link">
                                        <span class="feather icon-chevron-left"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="link active">1</a>
                                </li>
                                <li>
                                    <a href="#" class="link">2</a>
                                </li>
                                <li>
                                    <a href="#" class="link">3</a>
                                </li>
                                <li>
                                    <a href="#" class="link">..</a>
                                </li>
                                <li>
                                    <a href="#" class="link">10</a>
                                </li>
                                <li>
                                    <a href="#" class="link">
                                        <span class="feather icon-chevron-right"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="link">
                                        <span class="feather icon-chevrons-right"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php  echo $index-1?>" />
        </div>
    </div>
</div>

<script language="JavaScript" type="text/javascript" src="../js/main.js<?php echo $core_cache_browser;?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myFormHome').keypress(function(e) {
            if (e.which == 13) {
                submitSearchForm('loadContact.php');
                return false;
            }
        });
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
