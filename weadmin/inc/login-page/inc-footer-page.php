        <!-- <div class="footerBackOffice">
            <div>
                <div class="imgLogo"><?php  echo  $langTxt["login:footecopy"] ?> <i class="versionsmall"><?php  echo 'Current PHP Version: ' . phpversion(); ?></i></div>
                <div class="divLogin"><?php  echo  $langTxt["login:footecontact"] ?></div>
            </div>
        </div> -->
        
        <div id="tallContent" style="display:none">
            <span style="font-size:18px;">Please waiting..</span>
            <div style="height:10px;"></div>
            <img src="img/loader/login.gif" />
        </div>
        
        <div class='progress' id="progress_div">
            <div class='bar' id='bar1'></div>
            <div class='percent' id='percent1'></div>
            <input type="hidden" id="progress_width" value="0">
        </div>
