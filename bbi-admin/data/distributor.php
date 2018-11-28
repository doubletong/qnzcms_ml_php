<?php
class Distributor{
    public function fetch_all(){
        $query =  db::getInstance()->prepare("SELECT * FROM wp_distributors ORDER BY added_date DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_distributors WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_distributor($id){
        $query = db::getInstance()->prepare("DELETE FROM `wp_distributors` WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

//更新产品
    public function update_distributor($id, $title, $category_id,$phone,$city,$address,$active,$importance) {

        $sql = "UPDATE wp_distributors
        SET title= :title,
             category_id = :category_id,
             phone =:phone,
             city = :city,
             address = :address,
             importance =:importance,
             active =:active
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":category_id",$category_id);
        $query->bindValue(":phone",$phone);
        $query->bindValue(":city",$city);
        $query->bindValue(":address",$address);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_distributor($title, $category_id,$phone,$city,$address,$active,$importance) {

        $sql="INSERT INTO wp_distributors (title,category_id,phone,city,address,importance,active,added_by,added_date)
                VALUES (:title,:category_id,:phone,:city,:address, :importance, :active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":category_id",$category_id);
        $query->bindValue(":phone",$phone);
        $query->bindValue(":city",$city);
        $query->bindValue(":address",$address);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",time(),PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}