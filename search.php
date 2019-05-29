<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();

if(!empty($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $articles = $articleClass->search_paged($keyword,1,10);
    $articleCount = $articleClass->search_count($keyword);
}
?>

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "搜索-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page page-search">
    <div class="search_bg">
        <div class="container">
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
    <div class="s1">
        <section class="list list-search" id="searchlist">
                      <a href="#" class="item">
                          <div class="container">
                            <div class="des">
                                <time>2018-11-29</time>
                                <h3 class="title">
                            传媒中心 > 新闻动态 > 2018年第三期微创<sup>®</sup>髋膝关节置换技术国际交流班走进比利时、荷兰
                            </h3>
                            </div>
                          </div>
                    </a>  
                    <a href="#" class="item">
                          <div class="container">
                            <div class="des">
                                <time>2018-11-29</time>
                                <h3 class="title">
                            传媒中心 > 新闻动态 > 2018年第三期微创<sup>®</sup>髋膝关节置换技术国际交流班走进比利时、荷兰
                            </h3>
                            </div>
                          </div>
                    </a>  
                    <a href="#" class="item">
                          <div class="container">
                            <div class="des">
                                <time>2018-11-29</time>
                                <h3 class="title">
                            传媒中心 > 新闻动态 > 2018年第三期微创<sup>®</sup>髋膝关节置换技术国际交流班走进比利时、荷兰
                            </h3>
                            </div>
                          </div>
                    </a>  
                <?php  foreach($articles as $article){ ?>
                <div class="box">
                   
                            <div class="des">
                                <h3 class="title">
                                    <a href="/news/detail-<?php echo $article['id'];?>">
                                    <?php echo $article['title'];?>
                                    </a>
                                </h3>
                            
                                <p><?php echo $article['summary'];?></p>
                            </div>
                       
                </div>

                <?php } ?>               
               
            </section>
            <?php if($articleCount>10){?>
            <footer class="text-center">
                <a href="javascript:void(0);" data-page="1" data-keyword="<?php echo $_GET['keyword']; ?>" class="more"  id="moreLoad" >查看更多</a>
            </footer>
            <?php } ?>
        </div>

    </div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

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