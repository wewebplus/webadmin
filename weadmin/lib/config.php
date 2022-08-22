<?php 
## Core php Config ######################################################
date_default_timezone_set('Asia/Bangkok');
ini_set('memory_limit', '128M');

## Core error ######################################################
error_reporting(0);

## Core Folder Local  ######################################################
$core_online_website = "dev";

if ($core_online_website == "dev") {
	$core_pathname_folderlocal = explode("/",$_SERVER['REQUEST_URI']);
	$core_pathname_folderlocal = "/".$core_pathname_folderlocal[1];
}else{
	$core_pathname_folderlocal = "";
}


## Core Path Name  ##################################################
if (shapeSpace_check_https()) {
	$httpOnline = "https";
} else {
	$httpOnline = "http";
}

define("_http", $httpOnline);
define("_DIR", str_replace("/lib","",str_replace("\\", '/', dirname(__FILE__))));
define("_URI", basename($_SERVER["REQUEST_URI"]));
define("_URL", _http."://" . $_SERVER['HTTP_HOST'] . $core_pathname_folderlocal."/" );
define("_FullUrl",_http."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
define("_HOST",_http."://".$_SERVER['HTTP_HOST']);
$core_full_path = "http://" . $_SERVER["HTTP_HOST"] . "" . $core_pathname_folderlocal;

## Core Upload  ######################################################
$core_pathname_upload = "../../upload";
$core_pathname_upload_fornt = "upload";
$core_pathname_mupload = "../core/upload/";
$core_pathname_logs = "../../../logs";
$core_pathname_crupload = "../../upload/core";
$core_pathname_inner_crupload = "../../../upload/core";




## Core Table  ######################################################
$core_tb_staff = "sy_stf";
$core_tb_menu = "sy_mnu";
$core_tb_group = "sy_grp";
$core_tb_permission = "sy_mis";
$core_tb_box = "sy_box";
$core_tb_search = "sy_sea";
$core_tb_log = "sy_logs";
$core_tb_sort = "sy_stm"; 
$core_tb_setting = "sy_stt";
$core_tb_user = "sy_usr";

## Other Table  ######################################################
$other_tb_geography = "ot_geo";
$other_tb_province = "ot_pro";
$other_tb_amphur = "ot_amp";
$other_tb_district = "ot_dis";
$other_tb_nation = "ot_nat";

## Core Icon  ######################################################
$core_icon_columnsize = 15;
$core_icon_maxsize = 75;
$core_icon_librarypath = "../img/iconmenu";
$core_icon_librarypath_popup = "../../img/iconmenu";

## Database Connect #################################################
$coreLanguageSQL = "mysqli";

if ($coreLanguageSQL == "mysqli") {
    $core_db_hostname = "192.168.1.129";
    $core_db_username = "weweb";
    $core_db_password = "IySY?Pk7!!mH";
    $core_db_name = "22_backoffice";

    // $core_db_hostname = "127.0.0.1";
    // $core_db_username = "root";
    // $core_db_password = "IySY?Pk7!!mH";
    // $core_db_name = "2021_dmcr_edaily";
} else {

    // $core_db_hostname = "122.155.197.70";
    // $core_db_username = "root";
    // $core_db_password = "DMCR@Cloud!@";
    // $core_db_name = "edaily";
    
}


$core_db_charecter_set = array(
    'charset' => "utf8",
    'collation' => "utf8_general_ci"
);


## Core Val Setting #############################################
$toolEditorStyle = "ToolbarAll";
$core_default_pagesize = 25;
$core_default_maxpage = 25;
$core_default_reduce = 10;
$core_sort_number = "DESC";
$core_height_leftmenu = 40;

## Core Language #############################################
$coreLanguageThai = "Thai";
$coreLanguageEng = "Eng";

## Core Email #############################################
$core_send_email = "info@dmcr.co.th";
$core_goto_email = "info@dmcr.co.th";

## Core Value #############################################
$coreMonthMem = array("-", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$coreMonthMemEng = array("-", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$coreTxtSexMember = array("", "ชาย", "หญิง");
$coreTxtSexMemberEn = array("", "Male", "Female");
$coreTxtTypeAccess=array("","เข้าสู่ระบบ","จัดการผู้ใช้งาน","จัดการเว็บไซต์","จัดการสิทธิผู้ใช้งาน");


## Core Cache #############################################
$core_cache_browserType = 2;
$core_cache_browser= wewebCacheBrowser($core_cache_browserType);


?>
