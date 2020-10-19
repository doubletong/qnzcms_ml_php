<?php

require_once('../includes/common.php');

session_start();

unset($_SESSION['valid_user']);
unset($_SESSION['logged_in']);
unset($_SESSION['user_id']);
unset($_SESSION['my_permissions']);

session_destroy();

$url = "/index.php";
header("Location: $url");
exit();

?>