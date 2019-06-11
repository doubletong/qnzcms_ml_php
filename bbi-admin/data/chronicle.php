<?php
class Chronicle{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT id, title, thumbnail, active, improtance, added_by FROM chronicles ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM chronicles WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_chronicle($id){
        $query = db::getInstance()->prepare("DELETE FROM `chronicles` WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

    
    //获取总数
    public function chronicle_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `chronicles`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_chronicle($id, $year,$image_url, $description,$dictionary_id) {

        $sql = "UPDATE chronicles SET year= :year,
        image_url = :image_url,        
           description =:description,
           dictionary_id = :dictionary_id
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);
          
        $query->bindValue(":year",$year,PDO::PARAM_INT);
        $query->bindValue(":image_url",$image_url);       
       $query->bindValue(":description",$description);    
       $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);   
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_chronicle($year,$image_url, $description,$dictionary_id) {

        $sql="INSERT INTO chronicles (year,image_url, description, dictionary_id, added_by,added_date)
                VALUES (:year,:image_url,:description,:dictionary_id,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;
      
     
        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":year",$year,PDO::PARAM_INT);
        $query->bindValue(":image_url",$image_url);       
        $query->bindValue(":description",$description);         
        $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);    
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