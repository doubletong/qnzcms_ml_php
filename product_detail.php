<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/product.php");

$productClass = new Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $productClass->get_product_bgId($id);

    $docs = $productClass->get_product_documents($id);


    $cases = array_filter($docs, function ($item) {
        return  $item['dictionary_id'] === '26';
    });
    $documents = array_filter($docs, function ($item) {
        return $item['dictionary_id'] === '27';
    });

    //print_r($filtered);

} else {
    header('Location: /creative');
    exit;
}

//print_r($documents);


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $data['title'] . "-产品-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>

    <?php 
    ?>

    <div class="striving">
        <!--banner-->
        <div class="inside_banner product_detail_banner">
            <div class="wrap clear">
                <div class="inside_banner_txt pos_center">
                    <div class="inside_banner_logo wow fadeInLeft">
                        <img src="<?php echo $data['thumbnail']; ?>" />
                    </div>
                    <h2 class="wow fadeInLeft"><?php echo $data['title']; ?></h2>
                </div>
            </div>
            <div class="inside_banner_img wow fadeInRight" style="background-image:url(<?php echo $data['image_url']; ?>)"></div>
        </div>
        <!--banner end-->

        <!--main-->
        <div class="main product_detail">
            <div class="wrap">
                <!--产品简介-->
                <div class="product_detail_item product_detail_desc">
                    <div class="product_detail_title wow fadeInUp">
                        <h3>产品简介</h3>
                    </div>

                    <?php echo $data['content']; ?>
                </div>
                <?php if(!empty($data['registration'])){?>
                <!--注册信息-->
                <div class="product_detail_item product_detail_desc">
                    <div class="product_detail_title wow fadeInUp">
                        <h3>注册信息</h3>
                    </div>
                    <?php echo $data['registration']; ?>
                </div>
                <?php } ?>
                <!--规格参数-->
                <?php if(!empty($data['specifications'])){?>
                <div class="product_detail_item product_detail_spec">
                    <div class="product_detail_title wow fadeInUp">
                        <h3>规格参数</h3>
                    </div>
                    <div class="product_detail_table wow fadeInUp">
                        <?php echo $data['specifications']; ?>
                    </div>

                </div>
                <?php } ?>
                <?php if (!empty($data['video_id'])) { ?>
                    <!--视频展示-->
                    <div class="product_detail_item product_detail_video">
                        <div class="product_detail_title wow fadeInUp">
                            <h3>视频展示</h3>
                        </div>
                        <div class="product_detail_video_wrap wow fadeInUp" id="youkuplayer">
                            <!-- <video poster="images/product_detail_video.jpg" src="" preload=""></video>
                        <a class="play_btn" href="javascript:void(0);"><img src="images/play.png"/></a> -->
                        </div>
                    </div>
                <?php } ?>

                <?php if (!empty($cases)) { ?>
                    <!--相关案例-->
                    <div class="product_detail_item product_detail_case">
                        <div class="product_detail_title wow fadeInUp">
                            <h3>相关案例</h3>
                            <div class="product_detail_case_pagination fr"></div>
                        </div>
                        <div class="product_detail_case_wrap wow fadeInUp">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php foreach ($cases as $case) { ?>
                                        <div class="swiper-slide">
                                            <p><?php echo $case['title']; ?>
                                                <span><?php echo $case['address']; ?></span>
                                            </p>
                                            <a href="<?php echo $case['file_url']; ?>" target="_blank">查看文档</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (!empty($documents)) { ?>
                    <!--相关文献-->
                    <div class="product_detail_item product_detail_literature">
                        <div class="product_detail_title wow fadeInUp">
                            <h3>相关文献</h3>
                        </div>
                        <ul class="clear wow fadeInUp">
                            <?php foreach ($documents as $doc) { ?>
                                <li>
                                    <a href="<?php echo $doc['file_url']; ?>" title="<?php echo $doc['title']; ?>"><?php echo $doc['title']; ?></a>
                                </li>
                            <?php } ?>
                       
                        </ul>
                    </div>
                <?php } ?>

            </div>
        </div>
        <!--main end-->
    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>
    <script type="text/javascript" src="//player.youku.com/jsapi"></script>
    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
            $(".mainav li:nth-of-type(4) a").addClass("active");
            $(".subnav li:nth-of-type(2) a").addClass("active");
        });

        var videoId = '<?php echo $data['video_id']; ?>';

        if (videoId.length > 0) {
            var player = new YKU.Player('youkuplayer', {
                styleid: '0',
                client_id: '6c97f129b630ded7',
                vid: videoId,
                newPlayer: true
            });
        }

        // var mySwiper = new Swiper('.swiper-container', {
        //     speed: 600,
        //     slidesPerView: 3,
        //     slidesPerGroup: 3,
        //     spaceBetween: 20,
        //     pagination: '.product_detail_case_pagination',
        //     paginationClickable: true,
        //     paginationBulletRender: function(swiper, index, className) {
        //         return '<span class="' + className + '">' + (index + 1) + '</span>';
        //     }
        // })
    </script>
</body>

</html>