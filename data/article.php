<?php
class Article{
    public function fetch_paged($pageIndex,$pageSize){
        $startIndex = ($pageIndex-1) * $pageSize;
        $query = db::getInstance()->prepare("SELECT id, title, summary, thumbnail,  pubdate FROM wp_articles  where active=1 ORDER BY pubdate DESC LIMIT $startIndex, $pageSize");       
        $query->execute();

        return $query->fetchAll();
    }

    //获取总数
    public function article_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `wp_articles` where active=1");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    public function search_paged($keyword,$pageIndex,$pageSize){
        $param = "%{$keyword}%";

        $startIndex = ($pageIndex-1) * $pageSize;
        $query = db::getInstance()->prepare("SELECT id, title, summary, thumbnail,  
        pubdate FROM wp_articles  where active=1 AND title LIKE :keyword ORDER BY pubdate DESC LIMIT $startIndex, $pageSize");   
        $query->bindValue(":keyword", $param);  
       // $query->bindValue(":id",$id,PDO::PARAM_INT);  
        $query->execute();

        return $query->fetchAll();
    }

    //获取总数
    public function search_count($keyword){
        $param = "%{$keyword}%";
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `wp_articles` where active=1 AND title LIKE :keyword ");    
        $query->bindValue(":keyword", $param);  
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    public function get_all_articles($did){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE active=1 AND dictionary_id = $did ORDER BY pubdate DESC");
        $query->execute();

        return $query->fetchAll();
    }

    // public function fetch_category($categoryId){
    //     $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE categoryId = :categoryId ORDER BY added_date DESC");
    //     $query->bindValue(":categoryId",$categoryId,PDO::PARAM_INT);
    //     $query->execute();

    //     return $query->fetchAll();
    // }

    public function laster_articles(){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles ORDER BY added_date DESC limit 3");
        $query->execute();
        return $query->fetchAll();
    }


    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE id = :id;UPDATE wp_articles SET view_count = view_count + 1 WHERE id =:id ;");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
  //获取前一条记录
    public function fetch_prev_data($id,$did){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE dictionary_id = $did AND id = (SELECT MAX(id) FROM wp_articles WHERE dictionary_id = $did AND id < :id);");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
   //获取下一条记录
    public function fetch_next_data($id,$did){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE dictionary_id = $did AND id = (SELECT MIN(id) FROM wp_articles WHERE dictionary_id = $did AND id > :id);");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }


    public function get_categories($did){     
        $query = db::getInstance()->prepare("SELECT * FROM  article_categories WHERE dictionary_id = ? ORDER BY importance DESC");
        $query->bindValue(1,$did);
        $query->execute();

        return $query->fetchAll();
    }
}