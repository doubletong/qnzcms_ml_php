<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/product.php");
require_once("data/cart.php");

$productClass = new Product();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $add_item = add_to_cart($id);
    $_SESSION['total_items'] = total_items($_SESSION['cart']);
    $_SESSION['total_price'] = total_price($_SESSION['cart']);
    header('Location: shoppingCart.php');
}


do_html_doctype("购物车_".SITENAME)
?>
    <meta name=keywords content="">
    <meta name=description content="">
<?php
do_html_header();
?>

    <div class="container cart-page">
       <header class="tc cart-title">
           <h1><i class="icon-shopping-cart"></i> 购物车</h1>
       </header>
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">

                <?php
                if($_SESSION['cart']){
                    ?>
                <table class="tbProductList" id="tbList">
                    <thead>
                    <tr>
                        <th>产品名称</th>
                        <th>单价</th>
                        <th>数量</th>
                        <th>小计</th>
                        <th>删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($_SESSION['cart'] as $id=>$qty):
                        $product =  $productClass->fetch_data($id);
                        ?>
                    <tr>
                        <td><?php echo $product['title'];?></td>
                        <td><?php echo number_format( $product['price'],2);?></td>
                        <td><input type="number" size="2" class="qty" maxlength="3" data-price="<?php echo $product['price'];?>"
                                   data-id="<?php echo $product['id'];?>" value="<?php echo $qty;?>" /> </td>
                        <td>￥<span class="amount"><?php echo number_format( $product['price'] * $qty,2);?></span></td>
                        <td><button type="button" data-id="<?php echo $product['id'];?>" class="remove">删除</button> </td>
                    </tr>
<?php endforeach;?>
                    <tr>
                        <td colspan="2" class="tr">合计</td>
                        <td><div class="total" id="total_qty"><?php echo $_SESSION['total_items'];?></div></td>
                        <td><div class="total">￥<span id="total_amount"><?php echo number_format( $_SESSION['total_price'],2);?></span></span></div> </td>
                        <td> </td>
                    </tr>
                    </tbody>
                </table>

                <form class="form-horizontal" method="post" id="shopping" action="order.php">
                    <div class="form-group">
                        <label class="control-label">
                            收件人：
                        </label>
                        <div class="form-control">
                            <input  placeholder="收件人" name="fullname" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            联系电话：
                        </label>
                        <div class="form-control">
                            <input  placeholder="联系电话" name="phone" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            收货地址：
                        </label>
                        <div class="form-control">
                            <input placeholder="收货地址" name="address" maxlength="200">
                        </div>
                    </div>

                    <div class="form-action">
                        <button type="submit" class="btn btn-primary">提交订单</button>
                    </div>
                </form>


                <?php
                }else{
                    echo '<div class="empty"><div class="alert alert-info">当前购物车为空...<p><a href="products.php" class="back">返回产品列表</a></p></div></div>';
                }
                ?>
            </div>
        </div>
    </div>
<?php
do_html_footer();
do_html_analytics();