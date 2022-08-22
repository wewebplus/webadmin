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
                            <h2 class="title">
                               <span class="fontContantTbNav"><a href="<?php  echo $valLinkNav1?>" target="_self"><?php  echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo $valNav2?></span>
                            </h2>
                        </div>
                        
                    </div>
                </div>
<div class="layout-content">
    <div class="filter">
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
            
        </div>
        <div class="row gutters-10">
            
            <div class="col">
                <div class="block-control">
                    <select name="inputGh"  id="inputGh" class="form-control" onchange="submitSearchForm('loadContact.php');" >
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
                <button type="button" class="btn btn-gray" onclick="submitSearchForm('loadContact.php');" >
                    <span class="feather icon-search"></span>
                </button>
            </div>
        </div>                    
    </div>
      <div class="layout-old">
  

					
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo $valNav2?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                       <div  class="btnExport" title="<?php echo  $langTxt["btn:export"] ?>" onclick="
                                                                document.myFormHomeExport.action = 'exportReport.php';
                                                                document.myFormHomeExport.submit();
                                                              "><?php echo  $langTxt["btn:export"] ?></div>
                                                              
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center"   class="tbBoxListwBorder">
                                <tr ><td align="left"   valign="middle"  class="divRightTitleTbL" style="height:30px; padding-left:10px;" ><span class="fontTitlTbRight"><?php echo $langTxt["mg:subject"]?></span></td>
                                    <td width="20%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php echo $langTxt["us:creby"]?></span></td>

                                    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight">IP</span></td>
                                    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php echo $langMod["tit:typeAccess"]?></span></td>
                                    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php echo $langTxt["home:access"]?></span></td>
                                    <td width="12%"  class="divRightTitleTbR"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php echo $langTxt["home:date"]?></span></td>
                                </tr>
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
                                        <tr class="<?php echo  $valDivTr ?>" >
                                            <td  class="divRightContantOverTbL"   valign="top" align="left" >
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td align="left" style="padding-top:3px; padding-left:10px;" >
                                                           <div class="widthDiv">
                                                         <span class="fontContantTbupdate"><?php echo  $valSubject ?></span></div></td>
                                                    </tr>
                                                </table></td>

                                            <td  class="divRightContantOverTb"  valign="top"  align="center"><span class="fontContantTbupdate"><?php echo  $valName ?></span></td>
                                            <td  class="divRightContantOverTb"  valign="top"  align="center"><span class="fontContantTbupdate"><?php echo  $valIP ?></span></td>
                                            <td  class="divRightContantOverTb"  valign="top"  align="center"><span class="fontContantTbupdate"><?php echo $modTxtTypeAccess[$valActiontype]?></span></td>
                                            <td  class="divRightContantOverTb"  valign="top"  align="center">

                                            
                                                    <span class="fontContantTbupdate"><?php echo  $valStatus ?></span>                                                                                        </td>
                                            <td  class="divRightContantOverTbR"  valign="top"  align="center">
                                                <span class="fontContantTbupdate"><?php echo  $valDateCredate ?></span><br/>
                                                <span class="fontContantTbTime"><?php echo  $valTimeCredate ?></span>    </td>
                                        </tr>

                                        <?php 
                                        $index++;
                                    }
                                } else {
                                    ?>
                                    <tr >
                                        <td colspan="6" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?php echo  $langTxt["mg:nodate"] ?></td>
                                    </tr>
                                <?php  } ?>

                                <tr >
                                    <td colspan="7" align="center"  valign="middle"  class="divRightContantTbRL" ><table width="98%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                            <tr>
                                                <td  class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?php echo  $langTxt["pr:All"] ?> <b><?php echo  number_format($count_totalrecord) ?></b> <?php echo  $langTxt["pr:record"] ?></span></td>
                                                <td  class="divRightNavTb" align="right">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td align="right" style="padding-right:10px;"><span class="fontContantTbNavPage"><?php echo  $langTxt["pr:page"] ?>
                                                                    <?php  if ($numberofpage > 1) { ?>
                                                                        <select name="toolbarPageShow"  class="formSelectContantPage" onchange="document.myFormHome.module_pageshow.value = this.value;
                                                                                btnBackPage('loadContact.php');
                                                                                ">
                                                                            <?php 
                                                                            if ($numberofpage < $module_default_maxpage) {
                                                                                // Show page list #########################
                                                                                for ($i = 1; $i <= $numberofpage; $i++) {
                                                                                    echo "<option value=\"$i\"";
                                                                                    if ($i == $module_pageshow) {
                                                                                        echo " selected";
                                                                                    }
                                                                                    echo ">$i</option>";
                                                                                }
                                                                            } else {
                                                                                // # If total page count greater than default max page  value then reduce page select size #########################
                                                                                $starti = $module_pageshow - $module_default_reduce;
                                                                                if ($starti < 1) {
                                                                                    $starti = 1;
                                                                                }
                                                                                $endi = $module_pageshow + $module_default_reduce;
                                                                                if ($endi > $numberofpage) {
                                                                                    $endi = $numberofpage;
                                                                                }
                                                                                //#####################
                                                                                for ($i = $starti; $i <= $endi; $i++) {
                                                                                    echo "<option value=\"$i\"";
                                                                                    if ($i == $module_pageshow) {
                                                                                        echo " selected";
                                                                                    }
                                                                                    echo ">$i</option>";
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                <?php  } else { ?>
                                                                        <b><?php echo  $module_pageshow ?></b>
                                                            <?php  } ?>
                                                            <?php echo  $langTxt["pr:of"] ?> <b><?php echo  $numberofpage ?></b></span></td>
                                                            <?php  if ($module_pageshow > 1) { ?>
                                                                <td width="21" align="center"> <img src="../img/controlpage/playset_start.gif" width="21" height="21"
                                                                                                    onmouseover="this.src = '../img/controlpage/playset_start_active.gif';
                                                                                                            this.style.cursor = 'hand';"
                                                                                                    onmouseout="this.src = '../img/controlpage/playset_start.gif';"
                                                                                                    onclick="document.myFormHome.module_pageshow.value = 1;
                                                                                                            btnBackPage('loadContact.php');"  style="cursor:pointer;" /></td>
                                                            <?php  } else { ?>
                                                                <td width="21" align="center"><img src="../img/controlpage/playset_start_disable.gif" width="21" height="21" /></td>
<?php  } ?>
<?php 
if ($module_pageshow > 1) {
    $valPrePage = $module_pageshow - 1;
    ?>
                                                                <td width="21" align="center"> <img src="../img/controlpage/playset_backward.gif" width="21" height="21"  style="cursor:pointer;"
                                                                                                    onmouseover="this.src = '../img/controlpage/playset_backward_active.gif';
                                                                                                            this.style.cursor = 'hand';"
                                                                                                    onmouseout="this.src = '../img/controlpage/playset_backward.gif';"
                                                                                                    onclick="document.myFormHome.module_pageshow.value = '<?php echo  $valPrePage ?>';
                                                                                                            btnBackPage('loadContact.php');" /></td>
                                                                <?php  } else { ?>
                                                                <td width="21" align="center"><img src="../img/controlpage/playset_backward_disable.gif" width="21" height="21" /></td>
                                                                <?php  } ?>
                                                            <td width="21" align="center"> <img src="../img/controlpage/playset_stop.gif" width="21" height="21"   style="cursor:pointer;"
                                                                                                onmouseover="this.src = '../img/controlpage/playset_stop_active.gif';
                                                                                                        this.style.cursor = 'hand';"
                                                                                                onmouseout="this.src = '../img/controlpage/playset_stop.gif';"
                                                                                                onclick="
                                                                                                        with (document.myFormHome) {
                                                                                                            module_pageshow.value = '';
                                                                                                            module_pagesize.value = '';
                                                                                                            module_orderby.value = '';
                                                                                                            btnBackPage('loadContact.php');
                                                                                                        }
                                                                                                " /></td>
                                                                <?php 
                                                                if ($module_pageshow < $numberofpage) {
                                                                    $valNextPage = $module_pageshow + 1;
                                                                    ?>
                                                                <td width="21" align="center"> <img src="../img/controlpage/playset_forward.gif" width="21" height="21"   style="cursor:pointer;"
                                                                                                    onmouseover="this.src = '../img/controlpage/playset_forward_active.gif';
                                                                                                            this.style.cursor = 'hand';"
                                                                                                    onmouseout="this.src = '../img/controlpage/playset_forward.gif';"
                                                                                                    onclick="document.myFormHome.module_pageshow.value = '<?php echo  $valNextPage ?>';
                                                                                                            btnBackPage('loadContact.php');" /></td>
<?php  } else { ?>
                                                                <td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
<?php  } ?>
                    <?php  if ($module_pageshow < $numberofpage) { ?>
                                                                <td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21"   style="cursor:pointer;"
                                                                                                   onmouseover="this.src = '../img/controlpage/playset_end_active.gif';
                                                                                                           this.style.cursor = 'hand';"
                                                                                                   onmouseout="this.src = '../img/controlpage/playset_end.gif';"
                                                                                                   onclick="document.myFormHome.module_pageshow.value = '<?php echo  $numberofpage ?>';
                                                                                                           btnBackPage('loadContact.php');" /></td>
<?php  } else { ?>
                                                                <td width="10" align="center"><img src="../img/controlpage/playset_end_disable.gif" width="21" height="21" /></td>
<?php  } ?>
                                                        </tr>
                                                    </table>                        </td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table>
                      <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php echo  $index - 1 ?>" />
                            <div class="divRightContantEnd"></div>
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
		  
		  
    });
  </script>
<?php  include("../../lib/disconnect.php");?>
