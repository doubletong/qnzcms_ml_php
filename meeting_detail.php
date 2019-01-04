<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/meeting.php");

$meetingClass = new Meeting();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $meetingClass->fetch_data($id);
   // $prev = $meetingClass->fetch_prev_data($id);
   // $next = $meetingClass->fetch_next_data($id);
}else{
    header('Location: /news');
    exit;
}


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "会议信息-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-news">
<?php require_once('includes/header_news.php') ?>

<div class="container news-detail">
            <header class="news-header">
                <h1><?php echo $data["title"];?></h1>
                <p><?php echo date('Y-m-d H:i:s',$data['added_date']) ;?></p>
            </header>
            <article class="news-body">
                <ul class="deslist">
                    <li><span>会议主办：</span><?php echo $data["sponsor"];?>
                    </li>
                    <li><span>会议协办：</span><?php echo $data["co_organizer"];?>
                    </li>
                    <li><span>会议时间：</span><?php echo $data["meeting_time"];?>
                    </li>
                    <li><span>会议地点：</span><?php echo $data["address"];?>
                    </li>
                    <li><span>会议内容：</span><?php echo $data["summary"];?></li>
                </ul>
                <?php echo $data['content'];?>
            </article>

        </div>

    </div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(5) a").addClass("active");
           $(".mainav li:nth-of-type(5) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>