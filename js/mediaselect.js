function netangelss3_insertAtCaret(areaId, text) {
    var txtarea = window.parent.document.getElementById(areaId);
    var scrollPos = txtarea.scrollTop;
    var strPos = 0;
    var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ? "ff" : (document.selection ? "ie" : false));
    if (br == "ie") {
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart('character', -txtarea.value.length);
        strPos = range.text.length;
    }
    else if (br == "ff")
        strPos = txtarea.selectionStart;

    var front = (txtarea.value).substring(0, strPos);
    var back = (txtarea.value).substring(strPos, txtarea.value.length);
    txtarea.value = front + text + back;
    strPos = strPos + text.length;
    if (br == "ie") {
        txtarea.focus();
        var range = document.selection.createRange();
        range.moveStart('character', -txtarea.value.length);
        range.moveStart('character', strPos);
        range.moveEnd('character', 0);
        range.select();
    }
    else if (br == "ff") {
        txtarea.selectionStart = strPos;
        txtarea.selectionEnd = strPos;
        txtarea.focus();
    }
    txtarea.scrollTop = scrollPos;
}

function netangelss3_insertHTMLCode(str) {
    var obj = window.parent.tinyMCE;
    if (!obj.activeEditor || obj.activeEditor.isHidden()) {
        netangelss3_insertAtCaret('content', str);
    } else {
        obj.activeEditor.execCommand('mceInsertContent', 0, str);
    }
}
function netangelss3_paste_file() {
    netangelss3_insertHTMLCode(jQuery('#htmlstr').val());
    window.parent.wp.media.frame.close()
}

function netangelss3_gen_html_code() {
    var tp = jQuery('#filetype').val();
    var file = jQuery('#file').val();
    var alt = jQuery('#alt').val();
    var shtml = '';
    if (tp == 'image') {
        shtml += '<img alt="' + alt + '" src="' + file + '" />';
    }
    else {
        shtml += '<a href="' + file + '">' + alt + '</a>';
    }
    jQuery('#htmlstr').val(shtml);
}

function netangelss3_show_file(file, tp) {

    var shtml = '';
    if (tp == 'image') {
        shtml += '<div class="netangels_preview" style="background-image: url(\'' + file + '\');"></div>';
    }
    alt = file.substr(file.lastIndexOf('/') + 1)
    shtml += 'Адрес файла:<br /> <input type="text" readonly="readonly" style="width:100%" id="file" value="' + file + '"><br /><br />';
    shtml += 'Текст/Alt текст:<br /> <input type="text" style="width:100%" id="alt" value="' + alt + '"><br /><br />';
    shtml += 'Html код: <br /> <textarea id="htmlstr"  style="width:100%">';
    shtml += '</textarea>';
    shtml += '<input type="hidden" id="filetype" value="' + tp + '" />';
    shtml += '<br /><br /><br />'
    shtml += '<a href="#" onclick="netangelss3_paste_file()" class="netangels_button">Вставить</a>';
    jQuery('.netangelss3_media_insert_panel').html(shtml);
    jQuery('#alt').unbind('change');
    jQuery('#alt').change(function () {
        netangelss3_gen_html_code();
    });
    jQuery('#alt').keydown(function () {
        netangelss3_gen_html_code();
    });
    jQuery('#alt').keyup(function () {
        netangelss3_gen_html_code();
    });
    netangelss3_gen_html_code();
}

jQuery(document).ready(function () {
    jQuery('.netangels_attachment').click(function () {
        file = jQuery(this).attr('data-fileurl');
        tp = jQuery(this).attr('data-type');
        netangelss3_show_file(file, tp)
    });
//-----
});