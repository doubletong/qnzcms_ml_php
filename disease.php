<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$did = 6;

$articleClass = new Article();
$categories = $articleClass->get_categories($did);

function buildTree(array $elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }
    return $branch;
}

$tree = buildTree($categories);

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "疾病管理-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-disease">
        <div class="container page-title">
            <h1>疾病管理</h1>
            <p>了解疾病知识 更好地管理自己</p>
        </div>
    </div>
    <div class="page page-disease">
        <div class="container">
            <section class="list list-disease">
                <div class="row">
                <?php   foreach ($tree as $row) {     ?>

                    <div class="col-md-6">
                        <div class="item">
                            <img src="<?php echo $row['thumbnail']; ?>" alt="<?php echo $row['title']; ?>">
                            <div class="bg">                                
                            </div>
                            <a href="/disease/list-<?php echo $row['id']; ?>" class="txt">
                                    <div class="des">
                                        <h3 class="title">了解<?php echo $row['title']; ?></h3>
                                       
                                        <?php if(!empty($row['children'])){   ?>
                                             <ul>
                                             <?php     foreach( $row['children'] as $subModel){
                                            ?>
                                              <li>—  <?php echo $subModel['title']; ?>
                                              
                                            <?php }  ?> 
                                            </ul>
                                            <?php  }?> 


                                    </div>
                                </a>
                        </div>
                    </div>

                  <?php  } ?>


                </div>
            </section>
        </div>

    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");
            $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>

</html>