<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once('includes/PDO_Pagination.php');

$pagination = new PDO_Pagination(db::getInstance());
$model = array();
$pagination->config(6, 12);

$pagination->rowCount("SELECT * FROM wp_articles");

$sql = "SELECT id,title,thumbnail,summary,pubdate FROM wp_articles ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
$query = db::getInstance()->prepare($sql);
$query->execute();
while ($rows = $query->fetch()) {
    $model[] = $rows;
}

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "新闻资讯-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="banner banner-news">
</div>
<div class="page-news container">
    <div class="page-title  wow slideInUp">
        <h1>设计资讯</h1>
        <h3>news</h3>
    </div>
        <div class="newlist"> 
            <?php foreach($model as $article){ ?>
            <div class="box  wow slideInUp">
                <div class="row">
                  
                        <div class="col-md-4 col-lg-6">
                        <div class="pic">
                          <a  href="/news/detail-<?php echo $article['id'];?>" title="<?php echo $article['title'];?>  ">
                            <img src="<?php echo $article['thumbnail'];?>" alt="<?php echo $article['title'];?>  ">
          
            </a>
            </div>
                        </div>
                        <div class="col-md-8 col-lg-6 d2 align-self-center">
                            <div class="des">
                                <h3 class="title">
                                <a  href="/news/detail-<?php echo $article['id'];?>" title="<?php echo $article['title'];?>  ">
                                    <?php echo $article['title'];?>  
                                    </a>                                
                                </h3>
                                <div class="pubdate">
                                <i class="iconfont icon-time"></i> <?php echo date('Y-m-d',$article['pubdate']) ;?>                    
                                </div>                 
                                <p><?php echo mb_substr($article['summary'],0,56,'utf-8')."……";?></p>
                            </div>
                        </div>
                      
            
            </div>
            </div> 
<?php } ?>

                
               
     
<ul class="pagination  wow slideInUp">
                <?php
                $pagination->pages("btn");
                ?>
            </ul>
        </div>

    </div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
      

        //    $("#moreLoad").click(function(e){
        //        var pageIndex = $(this).attr("data-page");
        //        pageIndex = parseInt(pageIndex) + 1;
        //        $(this).attr("data-page",pageIndex);

        //        $.ajax({
        //            type: "get",
        //            url: "news_ajax_page.php?page=" + pageIndex,                 
        //            success: function (response) {
                      
        //                $("#newlist").append(response);
        //               if(response.length==1){
        //                 $("#moreLoad").fadeOut();
        //               }
        //            }
        //        });
        //    })
        });
    </script>
</body>
</html>