<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");
require_once("../../data/link.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("international_cooperation");

$linkClass = new TZGCMS\Link();
$links = $linkClass->get_links_bydid(41);
$links2 = $linkClass->get_links_bydid(42);
?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"]."-关于我们-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header_about.php') ?>

   
    <div class="page page-about">
        <?php require_once('includes/subnav.php') ?>
        <div class="container">
            <?php  echo $data["content"]; ?>
        </div>
        <section class="s6-links" style="background-image:url('/img/bg-link-001.png')">
        <header class="title title-section title-section_v2">
                <h2 class="wow slideInLeft">我们的合作伙伴</h2>
            </header>

            <div class="container">
                <div class="links  wow slideInUp" data-wow-delay=".3s">
                <div class="row">
                   
                            <?php foreach ($links as $link) { ?>
                                <div class="col-6 col-md-4 col-lg-2">
                                    <a href="<?php echo $link['link']; ?>">
                                        <img src="<?php echo $link['image_url']; ?>" alt="<?php echo $link['title']; ?>">
                                    </a>
                                </div>
                            <?php } ?>
                    
                        </div>
                </div>
            </div>
        </section>
        <section class="s6-links s6-cerveau-links" style="background-image:url('/img/bg-link.png')">
            <div class="container">
           
                <div class="row links wow slideInUp">  
                        <div class="col col-md-4 col-lg-4">
                            <div class="title title-section title-section_v1 title-section_v2">
                                <h2 class="wow slideInUp">CERVEAU的合作伙伴</h3>
                            </div>
                        </div>                 
                        <?php foreach ($links2 as $link) { ?>
                          
                            <div class="col-6 col-md-4 col-lg-2">
                                <a href="<?php echo $link['link']; ?>">
                                    <img src="<?php echo $link['image_url']; ?>" alt="<?php echo $link['title']; ?>">
                                </a>
                            </div>
                        <?php } ?>               
                  
                </div>
            </div>
        </section>
    </div>


    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
          //  $(".mainav li:nth-of-type(1)").addClass("active");
          //  $(".subnav nav div:nth-of-type(6) a").addClass("active");
        });
    </script>
</body>

</html>