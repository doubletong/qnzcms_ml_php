<?php
require_once("../../includes/common.php");
require_once("../../data/case.php");

$caseClass = new TZGCMS\CaseShow();
$categories = $caseClass->get_all_categories();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $caseClass->get_case_by($id);
    $prev = $caseClass->fetch_prev_data($id);
    $next = $caseClass->fetch_next_data($id);
}else{
    header('Location: /cases');
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
    <title><?php echo $data['title']."-".$site_info['sitename']; ?></title>    
    <?php require_once('../../includes/meta.php') ?>
  
</head>
<body>
<?php require_once('../../includes/header.php') ?>


<div class="page page-case-detail">

    <div class="container">
        <div class="row t1 wow fadeInUp">
            <div class="col-md">
                <div class="title title-section">
                    <h3>成功案例   <span>Success Case</span></h3>
                    <p>专业的设备租赁服务平台，提供各类灯光音响租赁服务……</p>
                </div>
                
            </div>
            <div class="col-md-auto align-self-end">
                您的当前位置：<a href="/">主页</a> &gt; <a href="/cases">成功案例</a> &gt; <a href="/cases?cid=<?php echo $data['categoryid'];?>"><?php echo $data['category_title'];?></a>  &gt; <span class="current">正文</span>
            </div>
        </div>

            <!--news_detail-->
            
            <main class="maincontent">
                <div class="row">
                    <div class="col-md-auto">
                        <?php require_once('includes/categories.php') ?>
                        <a href="/contact" >
                        <img src="/assets/img/getcase.jpg" class="sidead" alt="免费获取方案"></a>
                    </div>
                    <div class="col-md">
                        <div class="case">
                            <header class="title-case wow fadeInUp">
                                <div class="row align-items-center">
                                    <div class="col-md">
                                    <h1 class="title">
                                        <?php echo $data['title'];?>
                                    </h1>
                                    </div>
                                    <div class="col-md-auto">
                                        <span class="more">
                                            <?php echo $data['category_title'];?>
                                        </span>
                                    </div>
                                </div>                              
                            </header>
                            <div class="note wow fadeInUp">
                                <div class="row align-items-center">
                                        <div class="col-md">
                                            <dl>
                                                <dd>发布时间：<?php echo date('Y-m-d',$data['pubdate']) ;?></dd>
                                                <dd>浏览：<strong><?php echo $data['view_count'];?></strong>次</dd>
                                            </dl>
                                            
                                        </div>                                  
                                  
                                        <div class="col-md-auto share">
                                            分享到
                                        </div>
                                </div>
                            </div>
                            <hr>
                            <article class="wow fadeInUp">
                                <?php echo $data['body'];?>

                                <div class="back">
                                    <a href="javascript :history.back(-1);">返回上一页</a>
                                </div>
                            </article>
                        <hr>

                <div class="wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6">
                        <?php if(!empty($prev)){?>
                                <div class="box-arrow">
                                    上一篇：
                                    <a href="/news/detail/<?php echo $prev["id"];?>"><?php echo $prev["title"];?> </a>                            
                                </div>                        
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <?php if(!empty($next)){?>   
                                <div class="box-arrow text-right">
                                   下一篇：
                                    <a href="/news/detail/<?php echo $next["id"];?>"><?php echo $next["title"];?> </a>
                                  
                                </div>    
                            <?php } ?>         
                        </div>
                    </div>
               </div> 
                        </div>
                    </div>
                </div>
            </main>             
              
          
            <!--news_detail end-->
        </div>

        
</div>


<?php require_once('../../includes/footer.php') ?>
<?php require_once('../../includes/scripts.php') ?>

<script>
        $(document).ready(function() {    
           $(".mainav li:nth-of-type(4)").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>