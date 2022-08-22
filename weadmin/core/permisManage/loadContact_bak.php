<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:perManage2"];
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
                        $module_orderby = $core_tb_group . "_order";
                    } else {
                        $module_orderby = $_REQUEST['module_orderby'];
                    }

                    if ($_REQUEST['inputSearch'] != "") {
                        $inputSearch = trim($_REQUEST['inputSearch']);
                    } else {
                        $inputSearch = $_REQUEST['inputSearch'];
                    }

                    $sqlSearch = "";

                    if ($inputSearch <> "") {
                        $sqlSearch = $sqlSearch . "  AND   ( " . $core_tb_group . "_name LIKE '%$inputSearch%'  )   ";
                    }

                    if ($_REQUEST['inputGh'] == "staff" || $_REQUEST['inputGh'] == "admin") {
                        $sqlSearch = $sqlSearch . "  AND    " . $core_tb_group . "_lv='" . $_REQUEST['inputGh'] . "'  ";
                    }
                    ?>
<div class="layout-topbar">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="title">
                               <span class="fontContantTbNav"><a href="<?php  echo $valLinkNav1?>" target="_self"><?php  echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php  echo $valNav2?></span>
                            </h2>
                        </div>
                        <div class="col-auto">
                            
                        </div>
                    </div>
                </div>
<div class="layout-content">
    <div class="filter">
        <div class="card">
			<div class="card-body">
				<div class="row gutters-10">
					<div class="col">
						<div class="block-control">
							<select name="inputGh"  id="inputGh" class="select-control" style="width: 100%;" onchange="submitSearchForm('loadContact.php');">
                                <option value="0"><?php  echo  $langTxt["pr:select"] ?></option>
                                <option value="admin" <?php  if ($_request['inputgh'] == "admin") { ?>selected="selected" <?php  } ?>><?php  echo  $langTxt["pr:select1"] ?></option>
                                <option value="staff" <?php  if ($_request['inputgh'] == "staff") { ?>selected="selected" <?php  } ?>><?php  echo  $langTxt["pr:select2"] ?></option>
							</select>
						</div>
					</div>
					<div class="col">
						<div class="block-control">
							<input name="inputSearch" type="text"  id="inputSearch" value="<?php  echo trim($_REQUEST['inputSearch'])?>" class="form-control"  placeholder="<?php echo $langTxt["sch:keyword"];?>"/>
						</div>
					</div>
					<div class="col-auto">
						<button type="button" class="btn btn-default" onclick="submitSearchForm('loadContact.php');" >
							<span class="feather icon-search"></span>
						</button>
					</div>
				</div>  
			</div>
		</div>                  
    </div>
    <div class="layout-old">
                        <input name="masterkey" type="hidden" id="masterkey" value="<?php  echo  $_REQUEST['masterkey'] ?>" />
                        <input name="menukeyid" type="hidden" id="menukeyid" value="<?php  echo  $_REQUEST['menukeyid'] ?>" />
                        <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php  echo  $module_pageshow ?>" />
                        <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php  echo  $module_pagesize ?>" />
                        <input name="module_orderby" type="hidden" id="module_orderby" value="<?php  echo  $module_orderby ?>" />
                        
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $valNav2 ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <div  class="btnAdd" title="<?php  echo  $langTxt["btn:add"] ?>" onclick="editContactNew('loadAddPermis.php');"><?php  echo  $langTxt["btn:add"] ?></div>
                                                    <div  class="btnDel" title="<?php  echo  $langTxt["btn:del"] ?>"   onclick="
                                                            if (Paging_CountChecked('CheckBoxID', document.myFormHome.TotalCheckBoxID.value) > 0) {
                                                                if (confirm('<?php  echo  $langTxt["mg:delpermis"] ?>')) {
                                                                     editContactNew('deletePermis.php');
                                                                }
                                                            } else {
                                                                alert('<?php  echo  $langTxt["mg:selpermis"] ?>');
                                                            }
                                                          "><?php  echo  $langTxt["btn:del"] ?></div>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="divRightMain" >
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxListwBorder">
                                <tr ><td width="3%"  class="divRightTitleTbL"  valign="middle" align="center" >
                                        <input name="CheckBoxAll" type="checkbox"  id="CheckBoxAll"  value="Yes" onclick="Paging_CheckAll(this, 'CheckBoxID', document.myFormHome.TotalCheckBoxID.value)"   class="formCheckboxHead" />    </td>

                                    <td  class="divRightTitleTb"   valign="middle" align="left" ><span class="fontTitlTbRight"><?php  echo  $langTxt["pr:subject"] ?></span></td>
                                    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php  echo  $langTxt["mg:status"] ?></span></td>
                                    <td width="12%"  class="divRightTitleTb"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php  echo  $langTxt["us:credate"] ?></span></td>
                                    <td width="12%"  class="divRightTitleTbR"  valign="middle"  align="center"><span class="fontTitlTbRight"><?php  echo  $langTxt["mg:manage"] ?></span></td>
                                </tr>
                                <?php 
                                // Value SQL SELECT #########################
                                $sqlSelect = "" . $core_tb_group . "_id," . $core_tb_group . "_name," . $core_tb_group . "_credate," . $core_tb_group . "_status";
                              
                                // SQL SELECT #########################
                                $sql = "SELECT " . $sqlSelect . "  FROM " . $core_tb_group . "  WHERE " . $core_tb_group . "_id>0  ";
                                //$sql = $sql ." AND  " . $core_tb_group . "_typemini !='1' ";
                                
                                if(!empty($_REQUEST['inputGh']) && ($_REQUEST['inputGh'] == "minisite")){
                                    $sql = $sql ."AND ".$core_tb_group."_typemini = '1'  ";
                                  } else {
                                    $sql = $sql ."AND ".$core_tb_group."_typemini != '1'  ";
                                  }
  
                                  
                                $sql = $sql . $sqlSearch;
                                
                                $query = wewebQueryDB($coreLanguageSQL, $sql);
                                $count_totalrecord = wewebNumRowsDB($coreLanguageSQL, $query);

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

                                if ($coreLanguageSQL == "mssql") {
                                    $module_pagesize = $module_pagesize + $recordstart;
                                    $recordstart = $recordstart + 1;
                                }


                                if ($coreLanguageSQL == "mssql") {

                                    $sql = "SELECT " . $sqlSelect . " FROM (SELECT     RuningCount = ROW_NUMBER() OVER (ORDER BY " . $module_orderby . "  " . $module_adesc . " ),*  FROM   " . $core_tb_group;
                                    $sql .="  WHERE " . $core_tb_group . "_id>0";
                                    $sql.="   ) AS LogWithRowNumbers  WHERE   (RuningCount BETWEEN " . $recordstart . "  AND " . $module_pagesize . " )";
                                    $sql.=$sqlSearch;
                                } else {
                                    $sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";
                                }

                                $query = wewebQueryDB($coreLanguageSQL, $sql);
                                $count_record = wewebNumRowsDB($coreLanguageSQL, $query);
                                $index = 1;
                                $valDivTr = "divSubOverTb";
                                if ($count_record > 0) {
                                    while ($index < $count_record + 1) {
                                        $row = wewebFetchArrayDB($coreLanguageSQL, $query);
                                        $valID = $row[0];
                                        $valName = $row[1];
                                        $valDateCredate = dateFormatReal($row[2]);
                                        $valTimeCredate = timeFormatReal($row[2]);
                                        $valStatus = $row[3];
                                        if ($valStatus == "Enable") {
                                            $valStatusClass = "fontContantTbEnable";
                                        } else {
                                            $valStatusClass = "fontContantTbDisable";
                                        }

                                        if ($valDivTr == "divSubOverTb") {
                                            $valDivTr = "divOverTb";
                                        } else {
                                            $valDivTr = "divSubOverTb";
                                        }
                                        ?>
                                        <tr class="<?php  echo  $valDivTr ?>" >
                                            <td  class="divRightContantOverTbL"  valign="top" align="center" ><input  id="CheckBoxID<?php  echo  $index ?>" name="CheckBoxID<?php  echo  $index ?>" type="checkbox" class="formCheckboxList" onclick="Paging_CheckAllHandle(document.myFormHome.CheckBoxAll, 'CheckBoxID', document.myFormHome.TotalCheckBoxID.value)" value="<?php  echo  $valID ?>" />    </td>
                                            <td  class="divRightContantOverTb"   valign="top" align="left" ><a  href="javascript:void(0)"  onclick="
                                                    document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                                    editContactNew('viewPermis.php');" ><?php  echo  $valName ?></a></td>
                                            <td  class="divRightContantOverTb"  valign="top"  align="center">
                                                <div   id="load_status<?php  echo  $valID ?>">
        <?php  if ($valStatus == "Enable") { ?>

                                                        <a href="javascript:void(0)"  onclick="changeStatus('load_waiting<?php  echo  $valID ?>', '<?php  echo  $core_tb_group ?>', '<?php  echo  $valStatus ?>', '<?php  echo  $valID ?>', 'load_status<?php  echo  $valID ?>', '../core/statusMg.php')" ><span class="<?php  echo  $valStatusClass ?>"><?php  echo  $valStatus ?></span></a>

        <?php  } else { ?>

                                                        <a href="javascript:void(0)"  onclick="changeStatus('load_waiting<?php  echo  $valID ?>', '<?php  echo  $core_tb_group ?>', '<?php  echo  $valStatus ?>', '<?php  echo  $valID ?>', 'load_status<?php  echo  $valID ?>', '../core/statusMg.php')"> <span class="<?php  echo  $valStatusClass ?>"><?php  echo  $valStatus ?></span> </a>

        <?php  } ?>

                                                    <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="load_waiting<?php  echo  $valID ?>" />     </div>    </td>
                                            <td  class="divRightContantOverTb"  valign="top"  align="center">
                                                <span class="fontContantTbupdate"><?php  echo  $valDateCredate ?></span><br/>
                                                <span class="fontContantTbTime"><?php  echo  $valTimeCredate ?></span>    </td>
                                            <td  class="divRightContantOverTbR"  valign="top"  align="center">
                                                <table  border="0" cellspacing="0" cellpadding="0">
                                                    <tr>

                                                        <td valign="top" align="center" width="30">
                                                            <div class="divRightManage" title="<?php  echo  $langTxt["btn:edit"] ?>" onclick="
                                                                    document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                                                    editContactNew('loadEditPermis.php');">
                                                                <img src="../img/btn/edit.png"  /><br/>
                                                                <span class="fontContantTbManage"><?php  echo  $langTxt["btn:edit"] ?></span>    </div>    </td>
                                                        <td valign="top" align="center" width="30">
                                                            <div class="divRightManage" title="<?php  echo  $langTxt["btn:del"] ?>"  onclick="
                                                                    if (confirm('<?php  echo  $langTxt["mg:delpermis"] ?>')) {
                                                                        Paging_CheckedThisItem(document.myFormHome.CheckBoxAll, <?php  echo  $index ?>, 'CheckBoxID', document.myFormHome.TotalCheckBoxID.value);
                                                                        editContactNew('deletePermis.php');
                                                                    }
                                                                 ">
                                                                <img src="../img/btn/delete.png"  /><br/>
                                                                <span class="fontContantTbManage"><?php  echo  $langTxt["btn:del"] ?></span>    </div>    </td>
                                                    </tr>
                                                </table>    </td>
                                        </tr>

                                        <?php 
                                        $index++;
                                    }
                                } else {
                                    ?>
                                    <tr >
                                        <td colspan="5" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?php  echo  $langTxt["mg:nodate"] ?></td>
                                    </tr>
<?php  } ?>

                                <tr >
                                    <td colspan="6" align="center"  valign="middle"  class="divRightContantTbRL" ><table width="98%" border="0" cellspacing="0" cellpadding="0"  align="center" >
                                            <tr>
                                                <td  class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?php  echo  $langTxt["pr:All"] ?> <b><?php  echo  number_format($count_totalrecord) ?></b> <?php  echo  $langTxt["pr:record"] ?></span></td>
                                                <td  class="divRightNavTb" align="right">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr> 
                                                            <td align="right" style="padding-right:10px;"><span class="fontContantTbNavPage"><?php  echo  $langTxt["pr:page"] ?>  
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
                                                                        <b><?php  echo  $module_pageshow ?></b>
                                                            <?php  } ?>
                                                            <?php  echo  $langTxt["pr:of"] ?> <b><?php  echo  $numberofpage ?></b></span></td>
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
                                                                                                    onclick="document.myFormHome.module_pageshow.value = '<?php  echo  $valPrePage ?>';
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
                                                                                                    onclick="document.myFormHome.module_pageshow.value = '<?php  echo  $valNextPage ?>';
                                                                                                            btnBackPage('loadContact.php');" /></td>
<?php  } else { ?>
                                                                <td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
                    <?php  } ?>
                    <?php  if ($module_pageshow < $numberofpage) { ?>
                                                                <td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21"   style="cursor:pointer;"
                                                                                                   onmouseover="this.src = '../img/controlpage/playset_end_active.gif';
                                                                                                           this.style.cursor = 'hand';" 
                                                                                                   onmouseout="this.src = '../img/controlpage/playset_end.gif';" 
                                                                                                   onclick="document.myFormHome.module_pageshow.value = '<?php  echo  $numberofpage ?>';
                                                                                                           btnBackPage('loadContact.php');" /></td>
<?php  } else { ?>
                                                                <td width="10" align="center"><img src="../img/controlpage/playset_end_disable.gif" width="21" height="21" /></td>
<?php  } ?>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table></td>
                                </tr>
                            </table>
                            <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php  echo  $index - 1 ?>" />
                            <div class="divRightContantEnd"></div>
                        </div>


<div>

</div>
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
