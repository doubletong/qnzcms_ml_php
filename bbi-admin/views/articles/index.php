<?php
require_once('../../includes/common.php');
require_once('../../data/article.php');
require_once('../../data/article_category.php');

require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

$did = isset($_GET['did']) ? $_GET['did'] : null;
$cid = isset($_GET['cid']) ? $_GET['cid'] : null;

$categoryClass = new TZGCMS\Admin\ArticleCategory();
$categories = $categoryClass->fetch_all($did);

$articleClass = new TZGCMS\Admin\Article();

$urlPattern = "index.php?page=(:num)";

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($did)) {
    $urlPattern = $urlPattern . "&did=$did";
}
if (!empty($cid)) {
    $urlPattern = $urlPattern . "&cid=$cid";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $articleClass->get_articles_count_v1($did,$cid, $keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);
$articles = $articleClass->get_paged_articles_v1($did, $cid, $keyword, $currentPage, $itemsPerPage);



?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "文章_后台管理_".$site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
</head>
<body>
<div class="wrapper">
   <!-- nav start -->
   <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>

        <div class="container-fluid maincontent">
            <div class="row mb-2">
                <div class="col">
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">搜索</label>
                            <input type="text" name="keyword" class="form-control" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                            </div>
                            <?php if($did==="1"){ ?>
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">分类</label>
                                     <select class="form-control" id="cid" name="cid">
                                        <option value="">--请选择分类--</option>
                                        <?php foreach ($categories as $category) {
                                            ?>                                                       
                                                <option value="<?php echo $category["id"]; ?>" <?php echo  $category["id"] == $cid  ? "selected" : ""; ?>><?php echo $category["title"]; ?></option>

                                        <?php } ?>     
                                    </select>
                                </div>
                            <?php } ?>
                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary ">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-auto">
                        <a href="news_edit.php?did=<?php echo $did;?>" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i>  添加文章
                        </a>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>缩略图</th>
                    <th>标题</th>
                    <?php if($did==="1"){ ?>
                    <th>分类</th>
                    <?php } ?>
                    <th>阅读次数</th>
                    <th>状态</th>
                    <th>发布日期</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($articles as $row)
                {
                    echo "<tr>";
                ?>
                    <td><img src="<?php echo $row['thumbnail'];?>" class="img-rounded" style="height:35px;"/></td>
                    <td><?php echo $row['title']; ?>  
                    <?php if($row['recommend']){
                        ?>
                       <span class="badge badge-primary">
                        <i class='iconfont  icon-like-fill'></i></span>   
                      
                        <?php } ?></td>
                   
                    <?php
                 
                   if($did==="1"){
                    echo "<td>".$row['category_title']."</td>";
                   }
                    echo "<td>".$row['view_count']."</td>";
                    ?>
                    <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>
                    <td><?php echo date('Y-m-d',$row['pubdate']) ;?></td>
                    <td>

                              
                       

                        <a href='news_edit.php?id=<?php echo $row['id'];?>&did=<?php echo $row['dictionary_id'];?>' class='btn btn-primary btn-sm' title="编辑">
                            <i class="iconfont icon-edit"></i>
                        </a>

                             
                 
                        <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-copy' title="拷贝">
                            <i class="iconfont icon-file-copy"></i>
                        </button>

                        <?php if($row['active']==1){?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-warning btn-sm btn-active' title="隐藏">
                                <i class="iconfont icon-eye-close"></i>
                            </button>
                        <?php }else{ ?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-active' title="显示">
                                <i class="iconfont icon-eye"></i>
                            </button>
                        <?php } ?>   

                        <?php if($row['recommend']==1){?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-grey btn-sm btn-recommend' title="撤消精选">
                                <i class="iconfont icon-sketch"></i>
                            </button>
                        <?php }else{ ?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-recommend' title="精选">
                                <i class="iconfont icon-sketch"></i>
                            </button>
                        <?php } ?>   
                        
                        <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-danger btn-sm btn-delete' title="删除">
                            <i class="iconfont icon-delete"></i>
                        </button>
                    </td>
                    <?php

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>


            <nav aria-label="Page navigation">                
                    <?php include("../../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>                            
                </nav>

        </div>
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>


<script>
    $(document).ready(function () {
        //当前菜单
     
        if("1"==<?php echo $did; ?>){
            $(".mainmenu>li.articles").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("2"==<?php echo $did; ?>){
            $(".mainmenu>li.salary").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("3"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(6)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("6"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(7)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("16"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(8)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后新闻将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var articleId = $that.attr("data-id");

                    $.ajax({
                        url : 'news_actions.php',
                        type : 'POST',
                        data : {id:articleId,action:"delete"},
                        success : function(res) {

                       
                            var myobj = JSON.parse(res);                    
                          
                            if (myobj.status === 1) {
                                toastr.success(myobj.message);  
                                $that.closest("tr").remove();                                   
                            } 
                            if (myobj.status === 2) {
                                toastr.error(myobj.message)
                            }
                            if (myobj.status === 3) {
                                toastr.info(myobj.message)
                            }
                        }
                    });
                }

            });

        });

        $(".btn-active").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'news_actions.php',
                type : 'POST',
                data : {id:articleId,action:"active"},
                success : function(res) {                                                   
                    var myobj = JSON.parse(res);                    
                    //console.log(myobj.status);
                    if (myobj.status === 1) {
                        // toastr.success(myobj.message);                                
                        location.reload();                                  
                    } 
                    if (myobj.status === 2) {
                        toastr.error(myobj.message)
                    }
                    if (myobj.status === 3) {
                        toastr.info(myobj.message)
                    }
                }
            });          

        });

        $(".btn-recommend").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'news_actions.php',
                type : 'POST',
                data : {id:articleId,action:"recommend"},
                success : function(res) {                                                   
                    var myobj = JSON.parse(res);                    
                  
                    if (myobj.status === 1) {                                            
                        location.reload();                                  
                    } 
                    if (myobj.status === 2) {
                        toastr.error(myobj.message)
                    }
                    if (myobj.status === 3) {
                        toastr.info(myobj.message)
                    }
                }
            });          

        });

        $(".btn-copy").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'news_actions.php',
                type : 'POST',
                data : {id:articleId,action:"copy"},
                success : function(res) {                                                   
                    var myobj = JSON.parse(res);                    
                  
                    if (myobj.status === 1) {                                            
                        location.reload();                                  
                    } 
                    if (myobj.status === 2) {
                        toastr.error(myobj.message)
                    }
                    if (myobj.status === 3) {
                        toastr.info(myobj.message)
                    }
                }
            });          

        });

    });
</script>
</body>
</html>