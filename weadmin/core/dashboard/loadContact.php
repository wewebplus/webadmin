<?php
    $valFolderAction_Inc = "member";
    include("../../inc/".$valFolderAction_Inc."/inc-heard-config.php");
?>
<div class="layout-topbar">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="title">
                <?php echo $langTxt["nav:home1"] ?>
            </h2>
        </div>
        <div class="col-auto">
            <span class="color-gray">
                <?php echo DateFormat(date('Y-m-d H:i:s')) ?>
            </span>
        </div>
    </div>
</div>
<div class="layout-content">
    <div class="dashboard-layout">
        <div class="dashboard-info row pb-2">
            <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
            <div class="col">
                <?php 
                    $sql_pic = "SELECT " . $core_tb_staff . "_picture, " . $core_tb_staff . "_logdate, " . $core_tb_staff . "_email, " . $core_tb_staff . "_groupid   FROM " . $core_tb_staff . " WHERE   " . $core_tb_staff . "_id 	='" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
                    $query_pic = wewebQueryDB($coreLanguageSQL, $sql_pic);
                    $row_pic = wewebFetchArrayDB($coreLanguageSQL, $query_pic);
                    $txt_pic_funtion = "../../upload/core/50/" . $row_pic[0];
                    
                    $valPicProfileTop = $txt_pic_funtion;
                    if (is_file($valPicProfileTop)) {
                    $valPicProfileTop = $valPicProfileTop;
                    } else {
                    $valPicProfileTop = "../img/btn/nouserHome.jpg";
                    }
                    
                    $valLoginProfileTop = DateFormat($row_pic[1]);
                    $valEmail = $row_pic[2];
                    $valGroupid = $row_pic[3];
                ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row gutters-15 align-items-center">
                            <div class="col-auto">
                                <figure class="cover">
                                    <img class="img-cover" src="<?php echo $valPicProfileTop ?>" alt="">
                                </figure>
                            </div>
                            <div class="col">
                                <?php 
                                    if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                                        $valLinkViewUser = "#";
                                    } else {
                                        $valLinkViewUser = "../core/userView.php";
                                    }
                                ?>
                                <a class="link color-default" href="<?php echo $valLinkViewUser ?>">
                                    <?php echo $_SESSION[$valSiteManage . "core_session_name"] ?>
                                </a>
                            </div>
                        </div>
                        <div class="mt-3 typo-xs color-gray">
                            <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
                                <?php echo $langTxt["us:permission"] ?> :-<br />
                                <?php echo $langTxt["us:email"] ?> :-<br />
                                <?php echo $langTxt["home:login"] ?> :-
                            <?php } else { ?>
                                <?php echo $langTxt["us:permission"] ?> : <?php 
                                    $sql_group = "SELECT " . $core_tb_group . "_id," . $core_tb_group . "_name  FROM " . $core_tb_group . " WHERE " . $core_tb_group . "_id='" . $valGroupid . "'   ORDER BY " . $core_tb_group . "_order DESC ";
                                    $query_group = wewebQueryDB($coreLanguageSQL, $sql_group);
                                    $row_group = wewebFetchArrayDB($coreLanguageSQL, $query_group);
                                    $row_groupid = $row_group[0];
                                    $row_groupname = $row_group[1];
                                    echo $row_groupname;
                                ?><br />
                                <?php echo $langTxt["us:email"] ?> : <?php echo $valEmail ?><br />
                                <?php echo $langTxt["home:login"] ?> : <?php echo $valLoginProfileTop ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php  if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row gutters-15 align-items-center">
                            <div class="col-auto">
                                <figure class="cover">
                                    <img class="img-cover" src="../img/login/cycle1.png" alt="">
                                </figure>
                            </div>
                            <div class="col">
                                <a class="link color-default" href="../core/userManage.php">
                                    <?php echo $langTxt["nav:userManage2"] ?>
                                </a>
                            </div>
                        </div>
                        <div class="mt-3 typo-xs color-gray">
                            <?php echo $langTxt["home:userDe"] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row gutters-15 align-items-center">
                            <div class="col-auto">
                                <figure class="cover">
                                    <img class="img-cover" src="../img/login/cycle4.png" alt="">
                                </figure>
                            </div>
                            <div class="col">
                                <a class="link color-default" href="../core/permisManage.php">
                                    <?php echo $langTxt["nav:perManage2"] ?>
                                </a>
                            </div>
                        </div>
                        <div class="mt-3 typo-xs color-gray">
                            <?php echo $langTxt["home:premisDe"] ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="title typo-sm color-primary"><?php  echo  $langTxt["home:used"] ?></h3>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-gray p-0" data-title="Export Excel" href="../core/dashboard/exportLog.php">
                            <img src="../img/iconfile/3.png" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div id="loadContantLogHome">
                    <!-- <img src="../img/loader/ajax-loaderHome.gif" style="padding-top:40px;" /> -->
                    <script language="JavaScript"  type="text/javascript">
               
                    $(document).ready(function() {
                        loadContantLogHome('./<?php echo $valuPathRealFile;?>/loadLog.php');
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>                       
<div>


<script language="JavaScript"  type="text/javascript">
	var countArrSort = '';
	jQuery(function () {
		jQuery("#boxHomeSort").sortable({
			update: function () {
				var order = jQuery('#boxHomeSort').sortable('serialize');
				countArrSort = order;
				jQuery("#inputSort").val(countArrSort);
				sortingContactHome('../core/dashboard/sortingHome.php')
			}
		});
		jQuery("#boxHomeSort").disableSelection();
	});
    $(document).ready(function() {
        $('#tile-page-head').html('<?php  echo  $langTxt["nav:home2"] ?>');
    });
</script>
<?php  include("../../lib/disconnect.php");?>