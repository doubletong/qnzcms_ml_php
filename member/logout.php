<?php
session_start();
// include function files for this application
  require_once('../code/db_fns.php');
  require_once('../code/common_fns.php');
  require_once('../code/user_auth_fns.php');
  require_once('../code/output_fns.php');

  

$old_user = $_SESSION['valid_user'];

// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
$result_dest = session_destroy();

// start output html
do_html_doctype("用户注销_".SITENAME );
do_html_header();
?>

<div id="wrapper" class ="container_24">
<?php
if (!empty($old_user)) {
  if ($result_dest)  {
    // if they were logged in and are now logged out
    echo '<p class="yes">已经退出系统!';
    do_html_url('member/login.php', '登录');
    echo '</p>';
    
  } else {
   // they were logged in and could not be logged out
    echo '<p class="error">没注销成功!</p>';
  }
} else {
  // if they weren't logged in but came to this page somehow
  echo '<p class="info">你没有登录，所以没有被注销。';
  do_html_url('member/login.php', '登录');
  echo '</p>';
}
?>
</div>

<?php 

do_html_footer();

?>
