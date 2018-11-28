<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');

require_once('../includes/PDO_Pagination.php');

$pagination = new PDO_Pagination(db::getInstance());

$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
    $search = htmlspecialchars($_REQUEST["search"]);
    $pagination->param = "&search=$search";
    $pagination->rowCount("SELECT * FROM wp_orders WHERE phone LIKE '%$search%' OR address LIKE '%$search%' OR customer LINK  '%$search%'");
    $pagination->config(3, 5);
    $sql = "SELECT * FROM wp_orders WHERE tphone LIKE '%$search%' OR address LIKE '%$search%' OR customer LINK  '%$search%' ORDER BY id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query =db::getInstance()->prepare($sql);
    $query->execute();
    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
}
else
{
    $pagination->rowCount("SELECT * FROM wp_orders");
    $pagination->config(6,15);
    $sql = "SELECT * FROM wp_orders ORDER BY id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query =db::getInstance()->prepare($sql);
    $query->execute();
    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
}

do_html_doctype("订单管理_后台管理".SITENAME);
?>
<link href="assets/css/toastr.min.css" rel="stylesheet" />

<?php
do_html_header();

?>
<div class="toolbar">
    <a href="#" class="showmenu"><i class="fa fa-bars"></i></a>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> 控制面板</a></li>
        <li class="active">订单管理</li>

    </ol>
</div>

<div class="main-content">
    <div class="well well-sm">
        <a href="link_add.php" class="btn btn-primary pull-right">
            <span class="glyphicon glyphicon-plus"></span>  添加链接
        </a>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for..." value="<?php echo $search ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">搜索</button>
                      </span>
            </div><!-- /input-group -->
        </form>

    </div>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>订单号</th>
            <th><span class="glyphicon glyphicon-user"></span> 客户名称</th>
            <th><span class="glyphicon glyphicon-phone"></span> 联系电话</th>
            <th>数量</th>
            <th><span class="glyphicon glyphicon-yen"></span> 金额</th>
            <th>支付</th>
            <th>支付宝交易号</th>
            <th>物流</th>
            <th>物流单号</th>
            <th>备注</th>
            <th>创建日期</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($model as $row)
        {

            ?>
        <tr <?php echo $row['ispay']?"class='success'":"";?>>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['customer'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['quantity'];?></td>
            <td><?php echo number_format($row['amount'],2) ;?></td>
            <td><?php echo $row['ispay']?"已付款":"未付款";?></td>
            <td><?php echo $row['trade_no'];?></td>
            <td><?php echo $row['express'];?></td>
            <td><?php echo $row['expressNo'];?></td>
            <td><?php echo $row['remark'];?></td>
            <td><?php echo date('Y-m-d',$row['added_date']) ;?></td>
            <td>
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id'];?>">
                    <span class="glyphicon glyphicon-send"></span> 发货
                </button>
                <a href='order_detail.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-xs' title="查看详细" data-toggle="tooltip" data-placement="top">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-danger btn-xs btn-delete' data-toggle="tooltip" data-placement="top" title="删除">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </td>
            <?php

            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <nav>
        <ul class="pagination">
            <?php
            $pagination->pages("btn");
            ?>
        </ul>
    </nav>
</div>



<!-- 填写单号发货 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">我要发货</h4>
            </div>
            <form class="form-horizontal" id="sendExpress">
            <div class="modal-body">
                    <input type="hidden" id="orderId" name="orderId" />
                    <div class="form-group">
                        <label for="express" class="col-sm-2 control-label">物流快递</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="express" name="express" maxlength="50" placeholder="物流快递名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="expressNo" class="col-sm-2 control-label">物流单号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="expressNo" name="expressNo" maxlength="50"  placeholder="物流单号">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remark" class="col-sm-2 control-label">备注</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="remark" name="remark"   placeholder="发货备注"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
do_html_footer();
?>
<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script src="assets/js/bootbox.js"></script>
<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu li.liitem:nth-of-type(3)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass("active");


        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后订单将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var orderId = $that.attr("data-id");
                    $.ajax({
                        url : 'order_delete.php',
                        type : 'POST',
                        data : {id:orderId},
                        success : function(res) {
                            if (res) {
                                toastr.success('订单已删除成功！', '删除链接')
                                $that.closest("tr").remove();
                            } else {
                                toastr.error('订单删除失败！', '删除链接')
                            }
                        }
                    });

                }


            });


        });

        //id传递付值
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var orderId = button.data('id'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#orderId').val(orderId);
        })

        //表单验证
        $("#sendExpress").validate({

            rules: {
                express: {
                    required: true
                },
                expressNo: {
                    required: true
                }

            },
            messages:{
                express: {
                    required:"请输入物流名称"
                },
                expressNo: {
                    required: "请输入快递单号"
                }

            },

            errorClass: "help-block",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-success');
                $(element).parents('.form-group').addClass(' has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass(' has-error');
                $(element).parents('.form-group').addClass('has-success');
            },
            submitHandler: function(form) {
                //form.submit();

                $.ajax({
                    url : 'order_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {
                        //  $('#resultreturn').prepend(res);
                        if (res==="1") {
                            toastr.success('发货信息已保存成功！', '编辑订单')
                            $('#myModal').modal('hide');
                            setTimeout(function(){
                                location.reload();
                            },3000);
                        } else {
                            toastr.error('发货信息保存失败！', '编辑订单')
                        }
                    }
                });

            }
        });

    });
</script>
</body>
</html>