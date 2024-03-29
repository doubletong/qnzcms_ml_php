<?php
class Shop{
    public function fetch_all(){
        $query =  db::getInstance()->prepare("SELECT * FROM wp_shopes ORDER BY added_date DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_shopes WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_shop($id){
        $query = db::getInstance()->prepare("DELETE FROM `wp_shopes` WHERE id = ?");
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
    public function update_shop($id, $title,$address,$authorization_no,$link,$active,$importance) {

        $sql = "UPDATE wp_shopes SET title= :title,
           address =:address,
            authorization_no = :authorization_no,
             link = :link,
             importance =:importance,
             active =:active
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":address",$address);
        $query->bindValue(":authorization_no",$authorization_no);
        $query->bindValue(":link",$link);
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


    public function insert_shop($title,$address,$authorization_no,$link,$active,$importance) {

        $sql="INSERT INTO wp_shopes (title,address,authorization_no,link,importance,active,added_by,added_date)
                VALUES (:title,:address,:authorization_no,:link, :importance, :active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":address",$address);
        $query->bindValue(":authorization_no",$authorization_no);
        $query->bindValue(":link",$link);
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