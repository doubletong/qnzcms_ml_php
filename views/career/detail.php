<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");

$articleClass = new TZGCMS\Article();
$did= 2;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
   // $prev = $articleClass->fetch_prev_data($id,$did);
   // $next = $articleClass->fetch_next_data($id,$did);
}else{
    header('Location: /career/salary_and_welfare');
    exit;
}


?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data['title']."-薪资福利-职业发展" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header_career.php') ?>

  
    <div class="page page-career">
        <?php require_once('includes/subnav.php') ?>
        <div class="container">
            <header class="title title-section">
                <h2 class="wow slideInLeft"><?php echo $data['title'];?></h2>
            </header>
            <?php  echo $data["content"]; ?>
          
        </div>
    </div>


    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
        
            // $(".mainav li:nth-of-type(5)").addClass("active");
            $(".subnav nav div:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>

</html>