<?php
require_once('includes/common.php');
require_once('config/db.php');
require_once("data/product.php");
require_once('data/cart.php');

session_start();

if(isset($_POST['type'])){
    switch ($_POST['type']){
        case "get": //添加到购物车
                $_SESSION['total_items'] = total_items($_SESSION['cart']);
                echo $_SESSION['total_items'];
            break;
        case "add": //添加到购物车
            if (isset( $_POST['id'])) {
                $id = $_POST['id'];

                $add_item = add_to_cart($id);
                $_SESSION['total_items'] = total_items($_SESSION['cart']);
                $_SESSION['total_price'] = total_price($_SESSION['cart']);

                echo $_SESSION['total_items'];
            }
            break;
        case "update": //更新购物车
            if (isset( $_POST['id']) && isset($_POST['qty'])) {
                $id = $_POST['id'];
                $qty = $_POST['qty'];
                update_cart($id,$qty);
                $_SESSION['total_items'] = total_items($_SESSION['cart']);
                $_SESSION['total_price'] = total_price($_SESSION['cart']);

                $arr = array ('total_items'=>$_SESSION['total_items'],'total_price'=>$_SESSION['total_price']);
                echo json_encode($arr);
            }
            break;
        case "delete":
            if (isset( $_POST['id'])) {
                $id = $_POST['id'];
                update_cart($id,0);
                $_SESSION['total_items'] = total_items($_SESSION['cart']);
                $_SESSION['total_price'] = total_price($_SESSION['cart']);

                $arr = array ('total_items'=>$_SESSION['total_items'],'total_price'=>$_SESSION['total_price']);
                echo json_encode($arr);
            }

            break;
    }


}else{
    echo false;
}



