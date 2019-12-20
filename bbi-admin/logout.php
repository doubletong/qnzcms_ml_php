<?php

require_once('../includes/common.php');

session_start();

unset($_SESSION['valid_user']);
unset($_SESSION['logged_in']);

session_destroy();

$url = "/index.php";
header("Location: $url");
exit();

?>