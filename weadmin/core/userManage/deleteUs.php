<?php 
$valFolderAction_Inc = "member";
include("../../inc/".$valFolderAction_Inc."/inc-heard-manage-config.php");

for($i=1;$i<=$_REQUEST['TotalCheckBoxID'];$i++) {
 $myVar=$_REQUEST['CheckBoxID'.$i];

	if(strlen($myVar)>=1) {
		$permissionID=$myVar;
		
		$sql="DELETE FROM ".$core_tb_staff." WHERE ".$core_tb_staff."_id=".$permissionID." ";
		$Query=wewebQueryDB($coreLanguageSQL,$sql);
	}
}

logs_access('2','Delete');
	?>
<?php  include("../lib/disconnect.php");?>

<input name="inputSearch" type="hidden" id="inputSearch" value="<?php  echo $_REQUEST['inputSearch']?>" />
<input name="inputGh" type="hidden" id="inputGh" value="<?php  echo $_REQUEST['inputGh']?>" />
<script type="text/javascript">
btnBackPage('loadContact.php');
</script>