<?php
class Document{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT id, title, thumbnail, active, improtance, added_by FROM documents ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM documents WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_document($id){
        $query = db::getInstance()->prepare("DELETE FROM `documents` WHERE id = ?");
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
    public function document_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `documents`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_document($id, $title,$file_url,$thumbnail,$importance,$dictionary_id, $active) {

        $sql = "UPDATE documents SET title= :title,
           file_url =:file_url,        
           thumbnail =:thumbnail, 
             importance = :importance, 
             dictionary_id = :dictionary_id,          
             active =:active
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);
          
        $query->bindValue(":title",$title);
       $query->bindValue(":file_url",$file_url);
       $query->bindValue(":thumbnail",$thumbnail);
       $query->bindValue(":importance",$importance,PDO::PARAM_INT);  
       $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);  
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


    public function insert_document( $title,$file_url,$thumbnail,$importance,$dictionary_id, $active) {

        $sql="INSERT INTO documents (title,file_url,thumbnail,importance,dictionary_id, active, added_by,added_date)
                VALUES (:title,:file_url,:thumbnail,:importance,:dictionary_id,:active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;
      
     
        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":file_url",$file_url);    
        $query->bindValue(":thumbnail",$thumbnail);     
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);  
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