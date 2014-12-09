<?php
/*
Plugin Name: NetAngels S3
Plugin URI: http://netangels.ru
Description: NetAngels S3 plugin
Version: 0.0.1
Author:YK
Author URI: ural.im
License: GPL
*/

define(NETANGELSS3_DEBUG, false);
define(NETANGELSS3_JS_DEBUG, false);
define(NETANGELSS3_WPCRON_DEBUG, true);
define(NETANGELSS3_BACK, '&lt;&lt; Назад');
define(NETANGELSS3_HTML_NEWLINE, "\r\n");
define(NETANGELSS3_DOIT, 'Обрабатываю');
define(NETANGELSS3_ENDED, 'Завершено');
define(NETANGELSS3_SELALL, 'Выделить все');
define(NETANGELSS3_SEL, 'Выбрать');
define(NETANGELSS3_FILE, 'файл');
define(NETANGELSS3_SIZE, 'размер');
define(NETANGELSS3_DESCR, 'описание');
define(NETANGELSS3_CANCEL, 'Отмена');
define(NETANGELSS3_CANCELED_PROCESS, 'Отменяю');
define(NETANGELSS3_CANCELED, 'Отменено');
define(NETANGELSS3_SAVE, 'Сохранить изменения');
define(NETANGELSS3_SAVE_LOADING, 'Сохраняю изменения...');

define(NETANGELSS3_SHOW_MOVE_LINK_IN_MENU, false);

define(NETANGELSS3_MAX_FILES_PER_TIME, 10);
define(NETANGELSS3_MAX_SIZE_PER_TIME, 2097152);
define(NETANGELSS3_FROM_CLOUD_CHMOD_DIR, 0777);
define(NETANGELSS3_FROM_CLOUD_CHMOD, 0777);
define(NETANGELSS3_ENDPOINT, 's3.netangels.ru');

define(NETANGELSS3_FROM_ERROR, 'Произошла ошибка загрузки. Файл:');
define(NETANGELSS3_TO_ERROR, 'Произошла ошибка выгрузки. Файл:');

define(NETANGELSS3_ERRORS_EMPTY_KEY, 'Не указан key_id');
define(NETANGELSS3_ERRORS_EMPTY_SECRET_KEY, 'Не указан secret_key');
define(NETANGELSS3_ERRORS_BAD_KEYS, 'Неправильно указаны ключи.');

define(NETANGELSS3_MESSAGES_SAVED, 'Сохранено');
define(NETANGELSS3_MESSAGES_CREATE_BUCKET, 'Корзины не существует. Создаем');

define(NETANGELSS3_MESSAGES_BEFORE_DOWNLOADING_FROM_S3, 'Ранее загруженный из NetAngels S3');
define(NETANGELSS3_MESSAGES_NO_FILES_TO_UPLOAD_TO_CLOUD, 'Пока нет файлов для загрузки в NetAngels S3');
define(NETANGELSS3_MESSAGES_NO_FILES_IN_CLOUD, 'Пока нет файлов в NetAngels S3');

/* OPtion page */
define(NETANGELSS3_MESSAGES_KEY_ID, 'Key ID');
define(NETANGELSS3_MESSAGES_SECRET_KEY, 'Secret Key');

define(NETANGELSS3_LINK_GET_KEYS, 'https://panel.netangels.ru/s3/account/');
define(NETANGELSS3_MESSAGES_OPEN_LINK1, 'Откройте эту страницу');
define(NETANGELSS3_MESSAGES_SHOW_KEYS, ' и нажмите "Показать реквизиты", затем скопируйте их в соотвествующие поля ниже.');
define(NETANGELSS3_LINK_VIDEO_GET_KEYS, 'http://www.youtube.com/watch?v=skFoVwc_BCQ&feature=youtu.be');
define(NETANGELSS3_MESSAGE_VIDEO_GET_KEYS, 'Видео-инструкция');

define(NETANGELSS3_MESSAGES_ALL_FILE_WILL_MOVE_TO_CLOUD, 'Все загружаемые вами файлы будут автоматически переноситься в Облачное S3 хранилище NetAngels');
define(NETANGELSS3_MESSAGES_AUTO_MOVE_TO_CLOUD, 'Автоматический перенос файлов в Netangels S3');
/* end OPtion page */
define(NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_TO, 'Перенос файлов в NetAngels S3');
define(NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_FROM, 'Перенос файлов из NetAngels S3');


/* TO page */
define(NETANGELSS3_MESSAGES_MANUAL_TO_THIS_LOCAL_FILES, 'Локальные файлы, которые ранее были загружены вместе с записями. Вы можете загрузить
их в Облачное хранилище Netangels. При этом, пути к файлам, в записях и страницах, будут изменены автоматически.');
define(NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_SEND_TO_CLOUD, 'Отправить в облако');
define(NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_DELETE_LOCAL, 'Переносить в облако ');
/* FROM page */
define(NETANGELSS3_MESSAGES_MANUAL_TO_THIS_S3_FILES, 'Эти файлы были ранее загружены в Облачное хранилище NetAngels.
В случае выгрузки из хранилища они будут помещены в папку "from_netangels_s3". При этом, пути к файлам, в записях и страницах, будут изменены автоматически.');
define(NETANGELSS3_MESSAGES_MANUAL_DOWNLOAD_FROM_CLOUD, 'Загрузить из облака');
define(NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_DELETE_IN_CLOUD, 'Удалять в облаке');


define(NETANGELSS3_MESSAGES_NO_FILES_TO_UPLOAD_TO_CLOUD_DESCR, ' Нажатие на кнопку
"' . NETANGELSS3_MESSAGES_MANUAL_DOWNLOAD_FROM_CLOUD . '" запустит процесс
копирования файлов из Облачного S3 хранилища NetAngels в хранилище вашего
WordPress. Опция ' . NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_DELETE_IN_CLOUD . ' указывает на то, удалять ли исходные файлы при копировании их в хранилище WordPress.');
define(NETANGELSS3_MESSAGES_NO_FILES_TO_UPLOAD_TO_CLOUD_DESCR2, 'Пожалуйста не
закрывайте окно и не обновляйте страницу до завершения процесса копирования.');
define(NETANGELSS3_MESSAGES_MANUAL_DOWNLOAD_FROM_CLOUD_DESCR, 'Нажатие на кнопку
"' . NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_SEND_TO_CLOUD . ' запустит
процесс копирования файлов из WordPress в Облачное S3 хранилище
NetAngels. Опция
' . NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_DELETE_LOCAL . ' указывает на то, удалять ли исходные файлы при копировании их в хранилище NetAngels.');
define(NETANGELSS3_MESSAGES_MANUAL_DOWNLOAD_FROM_CLOUD_DESCR2, 'Пожалуйста не
закрывайте окно и не обновляйте страницу до завершения процесса копирования.');

define(NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM, 'Проблема с загрузкой файлов в хранилище NetAngels.');
define(NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TEXT, 'Не удалось загрузить один или несколько файлов в хранилище NetAngels.');

define(NETANGELSS3_MESSAGES_CREATE_BUCKET_BIG_ERROR, 'Ошибка: Не удалось создать корзину. Возможная ппроблемы: проблемы с хранилищем NetAngels/проблемы с соединение с хранилищем. Обратитесь в тех поддержку. ');

define(NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TECH_INFO, 'Техническая информация:');
define(NETANGELSS3_SEND_ERRORS_TEXT, 'Отправлять ошибки');
define(NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TECH_INFO_FILE, 'Файл:');
include('classes/S3.php');
require('functions.php');


/*** INSTALL/USIN HOOK ***/
function netangelss3_onInstall()
{
    add_option('netangelss3_key_id', '', '', 'yes');
    add_option('netangelss3_secret_key', '', '', 'yes');
    $domain = site_url();
    $domain = strtr($domain, array('http://' => '', 'https://' => '', '/' => '-', '.' => '-'));
    $bucket = 'wordpress-' . $domain;
    add_option('netangelss3_bucket', $bucket, '', 'yes');
    add_option('netangelss3_auto_enable', '0', '', 'yes');
    add_option('netangelss3_connection_status', '0', '', 'yes');
    add_option('netangelss3_senderrors', '0', '', 'yes');
}

function netangelss3_onUninstall()
{
    delete_option('netangelss3_key_id');
    delete_option('netangelss3_secret_key');
    delete_option('netangelss3_bucket');
    delete_option('netangelss3_auto_enable');
    delete_option('netangelss3_connection_status');
    delete_option('netangelss3_senderrors');
}

register_activation_hook(__FILE__, 'netangelss3_onInstall');
register_deactivation_hook(__FILE__, 'netangelss3_onUninstall');
/*** END INSTALL/UNISTALL HOOK ***/

/*** VIEW IN ADMIN AREA ***/
add_filter('media_upload_tabs', 'netangelss3_pluginImageTabs', 1, 1);

function netangelss3_pluginImageTabs($_default_tabs)
{
    unset($_default_tabs['type']);
    unset($_default_tabs['type_url']);
    unset($_default_tabs['gallery']);
    $_default_tabs = array();
    return ($_default_tabs);
}

/*** END INSTALL/UNISTALL HOOK ***/

/*** VIEW IN ADMIN AREA ***/
function netangelss3_options_view()
{

    $save = false;
    $errors = array();
    $messages = array();
    if ($_POST) {
        $netangelss3_connection_status = 0;
        ($_POST['enable'] == 'on') ? ($enable = '1') : ($enable = '0');
        ($_POST['send_errors'] == 'on') ? ($send_errors = '1') : ($send_errors = '0');
        update_option('netangelss3_key_id', $_POST['key_id']);
        update_option('netangelss3_secret_key', $_POST['secret_key']);
        update_option('netangelss3_auto_enable', $enable);
        update_option('netangelss3_senderrors', $send_errors);
        //----------------------------------------------------
        // Проверка коннект при сохранение
        if (trim($_POST['key_id']) == '') $errors[] = NETANGELSS3_ERRORS_EMPTY_KEY;
        if (trim($_POST['secret_key']) == '') $errors[] = NETANGELSS3_ERRORS_EMPTY_SECRET_KEY;
        if (count($errors) == 0) {
            $s3 = netangelss3_create();
            $bucket = get_option('netangelss3_bucket');
            $list = $s3->listBuckets(true);
            if (!$list) {
                $errors[] = NETANGELSS3_ERRORS_BAD_KEYS;
            }
            if ($list) {
                //["buckets"]=> array(1) { [0]=> array(2) { ["name"]=> string(20) "wordpress-s3-ural-im" ["time"]=> int(1414179460) } } }
                //$list['buckets']
                $need_create = true;
                foreach ($list['buckets'] as $b) {
                    if ($b['name'] == $bucket) {
                        $need_create = false;
                        break;
                    }
                }
                if ($need_create) {

                    $cnt1 = 0;
                    $default_bucket = $bucket;
                    $res = $s3->putBucket($bucket, S3::ACL_PUBLIC_READ, "EU");
                    while (!$res) {

                        $cnt1++;
                        $bucket = $default_bucket . '-' . $cnt1;
                        //print $bucket.'<br />';
                        $res = $s3->putBucket($bucket, S3::ACL_PUBLIC_READ, "EU");
                        if ($cnt1 > 10) die('NETANGELSS3_MESSAGES_CREATE_BUCKET_BIG_ERROR');
                    }
                    update_option('netangelss3_bucket', $bucket);
                    $messages[] = NETANGELSS3_MESSAGES_CREATE_BUCKET;

                }
            }
        }

        //----------------------------------------------------
        if (count($errors) == 0) {
            $messages[] = NETANGELSS3_MESSAGES_SAVED;
            $netangelss3_connection_status = 1;
        }
        update_option('netangelss3_connection_status', $netangelss3_connection_status);
    }
    $key_id = get_option('netangelss3_key_id');
    $secret_key = get_option('netangelss3_secret_key');
    $enable = get_option('netangelss3_auto_enable');
    $send_errors = get_option('netangelss3_senderrors');
    $netangelss3_connection_status = get_option('netangelss3_connection_status');
    include('template/options.php');
}

function netangelss3_options()
{
    $action = $_REQUEST['action'];
    if ($action == 'netangelss3-options-files-to-s3') {
        netangelss3_optionsFilesToS3();
    } elseif ($action == 'netangelss3-options-files-from-s3') {
        netangelss3_optionsFilesFromS3();
    } else {
        netangelss3_options_view();
    }
}

function netangelss3_optionsFilesFromS3()
{
    $s3 = netangelss3_create();
    $files = netangelss3_getList($s3);
    include('template/files_from_s3.php');
}

function netangelss3_optionsFilesToS3()
{
    $s3 = netangelss3_create();
    $key_id = get_option('netangelss3_key_id');
    $secret_key = get_option('netangelss3_secret_key');
    $enable = get_option('netangelss3_auto_enable');
    $files = array();
    $upload_dir = wp_upload_dir();
    netangelss3_filelistGet($files, $upload_dir['basedir']);
    // Security FIX - HIDE FULL PATH
    for ($i = 0; $i < count($files); $i++) {
        $files[$i] = strtr($files[$i], array($upload_dir['basedir'] => ''));
    }
    include('template/files_to_s3.php');
}


function netangelss3_get_from_cloud()
{
    global $wpdb;
    $s3 = netangelss3_create();
    $upload_dir = wp_upload_dir();
    $name = $_REQUEST['file'];
    $basename = basename($_REQUEST['file']);
    $path = strtr($name, array($basename => ''));
    $simple_path = '/from_netangels_s3/' . $path;
    $simple_file_path = '/from_netangels_s3/' . $path . $basename;
    $path = $upload_dir['basedir'] . $simple_path;
    $destpath = $upload_dir['basedir'] . $simple_file_path;
    $destpath_url = $upload_dir['baseurl'] . $simple_file_path;
    $srcpath_url = netangelss3_urlGetFullUrl($name);
    mkdir($path, NETANGELSS3_FROM_CLOUD_CHMOD_DIR, true);
    if (file_exists($destpath))
    {
      $path_parts = pathinfo($destpath);
      $md5OfFile = uniqid('');
      $destpath = $path_parts['dirname'].DIRECTORY_SEPARATOR.$path_parts['filename'].'-'.$md5OfFile.'.'.$path_parts['extension'];
    }
    /*
    print $path . " \r\n";
    print $destpath . " \r\n";
    print $destpath_url . " \r\n";
    print $srcpath_url . " \r\n";
    */
    netangelss3_getFromCloud($s3, $name, $destpath);

    if (!file_exists($destpath)) {
        die('ERR');
    }

    if (file_exists($destpath) and filesize($destpath) == 0) {
        die('ERR');
    }
    netangelss3_replace_in_post_and_pages($srcpath_url, $destpath_url);
    //print 'netangelss3_replace_in_post_and_pages("' . $srcpath_url . '","' . $destpath_url . '");' . " \r\n";
    $attachment = array(
        'guid' => $upload_dir['baseurl'] . $simple_file_path,
        'post_mime_type' => $filetype = wp_check_filetype($basename, null),
        'post_title' => preg_replace('/\.[^.]+$/', '', $basename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment($attachment, $upload_dir['basedir'] . $simple_file_path);
    if ($_REQUEST['move'] == '1') {
        $rd = netangelss3_deleteInCloud($s3, $name);
        if (!$rd)
        {
           die('ERR');
        }
    }
    die('OK');
}

add_action('wp_ajax_netangelss3_get_from_cloud', 'netangelss3_get_from_cloud');

function netangelss3_sendFile()
{
    global $wpdb;
    $s3 = netangelss3_create();
    $upload_dir = wp_upload_dir();
    $name = netangelss3_s3_name($_REQUEST['file']);
    $filepath = $upload_dir['basedir'] . $_REQUEST['file'];
    if (netangelss3_remoteFileExists($name2))
    {
          $exists = '1';
          $name2 = netangelss3_s3_namewithMd5($filepath ,$name);
    }

    $r = netangelss3_sendToCloud($s3, $filepath , $name);
    if (!$r) die('ERR');
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

add_action('wp_ajax_netangelss3_send_file', 'netangelss3_sendFile');


function netangelss3_options_add_to_menu()
{
    add_plugins_page('NetAngels S3', 'NetAngels S3', 'manage_options', 'netangelss3-options', 'netangelss3_options');
    if (NETANGELSS3_SHOW_MOVE_LINK_IN_MENU) {
        add_plugins_page('NetAngels S3', NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_TO, 'manage_options', 'netangelss3-options-files-to-s3', 'netangelss3_optionsFilesToS3');
        add_plugins_page('NetAngels S3', NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_FROM, 'manage_options', 'netangelss3-options-files-from-s3', 'netangelss3_optionsFilesFromS3');
    } else {
    }
}

add_action('admin_menu', 'netangelss3_options_add_to_menu');


/*** END VIEW ADMIN AREA ***/

/*** Attach url filter ***/

function remove_media_library_tab($tabs)
{
    unset($tabs['library']);
    $tabs['netangelss3'] = 'NetAngels S3';
    return $tabs;
}

add_filter('media_upload_tabs', 'remove_media_library_tab');

function netangelss3_upload_form_html()
{
    $s = '';
    $s .= '<form  enctype="multipart/form-data" method="post">';
    $s .= '<input type="file" name="file">';
    $s .= '<input type="submit" value="Сохранить">';
    $s .= '</form>';
    return $s;
}


function netangelss3_view_tab()
{
    $s3 = netangelss3_create();
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

    $settings = apply_filters('media_view_settings', $settings);
    $settings = apply_filters('media_view_settings', $settings);
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


    if (!netangelss3_connected()) {
        print __('Плагин ещё не настроен');
        return false;
    }
    if ($_FILES) {
        $r = netangelss3_sendToCloud($s3, $_FILES['file']['tmp_name'], basename($_FILES['file']['name']));
        if ($r) {
            print '<div id="message2" class="updated below-h2"><p>Файл загружен.</p></div>';
        }
    }
    add_thickbox();
    print '<script src="' . plugins_url('js/mediaselect.js', __FILE__) . '?' . rand(1, 10000) . '"></script>';
    print '<link rel="stylesheet" id="netangelss3"  href="' . plugins_url('css/style.css', __FILE__) . '?' . rand(1, 10000) . '" type="text/css" media="all" />';
    print '<div class="netangelss3_media_insert_list">';
    print  netangelss3_upload_form_html();
    $list = netangelss3_getList($s3);

    print '<ul class="netangles_attachments ui-sortable ui-sortable-disabled">';
    foreach ($list as $item) {
        print netangelss3_getLiElement($item);
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
    $link = netangelss3_urlGetFullUrl($link);
    return $link;
}

add_filter('wp_get_attachment_url', 'netangelss3_wp_get_attachment_url', 10, 2);

//-------------------------------------

if (!wp_next_scheduled('netangelss3_upload_hook')) {
    wp_schedule_event(time(), 'hourly', 'netangelss3_upload_hook');
}

add_action('netangelss3_upload_hook', 'netangelss3_uploadTask');

function netangelss3_uploadTask()
{
    $wp_debug_it = true;
    $admin_email = get_option('admin_email');
    if (NETANGELSS3_WPCRON_DEBUG) {
        wp_mail($admin_email, 'WPCRON_DEBUG_START', '1');
    }
    $s3 = netangelss3_create();
    $s = '';
    $enable = get_option('netangelss3_auto_enable');
    if ($enable != '1') {
        if (NETANGELSS3_WPCRON_DEBUG) {
            wp_mail($admin_email, 'WPCRON_DEBUG_START', 'NOT_ENABLE');
        }
        return false;
    }
    $netangelss3_connection_status = get_option('netangelss3_connection_status');
    if ($netangelss3_connection_status == 0) {
        if (NETANGELSS3_WPCRON_DEBUG) {
            wp_mail($admin_email, 'WPCRON_DEBUG_START', 'NOT_CONNECTED');
        }
        // Не подцелено
        return false;
    }
    $files = array();
    $upload_dir = wp_upload_dir();
    netangelss3_filelistGet($files, $upload_dir['basedir']);
    if (NETANGELSS3_WPCRON_DEBUG) {
        $s1 = '';
        foreach ($files as $f) {
            $s1 .= $f . "\r\n";
        }
        wp_mail($admin_email, 'WPCRON_DEBUG_START', 's1' . $s1);
    }
    $count = count($files);
    if ($count == 0) {
        if (NETANGELSS3_WPCRON_DEBUG) {
            wp_mail($admin_email, 'WPCRON_DEBUG', 'ZERO_COUNT');
            return false;
        }
    }
    if ($count > NETANGELSS3_MAX_FILES_PER_TIME) $count = NETANGELSS3_MAX_FILES_PER_TIME;
    $s = '';
    $all_transfer_size = 0;

    if (NETANGELSS3_WPCRON_DEBUG) {
        wp_mail($admin_email, 'WPCRON_DEBUG_START', '');
    }
    for ($i = 0; $i < $count; $i++) {
        $file_size = filesize($files[$i]);
        $name1 = strtr($files[$i], array($upload_dir['basedir'] => ''));
        $name2 = netangelss3_s3_name($name1);
        if ($all_transfer_size > NETANGELSS3_MAX_SIZE_PER_TIME) {
            if (NETANGELSS3_WPCRON_DEBUG) {
                wp_mail($admin_email, 'WPCRON_DEBUG_OVERSIZE', $s);
            }
            break;
        }
        $exists = '0';
        if (netangelss3_remoteFileExists($name2))
        {
          $exists = '1';
          $name2 = netangelss3_s3_namewithMd5($files[$i],$name2);
        }
        $r = netangelss3_sendToCloud($s3, $files[$i], $name2);
        if (NETANGELSS3_WPCRON_DEBUG) {
            $s .= '['.$files[$i] . '=>' . $name1 . '=>' . $name2 .' exists:'.$exists . ' SIZE:' . $file_size . '/' . $all_transfer_size . '/' . NETANGELSS3_MAX_SIZE_PER_TIME .']'. "\r\n";
        }
        if (!$r) {
            if (NETANGELSS3_WPCRON_DEBUG) {
                wp_mail($admin_email, 'WPCRON_DEBUG_ERROR', 'Cant upload file:' . $files[$i] . NETANGELSS3_HTML_NEWLINE . NETANGELSS3_HTML_NEWLINE . $s);
            }
            $send_errors = get_option('netangelss3_senderrors');
            if ($send_errors != '1') {
                break;
            }
            wp_mail($admin_email, NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM, NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TEXT . NETANGELSS3_HTML_NEWLINE . NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TECH_INFO_FILE . $files[$i]);
            break;
        }
        $from2 = $upload_dir['baseurl'] . $name1;
        netangelss3_replace_in_post_and_pages($from2, $r);
        unlink($upload_dir['basedir'] . $name1);
        if (NETANGELSS3_WPCRON_DEBUG) {
            wp_mail($admin_email, 'WPCRON_DEBUG', $s);
        }
        $all_transfer_size = $all_transfer_size + $file_size; // чтобы хотя бы один файл за раз
    }
}