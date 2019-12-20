<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/data/option.php');

$siteOptionClass = new SiteOption();
$SiteOptionModel = $siteOptionClass->get_config("site_info");
$site_info  = json_decode($SiteOptionModel['config_values'], true);

// define('SITEPATH', 'http://tzgcmsphp.com:83/');

// Set default timezone
//date_default_timezone_set('UTC');
date_default_timezone_set('Asia/Shanghai');

header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1"); //开启XSS保护


function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}



?>