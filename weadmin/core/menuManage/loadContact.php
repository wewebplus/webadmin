<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-super-config.php");
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:menuManage2"];


?>
<div>
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
			<div class="col-auto">
				<div class="action">
					<a href="javascript:void(0)" class="btn p-0 btn-info rotage90" style="display:none;" data-title="<?php  echo $langTxt["btn:sortting"]?>" onclick="editContactNew('loadSortPr.php');">
						<span class="feather icon-repeat"></span>
					</a>
					<a href="javascript:void(0)" class="btn p-0 btn-success" data-title="<?php  echo $langTxt["btn:add"]?>" onclick="editContactNew('loadAddPermis.php');">
						<span class="feather icon-plus"></span>
					</a>
					<a href="javascript:void(0)" class="btn p-0 btn-danger" data-title="<?php  echo $langTxt["btn:del"]?>" onclick="
                        if (Paging_CountChecked('CheckBoxID', document.myForm.TotalCheckBoxID.value) > 0) {
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
				<div class="col-auto"></div>
            </div>
        </div>
        <div class="card-body p-0">
			<table class="table m-0">
                <thead>
                    <tr>
                        <th class="checkbox">
                            <div class="checkbox-control">
                                <input name="CheckBoxAll" type="checkbox"  id="CheckBoxAll"  value="Yes" onclick="Paging_CheckAll(this, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)" class="" />
                                <div class="icon"></div>
                            </div>
                        </th>
                        <th><?php  echo  $langTxt["mg:subject"] ?></th>
                        <th><?php  echo  $langTxt["mg:type"] ?></th>
                        <th><?php  echo  $langTxt["mg:show"] ?></th>
                        <th><?php  echo  $langTxt["mg:status"] ?></th>
                        <th><?php  echo  $langTxt["us:credate"] ?></th>
                        <th class="manage">
                            <?php  echo  $langTxt["mg:manage"] ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $myParentID = 0;
                        $sql = "SELECT * FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_parentid='" . $myParentID . "' ";
                        $inputSearch = trim($_REQUEST['inputSearch']);
                        if ($inputSearch <> "") {
                            $sql = $sql . "  AND   ( " . $core_tb_menu . "_namethai LIKE '%$inputSearch%' OR  " . $core_tb_menu . "_nameeng LIKE '%$inputSearch%'   ) ";
                        }

                        $sql = $sql . " ORDER BY " . $core_tb_menu . "_order ASC ";
                        $query = wewebQueryDB($coreLanguageSQL, $sql);
                        $recordCount = wewebNumRowsDB($coreLanguageSQL, $query);
                        $maxOrder = $recordCount;
                        if ($recordCount >= 1) {
                            $index = 1;
                            while ($row = wewebFetchArrayDB($coreLanguageSQL, $query)) {
                                //print_pre($row);
                                $valID = $row[$core_tb_menu . "_id"];
                                if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                    $valName = rechangeQuot($row[$core_tb_menu . "_namethai"]);
                                } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                    $valName = rechangeQuot($row[$core_tb_menu . "_nameeng"]);
                                }

                                $valType = $row[$core_tb_menu . "_moduletype"];
                                $valDateCredate = dateFormatReal($row[$core_tb_menu . "_credate"]);
                                $valTimeCredate = timeFormatReal($row[$core_tb_menu . "_credate"]);
                                $valStatus = $row[$core_tb_menu . "_status"];
                                if ($valStatus == "Enable") {
                                    $valStatusClass = "fontContantTbEnable";
                                } else {
                                    $valStatusClass = "fontContantTbDisable";
                                }

                                $valParentType = $row[$core_tb_menu . "_moduletype"];
                                $valShowmenu = $row[$core_tb_menu . "_hidden"];

                                if ($valShowmenu == "Disable") {
                                    $valShowClass = "fontContantTbDisable";
                                } else {
                                    $valShowClass = "fontContantTbEnable";
                                    $valShowmenu = "Show";
                                }
                    ?>
                    <tr>
                        <td>
                            <div class="checkbox">
                                <div class="checkbox-control">
                                    <input  id="CheckBoxID<?php  echo  $index ?>" name="CheckBoxID<?php  echo  $index ?>" type="checkbox" class="" onclick="Paging_CheckAllHandle(document.myForm.CheckBoxAll, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)" value="<?php  echo  $valID ?>" /> 
                                    <div class="icon"></div>
                                </div>   
                            </div>   
                        </td>
                        <td>
                            <a class="link color-default" href="javascript:void(0)" onclick="
                                document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                viewContactNew('../core/viewMg.php');" >
                                <?php  echo  $valName ?>
                            </a>
                        </td>
                        <td>
                            <?php  echo  $valType ?>
                        </td>
                        <td>
                            <div id="load_show<?php  echo  $valID ?>" class="status">
                                <?php  if ($valShowmenu == "Disable") { ?>
                                    <a class="btn btn-xs btn-light-danger" href="javascript:void(0)" data-toggle="dropdown" >
                                        <?php  echo  $valShowmenu ?>
                                    </a>
                                <?php  } else { ?>
                                    <a class="btn btn-xs btn-light-info" href="javascript:void(0)" data-toggle="dropdown"> 
                                        <?php  echo  $valShowmenu ?> 
                                    </a>
                                <?php  } ?>
                                <ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0)" class="link <?php  if ($valShowmenu == "Disable") { ?>active<?php  } ?>" data-action="status" onclick="changeStatusShow('load_waitingShow<?php  echo  $valID ?>', '<?php  echo  $core_tb_menu ?>', '<?php  echo  $valShowmenu ?>', '<?php  echo  $valID ?>', 'load_show<?php  echo  $valID ?>', '../core/showMg.php')">
                                            Disable
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link <?php  if ($valShowmenu != "Disable") { ?>active<?php  } ?>" data-action="status" onclick="changeStatusShow('load_waitingShow<?php  echo  $valID ?>', '<?php  echo  $core_tb_menu ?>', '<?php  echo  $valShowmenu ?>', '<?php  echo  $valID ?>', 'load_show<?php  echo  $valID ?>', '../core/showMg.php')">
											Show
										</a>
									</li>
								</ul>
                            </div>
                        </td>
                        <td>
                            <div id="load_status<?php  echo  $valID ?>" class="status">
                                <?php  if ($valStatus == "Enable") { ?>
                                    <a class="btn btn-xs btn-light-success" href="javascript:void(0)" data-toggle="dropdown">
                                        <?php  echo  $valStatus ?>
                                    </a>
                                <?php  } else { ?>
                                    <a class="btn btn-xs btn-light-danger" href="javascript:void(0)" data-toggle="dropdown"> 
                                        <?php  echo  $valStatus ?>
                                    </a>
                                <?php  } ?>
                                <ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0)" class="link <?php  if ($valStatus == "Enable") { ?>active<?php  } ?>" data-action="status" onclick="changeStatus('load_waiting<?php  echo  $valID ?>', '<?php  echo  $core_tb_menu ?>', '<?php  echo  $valStatus ?>', '<?php  echo  $valID ?>', 'load_status<?php  echo  $valID ?>', '../core/statusMg.php')">
											Enable
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link <?php  if ($valStatus != "Enable") { ?>active<?php  } ?>" data-action="status" onclick="changeStatus('load_waiting<?php  echo  $valID ?>', '<?php  echo  $core_tb_menu ?>', '<?php  echo  $valStatus ?>', '<?php  echo  $valID ?>', 'load_status<?php  echo  $valID ?>', '../core/statusMg.php')">
											Disable
										</a>
									</li>
								</ul>
                            </div>
                        </td>
                        <td>
                            <?php  echo  $valDateCredate ?>
                            <div class="typo-xs color-mute"><?php  echo  $valTimeCredate ?></div>    
                        </td>
                        <td>
                            <div class="manage">
                                <?php  if ($valType == "Group") { ?>
                                    <a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-success" data-title="<?php  echo  $langTxt["btn:add"] ?>" onclick="
                                            document.myFormHome.myParentID.value =<?php  echo  $valID ?>;
                                            editContactNew('loadEditPermis.php');
                                            ">
                                        <span class="feather icon-plus"></span>  
                                    </a>   
                                <?php  } ?>
                                <a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-warning" data-title="<?php  echo  $langTxt["btn:edit"] ?>" onclick="
                                        document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                        editContactNew('loadEditPermis.php');">
                                    <span class="feather icon-edit-1"></span>    
                                </a>   
                                <a data-action="delete" href="javascript:void(0)" class="btn p-0 btn-sm btn-border-danger" data-title="<?php  echo  $langTxt["btn:del"] ?>"  onclick="
                                        if (confirm('<?php  echo  $langTxt["mg:delpermis"] ?>')) {
                                            Paging_CheckedThisItem(document.myForm.CheckBoxAll, <?php  echo  $index ?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value);
                                            editContactNew('deletePermis.php');
                                        }
                                        ">
                                    <span class="feather icon-trash-2"></span>     
                                </a>   
                            </div>   
                        </td>
                    </tr>
                    <?php 
                        if ($valParentType == "Group") {
                            $sqlSub = "SELECT * FROM " . $core_tb_menu . " WHERE " . $core_tb_menu . "_parentid='" . $valID . "' ORDER BY " . $core_tb_menu . "_order ASC ";
                            $querySub = wewebQueryDB($coreLanguageSQL, $sqlSub);
                            $recordCountSub = wewebNumRowsDB($coreLanguageSQL, $querySub);
                            $maxOrderSub = $recordCountSub;
                            if ($recordCountSub >= 1) {
                                while ($rowSub = wewebFetchArrayDB($coreLanguageSQL, $querySub)) {
                                    $index++;
                                    $valIDSub = $rowSub[$core_tb_menu . "_id"];
                                    if ($_SESSION[$valSiteManage . 'core_session_language'] == "Thai") {
                                        $valNameSub = rechangeQuot($rowSub[$core_tb_menu . "_namethai"]);
                                    } else if ($_SESSION[$valSiteManage . 'core_session_language'] == "Eng") {
                                        $valNameSub = rechangeQuot($rowSub[$core_tb_menu . "_nameeng"]);
                                    }

                                    $valTypeSub = $rowSub[$core_tb_menu . "_moduletype"];
                                    $valDateCredateSub = dateFormatReal($rowSub[$core_tb_menu . "_credate"]);
                                    $valTimeCredateSub = timeFormatReal($rowSub[$core_tb_menu . "_credate"]);
                                    $valStatusSub = $rowSub[$core_tb_menu . "_status"];
                                    if ($valStatusSub == "Enable") {
                                        $valStatusClass = "fontContantTbEnable";
                                    } else {
                                        $valStatusClass = "fontContantTbDisable";
                                    }

                                    $valShowmenu = $rowSub[$core_tb_menu . "_hidden"];
                                
                                    if ($valShowmenu == "Disable") {
                                        $valShowClass = "fontContantTbDisable";
                                    } else {
                                        $valShowClass = "fontContantTbEnable";
                                        $valShowmenu = "Show";
                                    }
                    ?>
                    <tr>
                        <td>
                            <div class="checkbox">
                                <div class="checkbox-control">
                                    <input  id="CheckBoxID<?php  echo  $index ?>" name="CheckBoxID<?php  echo  $index ?>" type="checkbox" class="" onclick="Paging_CheckAllHandle(document.myForm.CheckBoxAll, 'CheckBoxID', document.myForm.TotalCheckBoxID.value)" value="<?php  echo  $valID ?>" /> 
                                    <div class="icon"></div>
                                </div>   
                            </div>   
                        </td>
                        <td>
                            <a class="link color-default" href="javascript:void(0)" onclick="
                                document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                viewContactNew('../core/viewMg.php');" >
                                <?php  echo  $valName ?>
                            </a>
                        </td>
                        <td>
                            <?php  echo  $valType ?>
                        </td>
                        <td>
                            <div id="load_show<?php  echo  $valID ?>" class="status">
                                <?php  if ($valShowmenu == "Disable") { ?>
                                    <a class="btn btn-xs btn-light-danger" href="javascript:void(0)" data-toggle="dropdown" >
                                        <?php  echo  $valShowmenu ?>
                                    </a>
                                <?php  } else { ?>
                                    <a class="btn btn-xs btn-light-info" href="javascript:void(0)" data-toggle="dropdown"> 
                                        <?php  echo  $valShowmenu ?> 
                                    </a>
                                <?php  } ?>
                                <ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0)" class="link <?php  if ($valShowmenu == "Disable") { ?>active<?php  } ?>" data-action="status" onclick="changeStatusShow('load_waitingShow<?php  echo  $valID ?>', '<?php  echo  $core_tb_menu ?>', '<?php  echo  $valShowmenu ?>', '<?php  echo  $valID ?>', 'load_show<?php  echo  $valID ?>', '../core/showMg.php')">
                                            Disable
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link <?php  if ($valShowmenu != "Disable") { ?>active<?php  } ?>" data-action="status" onclick="changeStatusShow('load_waitingShow<?php  echo  $valID ?>', '<?php  echo  $core_tb_menu ?>', '<?php  echo  $valShowmenu ?>', '<?php  echo  $valID ?>', 'load_show<?php  echo  $valID ?>', '../core/showMg.php')">
											Show
										</a>
									</li>
								</ul>
                            </div>
                        </td>
                        <td>
                            <div id="load_status<?php  echo  $valID ?>" class="status">
                                <?php  if ($valStatus == "Enable") { ?>
                                    <a class="btn btn-xs btn-light-success" href="javascript:void(0)" data-toggle="dropdown">
                                        <?php  echo  $valStatus ?>
                                    </a>
                                <?php  } else { ?>
                                    <a class="btn btn-xs btn-light-danger" href="javascript:void(0)" data-toggle="dropdown"> 
                                        <?php  echo  $valStatus ?>
                                    </a>
                                <?php  } ?>
                                <ul class="dropdown-menu">
									<li>
										<a href="javascript:void(0)" class="link <?php  if ($valStatus == "Enable") { ?>active<?php  } ?>" data-action="status" onclick="changeStatus('load_waiting<?php  echo  $valID ?>', '<?php  echo  $core_tb_menu ?>', '<?php  echo  $valStatus ?>', '<?php  echo  $valID ?>', 'load_status<?php  echo  $valID ?>', '../core/statusMg.php')">
											Enable
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link <?php  if ($valStatus != "Enable") { ?>active<?php  } ?>" data-action="status" onclick="changeStatus('load_waiting<?php  echo  $valID ?>', '<?php  echo  $core_tb_menu ?>', '<?php  echo  $valStatus ?>', '<?php  echo  $valID ?>', 'load_status<?php  echo  $valID ?>', '../core/statusMg.php')">
											Disable
										</a>
									</li>
								</ul>
                            </div>
                        </td>
                        <td>
                            <?php  echo  $valDateCredate ?>
                            <div class="typo-xs color-mute"><?php  echo  $valTimeCredate ?></div>    
                        </td>
                        <td>
                            <div class="manage">
                                <?php  if ($valType == "Group") { ?>
                                    <a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-success" data-title="<?php  echo  $langTxt["btn:add"] ?>" onclick="
                                            document.myFormHome.myParentID.value =<?php  echo  $valID ?>;
                                            editContactNew('loadEditPermis.php');
                                            ">
                                        <span class="feather icon-plus"></span>  
                                    </a>   
                                <?php  } ?>
                                <a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-warning" data-title="<?php  echo  $langTxt["btn:edit"] ?>" onclick="
                                        document.myFormHome.valEditID.value =<?php  echo  $valID ?>;
                                        editContactNew('loadEditPermis.php');">
                                    <span class="feather icon-edit-1"></span>    
                                </a>   
                                <a data-action="delete" href="javascript:void(0)" class="btn p-0 btn-sm btn-border-danger" data-title="<?php  echo  $langTxt["btn:del"] ?>"  onclick="
                                        if (confirm('<?php  echo  $langTxt["mg:delpermis"] ?>')) {
                                            Paging_CheckedThisItem(document.myForm.CheckBoxAll, <?php  echo  $index ?>, 'CheckBoxID', document.myForm.TotalCheckBoxID.value);
                                            editContactNew('deletePermis.php');
                                        }
                                        ">
                                    <span class="feather icon-trash-2"></span>     
                                </a>   
                            </div>   
                        </td>
                    </tr>
                    <?php 
                    }
                    }
                    }
                    ?> 
                    <?php 
                    $index++;
                    }
                    } else {
                    ?>
                    <tr >
                        <td colspan="7" align="center"  valign="middle"  class="color-gray" style="padding-top:150px; padding-bottom:150px;" >
                            <?php  echo  $langTxt["mg:nodate"] ?>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
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

        $('[data-action="status"]').on("click", function(){
		    Swal.fire({
		        icon: 'success',
		        title: 'อัพเดทสถานะ',
		        text: 'คุณได้ทำการอัพเดทสถานะเรียบร้อย',
		        timer: 800,
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
