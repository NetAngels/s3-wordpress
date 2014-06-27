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
    return($_default_tabs); 
    
}
/*** INSTALL/USIN HOOK ***/
function on_install()
{
    add_option( 'netangelss3_key_id', '', '', 'yes' );
    add_option( 'netangelss3_secret_key', '', '', 'yes' );
    $domain = site_url();
    $domain = strtr($domain,array('http://'=>'','https://'=>'','/'=>'-','.'=>'-'));
    $bucket='wordpress-'.$domain;
    add_option( 'netangelss3_bucket', $bucket, '', 'yes' );
}

function on_uninstall()
{
    remove_option( 'netangelss3_key_id' );
    remove_option( 'netangelss3_secret_key' );
    remove_option( 'netangelss3_bucket' );

}

register_activation_hook( __FILE__, 'on_install' );
register_deactivation_hook( __FILE__, 'on_uninstall' );

/*** END INSTALL/UNISTALL HOOK ***/
/*** VIEW IN ADMIN AREA ***/
function netangelss3_options()
{
    $save = false;
    if ($_POST)
    {
       $save = true;
       update_option( 'netangelss3_key_id', $_POST['key_id']);
       update_option( 'netangelss3_secret_key', $_POST['secret_key']);
    }
    $key_id     = get_option('netangelss3_key_id');
    $secret_key = get_option('netangelss3_secret_key');
    include('template/options.php');
}
function netangelss3_options_files_to_s3()
{

    $key_id     = get_option('netangelss3_key_id');
    $secret_key = get_option('netangelss3_secret_key');
    $files = array();
    $upload_dir = wp_upload_dir();
    filelist_get(&$files,$upload_dir['basedir']);
    include('template/files_to_s3.php');

}
add_action( 'wp_ajax_netangelss3_send_file', 'netangelss3_send_file' );

function netangelss3_send_file() 
{
    global $wpdb; 
    global $s3;
    // Handle request then generate response using WP_Ajax_Response
    $r =  sendtocloud($s3,$_REQUEST['file'],basename($_REQUEST['file']));
    print $r.' '.$_REQUEST['file']. ' ' .basename($_REQUEST['file']) ;
    //wp_ajax_die();
    die();
}

function netangelss3_options_add_to_menu()
{
    add_plugins_page('NetAngels S3','NetAngels S3', 'manage_options', 'netangelss3-options', 'netangelss3_options');
    add_plugins_page('NetAngels S3','Перенос файлов в NetAngels S3', 'manage_options', 'netangelss3-options-files-to-s3', 'netangelss3_options_files_to_s3');
}
add_action('admin_menu', 'netangelss3_options_add_to_menu');
/*** END VIEW ADMIN AREA ***/
/*** WP_CRON ***/
add_action( 'my_task_hook', 'my_task_function' );

if ( ! wp_next_scheduled( 'my_task_hook' ) ) {
  wp_schedule_event( time(), 'hourly', 'my_task_hook' );
}

function my_task_function() {
 //  wp_mail( 'admin@dotsb.net.ru', 'Автоматическое письмо', 'Запланированное письмо от WordPress.');
}
/*** END CRON ***/
/*** Attach url filter ***/

function remove_media_library_tab($tabs) {
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
 list($maintype,$subtype) = explode('/',$filetype['type']);
 $filetype['maintype']=$maintype; 
 $filetype['subtype']=$subtype; 
 $filetype['wptype'] = wp_ext2type($filetype['ext']);
 if ($filetype['wptype'] == '') $filetype['wptype'] = 'default';
 return $filetype;
}
function getLiElement($item)
{
    $name = $item['name'];
    $url = url_getFullUrl($name);
    $type = getTypeByName($name);
    $s = '<li class="netangels_attachment" data-fileurl="'.$url.'" data-type="'.$type['maintype'].'">';
    $s .= '<div class="type-'.$type['maintype'].'">';
    $typ = getTypeByName($name);
    switch($typ['maintype'])
    {
        case 'image':$s .='<img src="/wp-includes/images/media/default.png" class="netangels_icon" draggable="false">';;
                     break;
        default:
               $s .='<img src="/wp-includes/images/media/'.$type['wptype'].'.png" class="netangels_icon" draggable="false">';
               break;
    }
    $s .='<div class="filename">';
    $s .='<div>'.$name.'</div>';
    $s .='</div>';
    $s .='<a class="check" href="#" title="Снять выделение"><div class="media-modal-icon"></div></a>';
    $s .='</div>';
    $s .= '</li>';
    return $s;
}


function view_netangelss3_tab()
{
    global $s3;
    //------------------------------------------------------
    $tabs = array();
    $settings = array(
                'tabs'      => $tabs,
                'tabUrl'    => add_query_arg( array( 'chromeless' => true ), admin_url('media-upload.php') ),
                'mimeTypes' => wp_list_pluck( get_post_mime_types(), 0 ),
                'captions'  => ! apply_filters( 'disable_captions', '' ),
                'nonce'     => array(
                        'sendToEditor' => wp_create_nonce( 'media-send-to-editor' ),
                ),
                'post'    => array(
                        'id' => 0,
                ),
    );

    $settings = apply_filters( 'media_view_settings', $settings, $post );
    $settings = apply_filters( 'media_view_settings', $settings, $post );
    $strings['settings'] = $settings;
    //------------------------------------------------------
    wp_enqueue_style('media');
    wp_localize_script( 'media-views', '_wpMediaViewsL10n', $strings );
    wp_enqueue_script( 'media-editor' );
    wp_enqueue_script( 'media-views' );
    wp_enqueue_script( 'media-audiovideo' );
    wp_enqueue_style( 'media-views' );
    wp_enqueue_script( 'wp-ajax-response' );
    wp_enqueue_script('image-edit');
    wp_enqueue_style('imgareaselect');
    if ( is_admin() ) {
       wp_enqueue_script( 'mce-view' );
       wp_enqueue_script( 'image-edit' );
    }
    wp_enqueue_style( 'imgareaselect' );
    $GLOBALS['body_id'] = 'media-upload1';
    $body_id = 'media-upload1';

    iframe_header( __('NetAngels S3', 'netangelss3') );

    //Add the Media buttons
    media_upload_header();


    if (!s3_connected()) 
    {
       print __('Плагин ещё не настроен');
       return false;
    }
    if ($_FILES)
    {
       $r = sendtocloud($s3,$_FILES['file']['tmp_name'],basename($_FILES['file']['name']));
       if ($r)
       {
        print '<div id="message2" class="updated below-h2"><p>Файл загружен.</p></div>';
       }
    }
    add_thickbox();
    print '<script src="'.plugins_url( 'js/mediaselect.js' , __FILE__ ).'?'.rand(1,10000).'"></script>';
    print '<link rel="stylesheet" id="netangelss3"  href="'.plugins_url( 'css/style.css' , __FILE__ ).'?sddd" type="text/css" media="all" />';
    print '<div class="netangelss3_media_insert_list">';
    print  s3_upload_form_html();
    $list =   s3_getList($s3);

    print '<ul class="netangles_attachments ui-sortable ui-sortable-disabled">';
    foreach($list as $item)
    {
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
add_filter('media_upload_netangelss3', 'view_netangelss3_tab');
