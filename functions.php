<?php
function filelist_get(&$filelst,$path)
{
 if (!is_dir($path)) return false;
 $dh=opendir($path);
 if ($dh===false) return false;
 while (($file = readdir($dh)) !== false)
 {
    if ($file == '.') continue;
    if ($file == '..') continue;
    $fullpath = $path.'/'.$file;
    if (is_dir($fullpath))
    {
      filelist_get($filelst,$fullpath);
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
    if ($key_id != '' and $secret_key!='' )
    {
      return true;
    }
    return false;
    
}
function s3_connected()
{
    if (!s3_setuped())
    {
       return false;
    }
    return true;
}

function getDefaultBucket()
{
    return get_option( 'netangelss3_bucket', '' );
}
function s3_create()
{

    $key_id = trim(get_option('key_id'));
    $secret_key = trim(get_option('secret_key'));
    $bucket = get_option('bucket');
    $s3 = new S3($key_id, $secret_key);
    return $s3;
}
function replace_in_post_and_pages($from,$to)
{
global $wpdb;
$wpdb->query($wpdb->prepare('UPDATE wp_posts SET post_content = REPLACE ( post_content, %s,  %s) WHERE post_content LIKE "%%%s%%"',$from,$to,$from) );
}

function sendtocloud($s3inc,$uploadFile,$objname='')
{
 /*
 var_dump($s3inc);
 print $uploadFile.'|';
 print $objname.'|';
 print '['.getDefaultBucket().']';
 */
 if (!$s3inc)
 {
   return false;
 }
 if ($objname == '')
 {
    $objname =  basename($uploadFile);
 }
 if (!$s3inc->putObjectFile($uploadFile, getDefaultBucket(), $objname, S3::ACL_PUBLIC_READ)) {
    return false;
 }
 return netangelss3_url_getFullUrl($objname);
}

function netangelss3_url_getFullUrl($name)
{
    $bucket = getDefaultBucket();
    $url = 'http://'.$bucket.'.s3.netangels.ru/'.$name;
    return $url;
}

function s3_getList($s3inc)
{
    return $s3inc->getBucket(getDefaultBucket());
}