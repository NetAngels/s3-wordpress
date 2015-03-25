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
define(NETANGELSS3_WPCRON_DEBUG, false);
define(NETANGELSS3_DEBUG_LOG, false);
define(NETANGELSS3_DEBUG_FILTER, false);
//define(NETANGELSS3_AUTO_UPLOAD_TYPE, 'files'); // files or atth
define(NETANGELSS3_AUTO_UPLOAD_TYPE, 'atth');
define(NETANGELSS3_ENABLE_TESTS, false);
// define(NETANGELSS3_ENABLE_TESTS_STR, 'Тесты');
//define(NETANGELSS3_DEBUG_LOGFILE, __DIR__ . DIRECTORY_SEPARATOR . 'netangelss3.log');
define(NETANGELSS3_DEBUG_LOGFILE, '/var/log/netangelss3.log');

define(NETANGELSS3_CURL_USERAGENT, 'Mozilla 4.0 (NetAngels s3 Wordpress Plugin)');

define(NETANGELSS3_DOWNLOAD_SPECIAL_DIR, false);
define(NETANGELSS3_DOWNLOAD_SPECIAL_DIR_NAME, 'from_netangels_s3');

define(NETANGELSS3_DONT_UPLOAD_IF_REMOTE_EXISTS, false);

define(NETANGELSS3_MAX_FILES_PER_TIME, 100);
define(NETANGELSS3_MAX_SIZE_PER_TIME, 209715200);
define(NETANGELSS3_FROM_CLOUD_CHMOD_DIR, 0777);
define(NETANGELSS3_FROM_CLOUD_CHMOD, 0777);
define(NETANGELSS3_ENDPOINT, 's3.netangels.ru');

define(NETANGELSS3_SHOW_MOVE_LINK_IN_MENU, false);
define(NETANGELSS3_ATTH_REMOTE_TEST_EXISTS, true);
define(NETANGELSS3_ATTH_REMOVE_ON_MOVE, false);
define(NETANGELSS3_REPLACE_ON_COPY, true);
define(NETANGELSS3_MOVE_ONLY, true);
define(NETANGELSS3_ONLY_REMOTE_ATTH, false);


define(NETANGELSS3_BACK, '&lt;&lt; Назад');
define(NETANGELSS3_HTML_NEWLINE, "\r\n");
define(NETANGELSS3_FILE_HAS_UPLOADED, 'Файл загружен');
define(NETANGELSS3_PLUGIN_NOT_SETUPED, 'Плагин пока не настроен');
define(NETANGELSS3_DOIT, 'Обрабатывается');
define(NETANGELSS3_ENDED, 'Завершено');
define(NETANGELSS3_SELALL, 'Выделить все');
define(NETANGELSS3_SEL, 'Выбрать');
define(NETANGELSS3_FILE, 'файл');
define(NETANGELSS3_FILE_NO_MORE, 'нет больше файлов');
define(NETANGELSS3_FILE_TYPE, 'тип');
define(NETANGELSS3_FILE_S3_WP_FILE, 'вложение WP в S3');
define(NETANGELSS3_FILE_WP_FILE, 'файл в S3');
define(NETANGELSS3_SIZE, 'размер');
define(NETANGELSS3_DESCR, 'описание');
define(NETANGELSS3_CANCEL, 'Отмена');
define(NETANGELSS3_CANCELED_PROCESS, 'Отмена...');
define(NETANGELSS3_CANCELED, 'Отменено');
define(NETANGELSS3_SAVE, 'Сохранить изменения');
define(NETANGELSS3_SAVE1, 'Сохранить');
define(NETANGELSS3_SAVE_LOADING, 'Сохраняются изменения...');

define(NETANGELSS3_FROM_ERROR, 'Ошибка загрузки. Файл:');
define(NETANGELSS3_TO_ERROR, 'Ошибка выгрузки. Файл:');

define(NETANGELSS3_ERRORS_EMPTY_KEY, 'Не указан key_id');
define(NETANGELSS3_ERRORS_EMPTY_SECRET_KEY, 'Не указан secret_key');
define(NETANGELSS3_ERRORS_BAD_KEYS, 'Ключи указаны неверно');

define(NETANGELSS3_MESSAGES_SAVED, 'Сохранено');
define(NETANGELSS3_MESSAGES_CREATE_BUCKET, 'Корзина создана');

define(NETANGELSS3_MESSAGES_BEFORE_DOWNLOADING_FROM_S3, 'Ранее загруженное из NetAngels s3');
define(NETANGELSS3_MESSAGES_NO_FILES_TO_UPLOAD_TO_CLOUD, 'Нет файлов для загрузки в NetAngels s3');
define(NETANGELSS3_MESSAGES_NO_FILES_IN_CLOUD, 'Нет файлов в NetAngels s3');

/* OPtion page */
define(NETANGELSS3_MESSAGES_KEY_ID, 'Key ID');
define(NETANGELSS3_MESSAGES_SECRET_KEY, 'Secret Key');

define(NETANGELSS3_LINK_GET_KEYS, 'https://panel.netangels.ru/s3/account/');
define(NETANGELSS3_MESSAGES_OPEN_LINK1, 'Откройте эту страницу');
define(NETANGELSS3_MESSAGES_SHOW_KEYS, ' и нажмите "Показать реквизиты", затем скопируйте их в соотвествующие поля ниже.');
define(NETANGELSS3_LINK_VIDEO_GET_KEYS, 'http://www.youtube.com/watch?v=skFoVwc_BCQ&feature=youtu.be');
define(NETANGELSS3_MESSAGE_VIDEO_GET_KEYS, 'Видео-инструкция');

define(NETANGELSS3_MESSAGES_ALL_FILE_WILL_MOVE_TO_CLOUD, 'Все загружаемые вами файлы будут автоматически переноситься в Облачное S3 хранилище NetAngels');
define(NETANGELSS3_MESSAGES_AUTO_MOVE_TO_CLOUD, 'Автоматический перенос файлов в NetAngels S3');
/* end OPtion page */
define(NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_TO, 'Перенос файлов в NetAngels S3');
define(NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_FROM, 'Перенос файлов из NetAngels S3');


/* TO page */
define(NETANGELSS3_MESSAGES_MANUAL_TO_THIS_LOCAL_FILES, 'Локальные файлы, которые ранее были загружены вместе с записями. Вы можете загрузить
их в Облачное хранилище NetAngels. При этом, пути к файлам, в записях и страницах, будут изменены автоматически.');
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

define(NETANGELSS3_MESSAGES_CREATE_BUCKET_BIG_ERROR, 'Ошибка: Не удалось создать корзину. Возможные причины: проблемы с хранилищем NetAngels / проблемы с соединением с хранилищем. Обратитесь в службу технической поддержки NetAngels.');

define(NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TECH_INFO, 'Техническая информация:');
define(NETANGELSS3_SEND_ERRORS_TEXT, 'Отправлять ошибки');
define(NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TECH_INFO_FILE, 'Файл:');

include('classes/S3.php');
require('functions.php');

/*** INSTALL/USIN HOOK ***/
function netangelss3_onInstall() {
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

function netangelss3_onUninstall() {
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

function netangelss3_pluginImageTabs($_default_tabs) {
    unset($_default_tabs['type']);
    unset($_default_tabs['type_url']);
    unset($_default_tabs['gallery']);
    $_default_tabs = array();
    return ($_default_tabs);
}

/*** END INSTALL/UNISTALL HOOK ***/

/*** VIEW IN ADMIN AREA ***/
function netangelss3_options_view() {
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
        // Проверка коннект при сохранении
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

function netangelss3_options() {
    $action = $_REQUEST['action'];
    if ($action == 'netangelss3-options-files-to-s3') {
        netangelss3_optionsFilesToS3();
    } elseif ($action == 'netangelss3-options-files-from-s3') {
        netangelss3_optionsFilesFromS3();
    } elseif ($action == 'netangelss3-tests') {
        netangelss3_tests();
    } else {
        netangelss3_options_view();
    }
}

function netangelss3_optionsFilesFromS3() {
    $s3 = netangelss3_create();
    $atth = netangelss3_getAttachmentList();
    $upload_dir = wp_upload_dir();

    $files_remote = netangelss3_getList($s3);
    $files_remote_list = array_keys($files_remote);
    $local_files = array();
    foreach ($atth as $at) {
        $file1 = '';
        $file2 = '';
        $files_count = 0;
        $file1 = strtr($at['file'], array($upload_dir['basedir'] . DIRECTORY_SEPARATOR => ''));
        $local_files[] = $file1;
        $dir = pathinfo($file1);

        if (in_array($file1, $files_remote_list)) {
            // добавляем полный путь к файлу
            $file2 = $file1;
            $files_count++;
        }
        //-----
        foreach ($at['meta']['sizes'] as $file) {
            $file = $dir['dirname'] . DIRECTORY_SEPARATOR . $file['file'];
            if (in_array($file, $files_remote_list)) {
                // Добавляем превьюхи
                $local_files[] = $file;
                $file2 .= ';' . $file;
                $files_count++;
            }
        }
        //-----
        if ($files_count > 0) {
            $files[] = array(
                'name' => $at['title'],
                'file' => $file2,
                'type' => 'atth',
                'cnt' => $files_count
            );
        }

    }
    // Теперь есть список файлов из аттачей
    if (!NETANGELSS3_ONLY_REMOTE_ATTH) {
        foreach ($files_remote as $fr) {
            if (in_array($fr['name'], $local_files)) {
                continue;
            }
            $files[] = array(
                'name' => $fr['name'],
                'file' => $fr['name'],
                'type' => 'remote',
                'cnt' => 0
            );
        }
    }

    include('template/files_from_s3.php');
}

function netangelss3_optionsFilesToS3() {
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

function netangelss3_getOneFileFromCloud($name, $create_atth = false, $move = false) {
    netangelss3_writelog('netangelss3_getOneFileFromCloud name:' . $name);
    netangelss3_writelog('netangelss3_getOneFileFromCloud create_atth:' . $create_atth);
    netangelss3_writelog('netangelss3_getOneFileFromCloud move:' . $move);

    $s3 = netangelss3_create();
    $upload_dir = wp_upload_dir();
    $basename = basename($name);
    $path = strtr($name, array($basename => ''));
    $simple_path = '/' . $path;
    $simple_file_path = '/' . $path . $basename;
    if (NETANGELSS3_DOWNLOAD_SPECIAL_DIR) {
        $simple_path = '/' . NETANGELSS3_DOWNLOAD_SPECIAL_DIR_NAME . '/' . $path;
        $simple_file_path = '/' . NETANGELSS3_DOWNLOAD_SPECIAL_DIR_NAME . '/' . $path . $basename;
    }
    $path = $upload_dir['basedir'] . $simple_path;
    $destpath = $upload_dir['basedir'] . $simple_file_path;
    $destpath_url = $upload_dir['baseurl'] . $simple_file_path;
    $srcpath_url = netangelss3_urlGetFullUrl($name);
    mkdir($path, NETANGELSS3_FROM_CLOUD_CHMOD_DIR, true);
    if (file_exists($destpath)) {
        $path_parts = pathinfo($destpath);
        $md5OfFile = uniqid('');
        $destpath = $path_parts['dirname'] . DIRECTORY_SEPARATOR . $path_parts['filename'] . '-' . $md5OfFile . '.' . $path_parts['extension'];
    }
    netangelss3_getFromCloud($s3, $name, $destpath);
    if (!file_exists($destpath)) {
        return false;
    }
    if (file_exists($destpath) and filesize($destpath) == 0) {
        return false;
    }

    netangelss3_replace_in_post_and_pages($srcpath_url, $destpath_url);
    if ($move) {
        $rd = netangelss3_deleteInCloud($s3, $name);
        if (!$rd) {
            return false;
        }
    }
    if ($create_atth) {
        $attachment = array(
            'guid' => $upload_dir['baseurl'] . $simple_file_path,
            'post_mime_type' => $filetype = wp_check_filetype($basename, null),
            'post_title' => preg_replace('/\.[^.]+$/', '', $basename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment($attachment, $upload_dir['basedir'] . $simple_file_path);
    }
    return true;
}

function netangelss3_get_from_cloud() {
    global $wpdb;
    $s3 = netangelss3_create();
    $create_atth = true;
    netangelss3_writelog('netangelss3_get_from_cloud:' . $_REQUEST['file']);
    $files = array($_REQUEST['file']);
    if (strpos($_REQUEST['file'], ';')) {
        $files = explode(';', $_REQUEST['file']);
        $create_atth = false;
    }
    $move = false;
    if ($_REQUEST['move'] == '1') {
        $move = true;
    }

    foreach ($files as $onefile) {
        netangelss3_writelog('netangelss3_get_from_cloud  onefile:' . $onefile);
        $create_atth = netangelss3_FileInAtth($onefile);
        $create_atth = !$create_atth;
        if ($create_atth) {
            netangelss3_writelog('netangelss3_get_from_cloud  create_atth:1');
        } else {
            netangelss3_writelog('netangelss3_get_from_cloud  create_atth: 0');
        }

        if (!netangelss3_getOneFileFromCloud($onefile, $create_atth, $move)) {
            die('ERR');
        }
    }
    die('OK');
}

add_action('wp_ajax_netangelss3_get_from_cloud', 'netangelss3_get_from_cloud');

function netangelss3_sendOneFile($onefile, $move = false) {
    $s3 = netangelss3_create();
    $upload_dir = wp_upload_dir();
    $name = netangelss3_s3_name($onefile);
    $from2 = $upload_dir['baseurl'] . $onefile;
    $filepath = $upload_dir['basedir'] . $onefile;
    if (netangelss3_remoteFileExists($name)) {
        $exists = '1';
        $name = netangelss3_s3_namewithMd5($filepath, $name);
    }
    $r = netangelss3_sendToCloud($s3, $filepath, $name);
    if (!$r) return false;
    if (NETANGELSS3_REPLACE_ON_COPY or $move) {
        netangelss3_replace_in_post_and_pages($from2, $r);
    }
    if (!$move) {
        return true;
    }
    if (NETANGELSS3_ATTH_REMOVE_ON_MOVE) {
        netangelss3_removeAttach($onefile);
    }
    unlink($filepath);
    return true;
}

function netangelss3_sendFile() {
    $files = array($_REQUEST['file']);
    if (strpos($_REQUEST['file'], ';')) {
        $files = explode(';', $_REQUEST['file']);
    }

    $move = false;
    if ($_REQUEST['move'] == '1') {
        $move = true;
    }
    foreach ($files as $onefile) {
        if (!netangelss3_sendOneFile($onefile, $move)) {
            die('ERR');
        }
    }
    die('OK');
}

add_action('wp_ajax_netangelss3_send_file', 'netangelss3_sendFile');


function netangelss3_options_add_to_menu() {
    add_plugins_page('NetAngels S3', 'NetAngels S3', 'manage_options', 'netangelss3-options', 'netangelss3_options');
    if (NETANGELSS3_SHOW_MOVE_LINK_IN_MENU) {
        add_plugins_page('NetAngels S3', NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_TO, 'manage_options', 'netangelss3-options-files-to-s3', 'netangelss3_optionsFilesToS3');
        add_plugins_page('NetAngels S3', NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_FROM, 'manage_options', 'netangelss3-options-files-from-s3', 'netangelss3_optionsFilesFromS3');
        if (NETANGELSS3_TESTS) {
            add_plugins_page('NetAngels S3', NETANGELSS3_MESSAGES_MANUAL_MOVE_OR_COPY_FILES_FROM, 'manage_options', 'netangelss3-tests', 'netangelss3_tests');
        }
    } else {
    }
}

add_action('admin_menu', 'netangelss3_options_add_to_menu');

/*** END VIEW ADMIN AREA ***/

/*** Attach url filter ***/

function remove_media_library_tab($tabs) {
    unset($tabs['library']);
    $tabs['netangelss3'] = 'NetAngels S3';
    return $tabs;
}

add_filter('media_upload_tabs', 'remove_media_library_tab');

function netangelss3_upload_form_html() {
    $s = '';
    $s .= '<form  enctype="multipart/form-data" method="post">';
    $s .= '<input type="file" name="file">';
    $s .= '<input type="submit" value="' . NETANGELSS3_SAVE1 . '">';
    $s .= '</form>';
    return $s;
}


function netangelss3_view_tab() {
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
        print __(NETANGELSS3_PLUGIN_NOT_SETUPED);
        return false;
    }
    if ($_FILES) {
        $r = netangelss3_sendToCloud($s3, $_FILES['file']['tmp_name'], basename($_FILES['file']['name']));
        if ($r) {
            print '<div id="message2" class="updated below-h2"><p>' . NETANGELSS3_FILE_HAS_UPLOADED . '</p></div>';
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

function netangelss3_wp_get_attachment_url($link, $id) {
    netangelss3_writelog('netangelss3_wp_get_attachment_url link:' . $link);
    netangelss3_writelog('netangelss3_wp_get_attachment_url id:' . $id);
    $file_path = get_attached_file($id);
    netangelss3_writelog('netangelss3_wp_get_attachment_url file_path:' . $file_path);
    if (file_exists($file_path)) {
        netangelss3_writelog('netangelss3_wp_get_attachment_url ok_local_file:' . $file_path . ' ' . $link);
        netangelss3_writelog('netangelss3_wp_get_attachment_url s3_file_or_not_found:' . $link);
        return $link;
    }
    $upload_dir = wp_upload_dir();
    $link = strtr($link, array($upload_dir['baseurl'] => ''));
    $link = netangelss3_s3_name($link);
    $link = netangelss3_urlGetFullUrl($link);
    return $link;
}

add_filter('wp_get_attachment_url', 'netangelss3_wp_get_attachment_url', 10, 2);
add_filter('wp_get_attachment_thumb_url', 'netangelss3_wp_get_attachment_url', 10, 2);

//--------------------------------------

function netangelss3_wp_get_attachment_image_src($attachment_id, $size, $icon) {
    netangelss3_writelog('netangelss3_wp_get_attachment_image_src link:' . $attachment_id);
    netangelss3_writelog('netangelss3_wp_get_attachment_image_src size:' . $size);
    netangelss3_writelog('netangelss3_wp_get_attachment_image_src icon' . $icon);
    $result = wp_get_attachment_image_src($attachment_id, $size, $icon);
    foreach ($result as $k => $v) {
        netangelss3_writelog('netangelss3_wp_get_attachment_image_src result:' . $k . '=' . $v);
    }
    return $result;
}

//---------------------------------------

function netangelss3_wp_get_attachment_thumb_file($thumbFile, $id) {
    netangelss3_writelog('netangelss3_wp_get_attachment_thumb_file thumbFile:' . $thumbFile);
    netangelss3_writelog('netangelss3_wp_get_attachment_thumb_file id:' . $id);
    return $thumbFile;
}

//-------------------------------------

function netangelss3_wp_get_attachment_link($id, $size, $permalink, $icon, $text, $attr) {
    netangelss3_writelog('netangelss3_wp_get_attachment_link id:' . $id);
    netangelss3_writelog('netangelss3_wp_get_attachment_link size:' . $size);
    netangelss3_writelog('netangelss3_wp_get_attachment_link permalink:' . $permalink);
    netangelss3_writelog('netangelss3_wp_get_attachment_link icon:' . $icon);
    netangelss3_writelog('netangelss3_wp_get_attachment_link text:' . $text);
    foreach ($attr as $k => $v) {
        netangelss3_writelog('netangelss3_wp_get_attachment_link attr:' . $k . '=' . $v);
    }
    netangelss3_writelog('netangelss3_wp_get_attachment_link id:' . $id);
    return wp_get_attachment_link($id, $size, $permalink, $icon, $text, $attr);
}

//-------------------------------------

function netangelss3_get_attached_file($file, $attachment_id) {
    netangelss3_writelog('netangelss3_get_attached_file file:' . $file);
    netangelss3_writelog('netangelss3_get_attached_file attachment_id:' . $attachment_id);
    return $file;
}

//-------------------------------------

if (!wp_next_scheduled('netangelss3_upload_hook')) {
    wp_schedule_event(time(), 'hourly', 'netangelss3_upload_hook');
}

if (NETANGELSS3_AUTO_UPLOAD_TYPE == 'files') {
    add_action('netangelss3_upload_hook', 'netangelss3_uploadTask');
}

if (NETANGELSS3_AUTO_UPLOAD_TYPE == 'atth') {
    add_action('netangelss3_upload_hook', 'netangelss3_uploadTaskAtth');
}
// not auto upload without upload type

function netangelss3_uploadTask() {
    netangelss3_writelog('netangelss3_uploadTask');
    @set_time_limit(0);
    $wp_debug_it = true;
    $admin_email = get_option('admin_email');

    $s3 = netangelss3_create();
    $s = '';
    $enable = get_option('netangelss3_auto_enable');
    if ($enable != '1') {
        return false;
    }

    $netangelss3_connection_status = get_option('netangelss3_connection_status');
    if ($netangelss3_connection_status == 0) {
        // Не подцелено
        return false;
    }

    $files = array();
    $upload_dir = wp_upload_dir();
    netangelss3_filelistGet($files, $upload_dir['basedir']);

    $count = count($files);

    if ($count > NETANGELSS3_MAX_FILES_PER_TIME) $count = NETANGELSS3_MAX_FILES_PER_TIME;
    $s = '';
    $all_transfer_size = 0;

    for ($i = 0; $i < $count; $i++) {
        $file_size = filesize($files[$i]);
        $name1 = strtr($files[$i], array($upload_dir['basedir'] => ''));
        $name2 = netangelss3_s3_name($name1);
        if ($all_transfer_size > NETANGELSS3_MAX_SIZE_PER_TIME) {
            break;
        }

        $exists = '0';

        if (netangelss3_remoteFileExists($name2)) {
            $exists = '1';
            $name2 = netangelss3_s3_namewithMd5($files[$i], $name2);
        }

        $r = netangelss3_sendToCloud($s3, $files[$i], $name2);

        if (!$r) {
            $send_errors = get_option('netangelss3_senderrors');
            if ($send_errors != '1') {
                break;
            }
            wp_mail($admin_email, NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM, NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TEXT . NETANGELSS3_HTML_NEWLINE . NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TECH_INFO_FILE . $files[$i]);
            break;
        }

        $from2 = $upload_dir['baseurl'] . $name1;

        // Проверит наличие файла в облаке и только после этого удалит локальный файл
        if (netangelss3_remoteFileExists($name2)) {
            unlink($upload_dir['basedir'] . $name1);
            netangelss3_removeAttach($name1);
            netangelss3_replace_in_post_and_pages($from2, $r);
        }

        $all_transfer_size = $all_transfer_size + $file_size; // хотя бы один файл за раз
    }
}

function netangelss3_uploadTaskAtth() {
    netangelss3_writelog('netangelss3_uploadTaskAtth');
    @set_time_limit(0);
    $all_transfer_size = 0;
    $count = 0;
    $admin_email = get_option('admin_email');
    $enable = get_option('netangelss3_auto_enable');
    $netangelss3_connection_status = get_option('netangelss3_connection_status');
    $s = '';

    if ($enable != '1') {
        return false;
    }

    if ($netangelss3_connection_status == 0) {
        // Не подцелено
        return false;
    }

    $s3 = netangelss3_create();
    $upload_dir = wp_upload_dir();
    $upload_dir_path = $upload_dir['basedir'];
    $thumbimgs = array();
    $args = array('post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => null);
    $attachments = get_posts($args);

    if (!$attachments) {
        netangelss3_writelog('netangelss3_uploadTaskAtth: zero count');
        wp_mail($admin_email, 'WPCRON_DEBUG', 'ZERO_COUNT-2');
        return false;
    }

    foreach ($attachments as $post) {
        $files = array();
        if ($all_transfer_size > NETANGELSS3_MAX_SIZE_PER_TIME) {
            break;
        }
        if (is_array($imagedata = wp_get_attachment_metadata($post->ID, true))) {
            $files[] = $imagedata['file'];
            $path_parts = pathinfo($imagedata['file']);
            if (is_array($imagedata['sizes'])) {
                foreach ($imagedata['sizes'] as $item) {
                    $files[] = $path_parts['dirname'] . DIRECTORY_SEPARATOR . $item['file'];
                }
            }
        }
        foreach ($files as $fl) {
            $fullpath = $upload_dir['basedir'] . DIRECTORY_SEPARATOR . $fl;
            $name1 = strtr($fullpath, array($upload_dir['basedir'] => ''));
            $name2 = netangelss3_s3_name($name1);
            if (!file_exists($fullpath)) continue;
            if ($all_transfer_size > NETANGELSS3_MAX_SIZE_PER_TIME) {
                break;
            }
            if (netangelss3_remoteFileExists($name2)) {
                $exists = '1';
                $s .= $name2 . ' remote exists ';
                $name2 = netangelss3_s3_namewithMd5($fullpath, $name2);
                $s .= ' new name2: ' . $name2 . "\r\n";
                if (NETANGELSS3_DONT_UPLOAD_IF_REMOTE_EXISTS) {
                    continue;
                }
            }
            $r = netangelss3_sendToCloud($s3, $fullpath, $name2);
            if (!$r) {
                $send_errors = get_option('netangelss3_senderrors');
                if ($send_errors != '1') {
                    break;
                }
                wp_mail($admin_email, NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM, NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TEXT . NETANGELSS3_HTML_NEWLINE . NETANGELSS3_MESSAGES_EMAIL_UPLOAD_PROBLEM_TECH_INFO_FILE . $fl);
                break;
            }
            $from2 = $upload_dir['baseurl'] . $name1;

            // Проверит наличие файла в облаке и только после этого удалит локальный файл
            if (netangelss3_remoteFileExists($name2)) {
                unlink($fullpath);
                netangelss3_removeAttach($name1);
                netangelss3_replace_in_post_and_pages($from2, $r);
            }
            $s .= '-- ' . $fullpath . '=>' . $fl . "\r\n";
            $file_size = filesize($fullpath);
            $all_transfer_size = $all_transfer_size + $file_size;
        } // files

        $count++;
        // хотя бы один файл за раз
    } // attachs

}

//---------------------------------------------
function netangelss3_add_filter_to_wp_handle_upload() {
    //add_filter( 'wp_handle_upload',   'netangelss3_filter_wp_handle_upload' );
    add_filter('wp_handle_upload_prefilter', 'netangelss3_filter_wp_handle_upload_prefilter');
    //add_filter('wp_unique_filename', 'netangelss3_filter_wp_unique_filename',10, 2);
    //add_action('wp_unique_filename', 'netangelss3_filter_wp_unique_filename');
}

function netangelss3_filter_wp_handle_upload_prefilter($file) {
    //add_filter('wp_unique_filename', 'netangelss3_filter_wp_unique_filename');

    $s = '';

    $upload_dir = wp_upload_dir();
    $filename = $upload_dir['subdir'] . DIRECTORY_SEPARATOR . $file['name'];
    $filename_pathinfo = pathinfo($filename);
    $remote_filename = netangelss3_urlGetFullUrl($filename, True);
    $cnt = 0;
    while (netangelss3_remoteFileExists($remote_filename)) {
        $cnt++;
        $filename = $filename_pathinfo['dirname'] . DIRECTORY_SEPARATOR . $filename_pathinfo['filename'] . '-' . $cnt . '.' . $filename_pathinfo['extension'];
        $remote_filename = netangelss3_urlGetFullUrl($filename, True);
    }

    if ($cnt > 0) {
        $file['name'] = $filename_pathinfo['filename'] . '-' . $cnt . '.' . $filename_pathinfo['extension'];
    }

    return $file;
}

add_action('admin_init', 'netangelss3_add_filter_to_wp_handle_upload', 999);
