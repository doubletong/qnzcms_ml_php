<?php
require_once('../../includes/common.php');

use Models\Resource;
use Models\Language;
use JasonGrimes\Paginator;

$langs = Language::all();

//文章表实例化
$resourceClass = new Resource;
//搜索条件判断
$query = $resourceClass->select('id','lang_code','key','value','created_at');

$urlPattern = "index.php?page=(:num)";

$keyword = null;
$lang_filter = null;
if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('key','like','%'.$keyword.'%')
            ->orWhere('value','like','%'.$keyword.'%');
    $urlPattern = $urlPattern . "&keyword=$keyword";
}
if(isset($_REQUEST["lang"]) && $_REQUEST["lang"] != "")
{
    $lang_filter = htmlspecialchars($_REQUEST["lang"],ENT_QUOTES);

    $query = $query->where('lang_code',$lang_filter);         
    $urlPattern = $urlPattern . "&lang=$lang_filter";
}

$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$resources = $query->orderBy('created_at', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "语言_后台管理_" . $site_info['sitename']; ?>
    </title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>

            <div class="container-fluid maincontent">

                <div class="row">
                    <div class="col">
                        <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">搜索</label>
                                    <input type="text" name="keyword" class="form-control mb-2" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">语言</label>
                                    <select name="lang" id="lang" class="form-control mb-2">
                                        <option value="">--按语言过滤--</option>
                                        <?php foreach($langs as $lang) { ?>
                                            <?php if(isset($lang_filter) && $lang_filter == $lang->code){?>
                                                <option value="<?php echo $lang->code;?>" selected><?php echo $lang->name;?></option>  
                                            <?php }else{ ?>   
                                                <option value="<?php echo $lang->code;?>"><?php echo $lang->name;?></option>   
                                            <?php } ?>                    
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">搜索</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="edit.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加
                        </a>
                    </div>
                </div>


                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>图标</th>
                            <th>语言</th> 
                            <th>键</th>
                            <th>值</th>  
                            <th style="min-width:120px;">创建日期</th>
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($resources as $row) {

                            ?>
                            <tr>   
                            <td><img src="../../content/img/langs/<?php echo $row['lang_code']; ?>.svg" alt="<?php echo $row['lang_code']; ?>" style="height:20px;"></td>                           
                                <td><?php echo $row['lang_code']; ?></td>               
                                <td><?php echo $row['key']; ?></td>
                                <td><?php echo $row['value']; ?></td>
                                           
                                <td>
                                    <?php echo date_format(date_create($row['added_date']),"Y-m-d"); ?>
                                </td>
                                <td>
                                    <a href='edit.php?id=<?php echo $row['id']; ?>' class='btn btn-primary btn-sm' title="编辑">
                                        <i class="iconfont icon-edit"></i>
                                    </a>
                          
                                    <button type="button" data-id="<?php echo $row['id']; ?>"   class='btn btn-danger btn-sm btn-delete' title="删除">
                                        <i class="iconfont icon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>


                <nav aria-label="Page navigation">
                    <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>
                </nav>
            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once('../../includes/scripts.php'); ?>


    <script>
        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.system").addClass("nav-open").find("ul>li.resource a").addClass(
                "active");

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
                            url : 'post.php',
                            type : 'POST',
                            data : {id:id, action:"delete"},
                            success : function(res) {

                                var myobj = JSON.parse(res);                    
                                //console.log(myobj.status);
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

         

            

        });
    </script>
</body>

</html>