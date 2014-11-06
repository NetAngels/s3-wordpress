/**
 * Created by SB on 06.11.14.
 */
function disableAllCheckBoxes()
{
  $('input[type=checkbox]').attr('disable','disable');
}
function enableAllCheckBoxes()
{
    $('input[type=checkbox]').removeAttr('disable');
}
function setProcess(s) {
    jQuery('#process').html(s);
}
function hideCancel()
{
    jQuery('.submit').show();
    jQuery('.cancel_area').hide();
    canceled = false;
}
function showCancel()
{
    jQuery('.submit').hide();
    jQuery('.cancel_area').show();
}

function netangelss3_send_checked_files_to_cloud() {
    var file = jQuery('#the-list input.file:checked').val()
    if (file === undefined) return false;
    netangelss3_send_file(file);
}

jQuery(document).ready(function () {
    jQuery('.send_to_cloud').click(function () {
        showCancel();
        canceled = false;
        disableAllCheckBoxes();
        jQuery('#the-list input.file:checked').attr('disable','disable');
        netangelss3_send_checked_files_to_cloud()
    });

    jQuery('.cancel').click(function () {
        canceled=true;
        hideCancel();
        enableAllCheckBoxes();
    });
});