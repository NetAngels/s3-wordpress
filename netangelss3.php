<?php
/*
Plugin Name: NetAngels S3
Plugin URI: http://netangels.ru
Description: NetAngels S3 plugin
Version: 0.0.1
Author:YK
Author URI: ural.im
License: GPLv2
*/
include('classes/S3.php');
require('functions.php');

add_filter('media_upload_tabs', 'my_plugin_image_tabs', 1, 1);

$s3 = s3_create();

function my_plugin_image_tabs($_default_tabs)
{
    unset($_default_tabs['type']);
    unset($_default_tabs['type_url']);
    unset($_default_tabs['gallery']);
    $_default_tabs = array();
    return ($_default_tabs);
}

/*** INSTALL/USIN HOOK ***/
function on_install()
{
    add_option('netangelss3_key_id', '', '', 'yes');
    add_option('netangelss3_secret_key', '', '', 'yes');
    $domain = site_url();
    $domain = strtr($domain, array('http://' => '', 'https://' => '', '/' => '-', '.' => '-'));
    $bucket = 'wordpress-' . $domain;
    add_option('netangelss3_bucket', $bucket, '', 'yes');
    add_option('netangelss3_auto_enable', '0', '', 'yes');
}

function on_uninstall()
{
    remove_option('netangelss3_key_id');
    remove_option('netangelss3_secret_key');
    remove_option('netangelss3_bucket');
    remove_option('netangelss3_auto_enable');
}

register_activation_hook(__FILE__, 'on_install');
register_deactivation_hook(__FILE__, 'on_uninstall');

/*** END INSTALL/UNISTALL HOOK ***/
/*** VIEW IN ADMIN AREA ***/
function netangelss3_options()
{
    $save = false;
    if ($_POST) {
        $save = true;
        ($_POST['enable'] == 'on') ? ($enable = '1') : ($enable = '0');
        update_option('netangelss3_key_id', $_POST['key_id']);
        update_option('netangelss3_secret_key', $_POST['secret_key']);
        update_option('netangelss3_auto_enable', $enable);
    }
    $key_id = get_option('netangelss3_key_id');
    $secret_key = get_option('netangelss3_secret_key');
    $enable = get_option('netangelss3_auto_enable');
    include('template/options.php');
}

function netangelss3_options_files_from_s3()
{
    global $s3;
    $files = s3_getList($s3);
    include('template/files_from_s3.php');
}

function netangelss3_options_files_to_s3()
{

    $key_id = get_option('netangelss3_key_id');
    $secret_key = get_option('netangelss3_secret_key');
    $enable = get_option('netangelss3_auto_enable');
    $files = array();
    $upload_dir = wp_upload_dir();
    filelist_get(&$files, $upload_dir['basedir']);
    // Security FIX - HIDE FULL PATH
    for ($i = 0; $i < count($files); $i++) {
        $files[$i] = strtr($files[$i], array($upload_dir['basedir'] => ''));
    }
    include('template/files_to_s3.php');

}


function netangelss3_get_from_cloud()
{
    global $wpdb;
    global $s3;
    $upload_dir = wp_upload_dir();
    $name = $_REQUEST['file'];
    $basename = basename($_REQUEST['file']);
    $path = strtr($name, array($basename => ''));
    $simple_path = '/from_netangels_s3/' . $path;
    $simple_file_path = '/from_netangels_s3/' . $path . $basename;
    $path = $upload_dir['basedir'] . $simple_path;
    $destpath = $upload_dir['basedir'] . $simple_file_path;
    $destpath_url = $upload_dir['baseurl'] . $simple_file_path;
    $srcpath_url = netangelss3_url_getFullUrl($name);
    mkdir($path, 0777, true);
    print $path . " \r\n";
    print $destpath . " \r\n";
    print $destpath_url . " \r\n";
    print $srcpath_url . " \r\n";

    getfromcloud($s3, $name, $destpath);

    netangelss3_replace_in_post_and_pages($srcpath_url, $destpath_url);
    print 'netangelss3_replace_in_post_and_pages("' . $srcpath_url . '","' . $destpath_url . '");' . " \r\n";
    $attachment = array(
        'guid' => $upload_dir['baseurl'] . $simple_file_path,
        'post_mime_type' => $filetype = wp_check_filetype($basename, null),
        'post_title' => preg_replace('/\.[^.]+$/', '', $basename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment($attachment, $upload_dir['basedir'] . $simple_file_path);
    if ($_REQUEST['move'] == '1') {
        delete_in_cloud($s3, $name);
    }
    die();
}

add_action('wp_ajax_netangelss3_get_from_cloud', 'netangelss3_get_from_cloud');

function netangelss3_send_file()
{
    global $wpdb;
    global $s3;
    $upload_dir = wp_upload_dir();
    $name = netangelss3_s3_name($_REQUEST['file']);
    $r = sendtocloud($s3, $upload_dir['basedir'] . $_REQUEST['file'], $name);
    if (!$r) die('ERROR');
    if ($_REQUEST['move'] == '1') {

        $upload_dir = wp_upload_dir();
        $from1 = $_REQUEST['file'];
        $from2 = $upload_dir['baseurl'] . $from1;
        netangelss3_replace_in_post_and_pages($from2, $r);
        //netangelss3_replace_in_post_and_pages($from1,$r);
        unlink($upload_dir['basedir'] . $_REQUEST['file']);
    }
    print $r . ' ' . $upload_dir['basedir'] . $_REQUEST['file'] . ' ' . $name . ' ' . $r;
    //wp_ajax_die();
    die();
}

add_action('wp_ajax_netangelss3_send_file', 'netangelss3_send_file');


function netangelss3_options_add_to_menu()
{
    add_plugins_page('NetAngels S3', 'NetAngels S3', 'manage_options', 'netangelss3-options', 'netangelss3_options');
    add_plugins_page('NetAngels S3', 'Перенос файлов в NetAngels S3', 'manage_options', 'netangelss3-options-files-to-s3', 'netangelss3_options_files_to_s3');
    add_plugins_page('NetAngels S3', 'Перенос файлов из NetAngels S3', 'manage_options', 'netangelss3-options-files-from-s3', 'netangelss3_options_files_from_s3');
}

add_action('admin_menu', 'netangelss3_options_add_to_menu');
/*** END VIEW ADMIN AREA ***/
/*** WP_CRON ***/
add_action('netangelss3_try_send_to_cloud_auto', 'netangelss3_try_send_to_cloud_auto');

if (!wp_next_scheduled('netangelss3_try_send_to_cloud_auto')) {
    wp_schedule_event(time(), 'hourly', 'netangelss3_try_send_to_cloud_auto');
}

function netangelss3_try_send_to_cloud_auto()
{
    $enable = get_option('netangelss3_auto_enable');

    $admin_email = get_settings('admin_email');
    wp_mail($admin_email, 'Автоматическое письмо', 'Запланированное письмо от WordPress.' . $enable);

    if ($enable != '1') {
        return false;
    }
    $files = array();
    $upload_dir = wp_upload_dir();
    filelist_get(&$files, $upload_dir['basedir']);
    $count = count($files);
    if ($count > 10) $count = 10; // Загружаем 10 файлов за раз
    $s = '';
    for ($i = 0; $i <= $count; $i) {
        $name1 = strtr($files[$i], array($upload_dir['basedir'] => ''));
        $name2 = netangelss3_s3_name($name1);
        $r = sendtocloud($s3, $files[$i], $name2);
        $s .= $files[$i] . '=>' . $r . "\r\n";
        if (!$r) die('ERROR');
        $from1 = $name1;
        $from2 = $upload_dir['baseurl'] . $from1;
        //netangelss3_replace_in_post_and_pages($from1,$r);
        netangelss3_replace_in_post_and_pages($from2, $r);
        unlink($upload_dir['basedir'] . $name1);

    }
    $admin_email = get_settings('admin_email');
    wp_mail($admin_email, 'Автоматическое письмо', 'Запланированное письмо от WordPress.' . $s);
}

/*** END CRON ***/
/*** Attach url filter ***/

function remove_media_library_tab($tabs)
{
    unset($tabs['library']);
    $tabs['netangelss3'] = 'NetAngels S3';
    return $tabs;
}

add_filter('media_upload_tabs', 'remove_media_library_tab');

function s3_upload_form_html()
{
    $s = '';
    $s .= '<form  enctype="multipart/form-data" method="post">';
    $s .= '<input type="file" name="file">';
    $s .= '<input type="submit" value="Сохранить">';
    $s .= '</form>';
    return $s;
}

function getTypeByName($name)
{
    $filetype = wp_check_filetype($name);
    list($maintype, $subtype) = explode('/', $filetype['type']);
    $filetype['maintype'] = $maintype;
    $filetype['subtype'] = $subtype;
    $filetype['wptype'] = wp_ext2type($filetype['ext']);
    if ($filetype['wptype'] == '') $filetype['wptype'] = 'default';
    return $filetype;
}

function getLiElement($item)
{
    $name = $item['name'];
    $url = netangelss3_url_getFullUrl($name);
    $type = getTypeByName($name);
    $s = '<li class="netangels_attachment" data-fileurl="' . $url . '" data-type="' . $type['maintype'] . '">';
    $s .= '<div class="type-' . $type['maintype'] . '">';
    $typ = getTypeByName($name);
    switch ($typ['maintype']) {
        case 'image':
            $s .= '<img src="/wp-includes/images/media/default.png" class="netangels_icon" draggable="false">';;
            break;
        default:
            $s .= '<img src="/wp-includes/images/media/' . $type['wptype'] . '.png" class="netangels_icon" draggable="false">';
            break;
    }
    $s .= '<div class="filename">';
    $s .= '<div>' . $name . '</div>';
    $s .= '</div>';
    $s .= '<a class="check" href="#" title="Снять выделение"><div class="media-modal-icon"></div></a>';
    $s .= '</div>';
    $s .= '</li>';
    return $s;
}


function netangelss3_view_tab()
{
    global $s3;
    //------------------------------------------------------
    $tabs = array();
    $settings = array(
        'tabs' => $tabs,
        'tabUrl' => add_query_arg(array('chromeless' => true), admin_url('media-upload.php')),
        'mimeTypes' => wp_list_pluck(get_post_mime_types(), 0),
        'captions' => !apply_filters('disable_captions', ''),
        'nonce' => array(
            'sendToEditor' => wp_create_nonce('media-send-to-editor'),
        ),
        'post' => array(
            'id' => 0,
        ),
    );

    $settings = apply_filters('media_view_settings', $settings, $post);
    $settings = apply_filters('media_view_settings', $settings, $post);
    $strings['settings'] = $settings;
    //------------------------------------------------------
    wp_enqueue_style('media');
    wp_localize_script('media-views', '_wpMediaViewsL10n', $strings);
    wp_enqueue_script('media-editor');
    wp_enqueue_script('media-views');
    wp_enqueue_script('media-audiovideo');
    wp_enqueue_style('media-views');
    wp_enqueue_script('wp-ajax-response');
    wp_enqueue_script('image-edit');
    wp_enqueue_style('imgareaselect');
    if (is_admin()) {
        wp_enqueue_script('mce-view');
        wp_enqueue_script('image-edit');
    }
    wp_enqueue_style('imgareaselect');
    $GLOBALS['body_id'] = 'media-upload1';
    $body_id = 'media-upload1';

    iframe_header(__('NetAngels S3', 'netangelss3'));

    //Add the Media buttons
    media_upload_header();


    if (!s3_connected()) {
        print __('Плагин ещё не настроен');
        return false;
    }
    if ($_FILES) {
        $r = sendtocloud($s3, $_FILES['file']['tmp_name'], basename($_FILES['file']['name']));
        if ($r) {
            print '<div id="message2" class="updated below-h2"><p>Файл загружен.</p></div>';
        }
    }
    add_thickbox();
    print '<script src="' . plugins_url('js/mediaselect.js', __FILE__) . '?' . rand(1, 10000) . '"></script>';
    print '<link rel="stylesheet" id="netangelss3"  href="' . plugins_url('css/style.css', __FILE__) . '?sddd" type="text/css" media="all" />';
    print '<div class="netangelss3_media_insert_list">';
    print  s3_upload_form_html();
    $list = s3_getList($s3);

    print '<ul class="netangles_attachments ui-sortable ui-sortable-disabled">';
    foreach ($list as $item) {
        print getLiElement($item);
    }
    print '</ul>';
    print '</div>';
    print '<div class="netangelss3_media_insert_panel">';
    print '<br />';
    print '</div>';
    iframe_footer();
    return true;
}

add_filter('media_upload_netangelss3', 'netangelss3_view_tab');


/* ATTACHMENT PATCH */

function netangelss3_wp_get_attachment_url($link, $id)
{
    $file_path = get_attached_file($id);
    if (file_exists($file_path)) {
        return $link;
    }
    $upload_dir = wp_upload_dir();
    $link = strtr($link, array($upload_dir['baseurl'] => ''));
    $link = netangelss3_s3_name($link);
    $link = netangelss3_url_getFullUrl($link);
    return $link;
}

add_filter('wp_get_attachment_url', 'netangelss3_wp_get_attachment_url', 10, 2);

register_activation_hook(__FILE__, 'netangelss3_cron_event');
add_action('netangelss3_hourly_event', 'netangelss3_do_this_hourly');

function netangelss3_cron_event()
{
    wp_schedule_event(current_time('timestamp'), 'hourly', 'netangelss3_hourly_event');
}

function netangelss3_do_this_hourly()
{
    $enable = get_option('netangelss3_auto_enable');
    mail('admin@dotsb.net.ru', 'Subj', 'netangelss3_do_this_hourly ' . $enable);
}