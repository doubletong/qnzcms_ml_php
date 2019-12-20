<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");

$articleClass = new TZGCMS\Article();

if(!empty($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $articles = $articleClass->search_paged($keyword,1,10);
    $articleCount = $articleClass->search_count($keyword);
}else{
    header('Location: /news');
    exit;
}

?>

<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
<title><?php echo "搜索-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
  
</head>
<body>
<?php require_once('../../includes/header.php') ?>

<div class="banner banner-search">
    <div class="search-container">
        <div id="searchbox2" class="searchbox">
            <form action="/search" method="get">
                <div class="row">
                    <div class="col">
                    <?php if(isset($_GET['keyword'])) {?>                                   
                        <input type="search" name="keyword" id="keyword" value="<?php echo $_GET['keyword']; ?>" placeholder="请输入您想搜索的内容" />
                    <?php }else{?>
                        <input type="search" name="keyword" id="keyword" placeholder="请输入您想搜索的内容" />
                    <?php }?>
                    
                    </div>
                    <div class="col-auto">
                        <button type="submit"><i class="iconfont icon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        </div>
</div>
<div class="page page-search">

    <div class="container s1">
        <p class="note">共搜索到 <?php echo $articleCount ?> 条结果</p>
    <div class="list list-articles">
    <?php foreach ($articles as $article) { ?>
        <div class="item wow fadeInUp">
            <div class="row">
                <div class="col-md-auto">
                    <a href="/news/detail/<?php echo $article['id']; ?>" class="pic">
                        <img src="<?php echo $article['thumbnail']; ?>" alt="<?php echo $article['title']; ?>">
                    </a>
                </div>
                <div class="col-md">
                    <div class="txt">
                        <h3 class="title">
                            <a href="/news/detail/<?php echo $article['id']; ?>">
                                <?php echo  str_replace($_GET['keyword'], '<strong>'.$_GET['keyword'].'</strong>',  $article['title']); ?>
                            </a>
                        </h3>
                        <time><?php echo date('Y-m-d',$article['pubdate']) ;?></time>                      
                          <p><?php echo $article['summary']; ?></p>
                        
                                <span class="more">查看详情 ></span>
                        
                      

                    </div>

                </div>

            </div>

        </div>
<?php } ?>
</div>
            <?php if($articleCount>10){?>
            <footer class="text-center">
                <a href="javascript:void(0);" data-page="1" data-keyword="<?php echo $_GET['keyword']; ?>" class="more"  id="moreLoad" >查看更多</a>
            </footer>
            <?php } ?>
        </div>

    </div>

<?php require_once('../../includes/footer.php') ?>
<?php require_once('../../includes/scripts.php') ?>

<script>
        $(document).ready(function() {
           // $(".leftnav li:nth-of-type(5) a").addClass("active");
           //$(".mainav li:nth-of-type(5) a").addClass("active");
           //$(".subnav li:nth-of-type(1) a").addClass("active");

           $("#moreLoad").click(function(e){
               var pageIndex = $(this).attr("data-page");
               var keyword = $(this).attr("data-keyword");
               pageIndex = parseInt(pageIndex) + 1;
               $(this).attr("data-page",pageIndex);

               $.ajax({
                   type: "get",
                   url: "search_ajax_page.php?page=" + pageIndex + "&keyword=" + keyword,                 
                   success: function (response) {
                      
                       $("#newlist").append(response);
                      if(response.length==1){
                        $("#moreLoad").fadeOut();
                      }
                   }
               });
           })
        });
    </script>
</body>
</html>