<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/job.php");

$JobClass = new Job();
$jobs = $JobClass->fetch_all();

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "加入我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="page-jion">
        <div class="banner">
            <div class="page-title">
                <h1>加入我们</h1>
     
            </div>
        </div>

        <div class="container s1">
            <header class="title">
                <h2>
                    为什么选择希麦迪？
                </h2>
                <p>加入希麦迪！一个让你能实现个人和事业共同发展的优秀平台，实现员工和企业的梦想。</p>
            </header>
            <div class="container-fluid text">
                <div class="row jionus">
                    <div class="col">
                        <div class="item">
                            <h3>以人为本的立业宗旨</h2>
                                <p>人才是公司最宝贵的资源，是公司持续快速发展的基石，我们始终把人才作为企业创业之本、竞争之本与发展之本</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item item1">
                            <h3>优于同行的薪酬福利</h2>
                                <p>在行业内属于中上等水平，各项福利齐全，多样化可供员工选择其他福利</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item item2">
                            <h3>完善友好的培训体系</h2>
                                <p>希麦迪2017年刚成立，投资大量资源进行2017年应届毕业生的培训，使得公司成员更有竞争力，与希麦迪共同发展 </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item item3">
                            <h3>先进人性的管理体系</h2>
                                <p>人岗相适，人尽其才的扁平化管理，工作氛围轻松积极</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item item4">
                            <h3>员工成长的巨大空间</h2>
                                <p>通过有效的激励，提供优越的成长环境、发展空间和展示机会， 激发主动性和创造性，扶持员工成长，成就员工的卓越，助力希麦迪的飞跃
                                </p>
                        </div>
                    </div>
                </div>
            </div>


            <header class="title">
                <h2>
                    我们期待你的加入！
                </h2>
            </header>
            <section class="postlist">
            <?php   foreach($jobs as $job){ ?>
                <div class="post">
                    <div class="post-header">
                        <div class="row">
                            <div class="col-md">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="post-title"><?php echo $job["title"]; ?></div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <div class="note">所属部门：<?php echo $job["department"]; ?> | 工作地点：<?php echo $job["address"]; ?> | 招聘人数：<?php echo $job["population"]; ?>人</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-auto text-right">
                                <a href="javascript:void(0);" class="open"><i class="iconfont icon-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="post-body">
                        <?php echo $job['content'];?>

                        <p class="reply">请将简历发送至邮箱：<a href="mailto:HR@crmedicon.com">HR@crmedicon.com</a>，我们会尽快与你联系。</p>
                    </div>
                </div>
            <?php  } ?>
                
            </section>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(6) a").addClass("active");
           $(".mainav li:nth-of-type(6) a").addClass("active");

           $('.post a.open').click(function(e) {

                $(this).closest(".post-header").toggleClass("openshow");
                $(this).closest(".post").find(".post-body").slideToggle();
            });
          
        });
    </script>
</body>
</html>