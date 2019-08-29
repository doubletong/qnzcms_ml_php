<?php
session_start();
require_once('../includes/common.php');

$old_user = $_SESSION['valid_user'];

// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
$result_dest = session_destroy();

if (!empty($old_user)) {
    if ($result_dest)  {
        // if they were logged in and are now logged out
        $url = SITEPATH."index.php";
        header("Location: $url");
        exit();

    } else {
        // 注销失败
        $url = SITEPATH."bbi-admin/index.php";
        header("Location: $url");
        exit();
    }
} else {
    // if they weren't logged in but came to this page somehow
    echo '<p class="info">你没有登录，所以没有被注销。';
    do_html_url('member/login.php', '登录');
    echo '</p>';
}
?>