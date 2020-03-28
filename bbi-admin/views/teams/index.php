<?php
require_once('../../includes/common.php');
require_once('../../data/team.php');
require_once('../../data/dictionary.php');

require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

$dictionaryClass = new TZGCMS\Admin\Dictionary();
$dictionaries = $dictionaryClass->get_dictionaries_byid(11);

$teamClass = new TZGCMS\Admin\Team();

$urlPattern = "index.php?page=(:num)";

$did = isset($_GET['did']) ? $_GET['did'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($did)) {
    $urlPattern = $urlPattern . "&did=$did";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $teamClass->get_teams_count($did, $keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$teams = $teamClass->get_paged_teams($did, $keyword, $currentPage, $itemsPerPage);




?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "团队_后台管理_".$site_info['sitename'];?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>
<body>
<div class="wrapper" id="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol" id="rightcol">    
        <?php require_once('../../includes/header.php'); ?>

        <div class="main-content">
            <div class="breadcrumb-container">
                <div class="row">
                    <div class="col-md">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">控制面板</a></li>
                        <li class="breadcrumb-item"><a href="#">团队</a></li>
                        <li class="breadcrumb-item active" aria-current="page">团队列表</li>
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
                  <div class="card-title-v1"> <i class="iconfont icon-link"></i>团队列表</div>
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
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">搜索</label>
                            <input type="text" name="keyword" class="form-control" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                            </div>
                            <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">类别</label>
                                    <select class="form-control" id="dictionary_id" name="did">
                                            <option value="">--请选择类别--</option>
                                            <?php foreach ($dictionaries as $model) {
                                                if ($did == $model["id"]) {
                                                    ?>
                                                    <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                                                <?php } else { ?>
                                                    <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?></option>
                                                <?php
                                            }
                                        } ?>

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
                            <i class="iconfont icon-plus"></i>  添加团队
                        </a>
                </div>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>照片</th>
                    <th>姓名</th>
                    <th>类别</th>
                    <th>职位</th>
                    <th>重要性</th>
                    <th>创建时间</th>                  
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($teams as $row)
                {
                    echo "<tr>";
                ?>
                    <td><img src="<?php echo $row['photo'];?>" style="height:35px;"/></td>
                    <td><?php echo $row['name'] ;?></td>         
                    <td><?php echo $row['category'] ;?></td>                    
                    <td><?php echo $row['post'] ;?></td>    
                    <td><?php echo $row['importance'] ;?></td>               
                    <td><?php echo date("Y-m-d H:i",$row['added_date']);?></td>                    
                    <td><a href='team_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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
            </section>
            <footer class="card-footer">
              <div class="row table-pager">
                <div class="col-sm">
                    <nav aria-label="Page navigation">                
                        <?php include("../../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>                            
                    </nav>
                </div>
              
                <div class="col-sm-auto">
                    <p class="pagecount"> 总记<strong><?php echo $totalItems; ?></strong>条记录</p>
                </div>
              </div>
            </footer>
           
        </div>
        <?php require_once('../../includes/footer.php'); ?> 
            </section>
</div>
<?php require_once('../../includes/scripts.php'); ?> 


<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.teams").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后团队将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var articleId = $that.attr("data-id");

                    $.ajax({
                        url : 'team_delete.php',
                        type : 'POST',
                        data : {id:articleId},
                        success : function(res) {

                            var myobj = JSON.parse(res);                    
                            console.log(myobj.status);
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