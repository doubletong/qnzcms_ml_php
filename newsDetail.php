<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
}else{
    header('Location: news.html');
    exit;
}

do_html_doctype($data['title']."-".SITENAME)
?>
    <meta name=keywords content="<?php echo $data['keywords'];?>">
    <meta name=description content="<?php echo $data['description'];?>">
<?php
do_html_header();
?>
<div class="container">
    <div class="breadcrumb">
        <a href="/">首页</a> &gt; <a href="<?php echo SITEPATH; ?>/news/">新闻中心</a> &gt; <h1><?php echo $data['title'];?></h1>
    </div>
</div>
    <div class="container news-page">
        <div class="row">
            <figure>
                <img src="<?php echo $data['image_url'];?>" class="showpic" alt="<?php echo $data['title'];?>" />
            </figure>
            <div class="col-md-8 col-md-offset-2">
                <header class="title">
                    <h2><?php echo $data['title'];?></h2>
                </header>
                <div class="note">
                    日期:<time datetime="<?php echo date('Y-m-d H:i:s',$data['added_date']) ;?>"><?php echo date('Y-m-d',$data['added_date']) ;?></time>，阅读 <?php echo $data['view_count'];?> 次
                </div>
                <article class="body">
                    <?php echo $data['content'];?>
                </article>
                <div class="arrowLeft">
                    <a href="<?php echo SITEPATH; ?>/news/">
                        <img src="/assets/img/arrow-left.jpg" alt="查看详情" />
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
do_html_footer();
do_html_analytics();