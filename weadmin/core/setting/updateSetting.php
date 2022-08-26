<?php 
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-super-config.php");

if($_REQUEST['execute']=="update"){
		$update=array();
		$update[]=$core_tb_setting."_lang  	='".changeQuot($_REQUEST['inputLang'])."'";
		$update[]=$core_tb_setting."_type  	='".changeQuot($_REQUEST['inputType'])."'";
		$update[]=$core_tb_setting."_subject  	='".changeQuot($_REQUEST['inputSubject'])."'";
		$update[]=$core_tb_setting."_title  	='".changeQuot($_REQUEST['inputTitle'])."'";
		$update[]=$core_tb_setting."_titleB  	='".changeQuot($_REQUEST['inputTitleB'])."'";
		$update[]=$core_tb_setting."_lastdate  	=".wewebNow($coreLanguageSQL)."";

		$sql="UPDATE ".$core_tb_setting." SET ".implode(",",$update)." WHERE ".$core_tb_setting."_id>=1";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);		
		
 }
?>
<?php  include("../../lib/disconnect.php");?>

<script type="text/javascript">
btnBackPage('loadContact.php');
</script>