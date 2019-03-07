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


<div class="page-search">
    <div class="container s1">
  
        <div class="sitepath"><a href="/">首页</a>/搜索结果</div>

            <section class="newlist" id="newlist">
                <?php  foreach($articles as $article){ ?>

                <div class="box">
                   
                            <div class="des">
                                <h3 class="title">
                                    <a href="<?php echo SITEPATH; ?>/news/detail-<?php echo $article['id'];?>">
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