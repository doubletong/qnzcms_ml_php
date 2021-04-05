<?php

function add_to_cart($id){
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]++;
        return true;
    }else{
        $_SESSION['cart'][$id]=1;
        return true;
    }
    return false;
}

function update_cart($id,$qty){
    if($qty==0){
        unset( $_SESSION['cart'][$id]);
    }else{
        $_SESSION['cart'][$id] = $qty;
    }
}


function total_items($cart){
    $num_items = 0;
    if(is_array($cart)){
        foreach($cart as $id =>$qty){
            $num_items += $qty;
        }
    }
    return $num_items;
}


function total_price($cart){
    $productClass = new Product();
    $price = 0.0;
    if(is_array($cart)){
        foreach($cart as $id =>$qty){
            $data = $productClass->fetch_data($id);
            if($data){
                $item_price = $data['price'];
                $price += $item_price * $qty;
            }

        }

    }
    return $price;
}

