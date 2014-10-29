<?php


function  netangelss3_filelistGet(&$filelst, $path)
{
    if (!is_dir($path)) return false;
    $dh = opendir($path);
    if ($dh === false) return false;
    while (false !== ($file = readdir($dh))) {
        if ($file == '.') continue;
        if ($file == '..') continue;
        $fullpath = $path . '/' . $file;
        if (is_dir($fullpath)) {
            netangelss3_filelistGet($filelst, $fullpath);
            continue;
        }
        $filelst[] = $fullpath;
    }
    closedir($dh);
}

function netangelss3_setuped()
{
    $key_id = trim(get_option('netangelss3_key_id'));
    $secret_key = trim(get_option('netangelss3_secret_key'));
    if ($key_id != '' and $secret_key != '') {
        return true;
    }
    return false;

}

function netangelss3_connected()
{
    $netangelss3_connection_status = get_option('netangelss3_connection_status');
    if ($netangelss3_connection_status=='1') {
        return true;
    }
    return false;
}

function netangelss3_getDefaultBucket()
{
    return get_option('netangelss3_bucket', '');
}

function netangelss3_create()
{
    if (isset($GLOBALS['netangelss3_obj'])) return $GLOBALS['netangelss3_obj'];
    $key_id     = trim(get_option('netangelss3_key_id'));
    $secret_key = trim(get_option('netangelss3_secret_key'));
    $bucket     = get_option('netangelss3_bucket');
    $s3         = new S3($key_id, $secret_key);
    $GLOBALS['netangelss3_obj'] = $s3;
    return $s3;
}

function netangelss3_replace_in_post_and_pages($from, $to)
{
    global $wpdb;
    $wpdb->query($wpdb->prepare('UPDATE wp_posts SET post_content = REPLACE ( post_content, %s,  %s) WHERE post_content LIKE "%%%s%%"', $from, $to, $from));
}

function netangelss3_sendToCloud($s3inc, $uploadFile, $objname = '')
{
    /*
    var_dump($s3inc);
    print $uploadFile.'|';
    print $objname.'|';
    print '['.netangelss3_getDefaultBucket().']';
    */
    if (!$s3inc) {
        return false;
    }
    if ($objname == '') {
        $objname = basename($uploadFile);
    }
    if (!$s3inc->putObjectFile($uploadFile, netangelss3_getDefaultBucket(), $objname, S3::ACL_PUBLIC_READ)) {
        return false;
    }
    return netangelss3_urlGetFullUrl($objname);
}

function netangelss3_deleteInCloud($s3inc, $name)
{
    if (!$s3inc) {
        return false;
    }
    //$url = netangelss3_urlGetFullUrl($name);
    if (!$s3inc->deleteObject(netangelss3_getDefaultBucket(), $name)) {
        return false;
    }
    return true;
}

function netangelss3_getFromCloud($s3inc, $name, $destfile)
{
    $url = netangelss3_urlGetFullUrl($name);
    $fp = fopen($destfile, 'w+'); //This is the file where we save the    information
    $ch = curl_init(str_replace(" ", "%20", $url)); //Here is the file we are downloading, replace spaces with %20
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);
    curl_setopt($ch, CURLOPT_FILE, $fp); // write curl response to file
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch); // get curl response
    curl_close($ch);
    fclose($fp);
}

function netangelss3_s3_name($name)
{
    $name = substr($name, 1);
    return $name;
}

function netangelss3_urlGetFullUrl($name)
{
    $bucket = netangelss3_getDefaultBucket();
    $url = 'http://' . $bucket . '.'.NETANGELSS3_ENDPOINT.'/' . $name;
    return $url;
}

function netangelss3_getList($s3inc)
{
    return $s3inc->getBucket(netangelss3_getDefaultBucket());
}

function netangelss3_fine_size($bytes)
{
    $bytes = floatval($bytes);
    $arBytes = array(
        0 => array(
            "UNIT" => "TB",
            "VALUE" => pow(1024, 4)
        ),
        1 => array(
            "UNIT" => "GB",
            "VALUE" => pow(1024, 3)
        ),
        2 => array(
            "UNIT" => "MB",
            "VALUE" => pow(1024, 2)
        ),
        3 => array(
            "UNIT" => "KB",
            "VALUE" => 1024
        ),
        4 => array(
            "UNIT" => "B",
            "VALUE" => 1
        ),
    );

    foreach ($arBytes as $arItem) {
        if ($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", ",", strval(round($result, 2))) . " " . $arItem["UNIT"];
            break;
        }
    }
    return $result;
}

function netangelss3_filesize($fl)
{
    $upload_dir = wp_upload_dir();
    return filesize($upload_dir['basedir'].$fl);
}

function netangelss3_fileDesc($file)
{
    $upload_dir = wp_upload_dir();
    $full_file = $upload_dir['basedir'].$file;
    if (strpos($file,'/from_netangels_s3/') !== false)
    {
        return NETANGELSS3_MESSAGES_BEFORE_DOWNLOADING_FROM_S3;
    }
}

function netangelss3_getTypeByName($name)
{
    $filetype = wp_check_filetype($name);
    list($maintype, $subtype) = explode('/', $filetype['type']);
    $filetype['maintype'] = $maintype;
    $filetype['subtype'] = $subtype;
    $filetype['wptype'] = wp_ext2type($filetype['ext']);
    if ($filetype['wptype'] == '') $filetype['wptype'] = 'default';
    return $filetype;
}

function netangelss3_getLiElement($item)
{
    $name = $item['name'];
    $url = netangelss3_urlGetFullUrl($name);
    $type = netangelss3_getTypeByName($name);
    $s = '<li class="netangels_attachment" data-fileurl="' . $url . '" data-type="' . $type['maintype'] . '">';
    $s .= '<div class="type-' . $type['maintype'] . '">';
    $typ = netangelss3_getTypeByName($name);
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