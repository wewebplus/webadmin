<?php 
include("../../lib/session.php");
include("../../lib/config.php");
include("../../lib/connect.php");
include("../../lib/function.php");
include("../../lib/lang/".$_SESSION[$valSiteManage . "core_session_language_page"].".php");
$valuPathRealFile= getFileNameReal(_getURL(),0);
$valuPathRealFolder= getFileNameReal(_getURL(),1);
if($_REQUEST['actionFile']==""){
	$valuPathRealAction = "loadContact.php";
}else{
	$valuPathRealAction = $_REQUEST['actionFile'];
}

?>