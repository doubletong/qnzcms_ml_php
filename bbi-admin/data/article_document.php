<?php
class ArticleDocument{
    public function get_all($pid){     
        $query = db::getInstance()->prepare("SELECT a.* FROM  article_documents  as a  WHERE a.article_id = $pid ORDER BY a.importance DESC");      
        $query->execute();
        return $query->fetchAll(); 
    }


    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM article_documents WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_doc($id){
        $query = db::getInstance()->prepare("DELETE FROM `article_documents` WHERE id = ?");
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
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `article_documents`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    //更新
   public function update_doc($id, $title,$file_url, $importance,$article_id) {

        $sql = "UPDATE `article_documents` SET title= :title,
        file_url= :file_url,      
           importance =:importance,      
           article_id = :article_id 
           WHERE id =:id";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":file_url",$file_url);       
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":article_id",$article_id,PDO::PARAM_INT);     
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_doc($title, $file_url, $importance, $article_id) {

      
        $sql="INSERT INTO `article_documents`(`title`, `file_url`, `importance`, `article_id`, `added_date`) 
        VALUES (:title,:file_url, :importance,:article_id, :added_date)";

        // $username = $_SESSION['valid_user'];

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":file_url",$file_url);       
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);               
        $query->bindValue(":article_id",$article_id,PDO::PARAM_INT);    
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