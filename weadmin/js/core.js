function Paging_CheckAll(objCheckHeader, txtCheckBoxFirstName, intTotalItems) {
    if (intTotalItems > 0)
        for (i = 1; i <= intTotalItems; i++)
            document.getElementById(txtCheckBoxFirstName + i).checked = objCheckHeader.checked;
    return true;
}

function Paging_CheckAllHandle(objCheckHeader, txtCheckBoxFirstName, intTotalItems) {
    var isCheckedAll = true;
    if (intTotalItems > 0)
        for (i = 1; i <= intTotalItems; i++)
            if (!document.getElementById(txtCheckBoxFirstName + i).checked)
                isCheckedAll = false;
    objCheckHeader.checked = isCheckedAll;
    return true;
}

function Paging_CountChecked(txtCheckBoxFirstName, intTotalItems) {
    var intChecked = 0;
    if (intTotalItems > 0)
        for (i = 1; i <= intTotalItems; i++)
            if (document.getElementById(txtCheckBoxFirstName + i).checked)
                intChecked++;
    return intChecked;
}

function Paging_CheckedThisItem(objCheckHeader, indexing, txtCheckBoxFirstName, intTotalItems) {
    if (intTotalItems > 0)
        for (i = 1; i <= intTotalItems; i++)
            if (i == indexing) {
                document.getElementById(txtCheckBoxFirstName + i).checked = true;
            } else {
                document.getElementById(txtCheckBoxFirstName + i).checked = false;
            }
    objCheckHeader.checked = false;
    return true;
}


function boxContantLoad(fileAc) {
    jQuery("#boxWaittingContant").show();
	
	

	var TYPE = "POST";
    var URL = fileAc;

    var dataSet = jQuery("#myFormHome").serialize();
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoad").show();
            jQuery("#boxContantLoad").html(html);
            jQuery("#boxWaittingContant").hide();
        }
    });
}

function loadContantLogHome(fileAc) {
    var TYPE = "POST";
    var URL = fileAc;
    var dataSet = {};
    jQuery.ajax({
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadContantLogHome").show();
            jQuery("#loadContantLogHome").html(html);
        }
    });

}

function submitSearchForm(fileAc) {
	$('#myFormHome').unbind("keypress");
	
	$('.progress_ajax').removeClass('hide');
	$('.progress_ajax').css('width', '0%');

	var TYPE = "POST";
	var folderFile = $("#actionFolderFile").val();
	var URL = folderFile+'/'+fileAc;
    var dataSet = jQuery("#myFormHome").serialize();
    jQuery.ajax({
		xhr: function () {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
					if (percentComplete === 1) {
						$('.progress_ajax').addClass('hide');
					}
				}
			}, false);
			xhr.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
				}
			}, false);
			return xhr;
		},
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoad").show();
            jQuery("#boxContantLoad").html(html);
        }
    });

	
	
}


function checkLogoutUser() {
	$('.progress_ajax').removeClass('hide');
	$('.progress_ajax').css('width', '0%');

    var TYPE = "POST";
    var URL = "../core/login/logout.php";
    var dataSet = {};
    jQuery.ajax({
		xhr: function () {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
					if (percentComplete === 1) {
						$('.progress_ajax').addClass('hide');
					}
				}
			}, false);
			xhr.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
				}
			}, false);
			return xhr;
		},
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#loadCheckComplete").show();
            jQuery("#loadCheckComplete").html(html);
        }
    });
}

function editContactNew(fileAc) {
	
	$('#myFormHome').unbind("keypress");
	
	$('.progress_ajax').removeClass('hide');
	$('.progress_ajax').css('width', '0%');

	var TYPE = "POST";
	var folderFile = $("#actionFolderFile").val();
	var URL = folderFile+'/'+fileAc;
    var dataSet = jQuery("#myFormHome").serialize();
    jQuery.ajax({
		xhr: function () {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
					if (percentComplete === 1) {
						$('.progress_ajax').addClass('hide');
					}
				}
			}, false);
			xhr.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
				}
			}, false);
			return xhr;
		},
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoad").show();
            jQuery("#boxContantLoad").html(html);
        }
    });
}


function btnBackPage(fileAc) {
	
	$('#myFormHome').unbind("keypress");
	
	$('.progress_ajax').removeClass('hide');
	$('.progress_ajax').css('width', '0%');
	
    var TYPE = "POST";
	var folderFile = $("#actionFolderFile").val();
	var URL = folderFile+'/'+fileAc;
    var dataSet = jQuery("#myFormHome").serialize();
    jQuery.ajax({
		xhr: function () {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
					if (percentComplete === 1) {
						$('.progress_ajax').addClass('hide');
					}
				}
			}, false);
			xhr.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
				}
			}, false);
			return xhr;
		},
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {
            jQuery("#boxContantLoad").show();
            jQuery("#boxContantLoad").html(html);
        }
    });
}

function isBlank(myObj) {
    if (myObj.value == '') {
        return true;
    }
    return false;
}

function isNumber(myObj) {
    return !isNaN(myObj.value * 1)
}

function delPicUpload(fileAc,viewContent) {
	$('.progress_ajax').removeClass('hide');
	$('.progress_ajax').css('width', '0%');
	
	
	var actionFolder = jQuery("#actionFolderFile").val();


    var TYPE = "POST";
    var URL = actionFolder+'/'+fileAc;

    var dataSet = jQuery("#myFormHome").serialize();

    jQuery.ajax({
		xhr: function () {
			var xhr = new window.XMLHttpRequest();
			xhr.upload.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
					if (percentComplete === 1) {
						$('.progress_ajax').addClass('hide');
					}
				}
			}, false);
			xhr.addEventListener("progress", function (evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					//console.log(percentComplete);
					$('.progress_ajax').css({
						width: percentComplete * 100 + '%'
					});
				}
			}, false);
			return xhr;
		},
        type: TYPE,
        url: URL,
        data: dataSet,
        success: function(html) {

            jQuery("#"+viewContent).show();
            jQuery("#"+viewContent).html(html);
        }
    });
}

function popup(pname, purl, w, h, s) {
    LeftPosition = (screen.width) ? (screen.width - w - 8) / 2 : 0;
    TopPosition = (screen.height) ? (screen.height - h - 50) / 2 : 0;
    myWinName = window.open(purl, pname, "width=" + w + ",height=" + h + ",top=" + TopPosition + ",left=" + LeftPosition + ",resizable=yes,scrollbars=" + s);
    if (parseInt(navigator.appVersion) >= 4) {
        myWinName.window.focus();
    }
    return myWinName;
}

function setImageSelected(myPath) {
    window.opener.document.LibraryIconSample.src = myPath;
    window.opener.document.myFormHome.inputIconName.value = myPath;
    window.close();
}




