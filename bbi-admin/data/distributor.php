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

    
 //显示或隐藏
 public function active_distributor($id) {

    $sql = "UPDATE `distributors` SET  
        active =ABS(active-1)
        WHERE id =:id";

    $query = \db::getInstance()->prepare($sql);           
    $query->bindValue(":id",$id,\PDO::PARAM_INT);
    $query->execute();

    $result = $query->rowCount();;
    if ($result>0) {
        $msg = array ('status'=>1,'message'=>'记录已成功更新。');
        return json_encode($msg);  
    } else {
        $msg = array ('status'=>3,'message'=>'未更新记录。');
        return json_encode($msg);  
        
    }
}
    //拷贝记录
public function copy_distributor($id){
    $query = \db::getInstance()->prepare("INSERT INTO `distributors` (`name`, `postcode`, `homepage`, `thumbnail`, `image_url`, `phone`, `fax`, `address`, `importance`, `intro`, `active`,  `added_by`, `added_date`)
                                                 SELECT concat(`name`,'【拷贝】'), `postcode`,  `homepage`,`thumbnail`, `image_url`, `phone`, `fax`, `address`, `importance`, `intro`, 0,  `added_by`,  UNIX_TIMESTAMP(now())  FROM `distributors` WHERE id = ? ");
    $query->bindValue(1,$id);
    $query->execute();

    $result = $query->rowCount();;
    if ($result>0) {
        $msg = array ('status'=>1,'message'=>'记录已成功拷贝。');
        return json_encode($msg);  
    } else {
        $msg = array ('status'=>3,'message'=>'未拷贝记录。');
        return json_encode($msg);              
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