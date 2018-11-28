<?php ob_start();

session_start();
// include function files for this application
require_once('../code/db_fns.php');
require_once('../code/common_fns.php');
require_once('../code/user_auth_fns.php');
require_once('../code/output_fns.php');
require_once('../code/url_fns.php');
//create short variable names
$username = $_POST['username'];
$passwd = $_POST['passwd'];
if ($username && $passwd) {
// they have just tried logging in
  try  {
    login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
    
    $url = SITEPATH."admin";
    header("Location: $url"); 
    exit;
    ob_flush();
  }
  catch(Exception $e)  {

    // 登录未成功
  	do_html_doctype("程序出错_".SITENAME );
  	do_html_header();
   
    echo '您还没有登录，请点击';
    do_html_url(SITEPATH.'member/login.php', '这里');
    echo '重新登录！';
          
    
    do_html_footer();
    exit;
  }
}


  	
check_valid_user();
// get the bookmarks this user has saved
if ($url_array = get_user_urls($_SESSION['valid_user'])) {
  display_user_urls($url_array);
}

// give menu of options
display_user_menu();

do_html_footer();
?>
