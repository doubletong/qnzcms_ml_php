<?php

require_once('../../includes/common.php');


use Models\TeamCategory;
use Models\Team;
use JasonGrimes\Paginator;
use Models\Language;


$urlPattern = "index.php?page=(:num)";
 //文章表实例化
 $team = new Team;
 //搜索条件判断
 $query = $team->with(['category' => function ($query) {
    $query->select('id', 'title');
}])->select('id','name', 'post', 'photo', 'lang', 'category_id','importance','active','created_at');

$keyword = null;
$orderby = isset($_GET['orderby'])?$_GET['orderby']:null;
$sort= isset($_GET['sort'])?$_GET['sort']:null;

if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{    
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);
    $query = $query->where('name','like','%'.$keyword.'%')
        ->orWhere('post','like','%'.$keyword.'%');     
      
    $urlPattern = $urlPattern . "&keyword=$keyword";
}
if(isset($_REQUEST["cid"]) && $_REQUEST["cid"] != ""){
    $cid = htmlspecialchars($_REQUEST["cid"],ENT_QUOTES);

    $query = $query->where('category_id',$cid);         
      
    $urlPattern = $urlPattern . "&cid=$cid";
}

if(!empty($orderby) && !empty($sort)){
    $query = $query->orderBy($orderby, $sort);
}else{
    $query = $query->orderBy('id', 'DESC');
}

if(isset($_REQUEST["lang"]) && $_REQUEST["lang"] != "")
{    
    $lang = htmlspecialchars($_REQUEST["lang"],ENT_QUOTES);
    $query = $query->where('lang', $lang);         
      
    $urlPattern = $urlPattern . "&lang=$lang";
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$countries = $query->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


$categories = TeamCategory::orderby('importance','desc')->get();

$langs = Language::where('active',1)->orderby('importance','DESC')->get();

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "成员_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
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
                                <li class="breadcrumb-item"><a href="#">团队</a></li>
                                <li class="breadcrumb-item active" aria-current="page">列表</li>
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
                                <div class="card-title-v1"> <i class="iconfont icon-link"></i>成员分类</div>
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
                                            <label class="sr-only" for="inlineFormInput">分类</label>
                                            <select class="form-control" id="category_id" name="cid" placeholder="" >
                                                <option value="">--分类过滤--</option>
                                                <?php foreach($categories as $category){ ?>
                                                    <?php $titles = json_decode($category->title,true); ?>
                                                    <?php if($category->id == $_REQUEST["cid"]){ ?>
                                                        <option value="<?php echo $category->id; ?>" selected><?php echo $titles['zh-CN']; ?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $category->id; ?>"><?php echo $titles['zh-CN']; ?></option>
                                                    <?php } ?>
                            
                                                <?php } ?>
                                            </select>     
                                            </div>
                                            <div class="col-auto">
                                                <label class="sr-only" for="lang">语言</label>
                                                <select class="form-control" id="lang" name="lang">
                                                    <option value="">--请选择语言--</option>
                                                    <?php foreach($langs as $item ) {
                                                    
                                                        ?>                                  
                                                        <option value="<?php echo $item->code;?>" <?php echo (isset($lang) && $lang==$item->code)?"selected":""; ?>><?php echo $item->name; ?></option>

                                                    <?php }  ?>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                            <button type="submit" class="btn btn-primary">搜索</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <a href="team_edit.php" class="btn btn-primary">               
                                        <i class="iconfont icon-plus"></i>  添加
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">                 
                            <table class="table table-hover table-bordered table-striped box-table">
                                <thead>
                                <tr>          
                                    <th>缩略图</th>
                                    <th>
                                        <?php if($orderby=='title'){ ?>
                                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=name&sort=<?php echo $sort=='asc'?'desc':'asc';?>">姓名<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                        <?php }else{ ?>
                                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=name&sort=asc">姓名<i class="iconfont icon-orderby"></i></a>
                                        <?php } ?>   
                                    </th>
                                    <th>分类</th>                              
                                    <th>职位</th>
                                    <th>
                                    <?php if($orderby=='importance'){ ?>
                                        <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=importance&sort=<?php echo $sort=='asc'?'desc':'asc';?>">排序<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                    <?php }else{ ?>
                                        <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=importance&sort=asc">排序<i class="iconfont icon-orderby"></i></a>
                                    <?php } ?>
                                    </th>
                                    <th>语言</th>
                                    <th>
                                        <?php if($orderby=='created_at'){ ?>
                                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=<?php echo $sort=='asc'?'desc':'asc';?>">创建日期<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                        <?php }else{ ?>
                                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=asc">创建日期<i class="iconfont icon-orderby"></i></a>
                                        <?php } ?>
                                    </th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($countries as $row)
                                {
                                    $titles = json_decode($row['category']['title'],true);
                                    echo "<tr>";
                                ?>
                                <td><img src="<?php echo $row['photo'];?>" class="img-rounded" style="height:35px;"/></td>
                                    <td><?php echo $row['name'] ;?></td> 
                                    <td><?php echo $titles[$row['lang']] ;?></td>                                
                                    <td><?php echo $row['post'] ;?></td>         
                                    <td><?php echo $row['importance'] ;?></td>         
                                    <td><img src="../../assets/img/langs/<?php echo $row['lang']; ?>.svg" alt="<?php echo $row['lang']; ?>" style="height:16px;"></td>
                                    <td><?php echo date_format($row['created_at'],"Y-m-d");?></td>
                                    <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>
                                    <td><a href='team_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                                            <i class="iconfont icon-edit"></i>
                                        </a>
                                        <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-copy' title="拷贝">
                                    <i class="iconfont icon-file-copy"></i>
                                </button>
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
                                    </td>
                                    <?php

                                    echo "</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
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
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');        
            $(".mainmenu>li.teams").addClass("nav-open").find("ul>li.list a").addClass("active");     
            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-active").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'team_post.php',
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
                url : 'team_post.php',
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
                            url : 'team_post.php',
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