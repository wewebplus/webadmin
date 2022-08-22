<div class="layout-footer">
    <div class="row align-items-center">
        <div class="col">
            <?php  echo $langTxt["login:footecopy"]; ?> 
            <!-- <div>
                <?php  echo 'Current PHP Version: ' . phpversion(); ?>
            </div> -->
        </div>
        <div class="col-auto">
            <?php  echo $langTxt["login:footecontact"]; ?>
        </div>
    </div>
</div>

<div id="loadCheckComplete"></div>

<div class='progress' id="progress_div">
    <div class='bar' id='bar1'></div>
    <div class='percent' id='percent1'></div>
    <input type="hidden" id="progress_width" value="0">
</div>
<div class="progress_ajax"></div>

<?php  include("../inc/member/inc-footer-loderbox.php"); ?>
<?php  include("../lib/disconnect.php"); ?>
