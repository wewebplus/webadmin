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
                            <h2 class="title">
                               <span class="fontContantTbNav"><a href="<?php echo $valLinkNav1?>" target="_self"><?php echo $valNav1?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <a  href="javascript:void(0)"  onclick="btnBackPage('loadContact.php')" target="_self"><?php echo $valNav2?></a> <img src="../img/btn/nav.png" align="absmiddle" vspace="5" /> <?php echo $valNav3;?></span>
                            </h2>
                        </div>
                        
                    </div>
                </div>
<div class="layout-content">
    <div class="layout-old">

    
					
                            <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo $langTxt["pr:crepermis"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnSave" title="<?php  echo $langTxt["btn:save"]?>" onclick="executeSubmit();"><?php  echo $langTxt["btn:save"]?></div>
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
        <td colspan="7" align="right"  valign="top"   height="15" ></td>
    </tr>
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["pr:pretype"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <select name="inputaccess"  id="inputaccess"class="formSelectContantTb">
        <option value="0"><?php  echo $langTxt["pr:select"]?></option>
        <option value="admin" <?php  if($_request['inputgh']=="admin"){ ?>selected="selected" <?php  } ?>><?php  echo $langTxt["pr:select1"]?></option>
        <option value="staff" <?php  if($_request['inputgh']=="staff"){ ?>selected="selected" <?php  } ?>><?php  echo $langTxt["pr:select2"]?></option>
    </select></td>
  </tr>
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo $langTxt["pr:pername"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputnamegroup" id="inputnamegroup" type="text"  class="formInputContantTb"/></td>
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

    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span onclick="checkAllAdmin('AdminR');"  style="cursor:pointer;color:#FFCC00;"  class="fontTitlTbRight" ><?php  echo $langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTb"  valign="middle"  align="center"><span onclick="checkAllAdmin('AdminRW');"  style="cursor:pointer;color:#00CC00;"  class="fontTitlTbRight"><?php  echo $langTxt["pr:all"]?></span></td>
    <td width="18%"  class="tbRightTitleTbR"  valign="middle"  align="center"><span onclick="checkAllAdmin('AdminNA');"  style="cursor:pointer;color:#FF0000;"  class="fontTitlTbRight"><?php  echo $langTxt["pr:all"]?></span></td>
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
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?php  echo $topic1[$Field."_id"]?>" id="AdminR<?php  echo $topic1[$Field."_id"]?>" type="radio" class="formRadioContantTb" value="R" onclick="checkInSubAdmin('AdminR',<?php  echo $topic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR" style="color:#FFCC00;"><?php  echo $langTxt["pr:read"]?></div>
    </label>
    </div>
    </td>
    <td  class="divRightContantOverTb"  valign="top"  align="center">
    <div  style="width:118px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?php  echo $topic1[$Field."_id"]?>"  id="AdminRW<?php  echo $topic1[$Field."_id"]?>"type="radio" class="formRadioContantTb"  value="RW" onclick="checkInSubAdmin('AdminRW',<?php  echo $topic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR"  style="color:#00CC00;"><?php  echo $langTxt["pr:manage"]?></div>
    </label>
    </div>
    
    </td>
    
    <td  class="divRightContantOverTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?php  echo $topic1[$Field."_id"]?>" id="AdminNA<?php  echo $topic1[$Field."_id"]?>" type="radio" class="formRadioContantTb" value="NA" onclick="checkInSubAdmin('AdminNA',<?php  echo $topic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR" style="color:#FF0000;"><?php  echo $langTxt["pr:noaccess"]?></div>
    </label>
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
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?php  echo $subtopic1[$Field."_id"]?>" id="AdminR<?php  echo $subtopic1[$Field."_id"]?>" type="radio" class="formRadioContantTb" value="R" onclick="checkInSub('R',<?php  echo $subtopic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR" style="color:#FFCC00;"><span for="R<?php  echo $subtopic1[$Field."_id"]?>"><?php  echo $langTxt["pr:read"]?></span></div>
    </label>
    </div>
    </td>
    <td  class="divRightContantTb"  valign="top"  align="center">
    <div  style="width:118px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?php  echo $subtopic1[$Field."_id"]?>"  id="AdminRW<?php  echo $subtopic1[$Field."_id"]?>"type="radio" class="formRadioContantTb"  value="RW" onclick="checkInSub('RW',<?php  echo $subtopic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR"  style="color:#00CC00;"><span for="RW<?php  echo $subtopic[$Field."_id"]?>"><?php  echo $langTxt["pr:manage"]?></span></div>
    </label>
    </div>
    
    </td>
    
    <td  class="divRightContantTbR"  valign="top"  align="center">
  <div  style="width:145px; margin:0 auto; text-align:center;">
    <label>
    <div class="formDivRadioL">
    <input name="Admin<?php  echo $subtopic1[$Field."_id"]?>" id="AdminNA<?php  echo $subtopic1[$Field."_id"]?>" type="radio" class="formRadioContantTb" value="NA" onclick="checkInSub('NA',<?php  echo $subtopic1[$Field."_id"]?>)" /></div>
    <div class="formDivRadioR" style="color:#FF0000;"><span for="NA<?php  echo $subtopic1[$Field."_id"]?>"><?php  echo $langTxt["pr:noaccess"]?></span></div>
    </label>
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

</div>
<script type="text/javascript">
       $(document).ready(function() {
		  $('#tile-page-head').html('<?php echo $valNav3;?>');
		  
    });
  </script>
<?php  include("../../lib/disconnect.php");?>
