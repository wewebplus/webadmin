<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

$valClassNav=2;
$valNav1=$langTxt["nav:home2"];
$valLinkNav1="../core/index.php";
$valNav2=$langTxt["nav:userManage2"];
$valNav3=$langTxt["us:editpermis"];
	
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
	".$core_tb_staff."_password   , 
	".$core_tb_staff."_storeid ,
	".$core_tb_staff."_unitid , 
	".$core_tb_staff."_position  , 
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
		$valStoreID=$Row[16];
		$valUnitID=$Row[17];
		$valPositionUser=$Row[18];
	
		$valUsertype=$Row[19];
		$valUnitIDSub=$Row[20];

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
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $valLinkNav1?>" class="link">
                        <?php echo $valNav1?>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="link" onclick="btnBackPage('loadContact.php')" target="_self">
                        <?php echo $valNav2?>
                    </a>
                </li>
                <li class="active">
                    <?php echo $langTxt["us:editpermis"]?>
                </li>
            </ol>
        </div>
        <div class="col-auto"></div>
    </div>
</div>


<div class="layout-content">
    
    <div class="layout-old">
    <div class="divRightHead">
                                <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                  <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php echo $langTxt["us:editpermis"]?></span></td>
                                    <td align="left">
                                            <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                                <tr>
                                                    <td align="right">
                                                        <div  class="btnSave" title="<?php echo $langTxt["btn:save"]?>" onclick="executeSubmit();"><?php echo $langTxt["btn:save"]?></div>
                                                        <div  class="btnBack" title="<?php echo $langTxt["btn:back"]?>" onclick="btnBackPage('loadContact.php')"><?php echo $langTxt["btn:back"]?></div>
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
    <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleuser"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langTxt["us:titleuserDe"]?></span>    </td>
    </tr>
     <tr >
        <td colspan="7" align="right"  valign="top"   height="15" ></td>
    </tr>
   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:permission"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <select name="inputgroupid"  id="inputgroupid"class="formSelectContantTb">
        <option value="0"><?php echo $langTxt["us:selectpermission"]?> </option>
        <?php 
	$sql_group = "SELECT ".$core_tb_group."_id,".$core_tb_group."_name  FROM ".$core_tb_group." WHERE ".$core_tb_group."_status='Enable' ORDER BY ".$core_tb_group."_order DESC ";
		$query_group=wewebQueryDB($coreLanguageSQL,$sql_group);
		while($row_group=wewebFetchArrayDB($coreLanguageSQL,$query_group)) {
		$row_groupid=$row_group[0];
		$row_groupname=$row_group[1];
		
		?>
        <option value="<?php echo $row_groupid?>" <?php  if($valGroupid==$row_groupid){ ?> selected="selected" <?php  } ?>><?php echo $row_groupname?></option>
        <?php } ?>
    </select></td>
  </tr>
  

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["txt:typeuser"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
        <?php 
        foreach ($arrTypeUser as $key => $value) {
        ?>
        <label>
          <div class="formDivRadioL"><input name="inputTypeUser" id="inputTypeUser" type="radio" class="formRadioContantTb" <?php  if($valUsertype==$key || $key == 1){ ?> checked="checked" <?php  } ?> value="<?php echo $key?>" /></div>
          <div class="formDivRadioR"><?php echo $value?></div>
        </label>
        <?php } ?>
    </td>
  </tr>
  
    <tr  style="display:none;">
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:part"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputPart" id="inputPart" type="text"  class="formInputContantTb"  value="<?php echo $valPart?>"/></td>
  </tr>

  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:nameuser"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputUserName" id="inputUserName" type="text"  class="formInputContantTb" onblur="loadCheckUser()"  value="<?php echo $valUsername?>"/></td>
  </tr>

<tr class="typePrivate" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?> >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:pass"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputPassword" id="inputPassword" type="password"  class="formInputContantTbShot" value="<?php echo $valPassword?>"/></td>
  </tr>

  <tr class="typePrivate" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?> >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:repass"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputPassword1" id="inputPassword1" type="password"  class="formInputContantTbShot" value="<?php echo $valPassword?>"/></td>
  </tr>
  </table>



 <br class="typePrivate" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?> />



<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "  style="display:none;">

     <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langTxt["us:titleType"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langTxt["us:titleTypeDe"]?></span>    </td>
    </tr>

    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:typeuser"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    	<?php
        $countTypeProplemArray=count($coreTxtTypeProplemUser);
		$valChkPortion="";
        for($i=1;$i<$countTypeProplemArray;$i++){
        ?>
    <label >
    <div class="formDivRadioL"><input name="inputTypeUser" id="inputTypeUser" value="<?php echo $i?>" type="radio"   <?php if($valtypeuser==$i){ ?>checked="checked" <?php } ?>   class="formCheckBoxContantTb"/></div>
    <div class="formDivRadioR"><?php echo $coreTxtTypeProplemUser[$i]?></div>
    </label>
    <?php
		$valChkPortion="";
	 } ?>         </td>
    </tr>
</table>



<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder typePrivate" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?> >

    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
    <span class="formFontSubjectTxt"><?php echo $langTxt["us:titlepic"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langTxt["us:titlepicDe"]?></span>    </td>
    </tr>

     <tr >
        <td colspan="7" align="right"  valign="top"   height="15" ></td>
    </tr>

    <tr >
        <td  align="right"  valign="top"  height="5" ></td>
        <td colspan="6" align="left"  valign="top" >
            <div style="margin-bottom:10px;"  name="imgShow"  id="imgShow">
            <img src="../../upload/core/50/<?php echo $valPic?>"   onerror="this.src='<?php echo "../img/btn/blank_s.gif"?>'" />
                <input name="picnameProfile" type="hidden" id="picnameProfile" value="<?php echo $valPic?>" />
            </div>    
        </td>
    </tr>

    <tr >
        <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:inputpic"]?></td>
        <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
            <div class="file-input-wrapper">
              <button class="btn-file-input"><?php echo $langTxt["us:inputpicselect"]?></button>
              <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxUploadProfile();" />
            </div>   
         </td>
    </tr>
  </table>



<br class="typePrivate" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?>  />



<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder typePrivate" <?php  if($valUsertype == 2){ ?> style="display:none;" <?php  } ?> >

    <tr >
    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
   <span class="formFontSubjectTxt"><?php echo $langTxt["us:titlesystem"]?></span><br/>
    <span class="formFontTileTxt"><?php echo $langTxt["us:titlesystemDe"]?></span>   </td>
    </tr>


   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:unitMain"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" id="showFixID" data-id="<?php  echo $valUnitID; ?>">
    <select name="inputFixid"  id="inputFixid"class="formSelectContantTb">
        <option value="0"><?php echo $langTxt["us:selectUnitMain"]?> </option>
        <?php
         // $sql_fix = "SELECT ";
         // $sql_fix .= "  " . $core_tb_fix . "_id," . $core_tb_fix . "_subject";
         // $sql_fix .= "  FROM " . $core_tb_fix . " WHERE  " . $core_tb_fix . "_masterkey ='" . $core_tb_fix_masterkey . "'    AND  ".$core_tb_fix."_status !='Disable'   ORDER BY " . $core_tb_fix . "_order DESC ";
         // $query_fix = wewebQueryDB($coreLanguageSQL,$sql_fix);
         //  while ($row_fix = wewebFetchArrayDB($coreLanguageSQL,$query_fix)) {
         //      $row_fixid = $row_fix[0];
         //      $row_fixname = $row_fix[1];
              ?>
              <!-- <option value="<?php echo  $row_fixid ?>" <?php if ($valUnitID == $row_fixid) { ?> selected="selected" <?php } ?>><?php echo  $row_fixname ?></option> -->
          <?php //} ?>
    </select></td>
  </tr>


  <tr>
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:unitSub"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" id="showFixIDSub" data-id="<?php  echo $valUnitIDSub; ?>">
    <select name="inputFixSubid"  id="inputFixSubid" class="formSelectContantTb" >
        <option value="0"><?php echo $langTxt["us:selectUnitSub"]?> </option>
    </select></td>
  </tr>


  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:antecedent"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <label>
    <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb" <?php if ($valPrefix=="Mr.") echo "checked"; ?>  value="Mr." onclick="
document.myForm.inputGender[0].checked=true
    " /></div>
    <div class="formDivRadioR"><?php echo $langTxt["us:mr"]?></div>
    </label>
  
    <label>
    <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb"  <?php if ($valPrefix=="Miss") echo "checked"; ?> value="Miss"  onclick="
document.myForm.inputGender[1].checked=true " /></div>
    <div class="formDivRadioR"><?php echo $langTxt["us:miss"]?></div>
    </label>
      <label>
    <div class="formDivRadioL"><input name="inputPrefix" id="inputPrefix" type="radio" class="formRadioContantTb" <?php if ($valPrefix=="Mrs.") echo "checked"; ?>  value="Mrs." onclick="
document.myForm.inputGender[1].checked=true    " /></div>
    <div class="formDivRadioR"><?php echo $langTxt["us:mrs"]?></div>
    </label>   </td>
  </tr>


  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:sex"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
     <label>
    <div class="formDivRadioL"><input name="inputGender" id="inputGender" type="radio" class="formRadioContantTb" checked="checked" 
    onclick="document.myForm.inputPrefix[0].checked=true"  <?php if ($valGender=="Male") echo "checked"; ?> value="Male"  /></div>
    <div class="formDivRadioR"><?php echo $langTxt["us:male"]?></div>
    </label>
  
    
      <label>
    <div class="formDivRadioL"><input name="inputGender" id="inputGender" type="radio" class="formRadioContantTb"  onclick="document.myForm.inputPrefix[1].checked=true"  <?php if ($valGender=="Female") echo "checked"; ?> value="Female"  /></div>
    <div class="formDivRadioR"><?php echo $langTxt["us:female"]?></div>
    </label>   </td>
  </tr>


  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:firstnamet"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputfnamethai" id="inputfnamethai" type="text"  class="formInputContantTb" value="<?php echo $valFnamethai?>"/></td>
  </tr>


    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:lastnamet"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputlnamethai" id="inputlnamethai" type="text"  class="formInputContantTb" value="<?php echo $valLnamethai?>"/></td>
  </tr>


    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:firstnamete"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputfnameeng" id="inputfnameeng" type="text"  class="formInputContantTb" value="<?php echo $valFnameeng?>"/></td>
  </tr>


    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:lastnamee"]?><span class="fontContantAlert">*</span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputlnameeng" id="inputlnameeng" type="text"  class="formInputContantTb" value="<?php echo $valLnameeng?>"/></td>
  </tr>


   <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["set:position"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputPosirionUser" id="inputPosirionUser" type="text"  class="formInputContantTb" value="<?php echo $valPositionUser?>"/></td>
  </tr>


    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:email"]?><span class="fontContantAlert"></span></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputemail" id="inputemail" type="text"  class="formInputContantTb" value="<?php echo $valEmail?>"/></td>
  </tr>
   
    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:address"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
    <textarea name="inputlocation"  id="inputlocation" cols="20" rows="5" class="formTextareaContantTb"><?php echo $valAddress?></textarea>    </td>
  </tr>


    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:tel"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputtelephone" id="inputtelephone" type="text"  class="formInputContantTb" value="<?php echo $valTelephone?>"/></td>
  </tr>


    <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:mobile"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputmobile" id="inputmobile" type="text"  class="formInputContantTb" value="<?php echo $valMobile?>"/></td>
  </tr>

  
  <tr >
    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php echo $langTxt["us:other"]?></td>
    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputother" id="inputother" type="text"  class="formInputContantTb" value="<?php echo $valOther?>"/></td>
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
        $('#myFormHome').keypress(function(e) {
			if (e.which == 13) {
				submitSearchForm('loadContact.php');
				 return false;
			}
        });
		  
        $('#tile-page-head').html('<?php echo $valNav3;?>');  

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
