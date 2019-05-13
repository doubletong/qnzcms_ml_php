<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("clinical");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "疾病管理-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-events">
        <div class="container page-title">
            <h1>学术活动</h1>
            <p>时刻更新我们的最新动态</p>
        </div>
    </div>
    <div class="page page-disease-list page-events">
        <div class="container">
        
            <section class="s2">

                <div class="categories">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="#" class="active">全部</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">心律管理</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">电生理</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">骨科髋关节</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">大动脉与外周血管</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="list list-disease list-events">
            <a href="/events/detail-1" class="item">
                <div class="container">
                    <div class="disease">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pic"><img src="/img/temp/d1.jpg" alt=""></div>
                            </div>
                            <div class="col-md-8">
                                <div class="des">
									<h3>经皮冠状动脉介入治疗</h3>
									<time>2019-03-28</time>
                                    <p>经皮冠状动脉介入治疗( percutaneous coronary intervention，PCI)，是指经心导管技术疏通狭窄甚至闭塞的冠状动脉管腔，从而改善心肌的血流灌注的治疗方法。...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/events/detail-1" class="item">
                <div class="container">
                    <div class="disease">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pic"><img src="/img/temp/d1.jpg" alt=""></div>
                            </div>
                            <div class="col-md-8">
                                <div class="des">
									<h3>经皮冠状动脉介入治疗</h3>
									<time>2019-03-28</time>
                                    <p>经皮冠状动脉介入治疗( percutaneous coronary intervention，PCI)，是指经心导管技术疏通狭窄甚至闭塞的冠状动脉管腔，从而改善心肌的血流灌注的治疗方法。...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</a>
			<a href="/events/detail-1" class="item">
                <div class="container">
                    <div class="disease">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pic"><img src="/img/temp/d1.jpg" alt=""></div>
                            </div>
                            <div class="col-md-8">
                                <div class="des">
									<h3>经皮冠状动脉介入治疗</h3>
									<time>2019-03-28</time>
                                    <p>经皮冠状动脉介入治疗( percutaneous coronary intervention，PCI)，是指经心导管技术疏通狭窄甚至闭塞的冠状动脉管腔，从而改善心肌的血流灌注的治疗方法。...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</a>
			<a href="/events/detail-1" class="item">
                <div class="container">
                    <div class="disease">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pic"><img src="/img/temp/d1.jpg" alt=""></div>
                            </div>
                            <div class="col-md-8">
                                <div class="des">
									<h3>经皮冠状动脉介入治疗</h3>
									<time>2019-03-28</time>
                                    <p>经皮冠状动脉介入治疗( percutaneous coronary intervention，PCI)，是指经心导管技术疏通狭窄甚至闭塞的冠状动脉管腔，从而改善心肌的血流灌注的治疗方法。...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</a>
			<a href="/events/detail-1" class="item">
                <div class="container">
                    <div class="disease">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pic"><img src="/img/temp/d1.jpg" alt=""></div>
                            </div>
                            <div class="col-md-8">
                                <div class="des">
									<h3>经皮冠状动脉介入治疗</h3>
									<time>2019-03-28</time>
                                    <p>经皮冠状动脉介入治疗( percutaneous coronary intervention，PCI)，是指经心导管技术疏通狭窄甚至闭塞的冠状动脉管腔，从而改善心肌的血流灌注的治疗方法。...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
   
        <div class="pagination">
            <ul class="pager">
                <li><a class="prev" href="#">上一页</a></li>
                <li class="active"><a class="page-link" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#" class="more">…</a></li>        
                <li><a class="next" href="#">下一页</a></li>    
            </ul>
            <span>共5页，到第</span> <input type="number" id="pagenum" class="pagenum"> <span>页</span> <a href="javascript:void();" class="go">确定</a>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");
            $(".subnav li:nth-of-type(3) a").addClass("active");

            $(".btnclose").click(function(e){
                $(".quickcontact").slideToggle();
            })
        });
    </script>
</body>

</html>