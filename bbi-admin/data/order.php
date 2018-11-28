<?php

class ShoppingOrder{
    //按Id获取订单
    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_orders WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    //删除订单
    public function delete_order($id){
        $query = db::getInstance()->prepare("DELETE FROM `wp_orders` WHERE id = :id;DELETE FROM `wp_orderitems` WHERE order_id = :id;");

        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


//更新产品
    public function update_order($id,$express,$expressNo,$remark) {

        $sql = "update wp_orders
             set
             express= :express,
             expressNo = :expressNo,
             remark = :remark
             where id =:id";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":express",$express,PDO::PARAM_STR);
        $query->bindValue(":expressNo",$expressNo,PDO::PARAM_STR);
        $query->bindValue(":remark",$remark,PDO::PARAM_STR);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    //按Id获取订单货物清单
    public function get_orderitems($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_orderitems WHERE order_id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetchAll();
    }
}