<?php 
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-config.php");

$sql = "DELETE FROM ".$core_tb_sort." WHERE ".$core_tb_sort."_id='".$_REQUEST["delID"]."'";
$Query=wewebQueryDB($coreLanguageSQL,$sql);	

?>
<?php  include("../../lib/disconnect.php");?>


