<?php
class Distributor{
    public function fetch_all(){
        $query =  db::getInstance()->prepare("SELECT * FROM distributors ORDER BY added_date DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM distributors WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_distributor($id){
        $query = db::getInstance()->prepare("DELETE FROM `distributors` WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

//更新产品
    public function update_distributor($id, $thumbnail,$image_url,$name, $postcode,$homepage,$phone, $fax,$address,$active,$importance,$intro) {

        $sql = "UPDATE distributors
        SET name= :name,
        postcode = :postcode,
        homepage = :homepage,
        thumbnail = :thumbnail,
        image_url = :image_url,
             phone =:phone,
             fax =:fax,            
             address = :address,
             importance =:importance,
             intro = :intro,
             active =:active
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":image_url",$image_url);
        $query->bindValue(":name",$name);
        $query->bindValue(":postcode",$postcode);
        $query->bindValue(":phone",$phone);
        $query->bindValue(":fax",$fax);
        $query->bindValue(":homepage",$homepage);
        $query->bindValue(":intro",$intro);
        $query->bindValue(":address",$address);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_distributor($thumbnail,$image_url,$name, $postcode,$homepage,$phone, $fax,$address,$active,$importance,$intro) {

        $sql="INSERT INTO distributors (thumbnail,image_url,name,postcode,homepage, phone,fax,address,importance,intro,active,added_by,added_date)
                VALUES (:thumbnail,:image_url,:name,:postcode,:homepage, :phone,:fax,:address, :importance,:intro, :active,:added_by,:added_date)";


        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":image_url",$image_url);
        $query->bindValue(":name",$name);
        $query->bindValue(":postcode",$postcode);
        $query->bindValue(":phone",$phone);
        $query->bindValue(":fax",$fax);
        $query->bindValue(":homepage",$homepage);
        $query->bindValue(":intro",$intro);
        $query->bindValue(":address",$address);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",time(),PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();
        echo $result ;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}