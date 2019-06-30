<?php
class ProductDocument{
    public function get_all($pid){     
        $query = db::getInstance()->prepare("SELECT a.*, d.title as category FROM  product_documents  as a  Left JOIN dictionaries as d
        ON d.id = a.dictionary_id WHERE a.product_id = $pid ORDER BY a.importance DESC");      
        $query->execute();
        return $query->fetchAll(); 
    }


    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM product_documents WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_doc($id){
        $query = db::getInstance()->prepare("DELETE FROM `product_documents` WHERE id = ?");
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
    public function doc_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `product_documents`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    //更新
   public function update_doc($id, $title,$file_url, $importance,$address,$product_id,$dictionary_id) {

        $sql = "UPDATE `product_documents` SET title= :title,
        file_url= :file_url,      
           importance =:importance,
           address =:address,
           product_id = :product_id,
           dictionary_id = :dictionary_id
 
           WHERE id =:id";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":file_url",$file_url);      
        $query->bindValue(":address",$address);      
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":product_id",$product_id,PDO::PARAM_INT);
        $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_doc($title,$file_url, $importance,$address,$product_id,$dictionary_id) {

      
        $sql="INSERT INTO `product_documents`(`title`, `file_url`, `importance`,`address`,`product_id`, `dictionary_id`,  `added_date`) 
        VALUES (:title,:file_url, :importance,:address,:product_id,:dictionary_id, :added_date)";

       // $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":file_url",$file_url);       
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);    
        $query->bindValue(":address",$address);        
        $query->bindValue(":product_id",$product_id,PDO::PARAM_INT);
        $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);
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