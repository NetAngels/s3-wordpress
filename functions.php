<?php
function filelist_get(&$filelst, $path)
{
    if (!is_dir($path)) return false;
    $dh = opendir($path);
    if ($dh === false) return false;
    while (($file = readdir($dh)) !== false) {
        if ($file == '.') continue;
        if ($file == '..') continue;
        $fullpath = $path . '/' . $file;
        if (is_dir($fullpath)) {
            filelist_get($filelst, $fullpath);
            continue;
        }
        $filelst[] = $fullpath;
    }
    closedir($dh);
}

function s3_setuped()
{
    $key_id = trim(get_option('key_id'));
    $secret_key = trim(get_option('secret_key'));
    if ($key_id != '' and $secret_key != '') {
        return true;
    }
    return false;

}

function s3_connected()
{
    if (!s3_setuped()) {
        return false;
    }
    return true;
}

function getDefaultBucket()
{
    return get_option('netangelss3_bucket', '');
}

function s3_create()
{

    $key_id = trim(get_option('key_id'));
    $secret_key = trim(get_option('secret_key'));
    $bucket = get_option('bucket');
    $s3 = new S3($key_id, $secret_key);
    return $s3;
}

function netangelss3_replace_in_post_and_pages($from, $to)
{
    global $wpdb;
    $wpdb->query($wpdb->prepare('UPDATE wp_posts SET post_content = REPLACE ( post_content, %s,  %s) WHERE post_content LIKE "%%%s%%"', $from, $to, $from));
}

function sendtocloud($s3inc, $uploadFile, $objname = '')
{
    /*
    var_dump($s3inc);
    print $uploadFile.'|';
    print $objname.'|';
    print '['.getDefaultBucket().']';
    */
    if (!$s3inc) {
        return false;
    }
    if ($objname == '') {
        $objname = basename($uploadFile);
    }
    if (!$s3inc->putObjectFile($uploadFile, getDefaultBucket(), $objname, S3::ACL_PUBLIC_READ)) {
        return false;
    }
    return netangelss3_url_getFullUrl($objname);
}

function delete_in_cloud($s3inc, $name)
{
    if (!$s3inc) {
        return false;
    }
    //$url = netangelss3_url_getFullUrl($name);

    if (!$s3inc->deleteObject(getDefaultBucket(), $name)) {
        return false;
    }
    return true;
}

function getfromcloud($s3inc, $name, $destfile)
{
    $url = netangelss3_url_getFullUrl($name);
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
    /*
    $name = strtr($name,
    array(
        '/' => '-',
        "\\" => '-',
        ':' => '-',
    ));
    */
    return $name;
}

function netangelss3_url_getFullUrl($name)
{
    $bucket = getDefaultBucket();
    $url = 'http://' . $bucket . '.s3.netangels.ru/' . $name;
    return $url;
}

function s3_getList($s3inc)
{
    return $s3inc->getBucket(getDefaultBucket());
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