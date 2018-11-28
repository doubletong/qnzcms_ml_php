<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/product.php");
require_once("data/order.php");

$productClass = new Product();
$orderClass = new ShopingOrder();

if(!isset($_POST['fullname'])||!isset($_POST['phone'])||!isset($_POST['address'])){
    header('Location: shoppingCart.php');
}
$customer =$_POST['fullname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$qty = $_SESSION["total_items"];
$amount = $_SESSION["total_price"];

$orderId = $orderClass->insert_order($customer,$phone,$address,$qty,$amount);

//添加货品清单
foreach($_SESSION['cart'] as $id=>$qty):
    $product =  $productClass->fetch_data($id);
    $orderClass->insert_orderitem($orderId,$id,$product['product_no'],$product['title'],$qty,$product['price']);
endforeach;


do_html_doctype("下单结算_".SITENAME)
?>
    <meta name=keywords content="">
    <meta name=description content="">
<?php
do_html_header();



?>
<div class="container order-page">
   <p class="tc">订单号：<?php echo $orderId; ?>，应付金额为 <strong>￥<?php echo number_format($amount,2); ?> </strong> 元</p>
    <form name=alipayment action=alipayapi.php method=post target="_blank">
        <input type="hidden" value="<?php echo $orderId; ?>" name="WIDout_trade_no" />
        <input type="hidden" value="洁碧在线商城订单" name="WIDsubject" />
        <input type="hidden" value="<?php echo $_SESSION["total_price"];?>" name="WIDtotal_fee" />
        <input type="hidden" value="来自官方网站的订单" name="WIDbody" />
        <input type="hidden" value="http://chinawaterpik.com/" name="WIDshow_url" />
        <p class="tc">
            <button class="btn btn-primary" type="submit" style="text-align:center;"><span class="icon-yen"></span> 马上结算</button>
        </p>
    </form>
</div>

<?php
do_html_footer();
do_html_analytics();