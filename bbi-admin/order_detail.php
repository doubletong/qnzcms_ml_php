<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/order.php');

if(!isset($_GET['id'])){
    header('Location: orders.php');
}

$id = $_GET['id'];
$orderClass =  new ShoppingOrder();
$order = $orderClass->fetch_data($id);
$orderitems = $orderClass->get_orderitems($id);

do_html_doctype("订单管理_后台管理".SITENAME);
?>
    <link href="assets/css/toastr.min.css" rel="stylesheet" />

<?php
do_html_header();

?>

<div class="toolbar">
    <a href="#" class="showmenu"><i class="fa fa-bars"></i></a>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> 控制面板</a></li>
        <li><a href="orders.php">控制面板</a></li>
        <li class="active">订单详情</li>
    </ol>
</div>

<div class="main-content">
<div class="panel panel-default">
    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>订单号</dt><dd><?php echo $order['id'];?></dd>
            <dt>客户名称</dt><dd><?php echo $order['customer'];?></dd>
            <dt>联系电话</dt><dd><?php echo $order['phone'];?></dd>
            <dt>收件地址</dt><dd><?php echo $order['address'];?></dd>
            <dt>总数量</dt><dd><?php echo $order['quantity'];?></dd>
            <dt>总金额</dt><dd><?php echo $order['amount'];?></dd>
            <dt>下单日期</dt><dd><?php echo date('Y-m-d',$order['added_date']);?></dd>
        </dl>
    </div>
</div>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>序号</th>
            <th>产品型号</th>
            <th>产品名称</th>
            <th>单价</th>
            <th>数量</th>
            <th>小计</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($orderitems as $row)
        {
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['product_no'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo number_format($row['price'],2) ;?></td>
            <td><?php echo $row['quantity'];?></td>
            <td><?php echo number_format($row['price']*$row['quantity'],2) ;?></td>
            <?php

            echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <p>
        <a href="orders.php" class="btn btn-default"><span class="glyphicon glyphicon-hand-left"></span> 返回</a>
    </p>
</div>

<?php
do_html_footer();
?>

<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu li.liitem:nth-of-type(3)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass("active");


       });
</script>
</body>
</html>