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
                    <a href="javascript:void(0)" class="btn p-0 btn-success" data-title="<?php echo $langTxt["btn:add"]?>" onclick="editContactNew('loadAddPermis.php');">
                        <span class="feather icon-plus"></span>
                    </a>
                    <a href="javascript:void(0)" class="btn p-0 btn-danger" data-title="<?php echo $langTxt["btn:del"]?>" onclick="
                        if (Paging_CountChecked('CheckBoxID', document.myFormHome.TotalCheckBoxID.value) > 0) {
                            if (confirm('<?php  echo  $langTxt["mg:delpermis"] ?>')) {
                                 editContactNew('deletePermis.php');
                            }
                        } else {
                            alert('<?php  echo  $langTxt["mg:selpermis"] ?>');
                        }
                    ">
                        <span class="feather icon-trash-2"></span>
                    </a> 
                </div>
            </div>
        </div>
    </div>

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
						<button type="button" class="btn btn-primary" onclick="submitSearchForm('loadContact.php');" >
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
                        <!-- <a href="javascript:void(0)" class="btn btn-gray" title="">
                            Export PDF
                        </a>
                        <a href="javascript:void(0)" class="btn btn-gray" title="">
                            Export Excel
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th class="checkbox">
                            <div class="checkbox-control">
                                <input name="CheckBoxAll" type="checkbox"  id="CheckBoxAll"  value="Yes" onclick="Paging_CheckAll(this, 'CheckBoxID', document.myFormHome.TotalCheckBoxID.value)"   class="" />
                                <div class="icon"></div>
                            </div>
                        </th>
                        <th><?php echo $langTxt["pr:subject"] ?></th>
                        <th><?php echo $langTxt["mg:status"] ?></th>
                        <th><?php echo $langTxt["us:credate"] ?></th>
                        <th class="manage"><?php  echo  $langTxt["mg:manage"] ?></th>
                    </tr>
                </thead>
                <tbody>
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
                    <tr>
                        <td>
                            <div class="checkbox-control">
                                <input  id="CheckBoxID<?php  echo  $index ?>" name="CheckBoxID<?php  echo  $index ?>" type="checkbox" class="formCheckboxList" onclick="Paging_CheckAllHandle(document.myFormHome.CheckBoxAll, 'CheckBoxID', document.myFormHome.TotalCheckBoxID.value)" value="<?php  echo  $valID ?>" />
                                <div class="icon"></div>
                            </div>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="link color-default" onclick="document.myFormHome.valEditID.value =<?php  echo  $valID ?>; editContactNew('viewPermis.php');" >
                                <?php  echo  $valName ?>    
                            </a>
                        </td>
                        <td>
                            <!-- <div id="load_status<?php  echo $valID?>">
                            <?php if($valStatus=="Enable"){ ?>
                                <a href="javascript:void(0)" class="btn btn-xs btn-light-success" onclick="changeStatus('load_waiting<?php  echo $valID?>','<?php  echo $core_tb_staff?>','<?php  echo $valStatus?>','<?php  echo $valID?>','load_status<?php  echo $valID?>','../core/statusMg.php')" >
                                    <?php  echo $valStatus?>
                                </a>
                                <?php  }else{ ?>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-light-danger" onclick="changeStatus('load_waiting<?php  echo $valID?>','<?php  echo $core_tb_staff?>','<?php  echo $valStatus?>','<?php  echo $valID?>','load_status<?php  echo $valID?>','../core/statusMg.php')"> 
                                        <?php  echo $valStatus?>
                                    </a>
                                <?php  } ?>
                                <img src="../img/loader/ajax-loaderstatus.gif" alt="waiting"  style="display:none;"  id="load_waiting<?php  echo $valID?>" />     
                            </div> -->
                            
                            <div class="status">
                                <a href="javascript:void(0)" class="btn btn-xs btn-light-success" data-toggle="dropdown">
                                    <?php  echo $valStatus?>
                                </a>
                                <!-- <a href="javascript:void(0)" class="btn btn-xs btn-light-danger" data-toggle="dropdown">
                                    Disable
                                </a> -->
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:void(0)" class="link active">
                                            Enable
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="link" data-action="status">
                                            Disable
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <?php echo $valDateCredate ?>
                            <div class="typo-xs color-mute"><?php echo $valTimeCredate ?></div>
                        </td>
                        <td>
                            <div class="manage">
                                <a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-warning" data-title="<?php  echo $langTxt["btn:edit"]?>" onclick="
                                    document.myFormHome.valEditID.value=<?php  echo $valID?>;  
                                    editContactNew('loadEditPermis.php');">
                                    <span class="feather icon-edit-1"></span>
                                </a>
                                <a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-danger" data-title="<?php  echo $langTxt["btn:del"]?>" data-action="delete">
                                    <span class="feather icon-trash-2"></span>
                                </a>
                            </div>
                            <!-- <table  border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td valign="top" align="center" width="30">
                                        <div class="divRightManage" title="<?php  echo  $langTxt["btn:edit"] ?>" onclick="
                                                document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                                editContactNew('loadEditPermis.php');">
                                            <img src="../img/btn/edit.png"  /><br/>
                                            <span class="fontContantTbManage"><?php  echo  $langTxt["btn:edit"] ?></span>    
                                        </div>    
                                    </td>
                                    <td valign="top" align="center" width="30">
                                        <div class="divRightManage" title="<?php  echo  $langTxt["btn:del"] ?>"  onclick="
                                                if (confirm('<?php  echo  $langTxt["mg:delpermis"] ?>')) {
                                                    Paging_CheckedThisItem(document.myFormHome.CheckBoxAll, <?php  echo  $index ?>, 'CheckBoxID', document.myFormHome.TotalCheckBoxID.value);
                                                    editContactNew('deletePermis.php');
                                                }
                                             ">
                                            <img src="../img/btn/delete.png"  /><br/>
                                            <span class="fontContantTbManage"><?php  echo  $langTxt["btn:del"] ?></span>    
                                        </div>    
                                    </td>
                                </tr>
                            </table> -->
                        </td>
                    </tr>
                    <?php 
                        $index++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5">123</td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
            <input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php  echo  $index - 1 ?>" />
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

		  
		$('#tile-page-head').html('<?php echo $valNav2;?>');

		  
		$('.select-control').select2({
			minimumResultsForSearch: Infinity,
			placeholder: "Select"
		});
		$('.select-control.has-search').select2({
			placeholder: "Select"
		}); 


        $('[data-action="status"]').on("click", function(){
            Swal.fire({
                icon: 'success',
                title: 'อัพเดทสถานะ',
                text: 'คุณได้ทำการอัพเดทสถานะเรียบร้อย',
                timer: 1000,
                timerProgressBar: true,
                showConfirmButton: false,
                showCancelButton: false,
                allowOutsideClick: false
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
            })
        });


        $('[data-action="delete"]').on("click", function(){
            Swal.fire({
                icon: 'warning',
                title: 'ลบรายการ',
                text: 'คุณต้องการลบรายการนี้ใช่หรือไม่ ?',
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ใช่ ต้องการลบ',
                reverseButtons: false,
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-gray'
                },
                allowOutsideClick: false
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
            })
        }); 
    });
</script>
<?php  include("../../lib/disconnect.php");?>