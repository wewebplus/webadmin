<?php 
include("./lib/session.php");
include("./lib/config.php");
include("./lib/connect.php");
include("./lib/lang/".$_SESSION[$valSiteManage . "core_session_language_page"].".php");

if ($_SESSION[$valSiteManage . "core_session_language"] == "") {
    $_SESSION[$valSiteManage . "core_session_language"] = "Thai";
}
$_SESSION[$valSiteManage . "core_session_id"] = 0;
$_SESSION[$valSiteManage . "core_session_name"] = "";
$_SESSION[$valSiteManage . "core_session_level"] = "";
$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
$_SESSION[$valSiteManage . "core_session_groupid"] = 0;
$_SESSION[$valSiteManage . "core_session_permission"] = "";
$_SESSION[$valSiteManage . "core_session_logout"] = "";
?>