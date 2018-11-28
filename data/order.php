<?php

class ShopingOrder{
    public function insert_order($customer,$phone,$address, $quantity, $amount) {

        $sql="INSERT INTO wp_orders ( customer,phone, address,quantity,amount,ispay,added_date)
                VALUES (:customer,:phone, :address,:quantity, :amount,:ispay,:added_date)";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":customer",$customer);
        $query->bindValue(":phone",$phone);
        $query->bindValue(":address",$address);
        $query->bindValue(":quantity",$quantity,PDO::PARAM_INT);
        $query->bindValue(":amount",$amount,PDO::PARAM_STR);
        $query->bindValue(":ispay",false,PDO::PARAM_BOOL);
        $query->bindValue(":added_date",time());
        $query->execute();
        $lastId = db::getInstance()->lastInsertId();
        $result = $query->rowCount();;
        if ($result>0) {
            return $lastId;
        } else {
            return 0;
        }
    }

    function insert_orderitem($order_id,$product_id,$product_no,$title,$quantity,$price){
        $sql="INSERT INTO wp_orderitems ( order_id,product_id,product_no, title,quantity,price)
                VALUES (:order_id,:product_id,:product_no, :title,:quantity, :price)";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":order_id",$order_id,PDO::PARAM_INT);
        $query->bindValue(":product_id",$product_id,PDO::PARAM_INT);
        $query->bindValue(":product_no",$product_no,PDO::PARAM_STR);
        $query->bindValue(":title",$title);
        $query->bindValue(":quantity",$quantity,PDO::PARAM_INT);
        $query->bindValue(":price",$price,PDO::PARAM_STR);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

    function update_paystatus($id,$trade_no){
        $sql = "UPDATE wp_orders SET ispay= :ispay, trade_no =:trade_no
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":ispay",true,PDO::PARAM_BOOL);
        $query->bindValue(":trade_no",$trade_no,PDO::PARAM_STR);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }
}