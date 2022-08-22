<!-- <script language="JavaScript"  type="text/javascript" src="<?php echo $set_path_include; ?>js/jquery-1.9.0.js<?php echo $core_cache_browser;?>"></script>
<script language="JavaScript"  type="text/javascript" src="<?php echo $set_path_include; ?>js/jquery-ui-1.9.0.js<?php echo $core_cache_browser;?>"></script>
<script language="JavaScript"  type="text/javascript" src="<?php echo $set_path_include; ?>js/jquery.blockUI.js<?php echo $core_cache_browser;?>"></script>
<script language="JavaScript"  type="text/javascript" src="<?php echo $set_path_include; ?>js/scriptCoreWeweb.js<?php echo $core_cache_browser;?>"></script>
<script language="JavaScript"  type="text/javascript" src="<?php echo $set_path_include; ?>js/fancybox/jquery.fancybox.js<?php echo $core_cache_browser;?>"></script>
<script language="JavaScript"  type="text/javascript" src="<?php echo $set_path_include; ?>js/jquery.colorbox.js<?php echo $core_cache_browser;?>"></script> -->

<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/jquery-2.2.4.min.js"></script>
<script language="JavaScript" type="text/javascript" src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/jquery.easing.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/modernizr.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/progress.js<?php echo $core_cache_browser;?>"></script>

<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/select2/js/select2.min.js<?php echo $core_cache_browser;?>"></script>
<script language="JavaScript" type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/main.js<?php echo $core_cache_browser;?>"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $set_path_include; ?>js/core.js<?php echo $core_cache_browser;?>"></script>

<script type="text/javascript">
    jQuery(function () {
	 	boxContantLoad('../<?php echo $valuPathRealFolder?>/<?php echo $valuPathRealFile?>/<?php echo $valuPathRealAction?>');
	 });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 70) {
           $('.layout-content-topbar').addClass('sticky-element');
        } else {
           $('.layout-content-topbar').removeClass('sticky-element');
        }
    });
    
    $('.layout-header .collapse-sidebar .link').click(function(){
        $('.layout-page').toggleClass('open');
    });
</script>
