<?php

require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Str.php');

use Models\Album;
use Models\Photo;
use JasonGrimes\Paginator;

$strClass = new QNZ\Utils\Str;

$urlPattern = "index.php?page=(:num)";
 //文章表实例化
 $photo = new Photo;
 //搜索条件判断
 $query = $photo->with(['album' => function ($query) {
    $query->select('id', 'title');
}])->select('id','title', 'description','image_url', 'album_id','importance','active','created_at');

$keyword = null;

$orderby = isset($_GET['orderby'])?$_GET['orderby']:null;
$sort= isset($_GET['sort'])?$_GET['sort']:null;

if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{    
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);
    $query = $query->where('title','like','%'.$keyword.'%');         
      
    $urlPattern = $urlPattern . "&keyword=$keyword";
}
if(isset($_REQUEST["aid"]) && $_REQUEST["aid"] != ""){
    $cid = htmlspecialchars($_REQUEST["cid"],ENT_QUOTES);

    $query = $query->where('album_id',$aid);         
      
    $urlPattern = $urlPattern . "&aid=$aid";
}

if(!empty($orderby) && !empty($sort)){
    $query = $query->orderBy($orderby, $sort);
}else{
    $query = $query->orderBy('importance', 'DESC');
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$countries = $query->orderBy('importance', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


$categories = Album::orderby('importance','desc')->get();



?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "产品_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <style>
        .card.item{
            margin-bottom:2rem;
            border-radius: 0;
            
        }
        @media only screen and (min-width: 1201px) {
            .card.item{
                width:220px;                
            }            
        }
        .card.item .card-header {           
            background-color:#fff;
        }
        .card.item .card-footer {
            text-align:center;
            background-color:#fff;
        }
        .card.item .card-body{
            padding:5px; 
        }
        .card.item .card-body img{
            display:block;
            margin:0 auto;
        }
        .card.item .card-footer .btn{
            margin:0 .1rem;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>
            <div class="main-content"> 
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                                <li class="breadcrumb-item"><a href="/bbi-admin/views/albums/index.php">相册</a></li>
                                <li class="breadcrumb-item active" aria-current="page">图片列表</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div> 

                <div class="card">
                    <header class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="card-title-v1"> <i class="iconfont icon-link"></i>图片列表</div>
                            </div>
                            <div class="col-auto">
                                <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                            </div>
                        </div>
                    </header>
                    <section class="card-body">
                        <div class="card-toolbar mb-3">
                            <div class="row">
                                <div class="col">
                                    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                        <div class="form-row align-items-center">
                                            <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInput">关键字</label>
                                            <input type="text" name="keyword" class="form-control" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                                            </div>
                                            <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInput">相册</label>
                                            <select class="form-control" id="album_id" name="cid" placeholder="" >
                                                <option value="">--相册过滤--</option>
                                                <?php foreach($categories as $album){ ?>
                                                    <?php if($album->id == $_REQUEST["cid"]){ ?>
                                                        <option value="<?php echo $album->id; ?>" selected><?php echo $album->title; ?></option>
                                                    <?php }else{   ?>
                                                        <option value="<?php echo $album->id; ?>"><?php echo $album->title; ?></option>
                                                    <?php } ?>
                            
                                                <?php } ?>
                                            </select>     
                                            </div>
                                            <div class="col-auto">
                                            <button type="submit" class="btn btn-primary">搜索</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <a href="photo_edit.php" class="btn btn-primary">               
                                        <i class="iconfont icon-plus"></i>  添加
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="list">
                            <div class="row">

                            <?php foreach($countries as $row) { ?>

                            <div class="col-md-6 col-lg-4 col-xl-auto">
                                <div class="card item">
                                <div class="card-header">
                                    <input type="checkbox" value=""> <?php echo $row['title'] ;?> [<?php echo $row['album']['title'] ;?>]
                                </div>
                                <div class="card-body"><img src="/img.php?src=<?php echo $row['image_url'];?>&w=240&h=240&crop-to-fit" alt=""></div>
                                <div class="card-footer">
                                    <button class="btn btn-info btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="<?php echo $row['description'];?>"><i class="iconfont icon-ellipsis"></i></button>
                                    <a href='photo_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                                            <i class="iconfont icon-edit"></i>
                                        </a>
                                    <?php if ($row['active'] == 1) { ?>
                                    <button type="button" data-id="<?php echo $row['id']; ?>" class='btn btn-warning btn-sm btn-active' title="隐藏">
                                        <i class="iconfont icon-eye-close"></i>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" data-id="<?php echo $row['id']; ?>" class='btn btn-info btn-sm btn-active' title="显示">
                                        <i class="iconfont icon-eye"></i>
                                    </button>
                                <?php } ?>
                                        <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-danger btn-sm btn-delete'>
                                            <i class="iconfont icon-delete"></i>
                                        </button>
                                </div>
                                </div>
                            </div>

                            <?php } ?>

                            </div>
                        </div>
                       
                    </section>
                    <footer class="card-footer">
                        <div class="row">
                            <div class="col-md">
                                <nav aria-label="Page navigation">                
                                    <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>                            
                                </nav>
                            </div>
                            <div class="col-md-auto">
                                总记<strong><?php echo $totalItems; ?></strong>条记录
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/bootbox.js/bootbox.js"></script>

    <script type="text/javascript">
    

        $(document).ready(function() {
            //当前菜单        
            $(".mainmenu>li.albums").addClass("nav-open").find("ul>li.photos a").addClass("active");    

             $('[data-toggle="tooltip"]').tooltip(); 
            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-active").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'photo_post.php',
                type : 'POST',
                data : {id:articleId,action:"active"},
                success : function(res) {                                                   
                    var myobj = JSON.parse(res);                    
                    //console.log(myobj.status);
                    if (myobj.status === 1) {
                        //toastr.success(myobj.message);                                
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
                url : 'photo_post.php',
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



            $(".btn-delete").click(function(){
                var $that = $(this);
                bootbox.confirm("删除后将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var id = $that.attr("data-id");

                        $.ajax({
                            url : 'photo_post.php',
                            type : 'POST',
                            data : {id:id,action:"delete"},
                            success : function(res) {
                                var myobj = JSON.parse(res);                    
                                //console.log(myobj.status);
                                if (myobj.status === 1) {
                                    toastr.success(myobj.message); 
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

                    }


                });


            });
            
        });
    </script>

</body>

</html>