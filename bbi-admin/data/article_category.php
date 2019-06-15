<?php
class ArticleCategory{
    public function fetch_all($did){     
        $query = db::getInstance()->prepare("SELECT * FROM  article_categories WHERE dictionary_id = ? ORDER BY importance DESC");
        $query->bindValue(1,$did);
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM article_categories WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_category($id){
        $query = db::getInstance()->prepare("DELETE FROM `article_categories` WHERE id = ?");
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
    public function case_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `article_categories`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_category($id, $title,$thumbnail,$thumbnail2, $dictionary_id, $parent_id, $importance,$active) {

        $sql = "UPDATE `article_categories` SET title= :title,
        thumbnail= :thumbnail,
        thumbnail2= :thumbnail2,
           dictionary_id =:dictionary_id,         
           parent_id =:parent_id,         
           importance =:importance,     
           active =:active 
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":thumbnail",$thumbnail);      
        $query->bindValue(":thumbnail2",$thumbnail2);      
        $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);   
        $query->bindValue(":parent_id",$parent_id,PDO::PARAM_INT);   
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


    public function insert_category($title, $thumbnail, $thumbnail2, $dictionary_id,$parent_id, $importance,$active) {

      
        $sql="INSERT INTO `article_categories`(`title`, `thumbnail`,`thumbnail2`, `dictionary_id`,   `parent_id`, `importance`, `active`,`added_date`) 
        VALUES (:title,:thumbnail, :thumbnail2, :dictionary_id, :parent_id, :importance, :active,:added_date)";

       // $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":thumbnail",$thumbnail);     
        $query->bindValue(":thumbnail2",$thumbnail2);      
        $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);   
        $query->bindValue(":parent_id",$parent_id,PDO::PARAM_INT);   
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
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