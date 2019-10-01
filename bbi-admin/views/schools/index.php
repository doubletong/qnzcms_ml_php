<?php
require_once('../../includes/common.php');
require_once('../../data/school.php');
require_once('../../data/country.php');

require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

$did = isset($_GET['did']) ? $_GET['did'] : null;
$cid = isset($_GET['cid']) ? $_GET['cid'] : null;

$countryClass = new TZGCMS\Admin\Country();
$countries = $countryClass->get_all();

$schoolClass = new TZGCMS\Admin\School();

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

$totalItems = $schoolClass->get_schools_count_v1($did,$cid, $keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);
$schools = $schoolClass->get_paged_schools_v1($did, $cid, $keyword, $currentPage, $itemsPerPage);



?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "专业项目_后台管理_".$site_info['sitename']; ?></title>
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
                    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">搜索</label>
                            <input type="text" name="keyword" class="form-control" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                            </div>
                          
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">国家</label>
                                     <select class="form-control" id="cid" name="cid">
                                        <option value="">--请选择国家--</option>
                                        <?php foreach ($countries as $country) {
                                            ?>                                                       
                                                <option value="<?php echo $country["id"]; ?>" <?php echo  $country["id"] == $cid  ? "selected" : ""; ?>><?php echo $country["name"]; ?></option>

                                        <?php } ?>     
                                    </select>
                                </div>
                         
                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary ">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-auto">
                        <a href="school_edit.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i>  添加院校
                        </a>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>缩略图</th>
                    <th>标题</th>
                    <th>栏目</th>
                    <th>国家</th>            
                    <th>状态</th>
                    <th>发布日期</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($schools as $row)
                {
                    echo "<tr>";
                ?>
                    <td><img src="<?php echo $row['image_url'];?>" class="img-rounded" style="height:50px;"/></td>
                    <td><?php echo $row['title']; ?>  
                    <?php if($row['recommend']){
                        ?>
                       <span class="badge badge-primary">
                        <i class='iconfont  icon-like-fill'></i></span>   
                      
                        <?php } ?></td>
                   
                        <td><?php echo $row['dictionary_title']; ?>  
                        <td><?php echo $row['country_name']; ?>  
                    <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>
                    <td><?php echo date('Y-m-d',$row['added_date']) ;?></td>
                    <td>

                              
                       

                        <a href='school_edit.php?id=<?php echo $row['id'];?>&did=<?php echo $row['dictionary_id'];?>' class='btn btn-primary btn-sm' title="编辑">
                            <i class="iconfont icon-edit"></i>
                        </a>

                             
        

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
                    <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>                            
                </nav>

        </div>
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>


<script>
    $(document).ready(function () {
        //当前菜单  
        $(".mainmenu>li.schools").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        
      
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后新闻将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var schoolId = $that.attr("data-id");

                    $.ajax({
                        url : 'school_actions.php',
                        type : 'POST',
                        data : {id:schoolId,action:"delete"},
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
            var schoolId = $that.attr("data-id");

            $.ajax({
                url : 'school_actions.php',
                type : 'POST',
                data : {id:schoolId,action:"active"},
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
            var schoolId = $that.attr("data-id");

            $.ajax({
                url : 'school_actions.php',
                type : 'POST',
                data : {id:schoolId,action:"recommend"},
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