<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/meeting.php");

$meetingClass = new Meeting();
$meetings = $meetingClass->fetch_all();

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

<div class="container s2">
            <section class="meetinglist">

            <?php foreach($meetings as $data) {?>
                <div class="box">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="pic" style="background-image:url(<?php echo $data["thumbnail"]; ?>);">

                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="des">
                                <h3 class="title">
                                <?php echo $data["title"]; ?>
                                </h3>
                                <p><?php echo date('Y-m-d',$data['added_date']) ;?></p>
                                <ul>
                                    <li>会议时间：<?php echo date_create($data['meeting_time'])->format("Y年m月d日 H点i分"); ?></li>
                                    <li>会议地点：<?php echo $data["address"]; ?></li>
                                </ul>
                                <a href="/meeting/detail-<?php echo $data["id"]; ?>" class="more">查看详情</a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php }?>
               
            </section>
            <!-- <footer class="text-center">
                <a href="javascript:void(0);" class="more">查看更多</a>
            </footer> -->
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