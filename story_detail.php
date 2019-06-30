<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();

if(isset($_GET['id'])){
    $id = $_GET['id'];  
    $data = $articleClass->fetch_data($id);
  
}else{
    header('Location: /creative');
    exit;
}

// $rows = array(
//     array(
//         'id' => 33,
//         'parent_id' => 0,
//     ),
//     array(
//         'id' => 34,
//         'parent_id' => 0,
//     ),
//     array(
//         'id' => 27,
//         'parent_id' => 33,
//     ),
//     array(
//         'id' => 17,
//         'parent_id' => 27,
//     ),
// );

// function buildTree(array $elements, $parentId = 0) {
//     $branch = array();

//     foreach ($elements as $element) {
//         if ($element['parent_id'] == $parentId) {
//             $children = buildTree($elements, $element['id']);
//             if ($children) {
//                 $element['children'] = $children;
//             }
//             $branch[] = $element;
//         }
//     }

//     return $branch;
// }

// $tree = buildTree($rows);

// print_r( $tree );


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "患者故事-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-story-detail" style="background-image:url(../img/temp/b1.jpg)">
    <div class="page-title1">
        <div class="container">          
            <p><?php echo $data['author']; ?>  <span>|</span>  <?php echo $data['source']; ?></p>
            <h1><?php echo $data['title']; ?></h1>
        </div>
        </div>
    </div>
    <div class="page page-story-detail">
        <div class="container">
        <?php echo $data['content']; ?>
        </div>



    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");
            $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>

</html>