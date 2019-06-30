<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once('includes/PDO_Pagination.php');


$did= 16;
$pagination = new PDO_Pagination(db::getInstance());

$mediaCategories = array();
$pagination->config(6, 9);
//$pagination->param = "&year=$paran_year";
$pagination->rowCount("SELECT * FROM article_categories WHERE dictionary_id = $did ");

$sql = "SELECT id,title,thumbnail,thumbnail2,added_date FROM  article_categories WHERE dictionary_id = $did ORDER BY added_date DESC  LIMIT $pagination->start_row, $pagination->max_rows";
$query = db::getInstance()->prepare($sql);
$query->execute();
while ($rows = $query->fetch()) {
    $mediaCategories[] = $rows;
}


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "媒体报道-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php //echo $data["content"];?>   
    
    <div class="striving">
<!--banner-->
<div class="inside_banner news_media_banner" style="background-image:url(images/news_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">媒体报道</h1>
                <p class="wow fadeInLeft">关注相同 观点不同</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="wrap">
            <div class="news_media">
                <div class="news_media_box clear">
                    <div class="news_media_item news_media_item_big">
                    <?php if(!empty($mediaCategories[0])){?>
                        <a href="/media-list-<?php echo $mediaCategories[0]['id'];?>" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="<?php echo $mediaCategories[0]['thumbnail'];?>" alt="<?php echo $mediaCategories[0]['title'];?>"/>
                            </div>
                            <div class="img img_mb">
                                <img src="<?php echo $mediaCategories[0]['thumbnail2'];?>" alt="<?php echo $mediaCategories[0]['title'];?>"/>
                            </div>
                            <div class="txt">
                                <span><?php echo date('Y-m-d', $mediaCategories[0]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[0]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                    </div>
                    <div class="news_media_item news_media_item_small">
                    <?php if(!empty($mediaCategories[1])){?>
                        <a href="/media-list-<?php echo $mediaCategories[1]['id'];?>" class="wow fadeInUp">
                            <div class="img img_pc">
                            <img src="<?php echo $mediaCategories[1]['thumbnail2'];?>" alt="<?php echo $mediaCategories[1]['title'];?>"/>
                            </div>
                          
                            <div class="txt">
                            <span><?php echo date('Y-m-d', $mediaCategories[1]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[1]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                        <?php if(!empty($mediaCategories[2])){?>
                        <a href="/media-list-<?php echo $mediaCategories[2]['id'];?>" class="wow fadeInUp">
                        <div class="img img_pc">
                            <img src="<?php echo $mediaCategories[2]['thumbnail2'];?>" alt="<?php echo $mediaCategories[2]['title'];?>"/>
                            </div>
                           
                            <div class="txt">
                            <span><?php echo date('Y-m-d', $mediaCategories[2]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[2]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                    </div>
                </div>
                <div class="news_media_box clear">
                    <div class="news_media_item news_media_item_big">
                    <?php if(!empty($mediaCategories[3])){?>
                    <a href="/media-list-<?php echo $mediaCategories[3]['id'];?>" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="<?php echo $mediaCategories[3]['thumbnail'];?>" alt="<?php echo $mediaCategories[3]['title'];?>"/>
                            </div>
                            <div class="img img_mb">
                                <img src="<?php echo $mediaCategories[3]['thumbnail2'];?>" alt="<?php echo $mediaCategories[3]['title'];?>"/>
                            </div>
                            <div class="txt">
                                <span><?php echo date('Y-m-d', $mediaCategories[3]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[3]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                    </div>
                    <div class="news_media_item news_media_item_small">
                    <?php if(!empty($mediaCategories[4])){?>
                    <a href="/media-list-<?php echo $mediaCategories[4]['id'];?>" class="wow fadeInUp">
                            <div class="img img_pc">
                            <img src="<?php echo $mediaCategories[4]['thumbnail2'];?>" alt="<?php echo $mediaCategories[4]['title'];?>"/>
                            </div>
                        
                            <div class="txt">
                            <span><?php echo date('Y-m-d', $mediaCategories[4]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[4]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                        <?php if(!empty($mediaCategories[5])){?>
                        <a href="/media-list-<?php echo $mediaCategories[5]['id'];?>" class="wow fadeInUp">
                            <div class="img img_pc">
                            <img src="<?php echo $mediaCategories[5]['thumbnail2'];?>" alt="<?php echo $mediaCategories[5]['title'];?>"/>
                            </div>
                          
                            <div class="txt">
                            <span><?php echo date('Y-m-d', $mediaCategories[5]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[5]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                    </div>
                </div>
                <div class="news_media_box clear">
                    <div class="news_media_item news_media_item_big">
                    <?php if(!empty($mediaCategories[6])){?>
                        <a href="/media-list-<?php echo $mediaCategories[6]['id'];?>" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="<?php echo $mediaCategories[6]['thumbnail'];?>" alt="<?php echo $mediaCategories[6]['title'];?>"/>
                            </div>
                            <div class="img img_mb">
                                <img src="<?php echo $mediaCategories[6]['thumbnail2'];?>" alt="<?php echo $mediaCategories[6]['title'];?>"/>
                            </div>
                            <div class="txt">
                                <span><?php echo date('Y-m-d', $mediaCategories[6]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[6]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                    </div>
                    <div class="news_media_item news_media_item_small">
                    <?php if(!empty($mediaCategories[7])){?>
                        <a href="/media-list-<?php echo $mediaCategories[7]['id'];?>" class="wow fadeInUp">
                            <div class="img img_pc">
                            <img src="<?php echo $mediaCategories[7]['thumbnail2'];?>" alt="<?php echo $mediaCategories[7]['title'];?>"/>
                            </div>
                         
                            <div class="txt">
                            <span><?php echo date('Y-m-d', $mediaCategories[7]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[7]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                        <?php if(!empty($mediaCategories[8])){?>
                        <a href="/media-list-<?php echo $mediaCategories[8]['id'];?>" class="wow fadeInUp">
                            <div class="img img_pc">
                            <img src="<?php echo $mediaCategories[8]['thumbnail2'];?>" alt="<?php echo $mediaCategories[8]['title'];?>"/>
                            </div>
                        
                            <div class="txt">
                            <span><?php echo date('Y-m-d', $mediaCategories[8]['added_date']); ?></span>
                                <p><?php echo $mediaCategories[8]['title'];?></p>
                            </div>
                        </a>
                        <?php }?>
                    </div>
                </div>
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

           $('.news_media_box:odd').addClass('odd');
        });
    </script>
</body>
</html>