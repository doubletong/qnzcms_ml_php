<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/distributor.php");

$branchClass = new Distributor();
if (isset($_GET['id'])) {
    $id = $_GET['id'];    
    $data = $branchClass->fetch_data($id);   
} else {
    header('Location: /branch');
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
    <title><?php echo  $data['name']."-子公司信息-关于我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


    <?php // echo $data["content"];?>  

<div class="striving">
<!--banner-->
<div class="inside_banner about_branch_banner" style="background-image:url(/images/about_branch_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <div class="inside_banner_logo wow fadeInLeft">
                <img src="<?php echo $data['thumbnail'];?>"/>
            </div>
            <h2 class="wow fadeInLeft"><?php echo $data['name'];?></h2>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
<div class="main about">
    <div class="wrap">
        <div class="about_branch_detail_desc wow fadeInUp">
            <?php echo $data['intro'];?>
            <?php if(!empty($data['homepage'])){ ?>
                <a href="<?php echo $data['homepage'];?>" class="about_branch_detail_link" target="_blank">查看公司官网</a>
            <?php } ?>
        </div>
        <div class="about_branch_detail_contact wow fadeInUp">
            <h3>联系方式</h3>
            <dl>
                <dd class="add">地址：<?php echo $data['address'];?></dd>
                <dd class="email">邮编：<?php echo $data['postcode'];?></dd>
                <dd class="tel">电话：<?php echo $data['phone'];?></dd>
                <dd class="fax">传真：<?php echo $data['fax'];?></dd>
                <!-- <dd class="site">网址：<?php echo $data['homepage'];?></dd> -->
            </dl>
        </div>
    </div>
</div>
<!--main end-->
    </div>


<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(6) a").addClass("active");
        });
    </script>
</body>
</html>