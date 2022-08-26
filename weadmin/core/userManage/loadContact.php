<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:userManage2"];
?>
<div>
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
				<li class="active">
					<?php  echo $valNav2?>
				</li>
			</ol>
		</div>
		<div class="col-auto">
			<div class="group-nav">
				<ul class="nav-list">
					<li>
						<a href="#" class="link active">ผู้ใช้งานระบบ</a>
					</li>
					<li>
						<a href="#" class="link">กลุ่มผู้ใช้งาน</a>
					</li>
					<li>
						<a href="#" class="link">หน่ายงาน</a>
					</li>
				</ul>
			</div>
		</div>
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
					<a href="javascript:void(0)" class="btn p-0 btn-info rotage90" style="display:none;" data-title="<?php  echo $langTxt["btn:sortting"]?>" onclick="sortContactNew('../core/sortUs.php');">
						<span class="feather icon-repeat"></span>
					</a>
					<a href="javascript:void(0)" class="btn p-0 btn-success" data-title="<?php  echo $langTxt["btn:add"]?>" onclick=" editContactNew('loadAddUser.php');">
						<span class="feather icon-plus"></span>
					</a>
					<a href="javascript:void(0)" class="btn p-0 btn-danger" data-title="<?php  echo $langTxt["btn:del"]?>" onclick="
						if(Paging_CountChecked('CheckBoxID',document.myFormHome.TotalCheckBoxID.value)>0) {
							if(confirm('<?php  echo $langTxt["mg:delpermis"]?>')) {
								editContactNew('deleteUs.php');
							}
						} else {
								alert('<?php  echo $langTxt["mg:selpermis"] ?>');
						} ">
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
								<option value="0"><?php  echo $langTxt["us:selectpermission"]?> </option>
								<?php  
									$sql_group = "SELECT ".$core_tb_group."_id,".$core_tb_group."_name  FROM ".$core_tb_group." WHERE ".$core_tb_group."_status='Enable' ";
									$sql_group .= "AND  ".$core_tb_group."_typemini != '1'";
									$sql_group .= "ORDER BY ".$core_tb_group."_order DESC ";
									$query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
									while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
										$row_groupid=$row_group[0];
										$row_groupname=$row_group[1];
								?>
									<option value="<?php  echo $row_groupid?>" <?php   if($_REQUEST['inputGh']==$row_groupid){ ?> selected="selected" <?php   } ?>>
										<?php  echo $row_groupname?>
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
								<input name="CheckBoxAll" type="checkbox" id="CheckBoxAll" value="Yes" onclick="Paging_CheckAll(this,'CheckBoxID',document.myFormHome.TotalCheckBoxID.value)" />
								<div class="icon"></div>
							</div>
						</th>
						<th><?php  echo $langTxt["us:subject"]?></th>
						<th><?php echo $langTxt["txt:typeuser"]?></th>
						<th><?php  echo $langTxt["mg:status"]?></th>
						<th><?php  echo $langTxt["us:credate"]?></th>
						<th class="manage"><?php  echo $langTxt["mg:manage"]?></th>
					</tr>
				</thead>
				<tbody>
					<?php  
						// Value SQL SELECT #########################
						$sqlSelect = "".$core_tb_staff."_id,".$core_tb_staff."_fnamethai,".$core_tb_staff."_lnamethai,".$core_tb_staff."_credate ,".$core_tb_staff."_status,".$core_tb_staff."_picture,".$core_tb_staff."_usertype ,".$core_tb_staff."_username";

						// SQL SELECT #########################
						$sql = "SELECT ".$sqlSelect."  FROM ".$core_tb_staff;
						$sql = $sql."  WHERE ".$core_tb_staff."_status !='Superadmin'   ";
						$sql = $sql."AND  ".$core_tb_staff."_typemini != '1'";
						$sql = $sql.$sqlSearch;

						$query=wewebQueryDB($coreLanguageSQL,$sql);
						$count_totalrecord=wewebNumRowsDB($coreLanguageSQL,$query);

						// Find max page size #########################
						if($count_totalrecord>$module_pagesize) {
							$numberofpage= ceil($count_totalrecord/$module_pagesize);
						} else {
							$numberofpage=1;
						}

						// Recover page show into range #########################
						if($module_pageshow>$numberofpage) { $module_pageshow=$numberofpage; }

						// Select only paging range #########################
						$recordstart = ($module_pageshow-1)*$module_pagesize;

						if($coreLanguageSQL=="mssql"){
							$module_pagesize = $module_pagesize+$recordstart;
							$recordstart = $recordstart+1;
						}

						if($coreLanguageSQL=="mssql"){

							$sql="SELECT ".$sqlSelect." FROM (SELECT     RuningCount = ROW_NUMBER() OVER (ORDER BY ".$module_orderby."  ".$module_adesc ." ),*  FROM   ".$core_tb_staff;
							$sql .="  WHERE ".$core_tb_staff."_status !='Superadmin'  ";
							$sql.="   ) AS LogWithRowNumbers  WHERE   (RuningCount BETWEEN ".$recordstart."  AND ".$module_pagesize." )";		
							$sql.=$sqlSearch;

						}else{
						$sql .= " ORDER BY $module_orderby $module_adesc LIMIT $recordstart , $module_pagesize ";
						}

						$query=wewebQueryDB($coreLanguageSQL,$sql);
						$count_record=wewebNumRowsDB($coreLanguageSQL,$query);
						$index=1;
						$valDivTr="divSubOverTb";
						if($count_record>0) {
							while($index<$count_record+1) {
								$row=wewebFetchArrayDB($coreLanguageSQL,$query);
								$valID=$row[0];
								$valName=$row[1]." ".$row[2];
								$valDateCredate = dateFormatReal($row[3]);
								$valTimeCredate = timeFormatReal($row[3]);
								$valStatus=$row[4];
								$valPicProfile="../../upload/core/50/".$row[5];
								$valUesrType=$row[6];
								if ($valUesrType == 2) {
								$valName=$row[7];
								}
								$valUesrTypeShow=$arrTypeUser[$row[6]];
								
								if($valStatus=="Enable"){
									$valStatusClass=	"fontContantTbEnable";
								}else{
									$valStatusClass=	"fontContantTbDisable";
								}
								
								if($valDivTr=="divSubOverTb"){
									$valDivTr=	"divOverTb";
									$valImgCycle="boxprofile_l.png";
								}else{
									$valDivTr="divSubOverTb";
									$valImgCycle="boxprofile_w.png";
								}
					?>
					<tr>
						<td>    
							<div class="checkbox">
								<div class="checkbox-control">
									<input id="CheckBoxID<?php  echo $index?>" name="CheckBoxID<?php  echo $index?>" type="checkbox" onclick="Paging_CheckAllHandle(document.myFormHome.CheckBoxAll,'CheckBoxID',document.myFormHome.TotalCheckBoxID.value)" value="<?php  echo $valID?>" />
									<div class="icon"></div>
								</div>
							</div>
						</td>
						<td>
							<a class="link color-default" href="javascript:void(0)"  onclick="document.myFormHome.valEditID.value=<?php  echo $valID?>; editContactNew('viewUs.php');" >
								<?php  echo $valName?>
							</a>
						</td>
						<td>
							<?php echo $valUesrTypeShow?>
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
								<!-- <a href="javascript:void(0)" class="btn btn-xs btn-light-info" data-toggle="dropdown">
									Home
								</a> -->
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
											Home
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
							<?php  echo $valDateCredate?>
							<div class="typo-xs color-mute"><?php  echo $valTimeCredate?></div>    
						</td>
						<td>
							<div class="manage">
								<a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-warning" data-title="<?php  echo $langTxt["btn:edit"]?>" onclick="
									document.myFormHome.valEditID.value=<?php  echo $valID?>;  
									editContactNew('loadEditUser.php');">
									<span class="feather icon-edit-1"></span>
								</a>
								
								<a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-danger" data-title="<?php  echo $langTxt["btn:del"]?>" data-action="delete">
									<span class="feather icon-trash-2"></span>
								</a>
								<!-- <a href="javascript:void(0)" class="btn p-0 btn-sm btn-border-danger" title="<?php  echo $langTxt["btn:del"]?>"  onclick="
										if(confirm('<?php  echo $langTxt["mg:delpermis"]?>')) {
										Paging_CheckedThisItem( document.myFormHome.CheckBoxAll, <?php  echo $index?>, 'CheckBoxID', document.myFormHome.TotalCheckBoxID.value );
										editContactNew('deleteUs.php');
										}
										">
									<span class="feather icon-trash-2"></span>
								</a> -->

								<!-- <a href="javascript:void(0)" class="link" data-toggle="dropdown">
									จัดการ
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<a href="javascript:void(0)" class="link" onclick="document.myFormHome.valEditID.value=<?php  echo $valID?>;editContactNew('loadEditUser.php');">
											แก้ไข
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link" onclick="if(confirm('<?php  echo $langTxt["mg:delpermis"]?>')){Paging_CheckedThisItem( document.myFormHome.CheckBoxAll, <?php  echo $index?>, 'CheckBoxID', document.myFormHome.TotalCheckBoxID.value );editContactNew('deleteUs.php');}">
											ลบ
										</a>
									</li>
								</ul> -->
							</div>  
						</td>
					</tr>
					<?php  
						$index++;
					}
					}else{ ?>
					<tr >
						<td colspan="6" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?php  echo $langTxt["mg:nodate"]?></td>
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

			<!-- <table>
				<tr >
					<td colspan="6" align="center"  valign="middle"  class="divRightContantTbRL" ><table width="98%" border="0" cellspacing="0" cellpadding="0"  align="center" >
										<tr>
										<td  class="divRightNavTb" align="left"><span class="fontContantTbNavPage"><?php  echo $langTxt["pr:All"]?> <b><?php  echo number_format($count_totalrecord)?></b> <?php  echo $langTxt["pr:record"]?></span></td>
										<td  class="divRightNavTb" align="right">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr> 
					<td align="right" style="padding-right:10px;"><span class="fontContantTbNavPage"><?php  echo $langTxt["pr:page"]?>  
					<?php  if($numberofpage>1) { ?>
					<select name="toolbarPageShow"  class="formSelectContantPage" onchange="document.myFormHome.module_pageshow.value=this.value; btnBackPage('loadContact.php');">
					<?php  
					if($numberofpage<$module_default_maxpage) {
						// Show page list #########################
						for($i=1;$i<=$numberofpage;$i++) { 
							echo "<option value=\"$i\"";
							if($i==$module_pageshow) { echo " selected"; }
							echo ">$i</option>";
						} 
						
					}else {
						// # If total page count greater than default max page  value then reduce page select size #########################
						$starti = $module_pageshow-$module_default_reduce;
						if($starti<1) { $starti=1; }
						$endi = $module_pageshow+$module_default_reduce;
						if($endi>$numberofpage) { $endi=$numberofpage; }
						//#####################
						for($i=$starti ;$i<=$endi;$i++) { 
							echo "<option value=\"$i\"";
							if($i==$module_pageshow) { echo " selected"; }
							echo ">$i</option>";
						} 
					}
					?>
					</select> 
					<?php  } else { ?>
					<b><?php  echo $module_pageshow?></b>
					<?php  } ?>
					<?php  echo $langTxt["pr:of"]?> <b><?php  echo $numberofpage?></b></span></td>
						<?php  if($module_pageshow>1) { ?>
						<td width="21" align="center"> <img src="../img/controlpage/playset_start.gif" width="21" height="21" 
						onmouseover="this.src='../img/controlpage/playset_start_active.gif'; this.style.cursor='hand';" 
						onmouseout="this.src='../img/controlpage/playset_start.gif';" 
						onclick="document.myFormHome.module_pageshow.value=1; btnBackPage('loadContact.php');"  style="cursor:pointer;" /></td>
						<?php  } else { ?>
						<td width="21" align="center"><img src="../img/controlpage/playset_start_disable.gif" width="21" height="21" /></td>
						<?php  } ?>
						<?php  if($module_pageshow>1) {
						$valPrePage=$module_pageshow-1;
						?>
						<td width="21" align="center"> <img src="../img/controlpage/playset_backward.gif" width="21" height="21"  style="cursor:pointer;"
						onmouseover="this.src='../img/controlpage/playset_backward_active.gif'; this.style.cursor='hand';" 
						onmouseout="this.src='../img/controlpage/playset_backward.gif';" 
						onclick="document.myFormHome.module_pageshow.value='<?php  echo $valPrePage?>'; btnBackPage('loadContact.php');" /></td>
						<?php  } else { ?>
						<td width="21" align="center"><img src="../img/controlpage/playset_backward_disable.gif" width="21" height="21" /></td>
						<?php  } ?>
						<td width="21" align="center"> <img src="../img/controlpage/playset_stop.gif" width="21" height="21"   style="cursor:pointer;"
						onmouseover="this.src='../img/controlpage/playset_stop_active.gif'; this.style.cursor='hand';" 
						onmouseout="this.src='../img/controlpage/playset_stop.gif';" 
						onclick="
						with(document.myFormHome) {
						module_pageshow.value='';
						module_pagesize.value='';
						module_orderby.value='';
						btnBackPage('loadContact.php');
						}
						" /></td>
						<?php  if($module_pageshow<$numberofpage) {
						$valNextPage=$module_pageshow+1;
						?>
						<td width="21" align="center"> <img src="../img/controlpage/playset_forward.gif" width="21" height="21"   style="cursor:pointer;"
						onmouseover="this.src='../img/controlpage/playset_forward_active.gif'; this.style.cursor='hand';" 
						onmouseout="this.src='../img/controlpage/playset_forward.gif';" 
						onclick="document.myFormHome.module_pageshow.value='<?php  echo $valNextPage?>'; btnBackPage('loadContact.php');" /></td>
						<?php  } else { ?>
						<td width="10" align="center"><img src="../img/controlpage/playset_forward_disable.gif" width="21" height="21" /></td>
						<?php  } ?>
						<?php  if($module_pageshow<$numberofpage) { ?>
						<td width="10" align="center"><img src="../img/controlpage/playset_end.gif" width="21" height="21"   style="cursor:pointer;"
						onmouseover="this.src='../img/controlpage/playset_end_active.gif'; this.style.cursor='hand';" 
						onmouseout="this.src='../img/controlpage/playset_end.gif';" 
						onclick="document.myFormHome.module_pageshow.value='<?php  echo $numberofpage?>'; btnBackPage('loadContact.php');" /></td>
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
			</table> -->

			<input name="TotalCheckBoxID" type="hidden" id="TotalCheckBoxID" value="<?php  echo $index-1?>" />
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


		// $('[data-toggle="tooltip"]').tooltip({
		// 	trigger:'hover'
		// });
		  

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
