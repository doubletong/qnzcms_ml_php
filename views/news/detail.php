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
    <title><?php echo $data['title'] . "-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>


    <div class="page page-news-detail container">
    <header class="title title-article wow fadeInUp">
    <h1><?php echo $data['title']; ?></h1>

        <div class="row note">
            <div class="col"><?php echo date('Y-m-d', $data['pubdate']); ?></div>
            <div class="col-auto">
                <a href="javascript:history.go(-1);">返回上一页&gt;</a>
            </div>
        </div>
        </header>

      

            <div class="article">
             
                  
           
                <!-- <div class="note wow fadeInUp">
                    <div class="row ">
                            <div class="col-auto"><?php echo date('Y-m-d', $data['pubdate']); ?></div>  
                            <div class="col-auto"><strong><?php echo $data['category_title']; ?></strong></div> 
                            <div class="col-auto"><strong><?php echo $data['view_count']; ?></strong>次浏览</div>
                            <div class="col-md share">
                                分享到
                            </div>
                    </div>
                </div> -->
                <main class="content wow fadeInUp">
                    <?php echo $data['content']; ?>
                </main>

            </div>


            <!--#####-->
            <div class="box-arrow wow fadeInUp">
                  
                            <?php if (!empty($prev)) { ?>
                                <div class="prev">
                                    上一篇
                                    <a href="/news/detail/<?php echo $prev["id"]; ?>"><?php echo $prev["title"]; ?> </a>                      
                                </div>                        
                            <?php } ?>
                   
                            <?php if (!empty($next)) { ?>   
                                <div class="next">
                                  下一篇
                                    <a href="/news/detail/<?php echo $next["id"]; ?>"><?php echo $next["title"]; ?> </a>
                                  
                                </div>    
                            <?php } ?>         
                       
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