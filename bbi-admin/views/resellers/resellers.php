<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/common.php');
require_once('../../includes/common.php');
require_once('../../../config/database.php');
// require_once('../../data/option.php');
use Models\Region;
use Models\Country;
use Models\Reseller;
use JasonGrimes\Paginator;

$urlPattern = "resellers.php?page=(:num)";
 //文章表实例化
 $reseller = new Reseller;
 //搜索条件判断
 $query = $reseller;

$keyword = null;
$region = null;
$country = null;
if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('name','like','%'.$keyword.'%');
    $urlPattern = $urlPattern . "&keyword=$keyword";
}
if(isset($_REQUEST["region"]) && $_REQUEST["region"] != "")
{
    $region = htmlspecialchars($_REQUEST["region"],ENT_QUOTES);

    $query = $query->where('region_id','=',$region);
    $urlPattern = $urlPattern . "&region=$region";
}
if(isset($_REQUEST["country"]) && $_REQUEST["country"] != "")
{
    $country = htmlspecialchars($_REQUEST["country"],ENT_QUOTES);

    $query = $query->where('country_id','=',$country);
    $urlPattern = $urlPattern . "&country=$country";
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$resellers = $query->orderBy('importance', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


$regions = Region::all();
$countries = Country::all();

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "分销商_后台管理_" . SITENAME; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>
            <div class="container-fluid maincontent">

            <div class="row  mb-2">
                <div class="col">
                    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form-inline">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">搜索</label>
                            <input type="text" name="keyword" class="form-control" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">

                            <label class="sr-only" for="region">区域</label>
                            <select class="form-control" name="region" id="region" placeholder="" >
                                <option value="">--请选择区域--</option>
                                <?php foreach( $regions as $model)
                                {
                                    if($model["id"]== $region){
                                    ?>
                                            <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                                <?php }else{?>

                                    <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?> </option>
                                    <?php } ?>
                                <?php } ?>     
                            </select> 
                            <label class="sr-only" for="country">国家</label>
                            <select class="form-control" name="country" id="country" placeholder="" >
                                <option value="">--请选择国家--</option>
                                <?php foreach( $countries as $model)
                                {
                                    if($model["id"]== $country){
                                    ?>
                                            <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                                <?php }else{?>

                                    <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?> </option>
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
                    <a href="reseller_edit.php" class="btn btn-primary">               
                        <i class="iconfont icon-plus"></i>  添加
                    </a>
                </div>
            </div>

            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
          
                    <th>名称</th>
                    <th>区域</th>
                    <th>国家</th>
                    <th>地址</th>
                    <th>排序</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($resellers as $row)
                {
                    echo "<tr>";
                ?>
                  
                    <td><?php echo $row['name'] ;?></td> 
                    <td><?php echo $row['region']['title'] ;?></td> 
                    <td><?php echo $row['country']['title'] ;?></td> 
                    <td><?php echo $row['address'] ;?></td> 
                    <td><?php echo $row['importance'] ;?></td>         
                    <td><?php echo date_format($row['created_at'],"Y-m-d H:i");?></td>
                   
                    <td><a href='reseller_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                            <i class="iconfont icon-edit"></i>
                        </a>
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
            </div>
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/js/vendor/toastr/toastr.min.js"></script>
    <script src="/js/vendor/bootbox.js/bootbox.js"></script>

    <script type="text/javascript">
    

        $(document).ready(function() {
            //当前菜单        
            $(".mainmenu>li.agent").addClass("nav-open").find("ul>li.resellers a").addClass("active");     
            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function(){
                var $that = $(this);
                bootbox.confirm("删除后将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var id = $that.attr("data-id");

                        $.ajax({
                            url : 'reseller_post.php',
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