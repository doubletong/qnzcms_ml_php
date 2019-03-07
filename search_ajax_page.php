<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");
$articleClass = new Article();

if(isset($_GET['page']) && isset($_GET['keyword']) ){
    $pageId = $_GET['page'];
    $keyword = $_GET['keyword'];
    $articles = $articleClass->search_paged($keyword,$pageId,10);
}
?>

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