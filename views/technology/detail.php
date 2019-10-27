<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");

$articleClass = new TZGCMS\Article();
$did = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
    $prev = $articleClass->fetch_prev_data($id, $did);
    $next = $articleClass->fetch_next_data($id, $did);
} else {
    header('Location: /technology');
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
    <title><?php echo $data['title'] . "-核心技术-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('components/header.php') ?>


    <div class="page page-news-detail page-tech-detail container">



        <header class="title title-app wow fadeInUp">
            <h1 class="t1"><?php echo $data['title']; ?></h1>
            <div class="bg">
                <img src="<?php echo $data['image_url']; ?>" alt="<?php echo $data['title']; ?>">
            </div>
        </header>

        <div class="article">

            <?php // echo $data['content']; 
            ?>

            <div class="title-se-art wow fadeInUp">
                <h3>技术介绍</h3>
            </div>

            <div class="se wow fadeInUp">
                <p>膜生物反应器(MBR)是一种以生物处理技术和膜分离技术结合产生的新型污水处理系统。相对活性污泥法、氧化沟法等传统污水处理方法，MBR优势在于污水处理过程省去了二沉池等工艺环节，设备占地面积大幅减少，同时处理水质好、稳定，但投资运营成本较高。</p>

                <p>三达膜iMBR系列产品采用公司自主研发的iMBR专用配方，膜丝使用寿命和通量显著提高;膜组件采用一体化、垂直型曝气等结构创新工艺，稳定性好、能耗低、抗污染能力强。三达的iMBR成套设备已在多个污水处理项目上得到应用，产品形成了1项发明专利和4项实用新型专利，三达还参与制订了MBR技术的现行国家标准《膜生物反应器通用技术规范》(GB/T33898-2017)。</p>

            </div>

            <div class="title-se-art wow fadeInUp">
                <h3>技术特点</h3>
            </div>

            <div class="se wow fadeInUp">
                <div class="row tech">
                    <div class="col col-md-6 col-lg-4">
                        <div class="item">
                                <p>膜的高效截留作用可使出水悬浮物浓度极低</p>
                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-4">
                        <div class="item">
                                <p>可以使SRT与HRT完全分开，在维持较短的HRT的同时，又可保持极长的SRT污泥产量少</p>
                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-4">
                        <div class="item">
                                <p>可以维持极高的MLSS</p>
                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-4">
                        <div class="item">
                                <p>膜分离课时费水中的大分子颗粒状难降解物质在反应器内停留较长的时间最终得以除去</p>
                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-4">
                        <div class="item">
                                <p>可溶性大分子化合物也可以被截留下来。不会随着水流而影响出水水质最终也可以被降解</p>
                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-4">
                        <div class="item">
                                <p>膜截流的高效性可以使世代时间长的如硝化菌等在生物反应器内生长因此脱氮效果较好</p>
                        </div>
                    </div>
                </div>
            </div>

           

            <div class="title-se-art wow fadeInUp">
                <h3>应用领域</h3>
            </div>

            <div class="se wow fadeInUp">
                <div class="row">
                    <div class="col-md-6">
                        <div class="case"><img alt="市政生活污水" src="/uploads/images/tech/temp1.jpg" />
                            <p>市政生活污水</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="case"><img alt="生物制药" src="/uploads/images/tech/temp2.jpg" />
                            <p>生物制药</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="case"><img alt="石化化工" src="/uploads/images/tech/temp3.jpg" />
                            <p>石化化工</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="case"><img alt="垃圾渗滤液" src="/uploads/images/tech/temp4.jpg" />
                            <p>垃圾渗滤液</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="case"><img alt="医院废水" src="/uploads/images/tech/temp5.jpg" />
                            <p>医院废水</p>
                        </div>
                    </div>

                    
                </div>
            </div>

        </div>




    </div>



    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {

        });
    </script>
</body>

</html>