		<script language="JavaScript"  type="text/javascript" src="js/jquery-1.9.0.js<?php echo $core_cache_browser;?>"></script>
        <script language="JavaScript"  type="text/javascript" src="js/jquery.blockUI.js<?php echo $core_cache_browser;?>"></script>
        <script language="JavaScript"  type="text/javascript" src="js/scriptCoreWeweb.js<?php echo $core_cache_browser;?>"></script>
        <script language="JavaScript"  type="text/javascript" src="js/progress.js<?php echo $core_cache_browser;?>"></script>
        <script language="JavaScript"  type="text/javascript">
            jQuery(function () {
                jQuery('form#myFormLogin').submit(function () {
                    with (document.myFormLogin) {
                        if (inputUser.value == '') {
                            inputUser.focus();
                            return false;
                        }
                        if (inputPass.value == '') {
                            inputPass.focus();
                            return false;
                        }
                    }
                    checkLoginUser();
                    return false;
                });
            });

        </script>
	<?php  wewebDisconnect($coreLanguageSQL); ?>
