<?php
require_once('../../includes/common.php');
require_once('../../data/offer.php');
require_once('../../data/dictionary.php');
require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

$offerClass = new TZGCMS\Admin\OfferRepository();

$urlPattern = "index.php?page=(:num)";

$did = isset($_GET['did']) ? $_GET['did'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;


if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $offerClass->get_offers_count($did,$keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$offers = $offerClass->get_paged_offers($did, $keyword, $currentPage, $itemsPerPage);


$dicModel = new TZGCMS\Admin\Dictionary();
$dictionaries =  $dicModel->get_dictionaries_byid(12);

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "学员Offer_后台管理_".$site_info['sitename'];?>
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
                            <div class="form-row align-items-center  mb-2">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">搜索</label>
                                    <input type="text" name="keyword" class="form-control" id="inlineFormInput"
                                        value="<?php echo $keyword ?>" placeholder="关键字">
                                </div>
                                <div class="col-md-auto">
                                        <select class="form-control" id="did" name="did" >
                                            <option value="0">--请选择栏目--</option>
                                            <?php foreach( $dictionaries as $dic)
                                            {
                                                ?>
                                                <option value="<?php echo $dic["id"]; ?>"  <?php echo (isset($did) && $did==$dic["id"])?"selected":"" ; ?> ><?php echo $dic["title"]; ?></option>                                             
                                            <?php  } ?>
                                                            
                                        </select>     
                                    </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">搜索</button>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                    <div class="col-auto">
                        <a href="offer_edit.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加Offer
                        </a>
                    </div>
                </div>
               

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>Offer</th>       
                            <th>学员</th>                        
                            <th>录取院校</th>
                            <th>奖学金</th>
                            <th>排序</th>
                            <th>状态</th>
                            <th style="min-width:120px;">创建日期</th>
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        foreach($offers as $row)
        {
          
            ?>
            <tr>
            <td><img src="<?php echo $row['image_url'];?>" class="img-rounded" style="height:100px;"/></td>
                <td>
                    <?php echo $row['name']; ?>
                    <?php if($row['recommend']){
                        ?>
                       <span class="badge badge-primary">
                        <i class='iconfont  icon-like-fill'></i></span>                       
                    <?php } ?>
                </td>             
                <td><?php echo $row['schools']; ?></td>
                <td><?php echo $row['scholarship']; ?></td>
                <td><?php echo $row['importance']; ?></td>
                <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>
                <td>
                    <?php echo date('Y-m-d',strtotime($row['created_at'])) ;?>
                </td>
                <td><a href='offer_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-grey btn-sm btn-recommend' title="撤消推荐">
                                <i class="iconfont icon-sketch"></i>
                            </button>
                        <?php }else{ ?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-recommend' title="推荐">
                                <i class="iconfont icon-sketch"></i>
                            </button>
                        <?php } ?>   


                    <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-danger btn-sm btn-delete'>
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
        $(document).ready(function () {
            //当前菜单
            $(".mainmenu>li.offers").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass(
                "active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function () {
                var $that = $(this);
                bootbox.confirm("删除后Offer将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var productId = $that.attr("data-id");

                        $.ajax({
                            url: 'offer_actions.php',
                            type: 'POST',
                            data: {
                                id: productId,
                                action:"delete"
                            },
                            success: function (res) {

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


            $(".btn-active").click(function(){
            var $that = $(this);           
            var offerId = $that.attr("data-id");

            $.ajax({
                url : 'offer_actions.php',
                type : 'POST',
                data : {id:offerId,action:"active"},
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
            var offerId = $that.attr("data-id");

            $.ajax({
                url : 'offer_actions.php',
                type : 'POST',
                data : {id:offerId,action:"recommend"},
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