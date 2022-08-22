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
                            <h2 class="title">
                                <span class="fontContantTbNav"><a href="<?php echo $valLinkNav1?>" target="_self"><?php echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('loadContact.php')" target="_self"><?php echo $valNav2?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $langTxt["us:viewpermis"]?></span>
                            </h2>
                        </div>
                        
                    </div>
                </div>
<div class="layout-content">
    
    <div class="layout-old">
    <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php echo $langTxt["us:viewpermis"]?></span></td>
                  <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnSave" title="<?php echo $langTxt["btn:edit"]?>" onclick="btnBackPage('loadEditUser.php');"><?php echo $langTxt["btn:edit"]?></div>
                                                        <div  class="btnBack" title="<?php echo $langTxt["btn:back"]?>" onclick="btnBackPage('loadContact.php');"><?php echo $langTxt["btn:back"]?></div>                                                    </td>
                                                </tr>
                                            </table>                                    </td>
                                  </tr>
                                </table>
      </div>
    <div class="divRightMain" >
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleuser"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langTxt["us:titleuserDe"]?></span>        </td>
    </tr>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:permission"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php 
	$sql_group = "SELECT ".$core_tb_group."_id,".$core_tb_group."_name  FROM ".$core_tb_group." WHERE ".$core_tb_group."_id='".$valGroupid."'   ORDER BY ".$core_tb_group."_order DESC ";
		$query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
		$row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group);
		$row_groupid=$row_group[0];
		$row_groupname=$row_group[1];
		echo $row_groupname;
		?></div>    </td>
     </tr>
     
      
     
     
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["txt:typeuser"]?>:<span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView">
        <?php 
        echo $arrTypeUser[$valUsertype];
        ?>
    </div></td>
  </tr>
     
       <tr style="display:none;" >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:part"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valPart?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:nameuser"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valUsername?></div></td>
  </tr>
    <tr <?php  if($valUsertype== 2){ ?> style="display:none;" <?php  } ?> >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:pass"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valPassword?></div></td>
  </tr>
    </table>
      
    <br <?php  if($valUsertype== 2){ ?> style="display:none;" <?php  } ?> />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder " <?php  if($valUsertype== 2){ ?> style="display:none;" <?php  } ?> > 

    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langTxt["us:titlepic"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langTxt["us:titlepicDe"]?></span>        </td>
    </tr>
        <tr >
          <td   colspan="7"  align="right" height="15"  valign="top"  ></td>
        </tr>
        <tr >
    <td  align="right"  valign="top"  height="5"  width="18%"  >&nbsp;</td>
    <td colspan="6" align="left"  valign="top" >
        <div style="margin-bottom:10px;"  name="imgShow"  id="imgShow">
        <img src="../../upload/core/50/<?php echo $valPic?>"   onerror="this.src='<?php echo "../img/btn/nouser.jpg"?>'" />
            <input name="picnameProfile" type="hidden" id="picnameProfile" value="<?php echo $valPic?>" />
        </div>    </td>
  </tr>
      </table>
    <br <?php  if($valUsertype== 2){ ?> style="display:none;" <?php  } ?>  />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder  " <?php  if($valUsertype== 2){ ?> style="display:none;" <?php  } ?> > 

  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langTxt["us:titlesystem"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langTxt["us:titlesystemDe"]?></span>        </td>
    </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:unitMain"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" id="showFixID" data-id="<?php  echo $valUnitID; ?>" >
     <div class="formDivView">
     	<?php 
	// $sql_fix = "SELECT ".$core_tb_fix."_id,".$core_tb_fix."_subject  FROM ".$core_tb_fix." WHERE ".$core_tb_fix."_id='".$valUnitID."'   ORDER BY ".$core_tb_fix."_order DESC ";
	// 	$query_fix=wewebQueryDB($coreLanguageSQL,$sql_fix);
	// 	$row_fix=wewebFetchArrayDB($coreLanguageSQL,$query_fix);
	// 	$row_fixid=$row_fix[0];
	// 	$row_fixname=$row_fix[1];
	// 	echo $row_fixname;
		?>
			
		</div>    </td>
     </tr>
     <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:unitSub"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" id="showFixIDSub" data-id="<?php  echo $valUnitIDSub; ?>" >
     <div class="formDivView"></div>    
	</td>
     </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:antecedent"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php if ($valPrefix=="Mr."){ echo $langTxt["us:mr"]; }else if ($valPrefix=="Miss"){ echo $langTxt["us:miss"]; }else if ($valPrefix=="Mrs."){ echo $langTxt["us:mrs"]; } ?></div>         </td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:sex"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
         <div class="formDivView"><?php if ($valGender=="Male"){ echo $langTxt["us:male"]; }else if ($valGender=="Female"){ echo $langTxt["us:female"]; } ?></div>         </td>
  </tr>
      <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:firstnamet"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valFnamethai?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:lastnamet"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valLnamethai?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:firstnamete"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valFnameeng?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:lastnamee"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valLnameeng?></div></td>
  </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["set:position"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valPositionUser?></div></td>
  </tr>  
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:email"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valEmail?></div></td>
  </tr>
   
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:address"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php echo $valAddress?></div> </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:tel"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valTelephone?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:mobile"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valMobile?></div></td>
  </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:other"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php echo $valOther?></div></td>
  </tr>
       </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 

<tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleinfo"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langTxt["us:titleinfoDe"]?></span>     </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:credate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php echo $valCredate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:lastdate"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php echo $valLastdate?></div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:creby"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView">
     <?php
		if($_SESSION[$valSiteManage.'core_session_language']=="Thai"){
			echo getUserThai($valCreby);
		}else if($_SESSION[$valSiteManage.'core_session_language']=="Eng"){
			echo getUserEng($valCreby);
		}
    
	
	?>
	 </div>         </td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["mg:status"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <div class="formDivView"><?php echo $valStatus?></div>         </td>
  </tr>
      </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" > 

   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php echo $langTxt["btn:gototop"]?>"><?php echo $langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
    </tr>
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
