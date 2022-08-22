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
					<a href="javascript:void(0)" onclick="btnBackPage('loadContact.php')"  class="link">
						<?php  echo $valNav2;?>
					</a>
				</li>
				<li class="active">
					<?php  echo $valNav3;?>
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
				<h2 class="title typo-lg fw-medium"><?php  echo  $langTxt["st:edit"] ?></h2>
			</div>
			<div class="col-auto">
				<div class="action">
					<a href="javascript:void(0)" class="btn p-0 btn-success" data-title="<?php  echo $langTxt["btn:save"]?>" onclick="executeSubmit();">
						<span class="feather icon-save"></span>
					</a>
					<a href="javascript:void(0)" class="btn p-0 btn-mute" data-title="<?php  echo $langTxt["btn:back"]?>" onclick="btnBackPage('loadContact.php')">
						<span class="feather icon-arrow-left"></span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["st:title"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["st:titleDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
						<?php  echo  $langTxt["st:lang"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<div class="row">
							<div class="col-auto">
								<label class="radio-control">
									<input name="inputLang" id="inputLang" type="radio" class="" <?php  if ($vallang == "thai") { ?>checked="checked"<?php  } ?> value="Thai" />
									<div class="icon"></div>
									<div class="title"><?php  echo  $langTxt["st:thai"] ?></div>
								</label>
							</div>
							<div class="col-auto">
								<label class="radio-control">
									<input name="inputLang" id="inputLang" type="radio" class=""  <?php  if ($vallang == "eng") { ?>checked="checked"<?php  } ?> value="Eng" />
									<div class="icon"></div>
									<div class="title"><?php  echo  $langTxt["st:eng"] ?></div>
								</label>
							</div>
						</div>
					</div>
                </div>
            </div>

			<div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
						<?php  echo  $langTxt["st:type"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<div class="row">
							<div class="col-auto">
								<label class="radio-control">
									<input name="inputType" id="inputType" type="radio" class="" <?php  if ($valtype == "1") { ?>checked="checked"<?php  } ?> value="1" />
									<div class="icon"></div>
									<div class="title"><?php  echo  $langTxt["st:1"] ?></div>
								</label>
							</div>
							<div class="col-auto">
								<label class="radio-control">
									<input name="inputType" id="inputType" type="radio" class=""  <?php  if ($valtype == "2") { ?>checked="checked"<?php  } ?> value="2" />
									<div class="icon"></div>
									<div class="title"><?php  echo  $langTxt["st:2"] ?></div>
								</label>
							</div>
						</div>
					</div>
                </div>
            </div>
		</div>
	</div>

	<div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["txt:about"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["txt:aboutDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
						<?php  echo  $langTxt["ab:subject"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<input name="inputSubject" id="inputSubject" type="text"  class="form-control" value="<?php  echo  $valSubject ?>"/>
					</div>
                </div>
            </div>

			<div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
						<?php  echo  $langTxt["ab:title"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<input name="inputTitle" id="inputTitle" type="text"  class="form-control" value="<?php  echo  $valTitle ?>"/>
					</div>
                </div>
            </div>

			<div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
						<?php  echo  $langTxt["ab:titleback"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<input name="inputTitleB" id="inputTitleB" type="text"  class="form-control" value="<?php  echo  $valTitleB ?>"/>
					</div>
                </div>
            </div>
		</div>
	</div>

	<div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["txt:pic"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["txt:picDe"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
						<?php  echo  $langTxt["inp:album"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<div class="file-input-wrapper">
							<button type="button" class="btn btn-default">
								<span class="feather icon-upload-cloud typo-xs mr-2"></span>
								<?php  echo  $langTxt["us:inputpicselect"] ?>
							</button>
							<input type="file" name="fileToUpload" id="fileToUpload" onchange="ajaxFileUpload();" />
						</div>

						<div class="typo-xs color-gray mt-2"><?php  echo  $langTxt["inp:notepic"] ?></div>

						<div id="boxPicNew" class="thumb-sm mt-3">
							<?php if (file_exists_2($valPic,$valPicName)) { ?>
								<img src="<?php  echo  $valPic ?>" />
								<a class="delete" href="javascript:void(0)" onclick="delPicUpload('deletePic.php','boxPicNew')" title="Delete file" >
									<span class="feather icon-trash-2"></span>
								</a>
								<input type="hidden" name="picname" id="picname" value="<?php  echo  $valPicName ?>" />
							<?php  } ?>
						</div>
					</div>
                </div>
            </div>
		</div>
	</div>

	<div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["txt:pic2"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["txt:pic2De"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label">
						<?php  echo  $langTxt["inp:album"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<div class="file-input-wrapper">
							<button type="button" class="btn btn-default">
								<span class="feather icon-upload-cloud typo-xs mr-2"></span>
								<?php  echo  $langTxt["us:inputpicselect"] ?>
							</button>
							<input type="file" name="fileToUpload2" id="fileToUpload2" onchange="ajaxFileUpload2();" />
						</div>

						<div class="typo-xs color-gray mt-2"><?php  echo  $langTxt["inp:notepic2"] ?></div>

						<div id="boxPicNew2" class="thumb-md mt-3">
							<?php  if (file_exists_2($valHeader,$valHeaderName)) { ?>
								<img src="<?php  echo  $valHeader ?>" />
								<a class="delete" href="javascript:void(0)" onclick="delPicUpload('deletePic2.php','boxPicNew2')"  title="Delete file" >
									<span class="feather icon-trash-2"></span>
								</a>
								<input type="hidden" name="picheader" id="picheader" value="<?php  echo  $valHeaderName ?>" />
							<?php  } ?>
						</div>
					</div>
                </div>
            </div>
		</div>
	</div>

	<div class="card">
        <div class="card-header">
            <h3 class="title typo-md color-primary">
				<?php  echo  $langTxt["txt:pic3"] ?>
            </h3>
            <p class="desc color-mute">
				<?php  echo  $langTxt["txt:pic3De"] ?>
            </p>
        </div>
        <div class="card-body pb-1">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="" class="control-form-label required">
						<?php  echo  $langTxt["inp:album"] ?>
                    </label>
                </div>
                <div class="col">
                    <div class="block-control">
						<div class="file-input-wrapper">
							<button type="button" class="btn btn-default">
								<span class="feather icon-upload-cloud typo-xs mr-2"></span>
								<?php  echo  $langTxt["us:inputpicselect"] ?>
							</button>
							<input type="file" name="fileToUpload3" id="fileToUpload3" onchange="ajaxFileUpload3();" />
						</div>

						<div class="typo-xs color-gray mt-2"><?php  echo  $langTxt["inp:notepic3"] ?></div>
						
						<div id="boxPicNew3" class="thumb-md mt-3">
							<?php  if (file_exists_2($valBg,$valBgName)) { ?>
								<img src="<?php  echo  $valBg ?>" />
								<a class="delete" href="javascript:void(0)" onclick="delPicUpload('deletePic3.php','boxPicNew3')" title="Delete file" >
									<span class="feather icon-trash-2"></span>
								</a>
								<input type="hidden" name="picbg" id="picbg" value="<?php  echo  $valBgName ?>" />
							<?php  } ?>
						</div>
					</div>
                </div>
            </div>
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
