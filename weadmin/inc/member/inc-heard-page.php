<div class="layout-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="collapse-sidebar">
                <a href="javascript:void(0)" class="link">
                    <span class="feather icon-menu"></span>
                </a>
            </div>
            <!-- <h2 class="title typo-lg" id="tile-page-head"></h2> -->
        </div>
        <div class="col-auto">
            <div class="member">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="link" data-toggle="dropdown">
                        <?php 
                        if (!empty($_SESSION[$valSiteManage."core_session_picture"])) {
                            $valPicProfileTop = $_SESSION[$valSiteManage."core_session_picture"];
                        }else{
                            $valPicProfileTop = load_picmemberBack($_SESSION[$valSiteManage . "core_session_id"]);
                            if (is_file($valPicProfileTop)) {
                                $valPicProfileTop = $valPicProfileTop;
                            } else {
                                $valPicProfileTop = "../img/btn/nouser.jpg";
                            }
                        }
                        if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
                            $valLinkViewUser = "#";
                        } else {
                            $valLinkViewUser = "../core/userView.php";
                        }
                        ?>
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <h4 class="title">
                                    <?php  echo  $_SESSION[$valSiteManage . "core_session_name"] ?>
                                </h4>
                            </div>
                            <div class="col-auto">
                                <figure class="cover">
                                    <img class="img-cover" src="<?php  echo  $valPicProfileTop ?>" alt="">
                                </figure>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <?php if ($_SESSION[$valSiteManage . "core_session_groupid"] == "11" && $_SESSION[$valSiteManage . "core_session_typeusermini"] == 0) { ?>
                            <li>
                                <a class="link" href="../core/userMiniManage.php" title="<?php  echo  $langTxt["nav:userManage2"] ?>">
                                    <span class="mr-1 feather icon-user"></span>
                                    <?php  echo  $langTxt["nav:userManage2"] ?>
                                </a>
                            </li>
                        <?php }else{ ?>
                            <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin" || $_SESSION[$valSiteManage . "core_session_level"] == "admin") { ?>
                                <li>
                                    <a class="link" href="../core/userManage.php" title="">
                                        <span class="mr-1 feather icon-user"></span>
                                        <?php  echo  $langTxt["nav:userManage2"] ?>
                                    </a>
                                </li>
                                <li>
                                    <a class="link" href="../core/permisManage.php" title="">
                                        <span class="mr-1 feather icon-layers"></span>
                                        <?php  echo  $langTxt["nav:perManage2"] ?>
                                    </a>
                                </li>
                            <?php  } ?>
                            <?php if ($_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") { ?>
                                <li>
                                    <a class="link" href="../core/menuManage.php" title="">
                                        <span class="mr-1 feather icon-sidebar"></span>
                                        <?php  echo  $langTxt["nav:menuManage2"] ?>
                                    </a>
                                </li>
                                <li>
                                    <a class="link" href="../core/setting.php" title="">
                                        <span class="mr-1 feather icon-settings"></span>
                                        <?php  echo  $langTxt["nav:setting"] ?>
                                    </a>
                                </li>
                            <?php  } ?>
                        <?php } ?>
                        <li>
                            <a class="link" href="javascript:void(0)"onclick="checkLogoutUser();" title="">
                                <span class="mr-1 feather icon-log-out"></span>
                                <?php  echo  $langTxt["menu:logout"] ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<input id="pathTojs" type="hidden" value="<?php  echo $core_pathname_folderlocal;?>">