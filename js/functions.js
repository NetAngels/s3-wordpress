/**
 * Created by SB on 06.11.14.
 */
//----------------------------------------------------------

function showNoMoreFiles()
{
    jQuery('#files_table').hide();
    jQuery('#no_more_files').show();
}

function countFiles()
{
    if (jQuery('.file').length==0)
    {
        showNoMoreFiles();
    }
}
function disableAllCheckBoxes() {
    jQuery('input[type=checkbox]').attr('disabled', 'disabled');
}
function enableAllCheckBoxes() {
    jQuery('input[type=checkbox]').removeAttr('disabled');
}
function setProcess(s) {
    jQuery('#process').html(s);
}
function hideCancel() {
    jQuery('.submit').show();
    jQuery('.cancel_area').hide();
}
function showCancel() {
    jQuery('.submit').hide();
    jQuery('.cancel_area').show();
}

function onCanceled()
{

}
function onEnded()
{

}


function netangelss3_send_checked_files_to_cloud() {
    var file = jQuery('#the-list input.file:checked').val()
    if (file === undefined) return false;
    netangelss3_send_file(file);
}

jQuery(document).ready(function () {
    jQuery('.send_to_cloud').click(function () {
        showCancel();
        window.canceled = false;
        disableAllCheckBoxes();
        netangelss3_send_checked_files_to_cloud()
    });

    jQuery('.cancel').click(function () {
        window.canceled = true;
        hideCancel();
        enableAllCheckBoxes();
    });
});
//----------------------------------------------------------
