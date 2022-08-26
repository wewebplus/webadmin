<?php 
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php 
include("../../inc/".$valFolderAction_Inc."/inc-heard-meta.php");
include("../../inc/".$valFolderAction_Inc."/inc-heard-css.php");
?>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td valign="top" class="bg_centerhome" align="center"><table width="450" height="250" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
    
<?php 

function formatImageSize($mySize) {
	if($mySize>1024*1024) {
		return sprintf("%1.2f",$mySize/(1024*1024)) . "M";
	} else {
		return sprintf("%1.2f",$mySize/1024) . "k";
	}
}

function removeEndSlash($myURL) {
	if($myURL[strlen($myURL)-1]=="/") {
		return substr($myURL,0,strlen($myURL)-1);
	} else {
		return $myURL;
	}
}

function removeEndURL($myURL) {
	$myURLArray = explode("/",$myURL);
	$myURL  = $myURLArray[0];
	for($i=1;$i<count($myURLArray)-1;$i++) {
		$myURL =  $myURL . "/" . $myURLArray[$i];
	}
	return $myURL;
}

function getFileOrFolderName($myURL) {
	$myURLArray = explode("/",$myURL);
	return $myURLArray[count($myURLArray)-1];
}

function getFileOrFolderNameUpload($myURL) {
	$myURLArray = explode("\\",$myURL);
	return $myURLArray[count($myURLArray)-1];
}

?>
      <table width="100%" height="100%" border="0" cellpadding="2" cellspacing="0">
        
        <tr> 
          <td align="center" valign="top"> 
            <?php 
$ImagePath = "../../";
if($CurrentPath=="") { $CurrentPath = $ImagePath; }
$CurrentPath =removeEndSlash($CurrentPath);
$UpPath = removeEndURL($CurrentPath);
?>
            <table width="100%" border="0" cellpadding="1" cellspacing="0" id="htmltool_table">
              <tr> 
                <td height="22" align="center" valign="middle">&nbsp;</td>
                <td height="22" colspan="2" align="left"><span class="font_style10">
                  <?php  echo $CurrentPath?>
                  </span></td>
              </tr>
              <?php 
if($CurrentPath!=$ImagePath) {
	$FullPathBaseURL = $FullPath . "/" . substr($CurrentPath,strlen($ImagePath)+1,strlen($CurrentPath));
	if($UpPath=="../.."){
		$link_btnhome = "?CurrentPath=".$UpPath . "/" . $file;
	}else{
		$link_btnhome = "javascript:void(0)";
	}
	
?>
              <tr onMouseOver="this.style.background='#DDDDDD'" onMouseOut="this.style.background=''"> 
                <td width="18" height="18" align="center" valign="middle"><img src="../../img/iconmenu/1283582620_045.png" width="16" height="16"></td>
                <td width="638" height="18" align="left"> <a href="<?php  echo $link_btnhome; ?>">..</a></td>
                <td width="41"><?php echo $UpPath;?></td>
              </tr>
              <?php 
} else {
	$FullPathBaseURL = $FullPath;
}

// Get Folder
$handle = opendir($CurrentPath); 
while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") { 
		if(is_dir($CurrentPath . "/". $file)) {
				// Get Files Inside
				$chk_filemod= explode("mod_", $file);
				$count_filemod=count($chk_filemod);
				if($count_filemod>=2){
				
				$FileInside=0;
				$ImageFileInside=0;
				$FileInsideHandle = opendir($CurrentPath . "/". $file); 
				while (false !== ($FileInsideFile = readdir($FileInsideHandle))) { 
					if ($FileInsideFile != "." && $FileInsideFile != "..") { 
							$FileInside++;
							if( is_file($CurrentPath . "/". $file . "/". $FileInsideFile) ) {
								//$size=GetImageSize($CurrentPath . "/". $file . "/". $FileInsideFile); 
								//if($size!=NULL) {
								$ImageFileInside++;
								//}
							}
						}
					}
					closedir($FileInsideHandle); 
			?>
              <tr onMouseOver="this.style.background='#DDDDDD'" onMouseOut="this.style.background=''"> 
                <td width="18" height="18" align="center" valign="middle"> 
                  <?php  if($FileInside==0) { ?>
                  <img src="../../img/iconmenu/1283582638_046.png" width="16" height="16"> 
                  <?php  } else { ?>
                  <img src="../../img/iconmenu/1283582638_046.png" width="16" height="16"> 
                  <?php  } ?>                </td>
                <td height="18" align="left"> <a href="?CurrentPath=<?php  echo $CurrentPath . "/" . $file ?>"> 
                  <?php  echo $file?>
                  </a></td>
                <td width="41">&nbsp;</td>
              </tr>
              <?php 
		}
		}
    } 
}
closedir($handle); 

// Get Files
$handle = opendir($CurrentPath); 
while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") { 
		if( is_file($CurrentPath . "/". $file) ) {
				?>
              <tr onMouseOver="this.style.background='#DDDDDD'" onMouseOut="this.style.background=''"> 
                <td width="18" height="18" align="center" valign="middle"> <img src="../../img/iconmenu/1283582674_169.png" width="16" height="16">                </td>
                <td height="18" align="left"> <a href="#" onClick="setPath('<?php  echo $file?>')">
                  <?php  echo $file?>
                  </a></td>
                <td width="41"> 
                  <?php  echo formatImageSize(filesize($CurrentPath . "/". $file))?>                </td>
              </tr>
              <?php 
		}
    } 
}
closedir($handle); 
?>
            </table>            </td>
        </tr>
      </table>
      <script language="JavaScript" type="text/JavaScript">
function setPath(myFile) {
	window.opener.document.myFormHome.inputlinkpath.value = '<?php  echo $CurrentPath?>'+'/'+myFile;
	window.close();
}
	  </script>    </td>
  </tr>
</table></td>
  </tr>

    <tr>
    <td  class="bg_footerbarhome" ></td>
  </tr>  
  <tr>
    <td align="center" style="padding-top:5px;"></td>
  </tr>
</table>
<?php 
include("../../inc/".$valFolderAction_Inc."/inc-footer-js.php");
?>
</body>
</html>
