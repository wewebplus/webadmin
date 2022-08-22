<?php 
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-super-config.php");

	if(file_exists($core_pathname_inner_crupload."/".$_REQUEST['picheader'])) {
		@unlink($core_pathname_inner_crupload."/".$_REQUEST['picheader']);
	}	
	$update=array();
	$update[]=$core_tb_setting."_header  	=''";
	$sql="UPDATE ".$core_tb_setting." SET ".implode(",",$update)." WHERE  ".$core_tb_setting."_id > 0 ";
	//print_pre($sql);
	$Query=wewebQueryDB($sql);

?>
<?php  include("../../lib/disconnect.php");?>

