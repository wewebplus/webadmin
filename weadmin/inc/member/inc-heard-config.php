<?php 
$chk_level_file = explode("weadmin/", $_SERVER['REQUEST_URI']);
$chk_level_file =explode("/",$chk_level_file[1]);
$count_level_file =count($chk_level_file);
if($count_level_file>=3){
	$set_level_file =2;
	$set_path_include ="../../";
}else{
	$set_level_file =1;
	$set_path_include ="../";
}
include($set_path_include."lib/session.php");
include($set_path_include."lib/config.php");
include($set_path_include."lib/connect.php");
include($set_path_include."lib/function.php");
include($set_path_include."lib/checkMember.php");
include($set_path_include."lib/lang/".$_SESSION[$valSiteManage . "core_session_language_page"].".php");
$valuPathRealFolder= getFileNameReal(_getURL(),1);
$valuPathRealFile= getFileNameReal(_getURL(),0);
if($_REQUEST['actionFile']==""){
	$valuPathRealAction = "loadContact.php";
}else{
	$valuPathRealAction = $_REQUEST['actionFile'];
}
?>