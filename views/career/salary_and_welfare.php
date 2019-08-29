<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");

$articleClass = new TZGCMS\Article();
$articles = $articleClass->get_all_articles(2);
$n = 0;
?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "薪资福利-职业发展" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header_career.php') ?>

    <?php // echo $data["content"];
    ?>
    <div class="page page-career">
        <?php require_once('includes/subnav.php') ?>
        <div class="container">
            <header class="title title-section">
                <h2 class="wow slideInLeft">薪资福利</h2>
            </header>

            <div class="box-salary">
                <div class="list-salary">
                <div class="row">
                    <?php foreach($articles as $article){ 
                        ?>
                        <div class="col-md-6">
                            <div class="item">
                            <div class="row align-items-center no-gutters">
                                <div class="col">
                                    <div class="txt">
                                        <h3><?php echo $article['title']; ?></h3>
                                        <a href="/career/salary_and_welfare/detail-<?php echo $article['id']; ?>">查看更多</a>
                                    </div>                                    
                                </div>
                                <div class="col <?php echo $n===3||$n===2 ? "order-first":""; ?>">
                                    <img src="<?php echo $article['thumbnail']; ?>" alt="">
                                </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                    $n++;
                } ?>

                </div>
            </div>

               
            </div>
               
         
        </div>
    </div>


    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
        
          //  $(".mainav li:nth-of-type(5)").addClass("active");
          //  $(".subnav nav div:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>

</html>