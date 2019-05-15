<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("declare");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "中美双报-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php // echo $data["content"];?>   
    
    <div class="striving">
<!--banner-->
<div class="inside_banner product_detail_banner">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <div class="inside_banner_logo wow fadeInLeft">
                    <img src="/images/product_detail_logo.png"/>
                </div>
                <h2 class="wow fadeInLeft">Firehawk®冠脉雷帕霉素靶向洗脱支架系统</h2>
            </div>
        </div>
        <div class="inside_banner_img wow fadeInRight" style="background-image:url(/images/product_detail_banner.png)"></div>
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
                <p class="wow fadeInUp">Firehawk®冠脉雷帕霉素靶向洗脱支架系统（TES）是微创®继Firebird™和Firebird2™之后的全新一代用于冠状动脉狭窄或阻塞等病变治疗的产品。全新的最优药物剂量安全理念，全新的高科技制造工艺，全新的临床学评价系统，全新的产品受众群市场。</p><br/>
                <dl class="wow fadeInUp">
                    <dd>涂层暴露面积仅为支架表面积的5%</dd>
                    <dd>药物体内释放时间超过90天</dd>
                    <dd>聚合物涂层9个月内完全降解</dd>
                    <dd>平均金属覆盖率14.0-16.1%</dd>
                    <dd>全球更低载药量支架，同类产品1/3载药量，获得相同的有效性</dd>
                </dl>
            </div>
            <!--规格参数-->
            <div class="product_detail_item product_detail_spec">
                <div class="product_detail_title wow fadeInUp">
                    <h3>规格参数</h3>
                </div>
                <div class="product_detail_table wow fadeInUp">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                        <tr>
                            <td rowspan="2">支架<br/>直径</td>
                            <td colspan="11">支架长度</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>16</td>
                            <td>18</td>
                            <td>21</td>
                            <td>23</td>
                            <td>26</td>
                            <td>29</td>
                            <td>31</td>
                            <td>33</td>
                            <td>35</td>
                            <td>38</td>
                        </tr>
                        <tr>
                            <td>2.25</td>
                            <td>RV2213</td>
                            <td>RV2216</td>
                            <td>RV2218</td>
                            <td>RV2221</td>
                            <td>RV2223</td>
                            <td>RV2226</td>
                            <td>RV2229</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                        </tr>
                        <tr>
                            <td>2.5</td>
                            <td>RV2513</td>
                            <td>RV2516</td>
                            <td>RV2518</td>
                            <td>RV2521</td>
                            <td>RV2523</td>
                            <td>RV2526</td>
                            <td>RV2529</td>
                            <td>RV2531</td>
                            <td>RV2533</td>
                            <td>--</td>
                            <td>--</td>
                        </tr>
                        <tr>
                            <td>2.75</td>
                            <td>RV2713</td>
                            <td>RV2716</td>
                            <td>RV2718</td>
                            <td>RV2721</td>
                            <td>RV2723</td>
                            <td>RV2726</td>
                            <td>RV2729</td>
                            <td>RV2731</td>
                            <td>RV2733</td>
                            <td>RV2735</td>
                            <td>RV2738</td>
                        </tr>
                        <tr>
                            <td>3.0</td>
                            <td>RV3013</td>
                            <td>RV3016</td>
                            <td>RV3018</td>
                            <td>RV3021</td>
                            <td>RV3023</td>
                            <td>RV3026</td>
                            <td>RV3029</td>
                            <td>RV3031</td>
                            <td>RV3033</td>
                            <td>RV3035</td>
                            <td>RV3038</td>
                        </tr>
                        <tr>
                            <td>3.5</td>
                            <td>RV3513</td>
                            <td>RV3516</td>
                            <td>RV3518</td>
                            <td>RV3521</td>
                            <td>RV3523</td>
                            <td>RV3526</td>
                            <td>RV3529</td>
                            <td>RV3531</td>
                            <td>RV3533</td>
                            <td>RV3535</td>
                            <td>RV3438</td>
                        </tr>
                        <tr>
                            <td>4.0</td>
                            <td>RV4013</td>
                            <td>RV4016</td>
                            <td>RV4018</td>
                            <td>RV4021</td>
                            <td>RV4023</td>
                            <td>RV4026</td>
                            <td>RV4029</td>
                            <td>RV4031</td>
                            <td>RV4033</td>
                            <td>RV4035</td>
                            <td>RV4038</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <br/>
                <p class="wow fadeInUp">注册信息：<br/>
                    1）医疗器械名称：冠脉雷帕霉素靶向洗脱支架系统（商品名：火鹰，Firehawk）<br/>
                    2）医疗器械生产企业名称：上海微创医疗器械（集团）有限公司<br/>
                    3）医疗器械注册证号：国械注准20143462100</p>
            </div>
        </div>
    </div>
<!--main end-->
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>