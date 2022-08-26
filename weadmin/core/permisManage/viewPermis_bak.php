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
                            <h2 class="title">
                                <span class="fontContantTbNav"><a href="<?php echo $valLinkNav1?>" target="_self"><?php echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('loadContact.php')" target="_self"><?php echo $valNav2?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $valNav3; ?></span>
                            </h2>
                        </div>
                        
                    </div>
                </div>
<div class="layout-content">
    
    <div class="layout-old">
					
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo $langTxt["pr:viewpermis"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnEditView" title="<?php  echo $langTxt["btn:edit"]?>" onclick="btnBackPage('loadEditPermis.php');"><?php  echo $langTxt["btn:edit"]?></div>
                                                        <div  class="btnBack" title="<?php  echo $langTxt["btn:back"]?>" onclick="btnBackPage('loadContact.php')"><?php  echo $langTxt["btn:back"]?></div>
                                                    </td>
                                                </tr>
                                            </table>
                                    </td>
                                  </tr>
                                </table>
                            </div>
                             <div class="divRightMain" >
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langTxt["pr:title"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langTxt["pr:titleDe"]?></span>    </td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["pr:pretype"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php    if($valLv=="admin"){ echo $langTxt["pr:select1"]; }else if($valLv=="staff"){ echo $langTxt["pr:select2"]; } ?></div></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["pr:pername"]?>:</td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <div class="formDivView"><?php  echo $valName?></div></td>
  </tr>
      </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 

  <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php  echo $langTxt["pr:titlePer"]?></span><br/>
    <span class="formFontTileTxt"><?php  echo $langTxt["pr:titlePerDe"]?></span>    </td>
    </tr>
  
   <tr >
    <td colspan="7" align="left"  valign="top" class="formTileTxt">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
   <tr ><td align="left"  valign="middle"  class="tbRightTitleTbL" >
       <span class="fontTitlTbRight"><?php  echo $langTxt["mg:subject"]?>
        </span></td>

    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span style="color:#FFCC00;"  class="fontTitlTbRight" ><?php  echo $langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span style="color:#FFCC00;" class="fontTitlTbRight"><?php  echo $langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTbR"  valign="middle"  align="center"><span style="color:#FFCC00;"  class="fontTitlTbRight"><?php  echo $langTxt["pr:all"]?></span></td>
    </tr>
    <?php 
	// Admin
	$Field=$core_tb_menu;
	$sqlTopic="SELECT * FROM ".$core_tb_menu." WHERE  ".$core_tb_menu."_parentID = '0' AND ".$core_tb_menu."_status = 'Enable'     ORDER BY ".$Field."_order";
	$QueryTopic=wewebQueryDB($coreLanguageSQL,$sqlTopic) ;

	if(wewebNumRowsDB($coreLanguageSQL,$QueryTopic)<=0){
	?>
     <tr >
    <td colspan="4" align="center"  valign="middle"  class="divRightContantTbRL" style="padding-top:150px; padding-bottom:150px;" ><?php  echo $langTxt["mg:nodate"]?></td>
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
 
  <tr class="divOverTb" >
     <td  class="divRightContantOverTbL"  valign="top" align="left"  style="padding-left:15px;">
     <?php  if($topic1[$Field."_icon"]){ ?><img src="<?php  echo $topic1[$Field."_icon"]?>" border="0" align="absmiddle"  hspace="10" /><?php  } else{ ?> - <?php  } ?><?php  echo $row_namelv1?>
        </td>
    <td  class="divRightContantOverTb"   valign="top" align="center" >
    <div  style="width:125px; margin:0 auto; text-align:center;">
   <div class="formDivRadioR" style="color:#FFCC00;">
   <img src="../img/btn/blank.gif" width="11" height="11" id="R<?php  echo $topic1[$Field."_id"]?>" name="R<?php  echo $topic1[$Field."_id"]?>"   border="0"/>&nbsp;<span><?php  echo $langTxt["pr:read"]?> </span>
   </div>
   </div>
    </td>
    <td  class="divRightContantOverTb"  valign="top"  align="center">
    <div  style="width:118px; margin:0 auto; text-align:center;">
    <div class="formDivRadioR"  style="color:#00CC00;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="RW<?php  echo $topic1[$Field."_id"]?>"   name="RW<?php  echo $topic1[$Field."_id"]?>"  border="0"/>&nbsp;<span><?php  echo $langTxt["pr:manage"]?></span>
    </div>
     </div>
    
    </td>
    
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
  <div class="formDivRadioR"  style="color:#FF0000;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="NA<?php  echo $topic1[$Field."_id"]?>" name="NA<?php  echo $topic1[$Field."_id"]?>"  border="0"/>&nbsp;<span><?php  echo $langTxt["pr:noaccess"]?></span>
    </div>
    </div>   </td>
    
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
            
            <tr class="divSubOverTb" >
     <td  class="divRightContantTbL"  valign="top" align="left"  style="padding-left:35px;"    >
     <?php  if($subtopic1[$Field."_icon"]){ ?><img src="<?php  echo $subtopic1[$Field."_icon"]?>" border="0" align="absmiddle"   hspace="10"/><?php  } else{ ?> - <?php  } ?><?php  echo $row_namelv2?>
        </td>
    <td  class="divRightContantTb"   valign="top" align="center" >
    <div  style="width:125px; margin:0 auto; text-align:center;">
    <div class="formDivRadioR" style="color:#FFCC00;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="R<?php  echo $subtopic1[$Field."_id"]?>"  name="R<?php  echo $subtopic1[$Field."_id"]?>" border="0"/>&nbsp;<span><?php  echo $langTxt["pr:read"]?></span>
    </div>
    </div>
    </td>
    <td  class="divRightContantTb"  valign="top"  align="center">
    <div  style="width:118px; margin:0 auto; text-align:center;">
    <div class="formDivRadioR" style="color:#00CC00;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="RW<?php  echo $subtopic1[$Field."_id"]?>"  name="RW<?php  echo $subtopic1[$Field."_id"]?>" border="0"/>&nbsp;<span><?php  echo $langTxt["pr:manage"]?></span>
    </div>
    </div>
    
    </td>
    
    <td  class="divRightContantTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
  <div class="formDivRadioR" style="color:#FF0000;">
    <img src="../img/btn/blank.gif" width="11" height="11" id="NA<?php  echo $subtopic1[$Field."_id"]?>"  name="NA<?php  echo $subtopic1[$Field."_id"]?>" border="0"/>&nbsp;<span><?php  echo $langTxt["pr:noaccess"]?></span>
    </div>
    </div>   </td>
    
  </tr>
            <?php 
				}
			} ?>
     <?php  
	 
		 }
	 }
	 
	 ?>
  </table>
    </td>
    </tr>
  
    </table>
    <br />
    <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" > 
   <tr >
      <td colspan="7" align="right"  valign="top" height="20"></td>
      </tr>
    <tr >
    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop"  title="<?php  echo $langTxt["btn:gototop"]?>"><?php  echo $langTxt["btn:gototop"]?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
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
