<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");
require_once("data/article.php");

$pageClass = new Page();
$pageModel = $pageClass->fetch_data("laws");
$articleClass = new Article();
$articles = $articleClass->get_all_articles(5);


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "良知创意中心-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-creative">
        <div class="container page-title">
            <h1>良知创意中心</h1>
            <p>发现需求   收集创意   解决问题</p>
        </div>
    </div>
    <div class="page page-support page-story page-creative">
        <div class="container">
            <section class="s1">
                <h2>发现需求  不断创新</h2>
                <p>疾病是微创与医生和患者共同面对的敌人。我们应统一战线，开展医工合作，发现需求、收集创意，解决问题，最终打败敌人！<br/>
早在2002年，微创就预见到医生是创新转化的重要力量，通过医工合作，才能为医疗器械发展带来源源不断的创新项目。<br/>
自微创创立至今，已有48个医工合作项目，其中9个项目已获注册证，8个项目已完成样品评价。微创正在积极加强与全球医疗行业的合作，在我们的业务中开发出更有适用价值的产品，实现医工合作双赢局面, 共同为“让患者向115岁而生”而努力！</p>
                <a href="#" class="more">知行学院官网 <i class="iconfont icon-right"></i></a>
            </section>

            <section class="s1 s2">
            
         
            <h2 class="title">医工合作案例</h2>
            <div class="list list-story list-case">
        <div class="row">
            <?php foreach($articles as $data){ ?>
            <div class="col-md-4">
                <div class="item">
                    <img src="<?php echo $data['image_url']; ?>" class="bg" alt="<?php echo $data['title']; ?>">
                    <div class="txt">
                        <div class="logo">
                            <img src="<?php echo $data['thumbnail']; ?>" alt="<?php echo $data['title']; ?>">
                        </div>

                        <h3><?php echo $data['title']; ?></h3>
                        <a href="/creative/detail-<?php echo $data['id']; ?>" class="view">查看案例</a>
                    </div>
                </div>                
            </div>
            <?php } ?>
                     
        </div>
        </div>
        
        </section>

        <section class="s1 s3">
                <h2>我们珍惜您的每一个创意</h2>
                <p>您有关于医疗产品或医疗过程痛点问题寻求解决方案吗？<br/>
您有医疗相关创意或跨界技术方案希望转化为医疗产品吗？<br/>
您希望凭您一技之长挑战医疗产品开发难题吗？<br/>
与微创<sup>®</sup>一起，助力实现人类延年益寿之梦想！</p>
            
            </section>
<section class="s4">
    <header class="tab-header">
        <div class="row no-gutters">
            <div class="col">
            <a href="javascript:void(0);" class="active" data-id="tab001">我有痛点反馈</a>
            </div>
            <div class="col">
            <a href="javascript:void(0);" data-id="tab002">我有痛点反馈</a>
            </div>
            <div class="col">
            <a href="javascript:void(0);" data-id="tab003">我有痛点反馈</a>
            </div>
        </div>       

    </header>
    <div class="tabcontent">
        <form action="#" method="pose">
            <div class="row form-box">
                <div class="col-md-6">
                <label for="">您的姓名</label>
                <div class="formgroup">
                    <input type="text" name="name" placeholder="请输入您的姓名">
                </div>
                </div>
                <div class="col-md-6">
                <label for="">您的联系方式</label>
                <div class="formgroup">
                <input type="text" name="phone" placeholder="请输入您的手机号码">
                </div>
              
                </div>
            </div>
            <div class="form-box">
                <label for="">您的痛点问题描述</label>
                <div class="formgroup">
                    <textarea name="description" id="description"  rows="6" placeholder="请输入您的痛点问题描述"></textarea>
                </div>
            </div>
            <div class="form-box">
                <a href="javascript:void(0);" class="selectedFiles">上传附件</a>
            </div>
            <div class="form-box">
                <label for="">痛点后果严重程度/发生频次描述</label>
                <div class="formgroup">
                    <textarea name="description" id="description"  rows="6" placeholder="请输入该痛点后果严重程度/发生频次描述"></textarea>
                </div>
            </div>
            <div class="form-box">
                <label for="">期望解决方案</label>
                <div class="formgroup">
                    <textarea name="description" id="description"  rows="6" placeholder="请输入您的期望解决方案"></textarea>
                </div>
            </div>
            <div class="action">
                <button type="submit">提交</button>
            </div>
        </form>
    </div>

    
</section>
<section class="s5">
    <div class="qrcode">
        <img src="/img/link_qrcode.jpg" alt="扫码提交您的医疗痛点">
        <label>扫码提交您的医疗痛点</label>
    </div>
</section>
        </div>
        

       

    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");

        });
    </script>
</body>

</html>