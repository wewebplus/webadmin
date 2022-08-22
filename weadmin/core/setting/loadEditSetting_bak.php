<?php
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-super-config.php");

$valClassNav = 2;
$valNav1 = $langTxt["nav:home2"];
$valLinkNav1 = "../core/index.php";
$valNav2 = $langTxt["nav:setting"];
$valNav3 = $langTxt["st:edit"];

$sql = "SELECT 
		" . $core_tb_setting . "_id , 
		" . $core_tb_setting . "_lang, 
		" . $core_tb_setting . "_type, 
		" . $core_tb_setting . "_subject, 
		" . $core_tb_setting . "_title  , 
		" . $core_tb_setting . "_titleB , 
        " . $core_tb_setting . "_pic ,
        " . $core_tb_setting . "_header ,
        " . $core_tb_setting . "_bg 
		
		FROM " . $core_tb_setting . " WHERE " . $core_tb_setting . "_id>=1 ";
$query = wewebQueryDB($coreLanguageSQL, $sql);
$row = wewebFetchArrayDB($coreLanguageSQL, $query);
$valId = $row[0];
$vallang = $row[1];
if($vallang=="Thai"){
	$vallang = "thai";
}
if($vallang=="Eng"){
	$vallang = "eng";
}

$valtype = $row[2];
$valSubject = rechangeQuot($row[3]);
$valTitle = rechangeQuot($row[4]);
$valTitleB = rechangeQuot($row[5]);
$valPicName = $row[6];
$valPic = $core_pathname_crupload . "/" . $row[6];

$valHeaderName = $row[7];
$valHeader = $core_pathname_crupload . "/" . $row[7];
$valBgName = $row[8];
$valBg = $core_pathname_crupload . "/" . $row[8];

?>
<div>
<input name="execute" type="hidden" id="execute" value="update" />
<input name="myParentID" type="hidden" id="myParentID" value="<?php  echo  $_REQUEST['myParentID'] ?>" />

<div class="layout-topbar">
                    <div class="row align-items-center">
                        <div class="col">
                        	<ol class="breadcrumb">
                                <li>
                                    <a href="<?php  echo $valLinkNav1?>" class="link">
                                        <?php  echo $valNav1;?>
                                    </a>
                                </li>
                                <li >
                                	<a href="javascript:void(0)"  onclick="btnBackPage('loadContact.php')"  class="link">
                                    	<?php  echo $valNav2;?>
                                    </a>
                                </li>
                                <li class="active">
                                    <?php  echo $valNav3;?>
                                </li>
                            </ol>
                            
                        </div>
                        
                    </div>
                </div>
<div class="layout-content">
    
    <div class="layout-old">

                        
                        <div class="divRightHead">
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" class="borderBottom" align="center" >
                                <tr>
                                    <td height="77" align="left"><span class="fontHeadRight"><?php  echo  $langTxt["st:edit"] ?></span></td>
                                    <td align="left">
                                        <table  border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td align="right">
                                                    <div  class="btnSave" title="<?php  echo  $langTxt["btn:save"] ?>" onclick="executeSubmit();"><?php  echo  $langTxt["btn:save"] ?></div>
                                                    <div  class="btnBack" title="<?php  echo  $langTxt["btn:back"] ?>" onclick="btnBackPage('loadContact.php');"><?php  echo  $langTxt["btn:back"] ?></div>
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
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["st:title"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["st:titleDe"] ?></span>    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["st:lang"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <label>
                                            <div class="formDivRadioL"><input name="inputLang" id="inputLang" type="radio" class="formRadioContantTb" <?php  if ($vallang == "thai") { ?>checked="checked"<?php  } ?> value="Thai" /></div>
                                            <div class="formDivRadioR"><?php  echo  $langTxt["st:thai"] ?></div>
                                        </label>

                                        <label>
                                            <div class="formDivRadioL"><input name="inputLang" id="inputLang" type="radio" class="formRadioContantTb"  <?php  if ($vallang == "eng") { ?>checked="checked"<?php  } ?> value="Eng" /></div>
                                            <div class="formDivRadioR"><?php  echo  $langTxt["st:eng"] ?></div>
                                        </label>
                                    </td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["st:type"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <label>
                                            <div class="formDivRadioL"><input name="inputType" id="inputType" type="radio" class="formRadioContantTb" <?php  if ($valtype == "1") { ?>checked="checked"<?php  } ?> value="1" /></div>
                                            <div class="formDivRadioR"><?php  echo  $langTxt["st:1"] ?></div>
                                        </label>

                                        <label>
                                            <div class="formDivRadioL"><input name="inputType" id="inputType" type="radio" class="formRadioContantTb"  <?php  if ($valtype == "2") { ?>checked="checked"<?php  } ?> value="2" /></div>
                                            <div class="formDivRadioR"><?php  echo  $langTxt["st:2"] ?></div>
                                        </label>
                                    </td>
                                </tr>

                            </table><br />

                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder ">
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["txt:about"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["txt:aboutDe"] ?></span>                             </td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="right"  valign="top"   height="15" ></td>
                                </tr>
                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["ab:subject"] ?><span class="fontContantAlert">*</span></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" ><input name="inputSubject" id="inputSubject" type="text"  class="formInputContantTb" value="<?php  echo  $valSubject ?>"/></td>
                                </tr>
                                <tr >
                                    <td align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["ab:title"] ?><span class="fontContantAlert">*</span></td>
                                    <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <input name="inputTitle" id="inputTitle" type="text"  class="formInputContantTb" value="<?php  echo  $valTitle ?>"/>   </td>
                                </tr>
                                <tr >
                                    <td align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["ab:titleback"] ?><span class="fontContantAlert">*</span></td>
                                    <td colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <input name="inputTitleB" id="inputTitleB" type="text"  class="formInputContantTb" value="<?php  echo  $valTitleB ?>"/>   </td>
                                </tr>

                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["txt:pic"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["txt:picDe"] ?></span>    </td>
                                </tr>
                                <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["inp:album"] ?></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="file-input-wrapper">
                                            <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
                                        </div>

                                        <span class="formFontNoteTxt"><?php  echo  $langTxt["inp:notepic"] ?></span>
                                        <div class="clearAll"></div>
                                        <div id="boxPicNew" class="formFontTileTxt">
                                        <?php if (file_exists_2($valPic,$valPicName)) { ?>
                                         <img src="<?php  echo  $valPic ?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
                                            
                                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic.php','boxPicNew')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                                <input type="hidden" name="picname" id="picname" value="<?php  echo  $valPicName ?>" />
                                            <?php  } ?>
                                        </div></td>
                                </tr>
                            </table>

                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["txt:pic2"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["txt:pic2De"] ?></span>    </td>
                                </tr>
                                <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["inp:album"] ?></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="file-input-wrapper">
                                            <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                                            <input type="file" name="fileToUpload2" id="fileToUpload2" onchange="ajaxFileUpload2();" />
                                        </div>

                                        <span class="formFontNoteTxt"><?php  echo  $langTxt["inp:notepic2"] ?></span>
                                        <div class="clearAll"></div>
                                        <div id="boxPicNew2" class="formFontTileTxt">
                                            <?php  if (file_exists_2($valHeader,$valHeaderName)) { ?>
                                                <img src="<?php  echo  $valHeader ?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
                                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic2.php','boxPicNew2')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                                <input type="hidden" name="picheader" id="picheader" value="<?php  echo  $valHeaderName ?>" />
                                            <?php  } ?>
                                        </div></td>
                                </tr>
                            </table>
                            <br />
                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="tbBoxViewBorder "> 
                                <tr >
                                    <td colspan="7" align="left"  valign="middle" class="formTileTxt tbBoxViewBorderBottom">
                                        <span class="formFontSubjectTxt"><?php  echo  $langTxt["txt:pic3"] ?></span><br/>
                                        <span class="formFontTileTxt"><?php  echo  $langTxt["txt:pic3De"] ?></span>    </td>
                                </tr>
                                <tr ><td colspan="7" align="right"  valign="top"   height="15" ></td></tr>

                                <tr >
                                    <td width="18%" align="right"  valign="top"  class="formLeftContantTb" ><?php  echo  $langTxt["inp:album"] ?></td>
                                    <td width="82%" colspan="6" align="left"  valign="top"  class="formRightContantTb" >
                                        <div class="file-input-wrapper">
                                            <button class="btn-file-input"><?php  echo  $langTxt["us:inputpicselect"] ?></button>
                                            <input type="file" name="fileToUpload3" id="fileToUpload3" onchange="ajaxFileUpload3();" />
                                        </div>

                                        <span class="formFontNoteTxt"><?php  echo  $langTxt["inp:notepic3"] ?></span>
                                        <div class="clearAll"></div>
                                        <div id="boxPicNew3" class="formFontTileTxt">
                                            <?php  if (file_exists_2($valBg,$valBgName)) { ?>
                                                <img src="<?php  echo  $valBg ?>"  style="float:left;border:#c8c7cc solid 1px;max-width:600px;"  />
                                                <div style="width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;" onclick="delPicUpload('deletePic3.php','boxPicNew3')"  title="Delete file" ><img src="../img/btn/delete.png" width="22" height="22"  border="0"/></div>
                                                <input type="hidden" name="picbg" id="picbg" value="<?php  echo  $valBgName ?>" />
                                            <?php  } ?>
                                        </div></td>
                                </tr>
                            </table>


                            <br />

                            <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" >

                                <tr >
                                    <td colspan="7" align="right"  valign="top" height="20"></td>
                                </tr>
                                <tr >
                                    <td colspan="7" align="right"  valign="middle" class="formEndContantTb"><a href="#defTop" title="<?php  echo  $langTxt["btn:gototop"] ?>"><?php  echo  $langTxt["btn:gototop"] ?> <img src="../img/btn/top.png"  align="absmiddle"/></a></td>
                                </tr>
                            </table>
                        </div>
    </div>
</div>

<script type="text/javascript">
		function executeSubmit() {
		
			with (document.myFormHome) {
				if (isBlank(inputSubject)) {
					inputSubject.focus();
					jQuery("#inputSubject").addClass("formInputContantTbAlertY");
					return false;
				} else {
					jQuery("#inputSubject").removeClass("formInputContantTbAlertY");
				}

				if (isBlank(inputTitle)) {
					inputTitle.focus();
					jQuery("#inputTitle").addClass("formInputContantTbAlertY");
					return false;
				} else {
					jQuery("#inputTitle").removeClass("formInputContantTbAlertY");
				}

				if (isBlank(inputTitleB)) {
					inputTitleB.focus();
					jQuery("#inputTitleB").addClass("formInputContantTbAlertY");
					return false;
				} else {
					jQuery("#inputTitleB").removeClass("formInputContantTbAlertY");
				}
				
			}
			
			
			editContactNew('updateSetting.php');
		
		}

		/*################################# Upload Pic #######################*/
	   function ajaxFileUpload() {
			$('.progress_ajax').removeClass('hide');
			$('.progress_ajax').css('width', '0%');

			var valuepicname = jQuery("input#picname").val();
			
			var fd = new FormData();
			var files = $('#fileToUpload')[0].files;
			
			if(files.length > 0 ){
			   fd.append('fileToUpload',files[0]);
						
				
			   $.ajax({
				xhr: function () {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							//console.log(percentComplete);
							$('.progress_ajax').css({
								width: percentComplete * 100 + '%'
							});
							if (percentComplete === 1) {
								$('.progress_ajax').addClass('hide');
							}
						}
					}, false);
					xhr.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							//console.log(percentComplete);
							$('.progress_ajax').css({
								width: percentComplete * 100 + '%'
							});
						}
					}, false);
					return xhr;
				},
				url: './<?php echo $valuPathRealFolder?>/loadUpdatePic.php?myID=<?php  echo  $valId ?>&delpicname=' + valuepicname + '',
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function (response) {
				
				 data = JSON.parse(response);
					
					if (typeof (data.error) != 'undefined'){
					
						if (data.error != ''){
							alert(data.error);
						} else{
						
							$("#boxPicNew").show();
							$("#boxPicNew").html(data.msg);
							$("#fileToUpload").val('');
						}
					}
					
				}
					  
			   });
			   
			}else{
			   alert("Please select a file.");
			}			
			
	   }


		 /*################################# Upload Pic Header#######################*/
	   function ajaxFileUpload2() {
			$('.progress_ajax').removeClass('hide');
			$('.progress_ajax').css('width', '0%');

			var valuepicname = jQuery("input#picheader").val();
			
			var fd = new FormData();
			var files = $('#fileToUpload2')[0].files;
			
			if(files.length > 0 ){
			   fd.append('fileToUpload2',files[0]);
						
				
			   $.ajax({
				xhr: function () {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							//console.log(percentComplete);
							$('.progress_ajax').css({
								width: percentComplete * 100 + '%'
							});
							if (percentComplete === 1) {
								$('.progress_ajax').addClass('hide');
							}
						}
					}, false);
					xhr.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							//console.log(percentComplete);
							$('.progress_ajax').css({
								width: percentComplete * 100 + '%'
							});
						}
					}, false);
					return xhr;
				},
				url: './<?php echo $valuPathRealFolder?>/loadUpdatePic2.php?myID=<?php  echo  $valId ?>&delpicname=' + valuepicname + '',
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function (response) {
				
				 data = JSON.parse(response);
					
					if (typeof (data.error) != 'undefined'){
					
						if (data.error != ''){
							alert(data.error);
						} else{
						
							$("#boxPicNew2").show();
							$("#boxPicNew2").html(data.msg);
							$("#fileToUpload2").val('');
						}
					}
					
				}
					  
			   });
			   
			}else{
			   alert("Please select a file.");
			}			
			
	   }


		 
		 /*################################# Upload Pic BG#######################*/
	   function ajaxFileUpload3() {
			$('.progress_ajax').removeClass('hide');
			$('.progress_ajax').css('width', '0%');

			var valuepicname = jQuery("input#picbg").val();
			
			var fd = new FormData();
			var files = $('#fileToUpload3')[0].files;
			
			if(files.length > 0 ){
			   fd.append('fileToUpload3',files[0]);
						
				
			   $.ajax({
				xhr: function () {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							//console.log(percentComplete);
							$('.progress_ajax').css({
								width: percentComplete * 100 + '%'
							});
							if (percentComplete === 1) {
								$('.progress_ajax').addClass('hide');
							}
						}
					}, false);
					xhr.addEventListener("progress", function (evt) {
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							//console.log(percentComplete);
							$('.progress_ajax').css({
								width: percentComplete * 100 + '%'
							});
						}
					}, false);
					return xhr;
				},
				url: './<?php echo $valuPathRealFolder?>/loadUpdatePic3.php?myID=<?php  echo  $valId ?>&delpicname=' + valuepicname + '',
				type: 'post',
				data: fd,
				contentType: false,
				processData: false,
				success: function (response) {
				
				 data = JSON.parse(response);
					
					if (typeof (data.error) != 'undefined'){
					
						if (data.error != ''){
							alert(data.error);
						} else{
						
							$("#boxPicNew3").show();
							$("#boxPicNew3").html(data.msg);
							$("#fileToUpload3").val('');
						}
					}
					
				}
					  
			   });
			   
			}else{
			   alert("Please select a file.");
			}			
			
	   }


		$(document).ready(function () {
			
			$('#myFormHome').keypress(function (e) {
				if (e.which == 13) {
					executeSubmit();
					return false;
				}	
			});
			
		  $('#tile-page-head').html('<?php echo $valNav3;?>');
		  
		});




  </script>
<?php  include("../../lib/disconnect.php");?>
