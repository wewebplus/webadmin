<?php 
header("Access-Control-Allow-Origin: *");
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-super-config.php");
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload2';
	
	if(!empty($_FILES['fileToUpload2']['error'])){
		switch($_FILES['fileToUpload2']['error']){

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif($_FILES['fileToUpload2']['tmp_name'] == 'none'){
		$error = 'No file was uploaded..';
	}else{
	
		if(!is_dir($core_pathname_inner_crupload)) { mkdir($core_pathname_inner_crupload,0777); }
		
		if(file_exists($core_pathname_inner_crupload."/".$_REQUEST['delpicname'])) {
			@unlink($core_pathname_inner_crupload."/".$_REQUEST['delpicname']);
		}
			
		$inputGallery=$_FILES['fileToUpload2']['tmp_name'];
		$arrfile=$_FILES['fileToUpload2'];
		$ERROR=$_FILES['fileToUpload2']['error'];
		$TIME=time();
		if(!$ERROR) {
		
			$myRandNew = randomNameUpdate(1);
			$filename="pic-h-".$myRandNew."-".$_REQUEST['myID'];
			
			$p=new pic();
			$p->addpic($arrfile);
			$p->chktypepic(); 
			$ext=$p->ret(); 
			$picname=$filename.".".$ext;
			
			##  Real ################################################################################
			if(copy($inputGallery,$core_pathname_inner_crupload."/".$picname)){
			@chmod($core_pathname_inner_crupload."/".$picname,0777);
			}
			
			$update=array();
			$update[]=$core_tb_setting."_header  	='".$picname."'";
			$sql="UPDATE ".$core_tb_setting." SET ".implode(",",$update)." WHERE ".$core_tb_setting."_id='".$_REQUEST["myID"]."'  ";
			$Query=wewebQueryDB($coreLanguageSQL,$sql);
			
				$msg .= "<img src=\"".$core_pathname_crupload."/".$picname."\"  style=\"float:left;border:#c8c7cc solid 1px;max-width:600px;\"   />";
				$msg .= "<div style=\"width:22px; height:22px;float:left;z-index:1; margin-left:-22px;cursor:pointer;\" onclick=\"delPicUpload('deletePic2.php','boxPicNew2')\"  title=\"Delete file\" ><img src=\"../img/btn/delete.png\" width=\"22\" height=\"22\"  border=\"0\"/></div>";
				$msg .= "<input name=\"picheader\" type=\"hidden\" id=\"picheader\" value=\"$picname\" />";
		}else{
			$error = "No file was uploaded.";
		}
	}	
	
	
	$jsonReturn = array();
	$jsonReturn = array(
		"error" => 	$error,
		"msg" => 	$msg
	);	
		
	
	echo json_encode($jsonReturn);
	
 include("../../lib/disconnect.php");
 ?>