<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");

$articleClass = new TZGCMS\Article();
$did= 1;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
    $prev = $articleClass->fetch_prev_data($id,$did);
    $next = $articleClass->fetch_next_data($id,$did);
}else{
    header('Location: /news');
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
    <title><?php echo $data['title']."-".$site_info['sitename']; ?></title>    
    <?php require_once('../../includes/meta.php') ?>
  
</head>
<body class="bg_white">
<?php require_once('../../includes/leftcol.php') ?>

<?php if(!empty($data['image_url'])){ ?>
    <div class="fullimage">
        <img src="<?php echo $data['image_url'];?>" alt="<?php echo $data['title'];?>">
    </div>
<?php } ?>

    <div class="container">
        <div class="sitepath">
            <div class="row">
<div class="col"><a href="/news">动态资讯</a> &gt; <a href="/news?cid=<?php echo $data['categoryId'];?>"><?php echo $data['category_title'];?></a> &gt; <?php echo $data['title'];?></div>
            <div class="col-auto">
                <a href="javascript:history.go(-1);">返回&gt;</a>
            </div>
</div>
            
        </div>
    </div>
    <div class="page page-news-detail">
   
        <div class="container">
            <!--news_detail-->
            
               
            <div class="article">
                <header class="title-article wow fadeInUp">
                    <h2>
                        <?php echo $data['title'];?>
                    </h2>
                </header>
                <!-- <div class="note wow fadeInUp">
                    <div class="row ">
                            <div class="col-auto"><?php echo date('Y-m-d',$data['pubdate']) ;?></div>  
                            <div class="col-auto"><strong><?php echo $data['category_title'];?></strong></div> 
                            <div class="col-auto"><strong><?php echo $data['view_count'];?></strong>次浏览</div>
                            <div class="col-md share">
                                分享到
                            </div>
                    </div>
                </div> -->
                <main class="content wow fadeInUp">
                    <?php echo $data['content'];?>
                </main>
            
            </div>
                  
             
               <!--#####-->
               <!-- <div class="wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <?php if(!empty($prev)){?>
                                <div class="box-arrow">
                                    <h3>上一篇</h3>
                                    <a href="/news/detail/<?php echo $prev["id"];?>"><?php echo $prev["title"];?> </a>
                                    <p><a href="/news/detail/<?php echo $prev["id"];?>" class="more">详情查看 <i class="iconfont icon-arrow-right"></i></a></p>
                                </div>                        
                            <?php } ?>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <?php if(!empty($next)){?>   
                                <div class="box-arrow">
                                    <h3>下一篇</h3>
                                    <a href="/news/detail/<?php echo $next["id"];?>"><?php echo $next["title"];?> </a>
                                    <p><a href="/news/detail/<?php echo $next["id"];?>" class="more">详情查看 <i class="iconfont icon-arrow-right"></i></a></p>
                                </div>    
                            <?php } ?>         
                        </div>
                    </div>
               </div> -->
          
            <!--news_detail end-->
        </div>
    </div>
<!--main end-->



<?php require_once('../../includes/footer.php') ?>
<?php require_once('../../includes/scripts.php') ?>

<script>
        $(document).ready(function() {    
           $(".mainav li:nth-of-type(4)").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>